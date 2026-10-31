<h2>Notifikasi</h2>
<p style="color:var(--m);margin-top:-2px">Pembaruan otomatis berdasarkan status pinjaman dan reservasi Anda.</p>

<div class="tw"><table>
    <tr><th>Status</th><th>Pesan</th><th>Waktu</th></tr>
    @foreach($notifications as $notice)
    <tr>
        <td>
            @if($notice['tone'] === 'no')
                <span class="pill" style="background:#fee2e2;color:#b91c1c">Perlu tindakan</span>
            @elseif($notice['tone'] === 'warn')
                <span class="pill" style="background:#fbe9d6;color:var(--o)">Perhatian</span>
            @else
                <span class="pill" style="background:#dcebe2;color:var(--ok)">Informasi</span>
            @endif
        </td>
        <td>{{ $notice['msg'] }}</td>
        <td>{{ $notice['time'] }}</td>
    </tr>
    @endforeach
</table></div>
