<h2>Reservasi</h2>
@if(count($mr))
<div class="tw"><table>
    <tr><th>Judul</th><th>Status</th><th></th></tr>
    @foreach($mr as $x)
    <tr>
        <td>{{ $lib->book($x['b'])['t'] }}</td>
        <td>{{ $lib->out($x['b']) ? 'Dalam antrean' : 'Siap diambil' }}</td>
        <td>
            <form class="inline" method="POST" action="{{ route('reserve.cancel', $x['b']) }}">
                @csrf @method('DELETE')
                <button class="btn ghost">Batalkan</button>
            </form>
        </td>
    </tr>
    @endforeach
</table></div>
@else
<p style="color:var(--m)">Belum ada reservasi.</p>
@endif
