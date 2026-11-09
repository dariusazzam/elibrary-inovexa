<div style="margin-bottom:20px">
    <div class="lbl" style="color:var(--o);font-size:10px;font-weight:700;letter-spacing:.06em;margin-bottom:4px">Portal Anggota &rsaquo; Peminjaman &amp; Denda</div>
    <h2 style="font-size:24px;margin:0 0 4px;font-weight:800;letter-spacing:-.02em">Peminjaman &amp; Denda Sirkulasi</h2>
    <p style="color:var(--m);font-size:12.5px;margin:0">Pantau batas waktu pengembalian koleksi buku fisik, ajukan perpanjangan masa pinjam mandiri, dan kelola informasi bebas denda atau penalti administrasi perpustakaan.</p>
</div>

{{-- Sub Tab Navigasi Sesuai Gambar Referensi --}}
<div style="display:flex;gap:28px;border-bottom:1px solid var(--ln);margin-bottom:22px;font-size:13px;font-weight:600">
    <div style="padding-bottom:10px;border-bottom:2px solid #111;color:#111;display:flex;align-items:center;gap:6px;cursor:pointer">
        Buku Sedang Dipinjam <span style="background:#153223;color:#fff;font-size:10px;padding:1px 6px;border-radius:99px;font-weight:700">2</span>
    </div>
    <div style="padding-bottom:10px;color:var(--m);display:flex;align-items:center;gap:6px;cursor:pointer">
        Tagihan &amp; Denda <span style="background:#e5e7eb;color:var(--t);font-size:10px;padding:1px 6px;border-radius:99px;font-weight:700">Rp 0</span>
    </div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Riwayat Pengembalian</div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Aturan Sirkulasi</div>
</div>

