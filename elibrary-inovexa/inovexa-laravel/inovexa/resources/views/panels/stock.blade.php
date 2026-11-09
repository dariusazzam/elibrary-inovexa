<h2>Stok Buku</h2>
<form class="fm" method="POST" action="{{ route('stock.add') }}">
    @csrf
    <input class="in" name="t" placeholder="Judul" required>
    <input class="in" name="a" placeholder="Pengarang" required>
    <button class="btn">Tambah Buku</button>
</form>
<div class="tw"><table>
    <tr><th>Judul</th><th>Pengarang</th><th>Lokasi</th><th>Status</th></tr>
    @foreach($lib->books as $b)
    <tr><td>{{ $b['t'] }}</td><td>{{ $b['a'] }}</td><td>{{ $b['s'] }}</td><td>{{ $lib->out($b['id']) ? 'Dipinjam' : 'Tersedia' }}</td></tr>
    @endforeach
</table></div>
