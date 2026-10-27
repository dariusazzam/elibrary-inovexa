@if($u['role'] === 'admin')
    <div style="margin-bottom:18px">
        <div style="font-size:11px;color:var(--m);margin-bottom:4px">
            Dashboard Admin Sirkulasi &rsaquo; <span style="color:var(--t);font-weight:600">Kelola Data Anggota</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:12px">
            <div>
                <div style="display:flex;gap:12px;align-items:center;margin-bottom:4px">
                    <span style="font-size:12px;font-weight:700;color:var(--o);background:#fef3e7;padding:2px 8px;border-radius:4px">Kelola Data Anggota Perpustakaan</span>
                    <span style="font-size:12px;color:var(--m);font-weight:500">Modul Master Sirkulasi</span>
                </div>
                <p style="color:var(--m);font-size:12px;margin:0;max-width:700px">
                    Pusat kendali basis data anggota terpadu. Verifikasi berkas KTM/KTP, pantau batas kuota peminjaman, perpanjangan smart card, serta audit kepatuhan sirkulasi pemustaka secara real-time.
                </p>
            </div>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                <button class="btn ghost" style="background:#fff;border:1px solid var(--ln);font-size:11.5px;padding:7px 12px;color:var(--t)">🖨️ Cetak Kartu Massal</button>
                <button class="btn ghost" style="background:#fff;border:1px solid var(--ln);font-size:11.5px;padding:7px 12px;color:var(--t)">📥 Import CSV/Excel</button>
                <button class="btn" style="background:#153223;font-size:11.5px;padding:7px 14px" onclick="window.location='{{ route('dashboard', 'mem') }}'">＋ Tambah Anggota Baru</button>
            </div>
        </div>
    </div>

    {{-- 4 Stat Cards Atas --}}
    <div class="g4" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;margin-bottom:18px">
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">TOTAL ANGGOTA TERDAFTAR</small>
                <span style="font-size:14px">👥</span>
            </div>
            <div style="font-size:24px;font-weight:800;color:var(--t)">12</div>
            <div style="font-size:11px;color:var(--ok);margin-top:4px;display:flex;align-items:center;gap:4px">
                <span style="background:#dcebe2;padding:1px 6px;border-radius:4px;font-weight:700">12</span> Anggota Mahasiswa Terdaftar
            </div>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">ANGGOTA AKTIF SIRKULASI</small>
                <span style="font-size:14px">🟢</span>
            </div>
            <div style="font-size:24px;font-weight:800;color:var(--t)">12</div>
            <div style="font-size:11px;color:var(--m);margin-top:4px">
                ● Status valid bebas sanksi (100%)
            </div>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">VERIFIKASI KTM / BERKAS</small>
                <span style="font-size:14px">📋</span>
            </div>
            <div style="font-size:24px;font-weight:800;color:var(--o)">0</div>
            <div style="font-size:11px;color:var(--m);margin-top:4px">
                Semua berkas tervalidasi
            </div>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">MASA BERLAKU HABIS</small>
                <span style="font-size:14px">📅</span>
            </div>
            <div style="font-size:24px;font-weight:800;color:var(--t)">0</div>
            <div style="font-size:11px;color:var(--m);margin-top:4px">
                Seluruh masa aktif berlaku
            </div>
        </div>
    </div>

    {{-- Filter Bar & Tabs --}}
    <div class="card" style="background:#fff;padding:14px 16px;margin-bottom:16px;border:1px solid var(--ln)">
        <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:12px">
            <div style="flex:1;min-width:240px;position:relative">
                <span style="position:absolute;left:12px;top:9px;color:var(--m);font-size:12px">🔍</span>
                <input class="in" placeholder="Cari NPM (2467...), nama lengkap..." style="padding-left:34px;height:36px;font-size:12px">
            </div>
            <select class="in" style="width:200px;height:36px;font-size:12px">
                <option>Semua Kategori Pemustaka</option>
                <option>Mahasiswa / Anggota</option>
            </select>
            <select class="in" style="width:170px;height:36px;font-size:12px">
                <option>Paling Baru Terdaftar</option>
                <option>Nama A-Z</option>
            </select>
            <button class="btn ghost" style="background:#fff;border:1px solid var(--ln);font-size:12px;padding:8px 12px;height:36px">⚙️ Filter Lanjutan</button>
        </div>

        <div style="display:flex;gap:8px;border-top:1px solid var(--ln);padding-top:10px;flex-wrap:wrap;align-items:center;font-size:11.5px">
            <span style="background:#153223;color:#fff;padding:5px 12px;border-radius:99px;font-weight:600;cursor:pointer">Semua (12)</span>
            <span style="background:#f3f4f6;color:var(--t);padding:5px 12px;border-radius:99px;font-weight:500;cursor:pointer">Aktif (12)</span>
            <span style="margin-left:auto;color:var(--m);font-size:11px">Menampilkan <b>12 data</b> anggota resmi</span>
        </div>
    </div>

    {{-- Floating Selection Action Bar --}}
    <div style="background:#111827;color:#fff;padding:10px 16px;border-radius:10px;display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;font-size:12px">
        <div style="display:flex;align-items:center;gap:10px">
            <input type="checkbox" checked style="accent-color:#166534">
            <b>1 Anggota Dipilih</b>
        </div>
        <div style="display:flex;gap:10px;align-items:center">
            <button class="btn" style="background:#166534;font-size:11px;padding:6px 14px">Kirim Notifikasi WhatsApp</button>
            <button class="btn" style="background:#1f2937;color:#fff;font-size:11px;padding:6px 14px;border:1px solid #374151">Cetak Kartu Terpilih</button>
            <span style="color:#9ca3af;cursor:pointer;font-size:11px" onclick="toast('Pilihan dibatalkan')">Batal</span>
        </div>
    </div>

    {{-- Grid 2 Kolom: Tabel di Kiri & Detail Kartu di Kanan --}}
    <div style="display:grid;grid-template-columns:1fr 360px;gap:20px;align-items:start">
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);overflow-x:auto">
            <div style="display:grid;grid-template-columns:30px 1.3fr 1.2fr 0.9fr 0.8fr 36px;gap:10px;padding:8px 10px;background:#f8fafc;border-radius:6px;margin-bottom:10px;font-size:10.5px;font-weight:700;color:var(--m);align-items:center">
                <span><input type="checkbox"></span>
                <span>ANGGOTA &amp; IDENTITAS</span>
                <span>KONTAK &amp; DOMISILI</span>
                <span>PINJAMAN AKTIF</span>
                <span>STATUS AKUN</span>
                <span></span>
            </div>

            <div style="display:flex;flex-direction:column;gap:10px">
                @php
                    $realMembers = [
                        ['Adinda Zahwa Aprilia', '24670095'],
                        ['Muhammad Dzaky Zidane', '24670090'],
                        ['Carendra Aldiansyah', '24670104'],
                        ['Juniari Nur Shofa', '24670082'],
                        ['syalna kurnia putri', '24670083'],
                        ['rendi dwiki h', '24670102'],
                        ['Robiatul Adawiyyah', '24670075'],
                        ['Eka Bayu Prasetio', '24670092'],
                        ['frendy wahyu p', '24670091'],
                        ['Darius Fikram Azzam', '24670089'],
                        ['nopal', '24670081'],
                        ['Muhammad Okta Ramadhani', '24670016'],
                    ];
                @endphp

                @foreach($realMembers as $idx => $rm)
                @php 
                    $initial = mb_strtoupper(mb_substr($rm[0], 0, 1));
                    $bgColors = ['ea580c', '153223', 'b45309', '1d4ed8', '047857', '7c3aed', 'be123c', '0f766e', 'b91c1c', '374151', '4f46e5', '0369a1'];
                    $colorBg = $bgColors[$idx % count($bgColors)];
                    $isChecked = ($rm[1] === '24670092'); // Eka Bayu Prasetio
                @endphp
                <div style="display:grid;grid-template-columns:30px 1.3fr 1.2fr 0.9fr 0.8fr 36px;gap:10px;align-items:center;padding:10px;border:1px solid var(--ln);border-radius:8px;font-size:11.5px;background:{{ $isChecked ? '#fdfcf9' : '#fff' }}">
                    <span><input type="checkbox" {{ $isChecked ? 'checked' : '' }} style="accent-color:#166534"></span>
                    
                    <div style="display:flex;gap:8px;align-items:center;overflow:hidden">
                        <div style="width:30px;height:30px;border-radius:50%;background:#{{ $colorBg }};color:#fff;display:grid;place-items:center;font-weight:700;font-size:11px;flex-shrink:0">{{ $initial }}</div>
                        <div style="overflow:hidden">
                            <b style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $rm[0] }}</b>
                            <span class="pill" style="font-size:8.5px;padding:1px 5px">Mahasiswa</span><br>
                            <small style="color:var(--m);font-size:10px">NPM: {{ $rm[1] }}</small>
                        </div>
                    </div>

                    <div style="overflow:hidden;font-size:11px">
                        <b style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">Inovexa@gmail.com</b>
                        <small style="color:var(--m)">+62 812-{{ substr($rm[1], -4) }}-789<br>Kampus Inovexa</small>
                    </div>

                    <div style="font-size:11px">
                        <b>1 Buku</b><br>
                        <small style="color:var(--ok)">Tepat Waktu</small>
                    </div>

                    <div>
                        <span class="pill" style="background:#dcebe2;color:var(--ok)">● Aktif</span>
                    </div>

                    <div style="text-align:right">
                        <button class="btn ghost" style="padding:3px 6px;font-size:11px" onclick="toast('Melihat detail {{ $rm[0] }}')">👁</button>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination Footer --}}
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:16px;font-size:11.5px;color:var(--m);border-top:1px solid var(--ln);padding-top:12px">
                <div style="display:flex;align-items:center;gap:6px">
                    <span>Menampilkan</span>
                    <select class="in" style="width:60px;height:28px;padding:0 6px;font-size:11px">
                        <option>12</option>
                    </select>
                    <span>dari <b>12</b> total anggota</span>
                </div>
                <div style="display:flex;gap:4px;align-items:center">
                    <button class="btn ghost" style="padding:3px 8px;font-size:11px" disabled>‹</button>
                    <button class="btn" style="padding:3px 8px;font-size:11px;background:#153223">1</button>
                    <button class="btn ghost" style="padding:3px 8px;font-size:11px" disabled>›</button>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Kartu SmartPass & Kepatuhan Anggota (Frendy Wahyu P) --}}
        <div class="card" style="background:#fff;padding:18px;border:1px solid var(--ln)">
            <div style="background:#153223;color:#fff;border-radius:10px;padding:16px;margin-bottom:14px;position:relative;overflow:hidden">
                <div style="display:flex;justify-content:space-between;align-items:center;font-size:9.5px;color:#a9cbb7;margin-bottom:12px">
                    <b>INOVEXA PUBLIC LIBRARY</b>
                    <span style="background:rgba(74,222,128,.2);color:#4ade80;padding:1px 6px;border-radius:4px">NFC ACTIVE</span>
                </div>
                <div style="font-size:10px;color:#94a3b8">NAMA LENGKAP PEMUSTAKA</div>
                <div style="font-size:15px;font-weight:700;margin-bottom:6px">Eka Bayu Prasetio</div>
                <div style="font-size:10px;color:#94a3b8">NPM / NIA</div>
                <div style="font-size:12px;font-family:monospace;color:#fff;margin-bottom:14px">24670092</div>
                <div style="display:flex;justify-content:space-between;align-items:flex-end;font-size:10px;border-top:1px solid rgba(255,255,255,.1);padding-top:8px">
                    <div>
                        <span style="color:#94a3b8;display:block">BERLAKU HINGGA</span>
                        <b>31 Des 2027</b>
                    </div>
                    <span style="font-family:monospace;letter-spacing:1px;font-size:11px">||||| |||| ||</span>
                </div>
            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <h4 style="margin:0;font-size:12.5px;font-weight:700">Detail &amp; Kepatuhan Anggota</h4>
                <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9.5px">Terverifikasi</span>
            </div>

            <div style="font-size:11.5px;color:var(--m);display:flex;flex-direction:column;gap:6px;border-bottom:1px solid var(--ln);padding-bottom:10px;margin-bottom:10px">
                <div style="display:flex;justify-content:space-between">
                    <span>Hak Kuota Buku Fisik:</span>
                    <b style="color:var(--t)">1 / 3 Eksemplar Terpakai</b>
                </div>
                <div style="width:100%;height:5px;background:#e5e7eb;border-radius:99px;overflow:hidden;margin:2px 0">
                    <div style="width:33.3%;height:100%;background:#166534;border-radius:99px"></div>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:10.5px">
                    <span style="color:var(--m)">Sisa kuota: 2 Buku</span>
                    <span style="color:var(--ok);font-weight:600">E-Library: Akses Penuh</span>
                </div>
                <div style="display:flex;justify-content:space-between;margin-top:4px">
                    <span>NIK Tedaftar:</span>
                    <b style="color:var(--t)">3374092408940009</b>
                </div>
                <div style="display:flex;justify-content:space-between">
                    <span>Kategori Anggota:</span>
                    <b style="color:var(--t)">Mahasiswa / Reguler</b>
                </div>
                <div style="display:flex;justify-content:space-between">
                    <span>Total Riwayat Pinjam:</span>
                    <b style="color:var(--t)">12 Transaksi Sukses</b>
                </div>
                <div style="display:flex;justify-content:space-between">
                    <span>Kunjungan Terakhir:</span>
                    <b style="color:var(--t)">Hari Ini, 09:14 WIB (Gate B)</b>
                </div>
            </div>

            <h4 style="margin:0 0 8px;font-size:12px;font-weight:700">Buku Sedang Dipinjam (1)</h4>
            <div style="font-size:11px;display:flex;flex-direction:column;gap:6px;margin-bottom:14px">
                <div style="background:#f8fafc;padding:8px 10px;border-radius:6px;display:flex;justify-content:space-between;align-items:center">
                    <div><b>Laskar Pelangi</b><br><small style="color:var(--m)">BUK-0001 &bull; Rak 0802</small></div>
                    <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9.5px">Aman (5 Hari)</span>
                </div>
            </div>

            <button class="btn" style="width:100%;background:#153223;font-size:11.5px;padding:8px;text-align:center;margin-bottom:8px;display:flex;align-items:center;justify-content:center;gap:6px">
                <span>💬</span> Kirim Pengingat WhatsApp
            </button>
            <div style="display:flex;gap:8px">
                <button class="btn ghost" style="flex:1;font-size:11px;padding:7px;background:#f3f4f6;border:0">🔄 Perpanjang 1Thn</button>
                <button class="btn ghost" style="flex:1;font-size:11px;padding:7px;background:#f3f4f6;border:0">🖨️ Cetak Smartcard</button>
            </div>
        </div>
    </div>