<div style="display:grid;grid-template-columns:360px 1fr;gap:24px;align-items:start">
    {{-- Kolom Kiri: SmartPass Card Persis Referensi --}}
    <div style="background:#153223;color:#fff;border-radius:14px;padding:24px;box-shadow:0 10px 25px rgba(21,50,35,.15)">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px">
            <div>
                <span style="font-size:9px;color:#a9cbb7;letter-spacing:.08em;font-weight:700">STATUS SIRKULASI</span>
                <h3 style="font-size:16px;margin:2px 0 0;font-weight:700">Inovexa SmartPass</h3>
            </div>
            <span style="font-size:10px;background:rgba(22,101,52,.4);color:#4ade80;border:1px solid rgba(74,222,128,.3);padding:3px 10px;border-radius:99px;font-weight:600">Status: Aktif</span>
        </div>

        <div style="margin-bottom:20px">
            <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:6px">
                <span style="color:#cbd5e1">Kuota Peminjaman Buku Fisik</span>
                <b style="color:#fff">2 / 3 Buku</b>
            </div>
            <div style="width:100%;height:6px;background:rgba(255,255,255,.15);border-radius:99px;overflow:hidden">
                <div style="width:66.6%;height:100%;background:#4ade80;border-radius:99px"></div>
            </div>
            <small style="font-size:10px;color:#94a3b8;display:block;margin-top:6px">Tersisa 1 kuota peminjaman aktif yang dapat Anda gunakan.</small>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;border-top:1px solid rgba(255,255,255,.12);padding-top:18px">
            <div style="background:rgba(0,0,0,.22);padding:12px;border-radius:10px">
                <span style="font-size:9px;color:#94a3b8">Total Denda Berjalan</span>
                <div style="font-size:18px;font-weight:800;color:#fff;margin-top:2px">Rp 0</div>
                <span style="font-size:9px;color:#4ade80;display:flex;align-items:center;gap:3px;margin-top:2px">✓ Bebas Tanggungan</span>
            </div>
            <div style="background:rgba(0,0,0,.22);padding:12px;border-radius:10px">
                <span style="font-size:9px;color:#94a3b8">Masa Berlaku Anggota</span>
                <div style="font-size:18px;font-weight:800;color:#fff;margin-top:2px">285 Hari</div>
                <span style="font-size:9px;color:#cbd5e1;display:flex;align-items:center;gap:3px;margin-top:2px">⟳ Auto-renewal</span>
            </div>
        </div>

        <div style="display:flex;justify-content:space-between;align-items:center;font-size:11px;color:#cbd5e1;border-top:1px solid rgba(255,255,255,.12);padding-top:14px">
            <span>📡 Anjungan Sirkulasi Mandiri</span>
            <span style="font-family:monospace;background:rgba(255,255,255,.1);padding:2px 6px;border-radius:4px;color:#4ade80;font-weight:700">RFID: READY</span>
        </div>
    </div>

    {{-- Kolom Kanan: Koleksi Fisik Sedang Dipinjam --}}
    <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <h3 style="font-size:15px;margin:0;font-weight:700">KOLEKSI FISIK SEDANG DIPINJAM</h3>
            <span style="font-size:11px;color:var(--m);font-weight:600">2 Koleksi Aktif</span>
        </div>

        <div style="display:flex;flex-direction:column;gap:14px">
            {{-- Buku 1: Laskar Pelangi --}}
            <div class="card" style="display:flex;gap:16px;align-items:center;padding:16px;background:#fff">
                <div style="width:56px;height:74px;border-radius:6px;background:url('{{ asset('foto/laskar pelangi.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
                
                <div style="flex:1">
                    <div style="display:flex;justify-content:space-between;align-items:start">
                        <div>
                            <span style="font-size:9px;color:var(--m);font-family:monospace;background:#f3f4f6;padding:1px 6px;border-radius:4px">BARCODE: BUK-0004-LP</span>
                            <h4 style="margin:4px 0 2px;font-size:15px;font-weight:700">Laskar Pelangi</h4>
                            <small style="color:var(--m);font-size:11.5px">Andrea Hirata &bull; Penerbit: Bentang Pustaka</small>
                        </div>
                        <span class="pill" style="background:#fef3e7;color:#b45309;font-weight:700">⏰ Sisa 4 Hari</span>
                    </div>

                    <div style="display:flex;gap:32px;margin-top:12px;font-size:11.5px;color:var(--m);border-top:1px solid var(--ln);padding-top:10px">
                        <div>Tgl Pinjam:<br><b style="color:var(--t)">18 Okt 2026</b></div>
                        <div>Batas Waktu/Jatuh Tempo:<br><b style="color:#b45309">25 Okt 2026</b></div>
                        <div>Status Perpanjangan:<br><b style="color:var(--ok)">Tersedia (1x)</b></div>
                    </div>

                    <div style="display:flex;gap:8px;margin-top:12px">
                        <button class="btn" style="font-size:11px;padding:6px 14px;background:#153223;display:flex;align-items:center;gap:4px">🔄 Perpanjang (+7 Hari)</button>
                        <button class="btn ghost" style="font-size:11px;padding:6px 14px;display:flex;align-items:center;gap:4px" onclick="toast('QR Balik Drop-Box siap dipindai')">🔲 QR Balik Drop-Box</button>
                    </div>
                </div>
            </div>

            {{-- Buku 2: Sapiens --}}
            <div class="card" style="display:flex;gap:16px;align-items:center;padding:16px;background:#fff">
                <div style="width:56px;height:74px;border-radius:6px;background:url('{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
                
                <div style="flex:1">
                    <div style="display:flex;justify-content:space-between;align-items:start">
                        <div>
                            <span style="font-size:9px;color:var(--m);font-family:monospace;background:#f3f4f6;padding:1px 6px;border-radius:4px">BARCODE: BUK-0021-SP</span>
                            <h4 style="margin:4px 0 2px;font-size:15px;font-weight:700">Sapiens: Riwayat Singkat Umat Manusia</h4>
                            <small style="color:var(--m);font-size:11.5px">Yuval Noah Harari &bull; Penerbit: KPG (Kepustakaan Populer Gramedia)</small>
                        </div>
                        <span class="pill" style="background:#fef3e7;color:#b45309;font-weight:700">⏰ Sisa 5 Hari</span>
                    </div>

                    <div style="display:flex;gap:32px;margin-top:12px;font-size:11.5px;color:var(--m);border-top:1px solid var(--ln);padding-top:10px">
                        <div>Tgl Pinjam:<br><b style="color:var(--t)">12 Okt 2026</b></div>
                        <div>Batas Waktu/Jatuh Tempo:<br><b style="color:#b45309">26 Okt 2026</b></div>
                        <div>Status Perpanjangan:<br><b style="color:var(--ok)">Tersedia (1x)</b></div>
                    </div>

                    <div style="display:flex;gap:8px;margin-top:12px">
                        <button class="btn" style="font-size:11px;padding:6px 14px;background:#153223;display:flex;align-items:center;gap:4px">🔄 Perpanjang (+7 Hari)</button>
                        <button class="btn ghost" style="font-size:11px;padding:6px 14px;display:flex;align-items:center;gap:4px" onclick="toast('Menampilkan detail koleksi')">📖 Detail Koleksi</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Panduan Sirkulasi Mandiri --}}
        <div class="card" style="margin-top:20px;background:#fdfcf9;border:1px solid var(--ln);padding:20px">
            <h4 style="margin:0 0 10px;font-size:13px;font-weight:700;display:flex;align-items:center;gap:6px"><span>📖</span> PANDUAN SIRKULASI MANDIRI</h4>
            <ul style="margin:0;padding-left:16px;font-size:12px;color:var(--m);display:flex;flex-direction:column;gap:6px">
                <li><b>Durasi Peminjaman:</b> Batas pinjam standar adalah 7 hari kalender sejak pemindaian barcode loket.</li>
                <li><b>Perpanjangan Mandiri:</b> Maksimal 1x perpanjangan daring (+7 hari) jika buku tidak dalam antrean reservasi.</li>
                <li><b>Denda Keterlambatan:</b> Dikenakan tarif Rp 1.000 / hari / eksemplar setelah melewati jatuh tempo.</li>
                <li><b>Drop-Box RFID 24 Jam:</b> Pengembalian fisik dapat langsung dilakukan tanpa antre di Gerbang Utama.</li>
            </ul>
            <div style="margin-top:14px;font-size:12px;display:flex;justify-content:space-between;align-items:center;border-top:1px solid var(--ln);padding-top:12px">
                <span style="color:var(--m)">Butuh bantuan petugas?</span>
                <a href="#" onclick="toast('Menghubungi Meja Sirkulasi...');return false" style="color:var(--o);font-weight:600">Kontak Sirkulasi ›</a>
            </div>
        </div>
    </div>
