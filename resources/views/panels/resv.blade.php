<div style="margin-bottom:20px">
    <div class="lbl" style="color:var(--o);font-size:10px;font-weight:700;letter-spacing:.06em;margin-bottom:4px">Portal Anggota &rsaquo; Reservasi Buku</div>
    <div style="display:flex;justify-content:space-between;align-items:flex-start">
        <div>
            <h2 style="font-size:24px;margin:0 0 4px;font-weight:800;letter-spacing:-.02em">Reservasi &amp; Antrean Buku</h2>
            <p style="color:var(--m);font-size:12.5px;margin:0">Pesan terlebih dahulu koleksi buku fisik yang sedang dipinjam pemustaka lain atau siapkan buku untuk diambil langsung di loket sirkulasi tanpa antre.</p>
        </div>
        <a href="{{ route('dashboard', 'cat') }}" class="btn" style="background:#153223;font-size:12px;padding:9px 16px;display:flex;align-items:center;gap:6px">＋ Ajukan Reservasi Baru</a>
    </div>
</div>

{{-- Sub Tab Navigasi Sesuai Referensi Reservasi --}}
<div style="display:flex;gap:28px;border-bottom:1px solid var(--ln);margin-bottom:22px;font-size:13px;font-weight:600">
    <div style="padding-bottom:10px;border-bottom:2px solid #111;color:#111;display:flex;align-items:center;gap:6px;cursor:pointer">
        Reservasi Aktif <span style="background:#153223;color:#fff;font-size:10px;padding:1px 6px;border-radius:99px;font-weight:700">2</span>
    </div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Cari &amp; Reservasi Buku Baru</div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Riwayat &amp; Pembatalan</div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Ketentuan Reservasi</div>
</div>

