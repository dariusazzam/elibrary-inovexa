<?php

namespace Tests\Feature;

use App\Support\Library;
use App\Support\MemberImport;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class MembersImportTest extends TestCase
{
    public function test_csv_rows_are_classified_by_validity(): void
    {
        $file = UploadedFile::fake()->createWithContent('anggota.csv', implode("\n", [
            'nama,nik,email,telepon,kategori,alamat',
            'Bima Pratama,3271040801990003,bima@example.test,081234567890,Mahasiswa,Semarang',
            'NIK Pendek,12345,pendek@example.test,081200000000,Umum,Semarang',
            'NIK Ganda,3271040801990003,ganda@example.test,081211111111,Umum,Semarang',
        ]));

        $result = app(MemberImport::class)->analyse($file, new Library);

        $this->assertSame(['total' => 3, 'valid' => 1, 'duplicate' => 1, 'invalid' => 1], $result['summary']);
        $this->assertSame('valid', $result['rows'][0]['status']);
        $this->assertSame('invalid', $result['rows'][1]['status']);
        $this->assertSame('duplicate', $result['rows'][2]['status']);
    }

    public function test_xlsx_rows_are_read_from_shared_strings(): void
    {
        $path = tempnam(sys_get_temp_dir(), 'inovexa-import-');
        $archive = new \ZipArchive;
        $this->assertTrue($archive->open($path, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true);
        $archive->addFromString('xl/sharedStrings.xml', <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<sst xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" count="8" uniqueCount="8">
  <si><t>nama</t></si><si><t>nik</t></si><si><t>email</t></si><si><t>telepon</t></si>
  <si><t>Excel Test</t></si><si><t>3271040801990005</t></si><si><t>excel@example.test</t></si><si><t>081234567892</t></si>
</sst>
XML);
        $archive->addFromString('xl/worksheets/sheet1.xml', <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main"><sheetData>
  <row r="1"><c r="A1" t="s"><v>0</v></c><c r="B1" t="s"><v>1</v></c><c r="C1" t="s"><v>2</v></c><c r="D1" t="s"><v>3</v></c></row>
  <row r="2"><c r="A2" t="s"><v>4</v></c><c r="B2" t="s"><v>5</v></c><c r="C2" t="s"><v>6</v></c><c r="D2" t="s"><v>7</v></c></row>
</sheetData></worksheet>
XML);
        $archive->close();

        $file = new UploadedFile($path, 'anggota.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', null, true);
        $result = app(MemberImport::class)->analyse($file, new Library);

        @unlink($path);

        $this->assertSame(1, $result['summary']['valid']);
        $this->assertSame('Excel Test', $result['rows'][0]['data']['name']);
        $this->assertSame('3271040801990005', $result['rows'][0]['data']['nik']);
    }

    public function test_imported_member_persists_in_the_session_library(): void
    {
        $library = new Library;
        $result = $library->registerImportedMembers([[
            'name' => 'Citra Anggraini',
            'nik' => '3271040801990004',
            'email' => 'citra@example.test',
            'phone' => '081234567891',
            'category' => 'Mahasiswa',
            'address' => 'Yogyakarta',
            'password' => '',
        ]], 'anggota.csv');

        $this->assertSame(1, $result['imported']);
        $this->assertArrayHasKey('3271040801990004', $library->accounts);
        $this->assertSame('Citra Anggraini', $library->accounts['3271040801990004']['name']);
        $this->assertSame(MemberImport::DEFAULT_PASSWORD, $library->accounts['3271040801990004']['pw']);
        $this->assertSame('Yogyakarta', $library->importedProfile($result['members'][0]['id'])['address']);
    }
}