</div>

{{-- Riwayat Peminjaman & Aktivitas Kartu Digital Sesuai Referensi --}}
<div class="card" style="margin-top:28px;padding:20px;background:#fff">
    <div class="row" style="margin-bottom:16px">
        <div>
            <h3 style="margin:0;font-size:15px;font-weight:700;display:flex;align-items:center;gap:8px"><span>🕒</span> Riwayat Pemindaian &amp; Aktivitas Kartu Digital</h3>
            <small style="color:var(--m);font-size:11.5px">Log audit keamanan penggunaan identitas anggota di seluruh fasilitas perpustakaan.</small>
        </div>
        <a href="#" onclick="toast('Menampilkan seluruh log sirkulasi');return false" style="color:var(--o);font-weight:600;font-size:12px">Lihat Semua Log Sirkulasi ›</a>
    </div>

    <div class="tw">
        <table>
            <tr>
                <th style="font-size:11px;color:var(--m)">WAKTU &amp; TANGGAL</th>
                <th style="font-size:11px;color:var(--m)">JENIS TRANSAKSI</th>
                <th style="font-size:11px;color:var(--m)">LOKASI &amp; POS SIRKULASI</th>
                <th style="font-size:11px;color:var(--m)">RINCIAN / JUDUL KOLEKSI</th>
                <th style="font-size:11px;color:var(--m)">STATUS VALIDASI</th>
            </tr>
            <tr>
                <td style="font-size:12px"><b>18 Okt 2026</b><br><small style="color:var(--m)">09:15 WIB</small></td>
                <td style="font-size:12px">📦 Peminjaman Buku Fisik</td>
                <td style="font-size:12px">Meja Sirkulasi Lt. 1<br><small style="color:var(--m)">Petugas: Budi Santoso</small></td>
                <td style="font-size:12px"><b>Laskar Pelangi</b><br><small style="color:var(--m)">Barcode: BUK-0004-LP</small></td>
                <td><span class="pill" style="background:#dcebe2;color:var(--ok)">✓ Sukses Disetujui</span></td>
            </tr>
            <tr>
                <td style="font-size:12px"><b>14 Okt 2026</b><br><small style="color:var(--m)">10:30 WIB</small></td>
                <td style="font-size:12px">🪪 Presensi Turnstile Gate</td>
                <td style="font-size:12px">Pintu Masuk Gedung Utama<br><small style="color:var(--m)">Gate B - Tap NFC Digital</small></td>
                <td style="font-size:12px"><b>Kunjungan Ruang Baca Terbuka</b><br><small style="color:var(--m)">Sesi Belajar Siang</small></td>
                <td><span class="pill" style="background:#fef3e7;color:#b45309">● Masuk Berhasil</span></td>
            </tr>
            <tr>
                <td style="font-size:12px"><b>12 Okt 2026</b><br><small style="color:var(--m)">10:00 WIB</small></td>
                <td style="font-size:12px">📦 Peminjaman Buku Fisik</td>
                <td style="font-size:12px">Meja Sirkulasi Lt. 1<br><small style="color:var(--m)">Petugas: Ratna W.</small></td>
                <td style="font-size:12px"><b>Sapiens: Riwayat Singkat Umat Manusia</b><br><small style="color:var(--m)">Barcode: BUK-0021-SP</small></td>
                <td><span class="pill" style="background:#dcebe2;color:var(--ok)">✓ Sukses Disetujui</span></td>
            </tr>
            <tr>
                <td style="font-size:12px"><b>05 Okt 2026</b><br><small style="color:var(--m)">10:45 WIB</small></td>
                <td style="font-size:12px">📥 Pengembalian Drop-Box RFID</td>
                <td style="font-size:12px">Anjungan Drop-Box Gate A<br><small style="color:var(--m)">Scanner Optik &amp; RFID Aman</small></td>
                <td style="font-size:12px"><b>Bumi Manusia</b><br><small style="color:var(--m)">Barcode: BUK-1102-BM</small></td>
                <td><span class="pill" style="background:#e0f2fe;color:#0369a1">✓ Tepat Waktu (Bebas Denda)</span></td>
            </tr>
        </table>
    </div>

    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:16px;font-size:12px;color:var(--m)">
        <span>Menampilkan 4 dari 28 riwayat interaksi sirkulasi bulan berjalan</span>
        <div style="display:flex;gap:4px;align-items:center">
            <button class="btn ghost" style="padding:4px 10px;font-size:11px" disabled>Sebelumnya</button>
            <button class="btn" style="padding:4px 10px;font-size:11px;background:#153223">1</button>
            <button class="btn ghost" style="padding:4px 10px;font-size:11px">2</button>
            <button class="btn ghost" style="padding:4px 10px;font-size:11px">3</button>
            <button class="btn ghost" style="padding:4px 10px;font-size:11px">Selanjutnya</button>
        </div>
    </div>
</div>
