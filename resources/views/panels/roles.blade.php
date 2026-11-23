@php
    // 'check' dirender jadi ikon centang; selain itu dicetak apa adanya.
    $rows = [
        ['Cari & reservasi katalog', 'check', 'check', 'check'],
        ['Kartu digital', 'check', '–', '–'],
        ['Sirkulasi & denda', '–', 'check', 'check'],
        ['Stok buku', '–', 'check', 'check'],
        ['Kelola pengguna & peran', '–', '–', 'check'],
        ['Pengaturan sistem', '–', '–', 'check'],
    ];
@endphp
<h2>Hak Akses</h2>
<div class="tw"><table>
    <tr><th>Fitur</th><th>Anggota</th><th>Admin Pegawai</th><th>Super Admin</th></tr>
    @foreach($rows as $row)
    <tr>@foreach($row as $cell)<td>@if($cell === 'check')<x-icon name="check"/>@else{{ $cell }}@endif</td>@endforeach</tr>
    @endforeach
</table></div>
