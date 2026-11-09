<h2>Anggota</h2>
<div class="tw"><table>
    <tr><th>Nama</th><th>ID</th><th>Pinjaman aktif</th></tr>
    @foreach($lib->users as $x)
        @if($x['r'] === 'Anggota')
        <tr>
            <td>{{ $x['n'] }}</td><td>{{ $x['i'] }}</td>
            <td>{{ count(array_filter($lib->loans, fn($l) => $l['w'] === $x['n'])) }}</td>
        </tr>
        @endif
    @endforeach
</table></div>