<div style="display:grid;grid-template-columns:360px 1fr;gap:24px;align-items:start">
    {{-- Kolom Kiri: Status Kuota Antrean & Smart Locker --}}
    <div>
        <div style="background:#153223;color:#fff;border-radius:14px;padding:24px;box-shadow:0 10px 25px rgba(21,50,35,.15);margin-bottom:20px">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                <div>
                    <span style="font-size:9px;color:#a9cbb7;letter-spacing:.08em;font-weight:700">STATUS KUOTA ANTREAN</span>
                    <h3 style="font-size:16px;margin:2px 0 0;font-weight:700">Smart Locker &amp; Drop Box</h3>
                </div>
                <span style="font-size:10px;background:rgba(234,179,8,.2);color:#fde047;border:1px solid rgba(234,179,8,.3);padding:3px 10px;border-radius:99px;font-weight:600">Periode 2026</span>
            </div>

            <div style="margin-bottom:18px">
                <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:6px">
                    <span style="color:#cbd5e1">Batas Kuota Antrean Aktif</span>
                    <b style="color:#fff">2 / 2 Buku</b>
                </div>
                <div style="width:100%;height:6px;background:rgba(255,255,255,.15);border-radius:99px;overflow:hidden">
                    <div style="width:100%;height:100%;background:#f59e0b;border-radius:99px"></div>
                </div>
                <small style="font-size:10px;color:#fde047;display:block;margin-top:6px">⚠️ Kuota Penuh (100%): Batas simulasi maksimal 2 judul buku dalam status reservasi/antrean aktif.</small>
            </div>

            <div style="background:rgba(0,0,0,.25);padding:12px;border-radius:8px;font-size:11.5px;color:#cbd5e1;line-height:1.4">
                <b>⏱️ Masa Tunggu Ambil:</b> 2x24 jam setelah status berubah menjadi <span style="color:#4ade80">Siap Diambil</span> di loker.
            </div>

            <button class="btn ghost" style="width:100%;margin-top:14px;background:rgba(255,255,255,.1);color:#fff;border:1px solid rgba(255,255,255,.2);font-size:11.5px;padding:8px" onclick="toast('Preferensi penjemputan diperbarui')">⚙️ Kelola Preferensi Penjemputan</button>
        </div>

        {{-- Info Loker Aktif --}}
        <div class="card" style="padding:18px;background:#fff">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <h4 style="margin:0;font-size:13px;font-weight:700">Smart Locker &amp; Drop Box</h4>
                <span class="pill" style="background:#dcebe2;color:var(--ok)">Online</span>
            </div>
            <p style="font-size:11.5px;color:var(--m);margin:0 0 12px">Gate B - Lantai Dasar (Lobi Selatan)</p>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:11.5px;border-top:1px solid var(--ln);padding-top:10px">
                <div>Lokasi Kosong: <br><b style="color:var(--t)">14 / 32 Unit</b></div>
                <div>Jam Layanan Mandiri:<br><b style="color:var(--t)">08.00–21.00 WIB</b></div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Daftar Reservasi Anda Sesuai Referensi --}}
    <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <h3 style="font-size:15px;margin:0;font-weight:700">DAFTAR RESERVASI ANDA</h3>
            <span style="font-size:11px;color:var(--m);font-weight:600">2 Judul Berjalan &bull; Diperbarui 16 Okt 2026, 10:45 WIB</span>
        </div>

        <div style="display:flex;flex-direction:column;gap:16px">
            {{-- Item 1: Siap Diambil di Smart Locker B8 --}}
            <div class="card" style="background:#fff;border-left:4px solid var(--ok);padding:18px">
                <div style="display:flex;justify-content:space-between;align-items:start">
                    <span class="pill" style="background:#dcebe2;color:var(--ok);font-weight:700">🟢 Siap Diambil di Smart Locker B8</span>
                    <span style="font-size:10px;color:var(--m);font-family:monospace">RES - 2026</span>
                </div>

                <div style="display:flex;gap:16px;align-items:center;margin-top:12px">
                    <div style="width:56px;height:74px;border-radius:6px;background:url('{{ asset('foto/Filosofi Teras.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
                    <div style="flex:1">
                        <h4 style="margin:0 0 2px;font-size:15px;font-weight:700">Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa</h4>
                        <small style="color:var(--m);font-size:11.5px">James Clear &bull; Gramedia Pustaka Utama (2020)</small>
                        <div style="display:flex;gap:20px;margin-top:6px;font-size:11px;color:var(--m)">
                            <div>Barcode: <b style="color:var(--t)">BUK-7712-AH</b></div>
                            <div>Klasifikasi: <b style="color:var(--t)">158.1 CLE a</b></div>
                        </div>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;background:#f8fafc;padding:12px;border-radius:8px;margin-top:14px;font-size:11.5px">
                    <div>Lokasi Penjemputan:<br><b>🔒 Smart Locker Gate B, Box Z05</b></div>
                    <div>Batas Waktu Ambil:<br><b style="color:#b45309">20 Okt 2026, 20:00 WIB (Sisa 36 Jam)</b></div>
                </div>

                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:14px;border-top:1px solid var(--ln);padding-top:12px">
                    <div style="display:flex;gap:12px">
                        <button class="btn" style="font-size:11px;padding:6px 12px;background:#153223">📱 Tampilkan QR &amp; PIN Loker</button>
                        <button class="btn ghost" style="font-size:11px;padding:6px 12px">📖 Panduan Buku</button>
                    </div>
                    <a href="#" onclick="toast('Reservasi dibatalkan');return false" style="font-size:11px;color:#dc2626;font-weight:600">Batalkan Reservasi</a>
                </div>
            </div>

            {{-- Item 2: Menunggu Pengembalian Pemustaka --}}
            <div class="card" style="background:#fff;border-left:4px solid var(--o);padding:18px">
                <div style="display:flex;justify-content:space-between;align-items:start">
                    <span class="pill" style="background:#fef3e7;color:#b45309;font-weight:700">⏳ Menunggu Pengembalian Pemustaka</span>
                    <span style="font-size:10px;color:var(--m);font-family:monospace">RES - 0935-0899</span>
                </div>

                <div style="display:flex;gap:16px;align-items:center;margin-top:12px">
                    <div style="width:56px;height:74px;border-radius:6px;background:url('{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
                    <div style="flex:1">
                        <h4 style="margin:0 0 2px;font-size:15px;font-weight:700">Filosofi Teras: Panduan Stoikisme untuk Generasi Modern</h4>
                        <small style="color:var(--m);font-size:11.5px">Henry Manampiring &bull; Penerbit Buku Kompas (2019)</small>
                        <div style="display:flex;gap:20px;margin-top:6px;font-size:11px;color:var(--m)">
                            <div>Barcode: <b style="color:var(--t)">BUK-3301-FT</b></div>
                            <div>Klasifikasi: <b style="color:var(--t)">188 MAN f</b></div>
                        </div>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;background:#f8fafc;padding:12px;border-radius:8px;margin-top:14px;font-size:11.5px">
                    <div>Posisi Antrean:<br><b>1 Antrean Ke-1 dari 2 Pemesan</b></div>
                    <div>Perkiraan Kembali Tersedia:<br><b style="color:var(--t)">22 Okt 2026 (6 Hari Lagi)</b></div>
                </div>

                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:14px;border-top:1px solid var(--ln);padding-top:12px">
                    <div style="display:flex;gap:12px">
                        <button class="btn ghost" style="font-size:11px;padding:6px 12px">🔔 Ubah Saluran Notifikasi</button>
                        <button class="btn ghost" style="font-size:11px;padding:6px 12px">👤 Detail Peminjam</button>
                    </div>
                    <a href="#" onclick="toast('Antrean dibatalkan');return false" style="font-size:11px;color:#dc2626;font-weight:600">Batalkan Antrean</a>
                </div>
            </div>
        </div>

        {{-- Notifikasi Terhubung Otomatis --}}
        <div class="card" style="margin-top:20px;background:#fdfcf9;border:1px solid var(--ln);padding:16px;display:flex;align-items:center;gap:12px">
            <span style="font-size:20px">💬</span>
            <div style="font-size:11.5px;color:var(--m)">
                <b>Notifikasi Terhubung Otomatis:</b> Pemberitahuan status selesai akan dikirimkan ke nomor WhatsApp <b>+62812-3456-7890</b> dan email <b>herdman.library@inovexa.id</b> saat buku tiba di loker.
            </div>
        </div>
    </div>
