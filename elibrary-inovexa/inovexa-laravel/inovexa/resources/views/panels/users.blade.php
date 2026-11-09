<h2>Pengguna</h2>
<div class="tw"><table>
    <tr><th>Nama</th><th>ID</th><th>Peran</th><th>Status</th><th></th></tr>
    @foreach($lib->users as $i => $x)
    <tr>
        <td>{{ $x['n'] }}</td><td>{{ $x['i'] }}</td><td>{{ $x['r'] }}</td>
        <td>{{ $x['on'] ? 'Aktif' : 'Nonaktif' }}</td>
        <td>
            <form class="inline" method="POST" action="{{ route('user.toggle', $i) }}">
                @csrf<button class="btn ghost">{{ $x['on'] ? 'Nonaktifkan' : 'Aktifkan' }}</button>
            </form>
        </td>
    </tr>
    @endforeach
</table></div>
