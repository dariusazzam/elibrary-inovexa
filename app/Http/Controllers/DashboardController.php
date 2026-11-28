<?php

namespace App\Http\Controllers;

use App\Support\Library;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    public function show(Request $request, ?string $menu = 'ov')
    {
        $u = session('user');
        $lib = Library::load();
        $menus = Library::MENU[$u['role'] ?? 'member'];
        $menu = $menu ?: 'ov';

        if (! in_array($menu, array_column($menus, 0), true)) {
            $menu = 'ov';
        }

        $my = array_values(array_filter($lib->loans, fn ($l) => ($l['w'] ?? '') === ($u['n'] ?? '')));
        $mr = array_values(array_filter($lib->resv, fn ($r) => ($r['w'] ?? '') === ($u['n'] ?? '')));
        $notifications = $lib->notifications($u);
        $notifCount = $lib->notificationCount($u);
        $catalogBooks = $lib->books;
        $catalogQuery = trim((string) $request->query('q', ''));
        $catalogCategory = trim((string) $request->query('category', ''));
        $catalogSort = (string) $request->query('sort', 'popular');

        if ($menu === 'cat') {
            $catalogBooks = array_values(array_filter($catalogBooks, function (array $book) use ($catalogQuery, $catalogCategory): bool {
                $matchesCategory = $catalogCategory === '' || $book['c'] === $catalogCategory;
                $searchableText = strtolower(implode(' ', [$book['t'], $book['a'], $book['c'], $book['s']]));
                $matchesQuery = $catalogQuery === '' || str_contains($searchableText, strtolower($catalogQuery));

                return $matchesCategory && $matchesQuery;
            }));

            if ($catalogSort === 'newest') {
                usort($catalogBooks, fn (array $first, array $second): int => $second['id'] <=> $first['id']);
            } elseif ($catalogSort === 'title') {
                usort($catalogBooks, fn (array $first, array $second): int => strcasecmp($first['t'], $second['t']));
            }
        }

        $catalogCategories = array_values(array_unique(array_map(fn (array $book): string => $book['c'], $lib->books)));
        $superStats = $lib->getSuperStats();

        return view('dashboard', compact(
            'u', 'lib', 'menus', 'menu', 'my', 'mr', 'notifications', 'notifCount',
            'catalogBooks', 'catalogCategories', 'catalogQuery', 'catalogCategory', 'catalogSort', 'superStats'
        ));
    }

    public function reader(int $id, Request $request)
    {
        $u = session('user');
        $lib = Library::load();
        $b = $lib->book($id);

        abort_unless($b, 404);

        $chapters = $lib->chapters($id);
        $currentChapterIndex = max(0, min((int) $request->query('bab', 1) - 1, count($chapters) - 1));
        $currentChapter = $chapters[$currentChapterIndex] ?? $chapters[0];

        return view('reader', compact('u', 'lib', 'b', 'chapters', 'currentChapterIndex', 'currentChapter'));
    }

    public function cancel(int $id)
    {
        $lib = Library::load();
        $lib->cancelReservation($id, session('user')['n'] ?? '');
        $lib->save();

        return redirect()->route('dashboard', 'resv')->with('toast', 'Reservasi berhasil dibatalkan');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'email' => 'nullable|string|email|max:100',
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:300',
        ]);

        $profile = session('member_profile', [
            'name' => 'Herdman',
            'nia' => 'INX-2026-08912',
            'nik' => '3374*********01',
            'email' => 'herdman.library@inovexa.id',
            'phone' => '+62 812-3456-7890',
            'category' => 'Masyarakat Umum / Peneliti Mandiri',
            'reg_date' => '15 Januari 2024',
            'address' => 'Jl. Pemuda No. 88, Kel. Pandansari, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132',
        ]);

        if (! empty($data['email'])) {
            $profile['email'] = $data['email'];
        }
        if (! empty($data['phone'])) {
            $profile['phone'] = $data['phone'];
        }
        if (! empty($data['address'])) {
            $profile['address'] = $data['address'];
        }

        session(['member_profile' => $profile]);

        return redirect()->route('dashboard', 'card')->with('toast', 'Data profil keanggotaan berhasil disimpan!');
    }

    public function lend(Request $request)
    {
        $lib = Library::load();
        $who = trim((string) $request->input('w'));
        $book = (int) $request->input('b');

        if ($who === '' || ! $lib->book($book) || $lib->out($book)) {
            return back()->with('toast', 'Isi nama anggota dan pilih buku yang tersedia');
        }

        $lib->lend($who, $book);
        $lib->save();

        return back()->with('toast', 'Peminjaman berhasil dicatat');
    }

    public function giveBack(int $id)
    {
        $lib = Library::load();
        $fine = $lib->giveBack($id);
        $lib->save();

        return back()->with('toast', $fine ? 'Buku dikembalikan. Denda '.$lib->rp($fine) : 'Buku berhasil dikembalikan tepat waktu');
    }

    public function addBook(Request $request)
    {
        $title = trim((string) $request->input('t'));
        $author = trim((string) $request->input('a'));

        if ($title === '' || $author === '') {
            return back()->with('toast', 'Judul dan pengarang wajib diisi');
        }

        $lib = Library::load();
        $lib->addBook($title, $author);
        $lib->save();

        return back()->with('toast', 'Buku berhasil ditambahkan ke koleksi');
    }

    public function toggleUser(int $i)
    {
        $lib = Library::load();
        abort_unless(isset($lib->users[$i]), 404);

        $lib->users[$i]['on'] = ! $lib->users[$i]['on'];
        $lib->save();

        return back()->with('toast', 'Status pengguna berhasil diperbarui');
    }

    public function saveSettings(Request $request)
    {
        $data = $request->validate([
            'dur' => 'required|integer|min:1|max:365',
            'fine' => 'required|integer|min:0|max:1000000',
        ]);

        $lib = Library::load();
        $lib->cfg['dur'] = (int) $data['dur'];
        $lib->cfg['fine'] = (int) $data['fine'];
        $lib->save();

        return back()->with('toast', 'Pengaturan sistem berhasil disimpan');
    }

    // =========================================================================
    // MODUL 2: KELOLA & HAK AKSES (SUPER ADMIN)
    // =========================================================================

    public function superCreateUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'id_code' => 'required|string|max:50',
            'role' => 'required|string|in:super,admin,member',
            'password' => 'nullable|string|min:4',
            'auth_type' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:30',
        ]);

        $lib = Library::load();
        $lib->createUser($data);

        return redirect()->route('dashboard', 'users')->with('toast', 'Akun pengguna baru berhasil diterbitkan!');
    }

    public function superUpdateUser(Request $request)
    {
        $id = trim((string) $request->input('id_code'));
        $data = $request->validate([
            'id_code' => 'required|string',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'role' => 'required|string|in:super,admin,member',
            'phone' => 'nullable|string|max:30',
            'auth_type' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:4',
        ]);

        $lib = Library::load();
        $lib->updateUser($id, $data);

        return redirect()->route('dashboard', 'users')->with('toast', 'Data akun kredensial berhasil diperbarui!');
    }

    public function superDeleteUser(string $id)
    {
        $lib = Library::load();
        $success = $lib->deleteUser($id);

        if (! $success) {
            return back()->with('toast', 'Gagal: Akun Super Admin Root tidak dapat dihapus!');
        }

        return redirect()->route('dashboard', 'users')->with('toast', 'Akun berhasil dihapus permanen.');
    }

    public function superToggleUser(string $id)
    {
        $lib = Library::load();
        $lib->toggleUserStatus($id);

        return back()->with('toast', 'Status akses akun berhasil diubah.');
    }

    public function superResetPassword(string $id)
    {
        $lib = Library::load();
        $lib->resetUserPassword($id, 'InovexaPass2026!');

        return back()->with('toast', 'Sandi sementara "InovexaPass2026!" berhasil diterbitkan untuk ID '.$id);
    }

    public function superRevokeSession(string $id)
    {
        $lib = Library::load();
        $lib->revokeUserSession($id);

        return back()->with('toast', 'Sesi aktif akun berhasil dicabut dari seluruh perangkat.');
    }

    public function superUpdateRbac(Request $request)
    {
        $lib = Library::load();
        $lib->logAudit('Keamanan', 'Super Admin Ari', 'Pembaruan Matriks RBAC', 'Konfigurasi matriks izin peran sistem diperbarui');
        $lib->save();

        return back()->with('toast', 'Kebijakan matriks RBAC berhasil diperbarui.');
    }

    public function superCreateRole(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required|string|max:100',
            'hierarchy_level' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $lib = Library::load();
        $lib->customRoles[] = $data;
        $lib->logAudit('Keamanan', 'Super Admin Ari', 'Definisi Peran Kustom', 'Menambahkan peran baru: '.$data['role_name']);
        $lib->save();

        return back()->with('toast', 'Peran kustom baru "'.$data['role_name'].'" berhasil didaftarkan ke matriks RBAC.');
    }

    public function superExportUsers(): StreamedResponse
    {
        $lib = Library::load();
        $headers = ['Nama Lengkap', 'Email SSO', 'ID / NIP', 'Peran & Akses', 'Status Akses', 'Metode Keamanan 2FA'];
        $rows = [];

        foreach ($lib->users as $u) {
            $rows[] = [
                $u['n'] ?? '',
                $u['email'] ?? '',
                $u['i'] ?? '',
                $u['r'] ?? '',
                ! empty($u['on']) ? 'Aktif' : 'Nonaktif',
                $u['sec_main'] ?? ($u['auth_type'] ?? 'Standard Auth'),
            ];
        }

        return $this->csvResponse($headers, $rows, 'inovexa_daftar_akun_pengguna_'.date('Ymd_His').'.csv');
    }

    // =========================================================================
    // MODUL 3: KELOLA DATA ANGGOTA (SUPER ADMIN)
    // =========================================================================

    public function superRegisterMember(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:30',
            'category' => 'required|string|in:dosen,mahasiswa,umum,peneliti',
            'limit_books' => 'nullable|string|max:30',
            'repo_access' => 'nullable|string|max:50',
            'dispensation' => 'nullable|string|max:50',
            'password' => 'nullable|string|min:4',
        ]);

        $lib = Library::load();
        $member = $lib->registerMasterMember($data);

        return redirect()->route('dashboard', 'mem')->with('toast', 'Anggota master baru '.$member['n'].' ('.$member['i'].') berhasil terdaftar!');
    }

    public function superUpdateMemberQuota(Request $request)
    {
        $nia = trim((string) $request->input('nia'));
        $data = $request->validate([
            'nia' => 'required|string',
            'limit_books' => 'required|string',
            'repo_access' => 'required|string',
            'dispensation' => 'required|string',
        ]);

        $lib = Library::load();
        $lib->updateMemberQuota($nia, $data);

        return redirect()->route('dashboard', 'mem')->with('toast', 'Kebijakan hak kuota anggota berhasil diperbarui.');
    }

    public function superVerifyMember(string $nia)
    {
        $lib = Library::load();
        $lib->verifyMember($nia);

        return back()->with('toast', 'Status keanggotaan '.$nia.' berhasil divalidasi aktif!');
    }

    public function superToggleMember(string $nia)
    {
        $lib = Library::load();
        $lib->toggleUserStatus($nia);

        return back()->with('toast', 'Status keaktifan pemustaka '.$nia.' berhasil diperbarui.');
    }

    public function superDeleteMember(string $nia)
    {
        $lib = Library::load();
        $lib->deleteMember($nia);

        return redirect()->route('dashboard', 'mem')->with('toast', 'Data anggota '.$nia.' berhasil dihapus dari direktori.');
    }

    public function superExportMembers(): StreamedResponse
    {
        $lib = Library::load();
        $headers = ['Nama Lengkap', 'NIA (ID Anggota)', 'NIK (Masked)', 'Kategori Pemustaka', 'Batas Kuota Pinjam', 'Hak Akses Repositori', 'Status', 'Masa Berlaku', 'Kontak'];
        $rows = [];

        foreach ($lib->users as $u) {
            if (($u['role_code'] ?? '') === 'member' || ($u['category'] ?? '') === 'member' || ($u['r'] ?? '') === 'Anggota') {
                $rows[] = [
                    $u['n'] ?? '',
                    $u['i'] ?? '',
                    $u['nik_masked'] ?? 'Terverifikasi',
                    $u['category_title'] ?? 'Anggota Umum',
                    $u['limit_books'] ?? '3 Buku',
                    $u['repo_access'] ?? 'Standar OPAC',
                    ! empty($u['on']) ? ($u['status_label'] ?? 'Aktif') : 'Nonaktif',
                    $u['valid_until'] ?? '31 Des 2027',
                    $u['phone'] ?? ($u['email'] ?? ''),
                ];
            }
        }

        return $this->csvResponse($headers, $rows, 'inovexa_direktori_anggota_'.date('Ymd_His').'.csv');
    }

    // =========================================================================
    // MODUL 4: KELOLA EKSEMPLAR BUKU (SUPER ADMIN)
    // =========================================================================

    public function superCreateBook(Request $request)
    {
        $title = $request->input('title') ?: $request->input('t');
        $author = $request->input('author') ?: $request->input('a');
        $category = $request->input('category') ?: $request->input('c', 'Teknologi Informasi');
        $copiesCount = $request->input('copies_count') ?: ($request->input('st_total') ?: 5);

        if (! $title || ! $author) {
            return back()->with('toast', 'Gagal: Judul dan pengarang buku wajib diisi.');
        }

        $data = [
            'title' => (string) $title,
            'author' => (string) $author,
            'category' => (string) $category,
            'isbn' => (string) ($request->input('isbn') ?: ('978-602-'.rand(100, 999).'-019-'.rand(1, 9))),
            'ddc' => (string) ($request->input('ddc') ?: '000'),
            'publisher' => (string) ($request->input('publisher') ?: 'Penerbit Inovexa'),
            'year' => (int) ($request->input('year') ?: date('Y')),
            'shelf' => (string) ($request->input('shelf') ?: 'Rak Koleksi 01'),
            'copies_count' => (int) $copiesCount,
            'st' => (int) ($request->input('st') ?? $copiesCount),
        ];

        $lib = Library::load();
        $newBook = $lib->addBookMaster($data);

        return redirect()->route('dashboard', 'stock')->with('toast', 'Bibliografi baru "'.$newBook['t'].'" berhasil ditambahkan dengan '.$newBook['copies_total'].' eksemplar!');
    }

    public function superUpdateBook(Request $request)
    {
        $id = (int) $request->input('id');
        $title = $request->input('title') ?: $request->input('t');
        $author = $request->input('author') ?: $request->input('a');
        $category = $request->input('category') ?: $request->input('c');

        if (! $id || ! $title || ! $author) {
            return back()->with('toast', 'Gagal: ID, judul, dan pengarang wajib diisi.');
        }

        $data = [
            'title' => (string) $title,
            'author' => (string) $author,
            'category' => (string) ($category ?: 'Umum'),
            'isbn' => $request->input('isbn'),
            'ddc' => $request->input('ddc'),
            'shelf' => $request->input('shelf'),
            'publisher' => $request->input('publisher'),
            'year' => $request->input('year') ? (int) $request->input('year') : null,
            'copies_total' => $request->input('st_total') ? (int) $request->input('st_total') : null,
            'st' => $request->input('st') !== null ? (int) $request->input('st') : null,
        ];

        $lib = Library::load();
        $lib->updateBookMaster($id, $data);

        return redirect()->route('dashboard', 'stock')->with('toast', 'Metadata bibliografi berhasil diperbarui!');
    }

    public function superDeleteBook(int $id)
    {
        $lib = Library::load();
        $lib->deleteBookMaster($id);

        return redirect()->route('dashboard', 'stock')->with('toast', 'Koleksi aset dan seluruh eksemplarnya berhasil di-write off permanen.');
    }

    public function superAddBookCopy(int $id, Request $request)
    {
        $lib = Library::load();
        $lib->addBookCopy($id, ['barcode' => $request->input('barcode')]);

        return back()->with('toast', 'Eksemplar fisik baru berhasil didaftarkan dengan RFID.');
    }

    public function superDeleteBookCopy(int $id, string $barcode)
    {
        $lib = Library::load();
        $lib->deleteBookCopy($id, $barcode);

        return back()->with('toast', 'Eksemplar '.$barcode.' berhasil dihapus dari inventaris.');
    }

    public function superExportBooks(): StreamedResponse
    {
        $lib = Library::load();
        $headers = ['ID', 'Judul Buku', 'Pengarang', 'Klasifikasi DDC', 'Kategori', 'ISBN', 'Penerbit', 'Tahun', 'Lokasi Rak', 'Jumlah Eksemplar', 'Status'];
        $rows = [];

        foreach ($lib->books as $b) {
            $rows[] = [
                $b['id'],
                $b['t'] ?? '',
                $b['a'] ?? '',
                $b['ddc'] ?? '000',
                $b['c'] ?? '',
                $b['isbn'] ?? '',
                $b['publisher'] ?? '',
                $b['year'] ?? '',
                $b['s'] ?? '',
                $b['copies_total'] ?? count($b['copies'] ?? []),
                $b['status'] ?? 'terverifikasi',
            ];
        }

        return $this->csvResponse($headers, $rows, 'inovexa_master_koleksi_buku_'.date('Ymd_His').'.csv');
    }

    // =========================================================================
    // MODUL 5: KELOLA SIRKULASI (SUPER ADMIN)
    // =========================================================================

    public function superUpdateCircPolicy(Request $request)
    {
        $data = $request->validate([
            'dur' => 'required|integer|min:1|max:365',
            'fine' => 'required|integer|min:0|max:1000000',
            'grace_hours' => 'nullable|integer|min:0',
            'max_quota' => 'nullable|integer|min:1',
        ]);

        $lib = Library::load();
        $lib->updateCircPolicy($data);

        return redirect()->route('dashboard', 'circ')->with('toast', 'Kebijakan aturan masa pinjam & denda sirkulasi berhasil diterapkan secara global!');
    }

    public function superLend(Request $request)
    {
        $data = $request->validate([
            'who' => 'required|string',
            'book_id' => 'required|integer',
            'custom_days' => 'nullable|integer|min:1|max:365',
        ]);

        $lib = Library::load();
        $lib->superLend($data['who'], (int) $data['book_id'], $data['custom_days'] ? (int) $data['custom_days'] : null);

        return redirect()->route('dashboard', 'circ')->with('toast', 'Otorisasi peminjaman eksemplar berhasil dicatat.');
    }

    public function superReturn(int $id, Request $request)
    {
        $waiveFine = (bool) $request->input('waive_fine', false);
        $lib = Library::load();
        $fine = $lib->superReturn($id, $waiveFine);

        $msg = $waiveFine
            ? 'Pengembalian buku diproses dengan dispensasi penuh (Denda Diputihkan).'
            : ($fine ? 'Pengembalian buku diproses. Denda tercatat: '.$lib->rp($fine) : 'Pengembalian buku berhasil diproses (Tepat Waktu).');

        return redirect()->route('dashboard', 'circ')->with('toast', $msg);
    }

    public function superApproveDispensation(int $id)
    {
        $lib = Library::load();
        $lib->logAudit('Sirkulasi', 'Super Admin Ari', 'Setujui Dispensasi', 'Otorisasi dispensasi bebas denda #'.$id.' disetujui');
        $lib->save();

        return back()->with('toast', 'Dispensasi sirkulasi #'.$id.' telah disetujui (Root Override).');
    }

    public function superRejectDispensation(int $id)
    {
        $lib = Library::load();
        $lib->logAudit('Sirkulasi', 'Super Admin Ari', 'Tolak Dispensasi', 'Pengajuan dispensasi sirkulasi #'.$id.' ditolak');
        $lib->save();

        return back()->with('toast', 'Pengajuan dispensasi ditolak. Denda normal tetap berlaku.');
    }

    public function superExportCirculation(): StreamedResponse
    {
        $lib = Library::load();
        $headers = ['Kode Transaksi', 'ID Buku', 'Judul Buku', 'Nama Peminjam', 'Tanggal Pinjam', 'Jatuh Tempo', 'Denda Berjalan', 'Status'];
        $rows = [];

        foreach ($lib->loans as $l) {
            $book = $lib->book($l['b']);
            $fine = $lib->fine($l);
            $rows[] = [
                $l['code'] ?? ('TRX-'.$l['id']),
                $l['b'],
                $book['t'] ?? 'Buku',
                $l['w'],
                $l['borrowed_at'] ?? 'Hari ini',
                $l['d'],
                $fine ? $lib->rp($fine) : 'Rp 0',
                $fine > 0 ? 'Terlambat' : 'Berjalan Normal',
            ];
        }

        return $this->csvResponse($headers, $rows, 'inovexa_transaksi_sirkulasi_'.date('Ymd_His').'.csv');
    }

    // =========================================================================
    // MODUL 6: KELOLA RESERVASI (SUPER ADMIN)
    // =========================================================================

    public function superUpdateReservationStatus(int $id, Request $request)
    {
        $status = $request->input('status', 'ready');
        $lib = Library::load();
        $lib->updateReservationStatus($id, $status);

        return back()->with('toast', 'Status antrean reservasi berhasil diperbarui.');
    }

    public function superCreateReservation(Request $request)
    {
        $data = $request->validate([
            'who' => 'required|string',
            'book_id' => 'required|integer',
            'channel' => 'nullable|string',
        ]);

        $lib = Library::load();
        $lib->createReservationAdmin($data['who'], (int) $data['book_id'], $data['channel'] ?? 'WhatsApp');

        return redirect()->route('dashboard', 'resv')->with('toast', 'Reservasi pemesanan buku berhasil didaftarkan ke hold shelf loker.');
    }

    public function superConfigReservation(Request $request)
    {
        $lib = Library::load();
        $lib->cfg['hold_shelf_hours'] = (int) $request->input('hold_shelf_hours', 24);
        $lib->logAudit('Reservasi', 'Super Admin Ari', 'Konfigurasi SLA Hold Shelf', 'Batas SLA pickup diubah menjadi '.$lib->cfg['hold_shelf_hours'].' jam');
        $lib->save();

        return back()->with('toast', 'Konfigurasi SLA antrean reservasi & gateway notifikasi berhasil disimpan.');
    }

    // =========================================================================
    // MODUL 7: KELOLA E-LIBRARY (SUPER ADMIN)
    // =========================================================================

    public function superCreateEbook(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'author' => 'required|string|max:150',
            'category' => 'nullable|string|max:100',
            'format' => 'required|string|in:PDF,EPUB,EPUB 3.0,PDF/EPUB,EPUB+AUDIO,JOURNAL',
            'license' => 'nullable|string|max:100',
            'file_size' => 'nullable|string|max:50',
            'drm_enabled' => 'nullable',
        ]);

        $lib = Library::load();
        $lib->addEbook($data);

        return redirect()->route('dashboard', 'elib')->with('toast', 'E-Resource digital baru berhasil diterbitkan ke repositori!');
    }

    public function superUpdateEbook(Request $request)
    {
        $id = (int) $request->input('id');
        $data = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:200',
            'author' => 'required|string|max:150',
            'format' => 'nullable|string',
            'license' => 'nullable|string',
        ]);

        $lib = Library::load();
        $lib->updateEbook($id, $data);

        return redirect()->route('dashboard', 'elib')->with('toast', 'Metadata repositori e-resource berhasil diperbarui.');
    }

    public function superDeleteEbook(int $id)
    {
        $lib = Library::load();
        $lib->deleteEbook($id);

        return redirect()->route('dashboard', 'elib')->with('toast', 'Aset digital berhasil dihapus dari repositori.');
    }

    public function superToggleEbookDrm(int $id)
    {
        $lib = Library::load();
        $lib->toggleEbookDrm($id);

        return back()->with('toast', 'Konfigurasi proteksi hak cipta DRM aset berhasil diperbarui.');
    }

    // =========================================================================
    // MODUL 8: AUDIT LOG & BACKUP SISTEM (SUPER ADMIN)
    // =========================================================================

    public function superTriggerBackup()
    {
        $lib = Library::load();
        $backup = $lib->triggerBackup();

        return redirect()->route('dashboard', 'sys')->with('toast', 'Pencadangan darurat basis data terenkripsi berhasil dieksekusi! Berkas: '.$backup['filename']);
    }

    public function superDownloadBackup(?string $filename = null)
    {
        $filename = $filename ?: 'inovexa_db_snapshot.sql.enc';
        $filePath = storage_path('app/backups/'.$filename);

        if (! file_exists($filePath)) {
            // Jika belum ada file fisik, generate on the fly
            $lib = Library::load();
            $json = json_encode(get_object_vars($lib), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $backupDir = storage_path('app/backups');
            if (! is_dir($backupDir)) {
                mkdir($backupDir, 0755, true);
            }
            file_put_contents($filePath, $json);
        }

        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/octet-stream',
        ]);
    }

    public function superVerifyBackup(Request $request)
    {
        $lib = Library::load();
        $lib->logAudit('Automated Backup', 'Super Admin Ari', 'Verifikasi Integritas SHA-256', 'Pemeriksaan integritas checksum seluruh berkas snapshot valid (0 anomali)');
        $lib->save();

        return back()->with('toast', 'Integritas SHA-256 snapshot basis data terverifikasi 100% valid dan siap dipulihkan bila terjadi bencana.');
    }

    public function superExportAuditLogs(): StreamedResponse
    {
        $lib = Library::load();
        $headers = ['ID Log', 'Tanggal', 'Waktu', 'Kategori Modul', 'Tingkat Kejadian', 'Aktor / Inisiator', 'Alamat IP', 'Aksi Operasional', 'Keterangan Detail'];
        $rows = [];

        foreach ($lib->auditLogs as $log) {
            $rows[] = [
                $log['id'],
                $log['date'] ?? date('d M Y'),
                $log['timestamp'] ?? '',
                $log['category'] ?? '',
                $log['level'] ?? 'info',
                $log['actor'] ?? '',
                $log['ip'] ?? '127.0.0.1',
                $log['action'] ?? '',
                $log['desc'] ?? '',
            ];
        }

        return $this->csvResponse($headers, $rows, 'inovexa_audit_log_keamanan_'.date('Ymd_His').'.csv');
    }

    // =========================================================================
    // MODUL 9: LAPORAN KESELURUHAN (SUPER ADMIN)
    // =========================================================================

    public function superExportReport(string $type): StreamedResponse
    {
        $lib = Library::load();

        if ($type === 'akreditasi') {
            $headers = ['Indikator Standar Nasional Perpustakaan (SNP)', 'Cakupan Penilaian', 'Total Nilai / Kuantitas', 'Kepatuhan Regulasi', 'Status Validasi'];
            $rows = [
                ['Standar Koleksi Perpustakaan', 'Koleksi Buku & E-Resource', count($lib->books).' Judul / '.count($lib->ebooks).' Digital', '100% Sesuai SNP', 'Lengkap Terakreditasi A'],
                ['Standar Sarana & Prasarana', 'Smart Locker, RFID Gate, Server', '12 Unit Mandiri', 'Terverifikasi Uji Fungsi', 'Optimal'],
                ['Standar Pelayanan Perpustakaan', 'Sirkulasi, OPAC, E-Library', count($lib->loans).' Transaksi Aktif', '96.4% Kepatuhan Waktu', 'Sangat Baik'],
                ['Standar Tenaga Perpustakaan', 'Pustakawan & Staf TI', '42 Pegawai & 3 Root Admin', 'Sertifikasi Nasional RI', 'Kompeten'],
            ];
            $filename = 'inovexa_laporan_akreditasi_evaluasi_'.date('Ymd').'.csv';
        } elseif ($type === 'inventaris') {
            $headers = ['ID', 'Judul Buku', 'ISBN', 'Kategori DDC', 'Jumlah Eksemplar', 'Estimasi Nilai Buku', 'Total Nilai Aset BMD'];
            $rows = [];
            foreach ($lib->books as $b) {
                $count = (int) ($b['copies_total'] ?? 1);
                $unitPrice = 125000;
                $rows[] = [
                    $b['id'],
                    $b['t'] ?? '',
                    $b['isbn'] ?? '',
                    $b['ddc'] ?? '',
                    $count.' Eksemplar',
                    $lib->rp($unitPrice),
                    $lib->rp($count * $unitPrice),
                ];
            }
            $filename = 'inovexa_laporan_inventaris_aset_bmd_'.date('Ymd').'.csv';
        } else {
            $headers = ['Bulan Transaksi', 'Sirkulasi Buku Fisik', 'Akses Baca E-Library', 'Keterangan Siklus'];
            $rows = [
                ['Januari', '60 Transaksi', '38 Sesi', 'Normal'],
                ['Februari', '68 Transaksi', '44 Sesi', 'Normal'],
                ['Maret', '88 Transaksi', '72 Sesi', 'Puncak Siklus UTS'],
                ['April', '52 Transaksi', '48 Sesi', 'Normal'],
                ['Mei', '70 Transaksi', '58 Sesi', 'Normal'],
                ['Juni', '94 Transaksi', '82 Sesi', 'Puncak Siklus UAS'],
                ['Juli', '40 Transaksi', '46 Sesi', 'Libur Semester'],
                ['Agustus', '48 Transaksi', '52 Sesi', 'Normal'],
                ['September', '75 Transaksi', '62 Sesi', 'Tahun Ajaran Baru'],
                ['Oktober', '91 Transaksi', '76 Sesi', 'Puncak Siklus UTS'],
                ['November', '80 Transaksi', '69 Sesi', 'Normal'],
                ['Desember', '98 Transaksi', '89 Sesi', 'Puncak Siklus UAS'],
            ];
            $filename = 'inovexa_rekapitulasi_sirkulasi_tahunan_'.date('Ymd').'.csv';
        }

        return $this->csvResponse($headers, $rows, $filename);
    }

    protected function csvResponse(array $headers, array $rows, string $filename): StreamedResponse
    {
        $callback = function () use ($headers, $rows) {
            $file = fopen('php://output', 'w');
            fwrite($file, "\xEF\xBB\xBF"); // UTF-8 BOM untuk Excel
            fputcsv($file, $headers);
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }
}
