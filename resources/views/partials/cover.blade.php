@php
    $id = $b['id'] ?? 1;
@endphp

@if($id === 1)
    {{-- Cover Laskar Pelangi --}}
    <div class="cv" style="background:#f4ebd9;color:#2b261d;border:1px solid #e2d6c1;box-shadow:inset 4px 0 8px rgba(0,0,0,.04)">
        <span class="sh" style="background:#fff;color:#555;border:1px solid #e0d8cb">{{ $lib->out($b['id']) ? 'Sirkulasi Aktif' : $b['s'] }}</span>
        <div style="margin-top:14px;font-size:12px;font-family:Georgia,serif;letter-spacing:1px;color:#4a4031">Andrea Hirata</div>
        <div style="margin:14px auto 8px;width:120px;height:80px;background:linear-gradient(180deg,#dbeafe 0%,#fef3c7 60%,#bbf7d0 100%);border-radius:6px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden">
            <span style="font-size:32px">🌴</span>
            <span style="position:absolute;bottom:4px;font-size:16px">🚶‍♂️🚶‍♀️🚶</span>
        </div>
        <b style="font-family:'Times New Roman',Georgia,serif;font-size:24px;color:#c2410c;letter-spacing:.02em;line-height:1.05">Laskar<br>Pelangi</b>
        <small style="margin-top:6px;font-size:9px;color:#786951;letter-spacing:.05em">NOVEL BENTANG PUSTAKA</small>
    </div>
@elseif($id === 2)
    {{-- Cover Filosofi Teras --}}
    <div class="cv" style="background:#1b2d48;color:#f3eee3;border:1px solid #132237;box-shadow:inset 4px 0 10px rgba(0,0,0,.3)">
        <span class="sh" style="background:rgba(255,255,255,.9);color:#111">{{ $lib->out($b['id']) ? 'Sirkulasi Aktif' : $b['s'] }}</span>
        <div style="margin:16px auto 10px;width:70px;height:70px;border-radius:50%;background:#e2d9c8;display:grid;place-items:center;color:#1b2d48;font-size:36px;box-shadow:0 4px 10px rgba(0,0,0,.25)">
            🏛️
        </div>
        <b style="font-family:Georgia,serif;font-size:20px;color:#f5ecd9;letter-spacing:.08em;line-height:1.15">FILOSOFI<br>TERAS</b>
        <small style="margin-top:8px;font-size:10px;color:#cbd5e1;letter-spacing:.06em">{{ $b['a'] }}</small>
        <span style="font-size:8px;color:#94a3b8;margin-top:2px">STOA &amp; FILSAFAT YUNANI</span>
    </div>
@elseif($id === 3)
    {{-- Cover Sapiens --}}
    <div class="cv" style="background:#ebe0ca;color:#3d3326;border:1px solid #d9ccb2;box-shadow:inset 4px 0 8px rgba(0,0,0,.05)">
        <span class="sh" style="background:#fff;color:#555;border:1px solid #d9ccb2">{{ $lib->out($b['id']) ? 'Sirkulasi Aktif' : $b['s'] }}</span>
        <small style="font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:#5c4d38;margin-top:14px">{{ $b['a'] }}</small>
        <b style="font-family:'Times New Roman',Georgia,serif;font-size:26px;color:#2c2419;letter-spacing:.06em;margin:12px 0 4px">SAPIENS</b>
        <div style="font-size:10px;font-style:italic;color:#6b5a43;max-width:180px;margin:0 auto">Riwayat Singkat Umat Manusia</div>
        <div style="margin:16px auto 0;width:40px;height:40px;border-radius:50%;border:1px dashed #8c775a;display:grid;place-items:center;font-size:18px;opacity:.7">
            🌍
        </div>
    </div>
@else
    @php
        $palette = ['hsl(' . (($b['h'] ?? 200)) . ' 35% 26%)', '#f5ecd9'];
    @endphp
    <div class="cv" style="background:{{ $palette[0] }};color:{{ $palette[1] }}">
        <span class="sh">{{ $lib->out($b['id']) ? 'Sirkulasi Aktif' : $b['s'] }}</span>
        <small>{{ $b['a'] }}</small>
        <b>{{ $b['t'] }}</b>
        <small>{{ $b['c'] }}</small>
    </div>
@endif
