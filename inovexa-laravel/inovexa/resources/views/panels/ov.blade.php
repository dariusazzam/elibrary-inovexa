<h2>Selamat datang, {{ $u['n'] }}</h2>
<span style="color:var(--m)">{{ $lib::ROLES[$u['role']] }}</span>
<div class="st4">
@if($u['role'] === 'member')
    <x-stat label="Pinjaman aktif" :value="count($my)" />
    <x-stat label="Reservasi" :value="count($mr)" />
    <x-stat label="Denda berjalan" :value="$lib->rp(array_sum(array_map(fn($l) => $lib->fine($l), $my)))" />
@elseif($u['role'] === 'admin')
    <x-stat label="Buku dipinjam" :value="count($lib->loans)" />
    <x-stat label="Terlambat" :value="count(array_filter($lib->loans, fn($l) => $lib->fine($l) > 0))" />
    <x-stat label="Stok tersedia" :value="count($lib->books) - count($lib->loans)" />
@else
    <x-stat label="Pengguna" :value="count($lib->users)" />
    <x-stat label="Judul koleksi" :value="count($lib->books)" />
    <x-stat label="Akun aktif" :value="count(array_filter($lib->users, fn($x) => $x['on']))" />
@endif
</div>
