<h2>E-Library &amp; Repositori Baca Digital</h2>
<p style="color:var(--m);margin-top:-2px">Koleksi buku berlisensi publik yang dapat Anda baca langsung melalui web reader Inovexa.</p>

<div class="g3" style="margin-top:18px">
    @foreach($lib->books as $b)
    <div class="card">
        @include('partials.cover')
        <h4 style="margin:12px 0 2px">{{ $b['t'] }}</h4>
        <small style="color:var(--m)">{{ $b['a'] }} · {{ $b['c'] }}</small>
        <div style="font-size:11px;color:var(--ok);margin:6px 0 10px">● Tersedia 3 Bab Digital</div>
        <a class="btn" style="width:100%;text-align:center" href="{{ route('elib.read', $b['id']) }}">📖 Baca Sekarang</a>
    </div>
    @endforeach
</div>