@else
    <h2>Sirkulasi</h2>
    <form class="fm" method="POST" action="{{ route('lend') }}">
        @csrf
        <input class="in" name="w" placeholder="Nama anggota" required>
        <select class="in" name="b">
            @foreach($lib->books as $b)
                @unless($lib->out($b['id']))<option value="{{ $b['id'] }}">{{ $b['t'] }}</option>@endunless
            @endforeach
        </select>
        <button class="btn">Catat Peminjaman</button>
    </form>
    @if(count($lib->loans))
    <div class="tw"><table>
        <tr><th>Judul</th><th>Peminjam</th><th>Jatuh tempo</th><th>Denda</th><th></th></tr>
        @foreach($lib->loans as $l)
        <tr>
            <td>{{ $lib->book($l['b'])['t'] }}</td><td>{{ $l['w'] }}</td><td>{{ $l['d'] }}</td><td>{{ $lib->rp($lib->fine($l)) }}</td>
            <td>
                <form class="inline" method="POST" action="{{ route('return', $l['b']) }}">@csrf<button class="btn ghost">Kembalikan</button></form>
            </td>
        </tr>
        @endforeach
    </table></div>
    @else
    <p style="color:var(--m)">Tidak ada buku sedang dipinjam.</p>
    @endif
@endif
