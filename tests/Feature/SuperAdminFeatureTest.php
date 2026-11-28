<?php

namespace Tests\Feature;

use App\Support\Library;
use Tests\TestCase;

class SuperAdminFeatureTest extends TestCase
{
    protected function superSession(): array
    {
        return [
            'user' => [
                'n' => 'Ari',
                'id' => 'SA-001',
                'role' => 'super',
            ],
        ];
    }

    public function test_00_library_filter_works(): void
    {
        $lib = app(Library::class);
        $this->assertTrue(method_exists($lib, 'filter'), 'Library::filter method must exist');

        $result = $lib->filter('laskar', '');
        $this->assertIsArray($result);
    }

    public function test_01_module_dashboard_overview(): void
    {
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/ov');

        $response->assertStatus(200);
        $response->assertSee('Dashboard Super Admin');
        $response->assertSee('PUSAT KONTROL TINGGI', false);
    }

    public function test_02_module_users_crud_and_actions(): void
    {
        // 1. View users panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/users');
        $response->assertStatus(200);
        $response->assertSee('Kelola Akun &amp; Hak Akses', false);

        // 2. Create user
        $testEmail = 'super.test.'.time().'@inovexa.id';
        $userCode = 'INX-TST-'.time();
        $createResponse = $this->withSession($this->superSession())
            ->post('/super/user/create', [
                'id_code' => $userCode,
                'name' => 'Staf Pengujian Otomatis',
                'email' => $testEmail,
                'role' => 'admin',
                'unit' => 'Layanan Sirkulasi',
            ]);
        $createResponse->assertRedirect();

        $lib = Library::load();
        $createdUser = null;
        foreach ($lib->users as $user) {
            if ($user['i'] === $userCode) {
                $createdUser = $user;
                break;
            }
        }
        $this->assertNotNull($createdUser, 'Created system user must exist');

        // 3. Toggle user status
        $toggleResponse = $this->withSession($this->superSession())
            ->post("/super/user/{$userCode}/toggle");
        $toggleResponse->assertRedirect();

        // 4. Revoke session via canonical route
        $revoke1Response = $this->withSession($this->superSession())
            ->post("/super/user/{$userCode}/revoke-session");
        $revoke1Response->assertRedirect();

        // 5. Revoke session via alias route
        $revoke2Response = $this->withSession($this->superSession())
            ->post("/super/user/{$userCode}/revoke");
        $revoke2Response->assertRedirect();

        // 6. Delete user
        $deleteResponse = $this->withSession($this->superSession())
            ->delete("/super/user/{$userCode}");
        $deleteResponse->assertRedirect();
    }

    public function test_03_module_members_crud_and_actions(): void
    {
        // 1. View members panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/mem');
        $response->assertStatus(200);
        $response->assertSee('Kelola Data Anggota &amp; Tata Kelola Direktori', false);

        // 2. Register member
        $testEmail = 'member.test.'.time().'@inovexa.id';
        $regResponse = $this->withSession($this->superSession())
            ->post('/super/member/register', [
                'name' => 'Anggota Pengujian',
                'email' => $testEmail,
                'category' => 'mahasiswa',
                'limit_books' => '3 Buku',
            ]);
        $regResponse->assertRedirect();

        $lib = Library::load();
        $createdMember = null;
        foreach ($lib->users as $m) {
            if (($m['email'] ?? '') === $testEmail) {
                $createdMember = $m;
                break;
            }
        }
        $this->assertNotNull($createdMember, 'Registered member must exist');
        $nia = $createdMember['i'];

        // 3. Quota override
        $quotaResponse = $this->withSession($this->superSession())
            ->post('/super/member/quota', [
                'nia' => $nia,
                'limit_books' => '7 Buku',
            ]);
        $quotaResponse->assertRedirect();

        // 4. Verify member
        $verifyResponse = $this->withSession($this->superSession())
            ->post("/super/member/verify/{$nia}");
        $verifyResponse->assertRedirect();

        // 5. Toggle member status
        $toggleResponse = $this->withSession($this->superSession())
            ->post("/super/member/{$nia}/toggle");
        $toggleResponse->assertRedirect();

        // 6. Delete member
        $delResponse = $this->withSession($this->superSession())
            ->delete("/super/member/{$nia}");
        $delResponse->assertRedirect();
    }

