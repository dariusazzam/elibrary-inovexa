<h2>Pinjaman Saya</h2>
@if(count($my))
<div class="tw"><table>
    <tr><th>Judul</th><th>Jatuh tempo</th><th>Denda</th></tr>
    @foreach($my as $l)
    <tr><td>{{ $lib->book($l['b'])['t'] }}</td><td>{{ $l['d'] }}</td><td>{{ $lib->rp($lib->fine($l)) }}</td></tr>
    @endforeach
</table></div>
@else
<p style="color:var(--m)">Belum ada pinjaman. Cari buku di Katalog.</p>
@endif
