@extends('layouts.app')
@section('title', 'Dashboard — Inovexa Public Library')

@section('content')
@php
    $r = $u['role'];
    $portalName = ['member' => 'PORTAL ANGGOTA', 'admin' => 'MEJA PETUGAS', 'super' => 'KONSOL ADMIN'][$r];
@endphp
<div class="dash">
    <aside class="sd">
        <div style="font-size:9px;letter-spacing:.1em;color:#a9c0b2;margin-bottom:10px">{{ $portalName }}</div>
        <div class="me">
            <div class="av">{{ mb_substr($u['n'], 0, 1) }}</div>
            <div>
                <b>{{ $u['n'] }}</b>
                <small>{{ $r === 'member' ? 'Anggota Reguler' : $lib::ROLES[$r] }}</small>
                <small style="font-family:monospace">ID: {{ $u['id'] }}</small>
            </div>
        </div>

        @foreach($menus as $m)
            @php [$key, $label] = $m; @endphp
            <a href="{{ route('dashboard', $key) }}" class="{{ $menu === $key ? 'on' : '' }}">
                {{ $label }}
                @if($key === 'notif' && $notifCount > 0)<span class="pill" style="background:var(--o);color:#fff">{{ $notifCount }}</span>@endif
            </a>
        @endforeach

        <a href="{{ route('home') }}">Ke Beranda</a>
        <form class="out" method="POST" action="{{ route('logout') }}">@csrf<button>Keluar Sistem</button></form>
    </aside>

    <main class="mn">
        @include('panels.' . $menu)
    </main>
</div>
@endsection
