<h2>Sirkulasi</h2>
<form class="fm" method="POST" action="{{ route('lend') }}">
    @csrf
    <input class="in" name="w" placeholder="Nama anggota" required>
    <select class="in" name="b">
        @foreach($lib->books as $b)
            @unless($lib->out($b['id']))<option value="{{ $b['id'] }}">{{ $b['t'] }}</option>@endunless
        @endforeach
    </select>
    <button class="btn">Catat Peminjaman</button>
</form>
@if(count($lib->loans))
<div class="tw"><table>
    <tr><th>Judul</th><th>Peminjam</th><th>Jatuh tempo</th><th>Denda</th><th></th></tr>
    @foreach($lib->loans as $l)
    <tr>
        <td>{{ $lib->book($l['b'])['t'] }}</td><td>{{ $l['w'] }}</td><td>{{ $l['d'] }}</td><td>{{ $lib->rp($lib->fine($l)) }}</td>
        <td>
            <form class="inline" method="POST" action="{{ route('return', $l['b']) }}">@csrf<button class="btn ghost">Kembalikan</button></form>
        </td>
    </tr>
    @endforeach
</table></div>
@else
<p style="color:var(--m)">Tidak ada buku sedang dipinjam.</p>
@endif
