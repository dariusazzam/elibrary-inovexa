@php
    $rows = [
        ['Cari & reservasi katalog', '✓', '✓', '✓'],
        ['Kartu digital', '✓', '–', '–'],
        ['Sirkulasi & denda', '–', '✓', '✓'],
        ['Stok buku', '–', '✓', '✓'],
        ['Kelola pengguna & peran', '–', '–', '✓'],
        ['Pengaturan sistem', '–', '–', '✓'],
    ];
@endphp
<h2>Hak Akses</h2>
<div class="tw"><table>
    <tr><th>Fitur</th><th>Anggota</th><th>Admin Pegawai</th><th>Super Admin</th></tr>
    @foreach($rows as $row)
    <tr>@foreach($row as $cell)<td>{{ $cell }}</td>@endforeach</tr>
    @endforeach
</table></div>
