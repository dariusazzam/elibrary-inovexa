@if($u['role'] === 'admin')
    <div style="background:#153223;color:#fff;border-radius:14px;padding:28px 32px;margin-bottom:20px;position:relative;overflow:hidden;box-shadow:0 10px 30px rgba(21,50,35,.2)">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <span style="font-size:9.5px;font-weight:700;color:#a9cbb7;letter-spacing:.08em;background:rgba(255,255,255,.12);padding:3px 10px;border-radius:99px">LOKET SIRKULASI TERPADU &bull; LANTAI 1</span>
            <div style="display:flex;gap:8px">
                <button class="btn" style="background:#ea580c;color:#fff;font-size:11px;padding:6px 14px" onclick="toast('Form transaksi baru')">＋ Transaksi Baru</button>
                <button class="btn ghost" style="background:rgba(255,255,255,.15);color:#fff;border:0;font-size:11px;padding:6px 14px" onclick="toast('Edit data sirkulasi')">✎ Edit Data Sirkulasi</button>
                <button class="btn ghost" style="background:rgba(255,255,255,.15);color:#fff;border:0;font-size:11px;padding:6px 14px" onclick="toast('Pengembalian cepat')">📥 Pengembalian Cepat</button>
                <button class="btn ghost" style="background:rgba(255,255,255,.15);color:#fff;border:0;font-size:11px;padding:6px 14px" onclick="window.location='{{ route('dashboard', 'mem') }}'">👥 + Tambah Anggota</button>
            </div>
        </div>
        <h2 style="font-size:26px;margin:0 0 6px;font-weight:800;letter-spacing:-.02em;text-align:center">Halo, Petugas {{ $u['n'] }}!</h2>
        <p style="color:#d1e7db;font-size:12.5px;max-width:700px;margin:0 auto;line-height:1.5;text-align:center">
            Meja layanan sirkulasi aktif. Kelola peminjaman, perpanjangan, pengembalian buku, dan penyesuaian jadwal transaksi secara real-time.
        </p>
    </div>

    {{-- 4 Stat Cards Admin --}}
    <div class="g4" style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:20px">
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">TARGET SIRKULASI HARI INI</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">142</div>
            <div style="font-size:11px;color:var(--m)">Buku Peminjaman Aktif</div>
            <div style="font-size:10px;color:var(--ok);margin-top:4px">▲ +14 transaksi dari sesi pagi</div>
            <span style="position:absolute;top:16px;right:16px;font-size:18px">📊</span>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">PERLU PERINGATAN</div>
            <div style="font-size:22px;font-weight:800;color:var(--o)">18</div>
            <div style="font-size:11px;color:var(--m)">Buku Jatuh Tempo</div>
            <div style="font-size:10px;color:#dc2626;margin-top:4px">Potensi Denda: Rp 180.000</div>
            <span style="position:absolute;top:16px;right:16px;font-size:18px">⚠️</span>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">LOKER SIRKULASI</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">7</div>
            <div style="font-size:11px;color:var(--m)">Antrean Siap Diambil</div>
            <div style="font-size:10px;color:var(--m);margin-top:4px">Tersedia batas 2x24 jam</div>
            <span style="position:absolute;top:16px;right:16px;font-size:18px">📦</span>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">KASIR SIRKULASI</div>
            <div style="font-size:20px;font-weight:800;color:var(--ok)">Rp 345.000</div>
            <div style="font-size:11px;color:var(--m)">Denda Terkumpul Hari Ini</div>
            <div style="font-size:10px;color:var(--m);margin-top:4px">12 Transaksi &bull; 8 QRIS / 4 Tunai</div>
            <span style="position:absolute;top:16px;right:16px;font-size:18px">💵</span>
        </div>
    </div>

    {{-- Grid 2 Kolom: Antrean Sirkulasi & Antrean Reservasi Buku --}}
    <div style="display:grid;grid-template-columns:1fr 360px;gap:20px;align-items:start;margin-bottom:20px">
        {{-- Kolom Kiri: Antrean Sirkulasi & Pengembalian Cepat --}}
        <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <div>
                    <h3 style="margin:0;font-size:15px;font-weight:700">Antrean Sirkulasi &amp; Pengembalian Cepat</h3>
                    <small style="color:var(--m);font-size:11.5px">Proses check-in, check-out, perpanjangan, serta verifikasi denda buku.</small>
                </div>
                <div style="display:flex;gap:4px">
                    <span class="pill" style="background:#153223;color:#fff;font-size:11px">Semua</span>
                    <span class="pill" style="background:#f3f4f6;color:var(--t);font-size:11px">Terlambat</span>
                </div>
            </div>

            <div style="display:flex;gap:10px;margin-bottom:14px">
                <input class="in" placeholder="Scan Barcode/Eksemplar atau Masukkan NIM Anggota..." style="flex:1;height:38px;font-size:12px">
                <button class="btn" style="background:#153223;white-space:nowrap;font-size:12px">Proses Cepat</button>
            </div>

            <div class="tw">
                <table>
                    <tr>
                        <th style="font-size:10.5px;color:var(--m)">TRANSAKSI</th>
                        <th style="font-size:10.5px;color:var(--m)">ANGGOTA &amp; NIM</th>
                        <th style="font-size:10.5px;color:var(--m)">BUKU &amp; EKSEMPLAR</th>
                        <th style="font-size:10.5px;color:var(--m)">JATUH TEMPO</th>
                        <th style="font-size:10.5px;color:var(--m)">STATUS</th>
                        <th style="font-size:10.5px;color:var(--m)"></th>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9812</b></td>
                        <td style="font-size:11.5px"><b>Adinda Zahwa Aprilia</b><br><small style="color:var(--m)">24670095</small></td>
                        <td style="font-size:11.5px"><b>Sapiens: Riwayat Singkat</b><br><small style="color:var(--m)">BUK-300-1 (Rak 503)</small></td>
                        <td style="font-size:11.5px">26 Okt 2026<br><small style="color:var(--ok)">Sisa 5 Hari Lagi</small></td>
                        <td><span class="pill" style="background:#dcebe2;color:var(--ok)">Aktif (5 Hari Lagi)</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎</button></td>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9803</b></td>
                        <td style="font-size:11.5px"><b>Muhammad Okta Ramadhani</b><br><small style="color:var(--m)">24670016</small></td>
                        <td style="font-size:11.5px"><b>Metodologi Kualitatif</b><br><small style="color:var(--m)">BUK-412-8 (Rak 401)</small></td>
                        <td style="font-size:11.5px"><span style="color:#dc2626">19 Okt 2026</span><br><small style="color:#dc2626">Telat 1 Hari</small></td>
                        <td><span class="pill" style="background:#fef3e7;color:#dc2626">Denda Rp 2.000</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎ Edit</button></td>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9844</b></td>
                        <td style="font-size:11.5px"><b>Muhammad Dzaky Zidane</b><br><small style="color:var(--m)">24670090</small></td>
                        <td style="font-size:11.5px"><b>Atomic Habits</b><br><small style="color:var(--m)">BUK-184-2 (Rak 158)</small></td>
                        <td style="font-size:11.5px">28 Okt 2026<br><small style="color:var(--ok)">Sisa 7 Hari Lagi</small></td>
                        <td><span class="pill" style="background:#dcebe2;color:var(--ok)">Aktif (7 Hari Lagi)</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎</button></td>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9958</b></td>
                        <td style="font-size:11.5px"><b>Eka Bayu Prasetio</b><br><small style="color:var(--m)">24670092</small></td>
                        <td style="font-size:11.5px"><b>Algoritma &amp; Struktur Data</b><br><small style="color:var(--m)">BUK-004-9 (Rak 005)</small></td>
                        <td style="font-size:11.5px"><span style="color:#dc2626">24 Okt 2026</span><br><small style="color:#dc2626">Hari Terakhir</small></td>
                        <td><span class="pill" style="background:#fef3e7;color:#b45309">Hari Terakhir</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎</button></td>
                    </tr>
                </table>
            </div>
            <div style="margin-top:12px;font-size:11.5px;display:flex;justify-content:space-between;align-items:center">
                <span style="color:var(--m)">Menampilkan 4 dari 142 transaksi aktif</span>
                <a href="#" onclick="toast('Melihat seluruh transaksi');return false" style="color:var(--o);font-weight:600">Buka Sirkulasi Transaksi Lengkap ›</a>
            </div>
        </div>

        {{-- Kolom Kanan: Antrean Reservasi Buku & Validasi Denda Kasir --}}
        <div style="display:flex;flex-direction:column;gap:20px">
            <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <h3 style="margin:0;font-size:15px;font-weight:700">Antrean Reservasi Buku</h3>
                    <span class="pill" style="background:#fef3e7;color:#b45309">3</span>
                </div>
                <small style="color:var(--m);display:block;margin-bottom:12px;font-size:11.5px">Kelola penyiapan &amp; serah terima fisik</small>

                <div style="display:flex;flex-direction:column;gap:10px">
                    <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px">
                        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:4px">
                            <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9.5px">Siap di Meja Sirkulasi</span>
                            <span style="font-size:10px;color:var(--m)">RES-2826-0012</span>
                        </div>
                        <b style="font-size:13px">Metodologi Penelitian Kualitatif</b><br>
                        <small style="color:var(--m)">Pemohon: Eka Bayu (NIM: 24670092)<br>Loker Pengambilan: <b>A-04</b></small>
                        <div style="margin-top:10px;text-align:right">
                            <button class="btn" style="font-size:11px;padding:5px 12px;background:#153223" onclick="toast('Serah terima dikonfirmasi')">Serahkan</button>
                        </div>
                    </div>

                    <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px">
                        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:4px">
                            <span class="pill" style="background:#fef3e7;color:#b45309;font-size:9.5px">Dalam Pencarian Rak</span>
                            <span style="font-size:10px;color:var(--m)">RES-2826-08928</span>
                        </div>
                        <b style="font-size:13px">Pengantar Kecerdasan Buatan</b><br>
                        <small style="color:var(--m)">Pemohon: Frendy Wahyu (NIM: 24670091)<br>Lokasi: <b>Rak 004.2 / Lantai 2</b></small>
                        <div style="margin-top:10px;text-align:right">
                            <button class="btn ghost" style="font-size:11px;padding:5px 10px" onclick="toast('Lokasi rak diperbarui')">Ubah Lokasi</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Validasi Denda Kasir --}}
            <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <h3 style="margin:0.5px 0 0;font-size:14px;font-weight:700">Validasi Denda Kasir</h3>
                    <span class="pill" style="background:#fef3e7;color:#b45309">2 Antrean</span>
                </div>
                <small style="color:var(--m);display:block;margin-bottom:10px;font-size:11px">Struk pembayaran menunggu konfirmasi</small>

                <div style="display:flex;flex-direction:column;gap:8px">
                    <div style="background:#f8fafc;padding:10px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;font-size:11.5px">
                        <div>
                            <b>Rp 4.000 &bull; Terlambat 2 Hari</b><br>
                            <small style="color:var(--m)">Rian Pratama &bull; QRIS Otomatis</small>
                        </div>
                        <button class="btn" style="font-size:10px;padding:4px 10px;background:#166534">Verifikasi</button>
                    </div>
                    <div style="background:#f8fafc;padding:10px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;font-size:11.5px">
                        <div>
                            <b>Rp 2.000 &bull; Terlambat 1 Hari</b><br>
                            <small style="color:var(--m)">Cinta Dewi &bull; Tunai Loket</small>
                        </div>
                        <button class="btn" style="font-size:10px;padding:4px 10px;background:#111">Terima Tunai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Widget Bawah: Ringkasan Laporan & Tren Koleksi --}}
    <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
        <div class="row" style="margin-bottom:16px">
            <div>
                <h3 style="margin:0;font-size:16px;font-weight:700">Ringkasan Laporan Sirkulasi &amp; Tren Koleksi</h3>
                <small style="color:var(--m)">Statistik peminjaman mingguan, rasio eksemplar di rak, dan buku terpopuler.</small>
            </div>
            <div style="display:flex;gap:8px">
                <span class="pill" style="background:#f3f4f6;color:var(--t)">Bulan Ini (Okt 2026)</span>
                <button class="btn" style="background:#153223;font-size:11px;padding:6px 12px">📥 Unduh Laporan PDF / Excel</button>
            </div>
        </div>

        <div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:16px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">KESEHATAN KOLEKSI SIRKULASI</small>
                <div style="font-size:22px;font-weight:800;color:var(--t);margin:4px 0">84.2% <span style="font-size:11px;font-weight:600;color:var(--ok)">Buku Tersedia di Rak</span></div>
                <div style="width:100%;height:8px;background:#e5e7eb;border-radius:99px;overflow:hidden;margin:10px 0">
                    <div style="width:84.2%;height:100%;background:#ea580c;border-radius:99px"></div>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--m)">
                    <span>🟢 5.400 di Rak</span>
                    <span>🟠 1.015 Dipinjam</span>
                </div>
            </div>

            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:16px">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <small style="color:var(--m);font-weight:700;font-size:10.5px">TREN TRANSAKSI 7 HARI TERAKHIR</small>
                    <span style="color:var(--ok);font-size:11px;font-weight:700">+18.4%</span>
                </div>
                <div style="font-size:18px;font-weight:700;color:var(--t);margin:4px 0">Grafik Aktivitas Sirkulasi</div>
                <div style="font-size:11px;color:var(--m)">Rata-rata: 110 buku/hari &bull; Puncak: Sabtu</div>
            </div>

            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:16px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">BUKU TERPOPULER PEKAN INI</small>
                <div style="font-size:12px;display:flex;flex-direction:column;gap:6px;margin-top:6px">
                    <div style="display:flex;justify-content:space-between"><span>1. Metodologi Penelitian Kualitatif</span><b>38x</b></div>
                    <div style="display:flex;justify-content:space-between"><span>2. Sapiens: Riwayat Singkat</span><b>29x</b></div>
                    <div style="display:flex;justify-content:space-between"><span>3. Atomic Habits</span><b>26x</b></div>
                </div>
            </div>
        </div>
    </div>