    public function test_04_module_books_crud_and_copies(): void
    {
        // 1. View stock panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/stock');
        $response->assertStatus(200);
        $response->assertSee('Kelola Master Koleksi Buku &amp; Eksemplar', false);

        // 2. Create book master
        $testTitle = 'Buku Pengujian Super '.time();
        $createResponse = $this->withSession($this->superSession())
            ->post('/super/book/create', [
                'title' => $testTitle,
                'author' => 'Dr. Author Test',
                'category' => 'Sains & Data',
                'isbn' => '978-623-000-001-'.rand(100, 999),
                'copies_count' => 2,
            ]);
        $createResponse->assertRedirect();

        $lib = Library::load();
        $createdBook = null;
        foreach ($lib->books as $b) {
            if ($b['t'] === $testTitle) {
                $createdBook = $b;
                break;
            }
        }
        $this->assertNotNull($createdBook, 'Created book master must exist');
        $bookId = $createdBook['id'];

        // 3. Add book copy
        $copyResponse = $this->withSession($this->superSession())
            ->post("/super/book/{$bookId}/copy", [
                'barcode' => 'BAR-TEST-'.time(),
                'shelf' => 'Rak B-01',
            ]);
        $copyResponse->assertRedirect();

        // 4. Delete book master
        $deleteResponse = $this->withSession($this->superSession())
            ->delete("/super/book/{$bookId}");
        $deleteResponse->assertRedirect();
    }

    public function test_05_module_circulation_policy_and_actions(): void
    {
        // 1. View circulation panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/circ');
        $response->assertStatus(200);
        $response->assertSee('Kelola Kebijakan Sirkulasi');

        // 2. Update policy
        $policyResponse = $this->withSession($this->superSession())
            ->post('/super/circ/policy', [
                'fine_rate' => 2500,
                'max_loans' => 5,
                'loan_days' => 14,
            ]);
        $policyResponse->assertRedirect();

        // 3. Dispensation approval if dispensations exist
        $lib = Library::load();
        if (! empty($lib->dispensations)) {
            $dispId = $lib->dispensations[0]['id'];
            $appResponse = $this->withSession($this->superSession())
                ->post("/super/circ/dispensation/{$dispId}/approve");
            $appResponse->assertRedirect();
        }
    }

    public function test_06_module_reservations_status_update(): void
    {
        // 1. View reservations panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/resv');
        $response->assertStatus(200);
        $response->assertSee('Kelola Reservasi &amp; Gateway', false);

        // 2. Update reservation status if available
        $lib = Library::load();
        if (! empty($lib->resv)) {
            $resId = $lib->resv[0]['id'];
            $statusResponse = $this->withSession($this->superSession())
                ->post("/super/reservation/status/{$resId}", [
                    'status' => 'ready',
                ]);
            $statusResponse->assertRedirect();
        }
    }

    public function test_07_module_elibrary_actions(): void
    {
        // 1. View e-library panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/elib');
        $response->assertStatus(200);
        $response->assertSee('Kelola E-Library');
        $response->assertSee('Repositori Digital', false);

        // 2. Upload master e-book
        $testTitle = 'Jurnal Pengujian Digital '.time();
        $uploadResponse = $this->withSession($this->superSession())
            ->post('/super/elib/create', [
                'title' => $testTitle,
                'author' => 'Laboratorium Inovexa',
                'category' => 'Informatika',
                'format' => 'PDF',
                'license' => 'OPEN ACCESS (CC-BY 4.0)',
                'file_size' => '15.4 MB',
                'drm_enabled' => 1,
            ]);
        $uploadResponse->assertRedirect();

        $lib = Library::load();
        $uploaded = null;
        foreach ($lib->ebooks as $eb) {
            if ($eb['title'] === $testTitle) {
                $uploaded = $eb;
                break;
            }
        }
        $this->assertNotNull($uploaded, 'Uploaded e-book must exist');
        $ebookId = $uploaded['id'];

        // 3. Toggle DRM
        $drmResponse = $this->withSession($this->superSession())
            ->post("/super/elib/{$ebookId}/drm");
        $drmResponse->assertRedirect();

        // 4. Delete e-book
        $delResponse = $this->withSession($this->superSession())
            ->delete("/super/elib/{$ebookId}");
        $delResponse->assertRedirect();
    }

    public function test_08_module_audit_log_and_backup(): void
    {
        // 1. View audit panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/sys');
        $response->assertStatus(200);
        $response->assertSee('Audit Log');

        // 2. Trigger manual backup
        $backupResponse = $this->withSession($this->superSession())
            ->post('/super/backup/trigger');
        $backupResponse->assertRedirect();

        // 3. Verify backup integrity
        $verifyResponse = $this->withSession($this->superSession())
            ->post('/super/backup/verify');
        $verifyResponse->assertRedirect();

        // 4. Download backup snapshot
        $downResponse = $this->withSession($this->superSession())
            ->get('/super/backup/download');
        $downResponse->assertStatus(200);

        // 5. Export audit log
        $exportResponse = $this->withSession($this->superSession())
            ->get('/super/export/audit-logs');
        $exportResponse->assertStatus(200);
    }

    public function test_09_module_reports_export(): void
    {
        // 1. View reports panel
        $response = $this->withSession($this->superSession())
            ->get('/dashboard/reports');
        $response->assertStatus(200);
        $response->assertSee('Laporan');

        // 2. Export each report type in CSV streamed format
        foreach (['akreditasi', 'inventaris', 'sirkulasi'] as $type) {
            $exportResponse = $this->withSession($this->superSession())
                ->get("/super/reports/export/{$type}");
            $exportResponse->assertStatus(200);
        }
    }
}
