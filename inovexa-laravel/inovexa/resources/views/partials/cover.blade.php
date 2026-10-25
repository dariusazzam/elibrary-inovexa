@php
    $palette = [1 => ['#f1e4c9', '#b4531a'], 2 => ['#1f3556', '#e8dfc8'], 3 => ['#e6d7b8', '#4a3b22']];
    $c = $palette[$b['id']] ?? ['hsl(' . $b['h'] . ' 40% 28%)', '#f5ecd9'];
    $isFilosofi = $b['id'] === 2;
@endphp
<div class="cv" style="background:{{ $c[0] }};color:{{ $c[1] }}">
    <span class="sh">{{ $lib->out($b['id']) ? 'Sirkulasi Aktif' : $b['s'] }}</span>
    @unless($isFilosofi)<small>{{ $b['a'] }}</small>@endunless
    <b>@if($isFilosofi)FILOSOFI<br>TERAS @else {{ $b['t'] }} @endif</b>
    @if($isFilosofi)<small>{{ $b['a'] }}</small>@endif
</div>