@else
    @php
        $userName = $u['n'] ?? 'Muhammad Dzaky Zidane';
        $userId = $u['id'] ?? '24670090';
        $roleName = 'Anggota Reguler';
        $firstInit = mb_strtoupper(mb_substr($userName, 0, 2));
    @endphp

    {{-- Kartu Digital & Header Sapaan Anggota Persis Figma --}}
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px">
        {{-- Kartu Anggota Digital Sesuai Gambar Referensi --}}
        <div style="background:linear-gradient(135deg,#122c1f 0%,#091811 100%);color:#fff;border-radius:16px;padding:22px 24px;position:relative;overflow:hidden;box-shadow:0 12px 30px rgba(18,44,31,.25);border:1px solid rgba(255,255,255,.08)">
            
            {{-- Baris Atas: Logo Inisial & Teks Kartu + Status Aktif --}}
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
                <div style="display:flex;align-items:center;gap:10px">
                    <div style="width:34px;height:34px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);border-radius:8px;display:grid;place-items:center;font-size:12px;font-weight:800;color:#86efac">
                        {{ $firstInit }}
                    </div>
                    <div>
                        <div style="font-size:8.5px;font-weight:700;letter-spacing:.08em;color:#94a3b8">KARTU ANGGOTA DIGITAL</div>
                        <div style="font-size:13px;font-weight:800;letter-spacing:.03em;color:#fff">INOVEXA LIBRARY</div>
                    </div>
                </div>
                <span style="background:#166534;border:1px solid #22c55e;color:#86efac;padding:4px 12px;border-radius:99px;font-size:9.5px;font-weight:700;letter-spacing:.05em">STATUS: AKTIF</span>
            </div>

            {{-- Baris Chip & NFC --}}
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px">
                <div style="width:32px;height:24px;background:linear-gradient(135deg,#fde047 0%,#ca8a04 100%);border-radius:4px;position:relative;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.3)">
                    <div style="position:absolute;top:4px;left:0;right:0;height:1px;background:rgba(0,0,0,.2)"></div>
                    <div style="position:absolute;bottom:4px;left:0;right:0;height:1px;background:rgba(0,0,0,.2)"></div>
                    <div style="position:absolute;top:0;bottom:0;left:10px;width:1px;background:rgba(0,0,0,.2)"></div>
                </div>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#86efac" stroke-width="2">
                    <path d="M8.5 16.5a5 5 0 0 1 0-9" stroke-linecap="round"/>
                    <path d="M5 19.5a9 9 0 0 1 0-15" stroke-linecap="round"/>
                    <path d="M12 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" fill="#86efac"/>
                </svg>
            </div>

            {{-- Nomor Anggota --}}
            <div style="font-size:15px;font-weight:700;letter-spacing:.14em;margin-bottom:16px;color:#f8fafc">
                8912 &bull; 4022 &bull; 9012 &bull; 0026
            </div>

            {{-- Baris Bawah: Nama & QR/Barcode --}}
            <div style="display:flex;justify-content:space-between;align-items:flex-end;border-top:1px solid rgba(255,255,255,.1);padding-top:12px">
                <div>
                    <div style="font-size:8.5px;font-weight:700;letter-spacing:.06em;color:#94a3b8;margin-bottom:2px">NAMA PEMEGANG KARTU</div>
                    <div style="font-size:14px;font-weight:800;letter-spacing:.04em;text-transform:uppercase;color:#fef08a">{{ $userName }}</div>
                    <div style="font-size:9.5px;color:#cbd5e1;margin-top:2px">Berlaku s/d: 31 Des 2026</div>
                </div>
                <div style="background:#fff;padding:6px;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,.2)">
                    <div style="width:38px;height:38px;background:#111;border-radius:6px;display:grid;grid-template-columns:repeat(2,1fr);grid-template-rows:repeat(2,1fr);gap:4px;padding:4px">
                        <div style="background:#fff;border-radius:2px"></div>
                        <div style="background:#fff;border-radius:2px"></div>
                        <div style="background:#fff;border-radius:2px"></div>
                        <div style="background:#22c55e;border-radius:2px"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kotak Sapaan & Quick Action --}}
        <div style="background:#fff;border:1px solid var(--ln);border-radius:16px;padding:24px;display:flex;flex-direction:column;justify-content:space-between">
            <div>
                <span class="pill" style="background:#e8f4ed;color:#166534;font-size:11px;margin-bottom:8px">Selamat Datang Kembali</span>
                <h2 style="font-size:22px;font-weight:800;margin:4px 0 6px;letter-spacing:-.02em">Halo, {{ $userName }}! Ingin membaca apa hari ini?</h2>
                <p style="color:var(--m);font-size:12px;line-height:1.5;margin:0">
                    Gunakan fasilitas peminjaman mandiri menggunakan Kartu Digital Anda, pantau batas waktu pengembalian buku agar terbebas dari denda keterlambatan, atau nikmati ribuan e-book langsung di genggaman.
                </p>
            </div>

            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:16px">
                <a href="{{ route('dashboard', 'cat') }}" class="btn ghost" style="border:1px solid var(--ln);padding:10px;text-align:center;font-size:11.5px;text-decoration:none;color:var(--t);display:flex;flex-direction:column;gap:4px">
                    <span>🔍</span> <b>Cari Katalog</b><small style="color:var(--m);font-size:9.5px">OPAC Induk</small>
                </a>
                <a href="{{ route('dashboard', 'resv') }}" class="btn ghost" style="border:1px solid var(--ln);padding:10px;text-align:center;font-size:11.5px;text-decoration:none;color:var(--t);display:flex;flex-direction:column;gap:4px">
                    <span>📌</span> <b>Reservasi Baru</b><small style="color:var(--m);font-size:9.5px">Pesan antrean</small>
                </a>
                <a href="{{ route('dashboard', 'elib') }}" class="btn ghost" style="border:1px solid var(--ln);padding:10px;text-align:center;font-size:11.5px;text-decoration:none;color:var(--t);display:flex;flex-direction:column;gap:4px">
                    <span>📖</span> <b>E-Library</b><small style="color:var(--m);font-size:9.5px">Baca e-bo</small>
                </a>
            </div>
        </div>
    </div>

    {{-- 4 Stat Cards Ringkasan Anggota --}}
    <div class="g4" style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:20px">
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="font-size:10px;color:var(--m);font-weight:700;margin-bottom:4px">Buku Sedang Dipinjam</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">2 <span style="font-size:11px;font-weight:400;color:var(--m)">/ Maks 3 Buku</span></div>
            <div style="font-size:10.5px;color:#b45309;margin-top:4px">⚠️ 1 buku jatuh tempo 3 hari lagi</div>
        </div>
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="font-size:10px;color:var(--m);font-weight:700;margin-bottom:4px">Reservasi Siap Ambil</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">1 <span style="font-size:11px;font-weight:400;color:var(--m)">Buku Menunggu</span></div>
            <div style="font-size:10.5px;color:var(--ok);margin-top:4px">✅ Tersedia di Meja Sirkulasi</div>
        </div>
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="font-size:10px;color:var(--m);font-weight:700;margin-bottom:4px">Denda Keterlambatan</div>
            <div style="font-size:22px;font-weight:800;color:var(--ok)">Rp 0</div>
            <div style="font-size:10.5px;color:var(--m);margin-top:4px">🟢 Bebas Denda / Tertib Pinjam</div>
        </div>
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln)">
            <div style="font-size:10px;color:var(--m);font-weight:700;margin-bottom:4px">Total Riwayat Selesai</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">18 <span style="font-size:11px;font-weight:400;color:var(--m)">Judul Buku</span></div>
            <div style="font-size:10.5px;color:var(--m);margin-top:4px">⭐ Tingkat pembaca aktif</div>
        </div>
    </div>

    {{-- Grid 2 Kolom: Buku Sedang Dipinjam & Status Reservasi Buku --}}
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px">
        {{-- Kolom Kiri: Buku Sedang Dipinjam --}}
        <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <h3 style="margin:0;font-size:15px;font-weight:700">Daftar Buku Sedang Dipinjam</h3>
                <a href="{{ route('dashboard', 'loans') }}" style="font-size:11.5px;color:var(--o);font-weight:600;text-decoration:none">Lihat Semua</a>
            </div>
            <small style="color:var(--m);display:block;margin-bottom:14px;font-size:11px">Pantau jatuh tempo &amp; manfaatkan fitur perpanjangan online.</small>

            <div style="display:flex;flex-direction:column;gap:12px">
                <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px;display:flex;gap:12px;align-items:center">
                    <div style="width:48px;height:64px;background:#e5e7eb;border-radius:6px;flex-shrink:0;overflow:hidden">
                        <img src="{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Buku">
                    </div>
                    <div style="flex:1">
                        <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9.5px;margin-bottom:2px">KOLEKSI UMUM</span>
                        <b style="font-size:13px;display:block">Sapiens: Riwayat Singkat Umat Manusia</b>
                        <small style="color:var(--m);font-size:11px">Yuval Noah Harari &bull; Rak 300.1 / HAR / s</small>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:6px;font-size:11px">
                            <span>Dipinjam: 12 Okt 2026</span>
                            <span style="background:#fef3e7;color:#b45309;padding:2px 8px;border-radius:4px;font-weight:600">Jatuh Tempo: 28 Okt 2026 (3 Hari Lagi)</span>
                        </div>
                    </div>
                    <button class="btn" style="background:#153223;font-size:11px;padding:6px 12px;white-space:nowrap" onclick="toast('Perpanjangan pinjam dicatat')">Perpanjang (1x)</button>
                </div>

                <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px;display:flex;gap:12px;align-items:center">
                    <div style="width:48px;height:64px;background:#e5e7eb;border-radius:6px;flex-shrink:0;overflow:hidden">
                        <img src="{{ asset('foto/laskar pelangi.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Buku">
                    </div>
                    <div style="flex:1">
                        <span class="pill" style="background:#e8f4ed;color:#166534;font-size:9.5px;margin-bottom:2px">FIKSI &amp; SASTRA</span>
                        <b style="font-size:13px;display:block">Laskar Pelangi</b>
                        <small style="color:var(--m);font-size:11px">Andrea Hirata &bull; Rak 813 / HIR / l</small>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:6px;font-size:11px">
                            <span>Dipinjam: 18 Okt 2026</span>
                            <span style="background:#dcebe2;color:var(--ok);padding:2px 8px;border-radius:4px;font-weight:600">Jatuh Tempo: 01 Nov 2026</span>
                        </div>
                    </div>
                    <button class="btn" style="background:#153223;font-size:11px;padding:6px 12px;white-space:nowrap" onclick="toast('Perpanjangan pinjam dicatat')">Perpanjang (1x)</button>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Status Reservasi Buku --}}
        <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <h3 style="margin:0;font-size:15px;font-weight:700">Status Reservasi Buku</h3>
                <span class="pill" style="background:#fef3e7;color:#b45309">1 Aktif</span>
            </div>
            <small style="color:var(--m);display:block;margin-bottom:14px;font-size:11px">Antrean buku yang dipesan terlebih dahulu.</small>

            <div style="background:#fcfbf9;border:1px solid #fed7aa;border-radius:10px;padding:14px;position:relative">
                <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:6px">
                    <span class="pill" style="background:#153223;color:#fff;font-size:9.5px">SIAP DIAMBIL</span>
                    <span style="font-size:10.5px;color:var(--m)">KODE: <b>RSV-88912-B</b></span>
                </div>
                <b style="font-size:14px;display:block;margin-bottom:2px">Metodologi Penelitian Kualitatif</b>
                <small style="color:var(--m);font-size:11.5px">Prof. Dr. Sugiyono &bull; ISBN: 978-602-...</small>

                <div style="border-top:1px dashed var(--ln);margin-top:10px;padding-top:10px;display:flex;justify-content:space-between;align-items:center;font-size:11.5px">
                    <div>
                        <span style="color:var(--m);display:block">Lokasi Pengambilan:</span>
                        <b>Meja Sirkulasi Lt. 1</b>
                    </div>
                    <div style="text-align:right">
                        <span style="color:var(--m);display:block">Batas Pengambilan:</span>
                        <b style="color:#b45309">28 Okt 2026 (17:00 WIB)</b>
                    </div>
                </div>

                <div style="margin-top:12px;display:flex;justify-content:space-between;align-items:center">
                    <small style="color:var(--m)">Perlihatkan kartu digital kepada pustakawan</small>
                    <button class="btn ghost" style="color:#dc2626;border:1px solid #fecaca;font-size:11px;padding:5px 10px" onclick="toast('Reservasi dibatalkan')">Batalkan Reservasi</button>
                </div>
            </div>

            <div style="margin-top:14px;font-size:11.5px;display:flex;justify-content:space-between;align-items:center">
                <span style="color:var(--m)">Sisa Kuota Reservasi Bulan Ini:</span>
                <b>2 dari 3 Buku</b>
            </div>
            <a href="{{ route('dashboard', 'cat') }}" class="btn" style="display:block;text-align:center;background:#fff;border:1px solid var(--ln);color:var(--t);margin-top:10px;font-size:11.5px;padding:8px;text-decoration:none">+ Cari &amp; Reservasi Buku Lain</a>
        </div>
    </div>

    {{-- Widget Bawah: Lanjutkan Membaca E-Library --}}
    <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <div>
                <h3 style="margin:0;font-size:16px;font-weight:700">Lanjutkan Membaca E-Library</h3>
                <small style="color:var(--m);font-size:11.5px">Koleksi digital interaktif yang siap Anda baca kapan saja.</small>
            </div>
            <a href="{{ route('dashboard', 'elib') }}" style="font-size:12px;color:var(--o);font-weight:600;text-decoration:none">Kunjungi E-Library Lengkap ›</a>
        </div>

        <div class="g3" style="grid-template-columns:repeat(3,1fr);gap:16px">
            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:14px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <div style="display:flex;gap:12px;align-items:start;margin-bottom:10px">
                        <div style="width:40px;height:54px;background:#e5e7eb;border-radius:4px;overflow:hidden;flex-shrink:0">
                            <img src="{{ asset('foto/The Psychology of Money.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Ebook">
                        </div>
                        <div>
                            <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9px">E-Book EPUB</span>
                            <b style="font-size:12.5px;display:block;margin-top:2px">Atomic Habits: Perubahan Kecil</b>
                            <small style="color:var(--m);font-size:10.5px">James Clear &bull; Terakhir dibaca: Hari ini, 09:20</small>
                        </div>
                    </div>
                    <div style="margin-bottom:8px">
                        <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--m);margin-bottom:4px">
                            <span>Progres Baca</span>
                            <b style="color:var(--t)">68%</b>
                        </div>
                        <div style="width:100%;height:6px;background:#e5e7eb;border-radius:99px;overflow:hidden">
                            <div style="width:68%;height:100%;background:#153223;border-radius:99px"></div>
                        </div>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;border-top:1px solid var(--ln);padding-top:10px;font-size:11px">
                    <span style="color:var(--m)">Format: EPUB &amp; Audio</span>
                    <a href="{{ route('dashboard', 'elib') }}" class="btn" style="background:#153223;font-size:11px;padding:5px 12px;text-decoration:none;color:#fff">Lanjutkan Baca</a>
                </div>
            </div>

            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:14px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <div style="display:flex;gap:12px;align-items:start;margin-bottom:10px">
                        <div style="width:40px;height:54px;background:#e5e7eb;border-radius:4px;overflow:hidden;flex-shrink:0">
                            <img src="{{ asset('foto/The Psychology of Money.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Ebook">
                        </div>
                        <div>
                            <span class="pill" style="background:#fef3e7;color:#b45309;font-size:9px">PDF Interaktif</span>
                            <b style="font-size:12.5px;display:block;margin-top:2px">The Psychology of Money</b>
                            <small style="color:var(--m);font-size:10.5px">Morgan Housel &bull; Terakhir dibaca: Kemarin</small>
                        </div>
                    </div>
                    <div style="margin-bottom:8px">
                        <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--m);margin-bottom:4px">
                            <span>Progres Baca</span>
                            <b style="color:var(--t)">32%</b>
                        </div>
                        <div style="width:100%;height:6px;background:#e5e7eb;border-radius:99px;overflow:hidden">
                            <div style="width:32%;height:100%;background:#ea580c;border-radius:99px"></div>
                        </div>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;border-top:1px solid var(--ln);padding-top:10px;font-size:11px">
                    <span style="color:var(--m)">Tersedia Akses Offline</span>
                    <a href="{{ route('dashboard', 'elib') }}" class="btn" style="background:#153223;font-size:11px;padding:5px 12px;text-decoration:none;color:#fff">Lanjutkan Baca</a>
                </div>
            </div>

            <div style="background:#fcfbf9;border:1px solid #a7f3d0;border-radius:10px;padding:14px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9px;margin-bottom:4px">REKOMENDASI PUSTAKAWAN</span>
                    <b style="font-size:13px;display:block;margin-top:4px">Prinsip Desain Antarmuka Modern</b>
                    <p style="color:var(--m);font-size:11px;margin:4px 0 10px;line-height:1.4">Panduan lengkap UI/UX perpustakaan digital terkini untuk akademisi.</p>
                    <div style="font-size:11px;color:#b45309;font-weight:700">⭐ 4.9 / 5.0 &bull; <span style="color:var(--m);font-weight:400">128 Pembaca</span></div>
                </div>
                <a href="{{ route('dashboard', 'cat') }}" class="btn" style="background:#fff;border:1px solid #059669;color:#059669;font-size:11.5px;padding:6px;text-align:center;text-decoration:none;margin-top:10px">+ Tambah ke Rak Buku Saya</a>
            </div>
        </div>
    </div>
@endif