</div>

{{-- Koleksi Populer Siap Reserved --}}
<div class="card" style="margin-top:28px;padding:20px;background:#fff">
    <div class="row" style="margin-bottom:16px">
        <div>
            <h3 style="margin:0;font-size:15px;font-weight:700">Koleksi Populer Siap/Reserved</h3>
            <small style="color:var(--m);font-size:11.5px">Jelajahi dan cadangkan buku terfavorit yang paling memiliki laju peminjaman tinggi.</small>
        </div>
        <a href="{{ route('dashboard', 'cat') }}" style="color:var(--o);font-weight:600;font-size:12px">Buka Katalog Lengkap ›</a>
    </div>

    <div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(260px,1fr))">
        {{-- Buku Populer 1 --}}
        <div class="card" style="background:#fcfbf9;padding:14px">
            <span class="pill" style="background:#e0f2fe;color:#0369a1;font-size:9px;margin-bottom:6px;display:inline-block">SASTRA KLASIK</span>
            <div style="display:flex;gap:12px;align-items:center;margin-top:6px">
                <div style="width:48px;height:64px;background:url('{{ asset('foto/laskar pelangi.jpeg') }}') center/cover no-repeat;border-radius:4px;flex-shrink:0"></div>
                <div>
                    <h4 style="margin:0;font-size:13px;font-weight:700">Bumi Manusia</h4>
                    <small style="color:var(--m);font-size:11px">Pramoedya Ananta Toer</small>
                </div>
            </div>
            <div style="margin-top:10px;font-size:11px;color:var(--ok);font-weight:600">✓ Tersedia 1 Eks di R. Sirkulasi</div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:10px;font-size:11px;color:var(--m);border-top:1px solid var(--ln);padding-top:8px">
                <span>Lokasi: <b>Rak S-05</b></span>
                <span>Fik.: <b>13.91</b></span>
            </div>
            <button class="btn ghost" style="width:100%;margin-top:10px;font-size:11px;padding:6px" onclick="toast('Reservasi Buku Berhasil')">📌 Reservasi Buku</button>
        </div>

        {{-- Buku Populer 2 --}}
        <div class="card" style="background:#fcfbf9;padding:14px">
            <span class="pill" style="background:#fef3e7;color:#b45309;font-size:9px;margin-bottom:6px;display:inline-block">FIKSI SEJARAH</span>
            <div style="display:flex;gap:12px;align-items:center;margin-top:6px">
                <div style="width:48px;height:64px;background:url('{{ asset('foto/Filosofi Teras.jpeg') }}') center/cover no-repeat;border-radius:4px;flex-shrink:0"></div>
                <div>
                    <h4 style="margin:0;font-size:13px;font-weight:700">Gadis Kretek</h4>
                    <small style="color:var(--m);font-size:11px">Ratih Kumala</small>
                </div>
            </div>
            <div style="margin-top:10px;font-size:11px;color:var(--o);font-weight:600">⏳ Dipinjam &bull; Antrean 1 Pemustaka</div>
            <div style="margin-top:10px;font-size:11px;color:var(--m);border-top:1px solid var(--ln);padding-top:8px">
                Est. Kembali: <b>24 Okt 2026</b>
            </div>
            <button class="btn ghost" style="width:100%;margin-top:10px;font-size:11px;padding:6px" onclick="toast('Masuk Antrean Berhasil')">📥 Gabung Antrean</button>
        </div>

        {{-- Buku Populer 3 --}}
        <div class="card" style="background:#fcfbf9;padding:14px">
            <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9px;margin-bottom:6px;display:inline-block">FINANSIAL &amp; BISNIS</span>
            <div style="display:flex;gap:12px;align-items:center;margin-top:6px">
                <div style="width:48px;height:64px;background:url('{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}') center/cover no-repeat;border-radius:4px;flex-shrink:0"></div>
                <div>
                    <h4 style="margin:0;font-size:13px;font-weight:700">The Psychology of Money</h4>
                    <small style="color:var(--m);font-size:11px">Morgan Housel</small>
                </div>
            </div>
            <div style="margin-top:10px;font-size:11px;color:var(--o);font-weight:600">⏳ Dipinjam &bull; Antrean 3 Pemustaka</div>
            <div style="margin-top:10px;font-size:11px;color:var(--m);border-top:1px solid var(--ln);padding-top:8px">
                Est. Kembali: <b>28 Okt 2026</b>
            </div>
            <button class="btn ghost" style="width:100%;margin-top:10px;font-size:11px;padding:6px" onclick="toast('Masuk Antrean Berhasil')">📥 Gabung Antrean</button>
        </div>
    </div>
</div>
