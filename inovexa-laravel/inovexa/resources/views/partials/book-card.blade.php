@php $out = $lib->out($b['id']); @endphp
<div class="card bk">
    @include('partials.cover')
    <span class="st {{ $out ? 'no' : 'ok' }}">● {{ $out ? 'Sedang Dipinjam' : 'Tersedia di Rak' }}</span>
    <h4>{{ $b['t'] }}</h4>
    <small>{{ $b['a'] }} · {{ $b['c'] }}</small>
    <form method="POST" action="{{ route('reserve', $b['id']) }}">
        @csrf
        <button class="btn {{ $out ? 'ghost' : '' }}">{{ $out ? 'Masuk Antrean' : 'Reservasi' }}</button>
    </form>
</div>
