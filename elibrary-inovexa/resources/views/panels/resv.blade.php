<div class="resv-figma-page">
    {{-- Breadcrumb --}}
    <div class="resv-figma-breadcrumb">
        <span>Portal Anggota</span>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
        <span class="active">Reservasi Buku</span>
    </div>

    {{-- Main Grid 2 Kolom --}}
    <div class="resv-figma-grid">
        {{-- KOLOM KIRI --}}
        <div class="resv-figma-left">
            {{-- Card 1: Status Kuota Antrean --}}
            <div class="resv-figma-card">
                <div class="resv-card-header-flex">
                    <div class="resv-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="3"/><path d="M7 8h10M7 12h10M7 16h6"/></svg>
                    </div>
                    <div>
                        <div class="resv-card-title-sm">STATUS KUOTA ANTREAN</div>
                        <div class="resv-card-subtitle-sm">Periode 2026</div>
                    </div>
                    <span class="resv-badge-orange">Kuota Penuh (100%)</span>
                </div>

                <div class="resv-quota-count-row">
                    <span class="resv-quota-huge">2 / 2</span>
                    <span class="resv-quota-label">Buku Digunakan</span>
                </div>

                <p class="resv-quota-desc">
                    Batas simultan: Maksimal 2 judul buku dalam status reservasi/antrean aktif secara bersamaan.
                </p>

                <div class="resv-wait-banner">
                    <div class="resv-wait-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div class="resv-wait-text">
                        <b>Masa Tunggu Ambil:</b> 2x24 jam setelah status berubah menjadi <span class="text-green-bold">Siap Diambil</span> di loket.
                    </div>
                </div>

                <button type="button" class="resv-btn-white-outline" onclick="toast('Preferensi penjemputan dibuka')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .69.21 1.33.57 1.87z"/></svg>
                    Kelola Preferensi Penjemputan
                </button>
            </div>

            {{-- Card 2: Smart Locker & Drop Box --}}
            <div class="resv-figma-card">
                <div class="resv-card-header-flex">
                    <div class="resv-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="3" x2="12" y2="21"/><circle cx="7.5" cy="12" r="1.5"/><circle cx="16.5" cy="12" r="1.5"/></svg>
                    </div>
                    <div>
                        <div class="resv-card-title-lg">Smart Locker &amp; Drop Box</div>
                        <div class="resv-card-subtitle-sm">Gate B - Lantai Dasar (Lobi Selatan)</div>
                    </div>
                    <span class="resv-badge-green">● Online</span>
                </div>

                <div class="resv-locker-stats-grid">
                    <div>
                        <div class="resv-locker-stat-lbl">LOKER KOSONG</div>
                        <div class="resv-locker-stat-val"><b>14</b> / 32 Unit</div>
                        <div class="resv-locker-stat-sub text-green">Tersedia langsung</div>
                    </div>
                    <div>
                        <div class="resv-locker-stat-lbl">JAM LAYANAN MANDIRI</div>
                        <div class="resv-locker-stat-val"><b>08.00–21.00</b></div>
                        <div class="resv-locker-stat-sub text-gray">WIB (Setiap Hari)</div>
                    </div>
                </div>

                <div class="resv-locker-tip">
                    <div class="resv-tip-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    </div>
                    <div class="resv-tip-text">
                        Gunakan kartu digital atau pindai QR reservasi pada layar sensor loker untuk membuka loker otomatis.
                    </div>
                </div>
            </div>

            {{-- Card 3: Alur Prosedur Reservasi --}}
            <div class="resv-figma-card">
                <div class="resv-procedure-title">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    ALUR PROSEDUR RESERVASI
                </div>

                <div class="resv-step-list">
                    <div class="resv-step-item">
                        <div class="resv-step-num">1</div>
                        <div class="resv-step-content">
                            <b>Pilih Buku Katalog</b>
                            <p>Pilih koleksi buku fisik yang sedang dipinjam rekan lain atau siapkan buku yang masih berada di rak sirkulasi.</p>
                        </div>
                    </div>

                    <div class="resv-step-item">
                        <div class="resv-step-num">2</div>
                        <div class="resv-step-content">
                            <b>Notifikasi Verifikasi</b>
                            <p>Sistem mengirim pesan WhatsApp &amp; Email segera setelah petugas menempatkan buku ke loker penjemputan.</p>
                        </div>
                    </div>

                    <div class="resv-step-item">
                        <div class="resv-step-num">3</div>
                        <div class="resv-step-content">
                            <b>Pindai &amp; Ambil Mandiri</b>
                            <p>Tunjukkan QR Pass pada scanner Smart Locker Gate B atau Meja Sirkulasi L1. 1 sebelum batas waktu 48 jam berakhir.</p>
                        </div>
                    </div>
                </div>

                <div class="resv-auto-cancel-note">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#b45309" stroke-width="2"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    <span>Pemesanan akan <b>dibatalkan otomatis</b> jika tidak diambil dalam tempo 48 jam.</span>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN --}}
        <div class="resv-figma-right">
            <div class="resv-right-header">
                <div>
                    <h2 class="resv-right-title">Daftar Reservasi Anda</h2>
                    <span class="resv-right-count">2 Judul Berjalan</span>
                </div>
                <div class="resv-right-updated">
                    Diperbarui: 16 Okt 2026, 10:45 WIB
                </div>
            </div>

            {{-- Kartu Reservasi 1: Atomic Habits (Siap Diambil) --}}
            <div class="resv-reservation-card">
                <div class="resv-res-card-top">
                    <div class="resv-status-badge-green">
                        <span class="resv-status-dot-green"></span>
                        Siap Diambil di Smart Locker 08
                    </div>
                    <div class="resv-res-code">RES-2026-0084</div>
                </div>

                <div class="resv-res-card-body">
                    {{-- Book Cover Atomic Habits --}}
                    <img class="resv-book-cover-custom" src="{{ asset('foto/Atomic Habits.jpeg') }}" alt="Sampul buku Atomic Habits">

                    {{-- Book Info --}}
                    <div class="resv-book-info-main">
                        <h3 class="resv-book-title-bold">Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa</h3>
                        <p class="resv-book-author-meta">James Clear • Gramedia Pustaka Utama (2020)</p>

                        <div class="resv-book-barcode-row">
                            <span>Barcode: <b>BUK-7712-AH</b></span>
                            <span class="resv-dot-sep">•</span>
                            <span>Klasifikasi: <b>158.1 CLE a</b></span>
                        </div>

                        <div class="resv-res-details-grid">
                            <div class="resv-detail-box">
                                <div class="resv-detail-lbl">Lokasi Penjemputan:</div>
                                <div class="resv-detail-val-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span><b>Smart Locker Gate B, Box #08</b></span>
                                </div>
                            </div>
                            <div class="resv-detail-box highlight-orange">
                                <div class="resv-detail-lbl">Batas Waktu Ambil:</div>
                                <div class="resv-detail-val-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#b45309" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <span class="text-orange"><b>20 Okt 2026, 20:00 (36 Jam)</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="resv-res-actions-row">
                            <div class="resv-btn-group-left">
                                <button type="button" class="resv-btn-dark-pill" onclick="toast('QR Pass dan PIN Loker 08 ditampilkan')">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                                    Tampilkan QR &amp; PIN Loker
                                </button>
                                <button type="button" class="resv-btn-light-pill" onclick="toast('Panduan rute menuju Smart Locker Gate B dibuka')">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
                                    Panduan Rute
                                </button>
                            </div>
                            <button type="button" class="resv-btn-cancel-link" onclick="toast('Reservasi dibatalkan')">
                                Batalkan Reservasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kartu Reservasi 2: Filosofi Teras (Menunggu Pengembalian) --}}
            <div class="resv-reservation-card">
                <div class="resv-res-card-top">
                    <div class="resv-status-badge-amber">
                        <span class="resv-status-dot-amber"></span>
                        Menunggu Pengembalian Pemustaka
                    </div>
                    <div class="resv-res-code">RES-2026-0089</div>
                </div>

                <div class="resv-res-card-body">
                    {{-- Book Cover Filosofi Teras --}}
                    <img class="resv-book-cover-custom" src="{{ asset('foto/Filosofi Teras.jpeg') }}" alt="Sampul buku Filosofi Teras">

                    {{-- Book Info --}}
                    <div class="resv-book-info-main">
                        <h3 class="resv-book-title-bold">Filosofi Teras: Panduan Stoikisme untuk Generasi Modern</h3>
                        <p class="resv-book-author-meta">Henry Manampiring • Penerbit Buku Kompas (2019)</p>

                        <div class="resv-book-barcode-row">
                            <span>Barcode: <b>BUK-3301-FT</b></span>
                            <span class="resv-dot-sep">•</span>
                            <span>Klasifikasi: <b>188 MAN f</b></span>
                        </div>

                        <div class="resv-res-details-grid">
                            <div class="resv-detail-box">
                                <div class="resv-detail-lbl">Posisi Antrean:</div>
                                <div class="resv-detail-val-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    <span><b>Antrean Ke-1 dari 2 Pemesan</b></span>
                                </div>
                            </div>
                            <div class="resv-detail-box">
                                <div class="resv-detail-lbl">Perkiraan Koleksi Tersedia:</div>
                                <div class="resv-detail-val-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    <span><b>22 Okt 2026 (6 Hari Lagi)</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="resv-res-actions-row">
                            <div class="resv-btn-group-left">
                                <button type="button" class="resv-btn-light-pill" onclick="toast('Pengaturan saluran notifikasi dibuka')">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                                    Ubah Saluran Notifikasi
                                </button>
                                <button type="button" class="resv-btn-light-pill" onclick="toast('Detail peminjaman buku aktif oleh rekan dibuka')">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                    Detail Peminjam
                                </button>
                            </div>
                            <button type="button" class="resv-btn-cancel-link" onclick="toast('Antrean dibatalkan')">
                                Batalkan Antrean
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Notifikasi Terhubung Otomatis --}}
            <div class="resv-auto-notify-box">
                <div class="resv-notify-bell-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                </div>
                <div class="resv-notify-text">
                    <b>Notifikasi Terhubung Otomatis</b>
                    <p>Pembaruan status antrean akan dikirimkan ke nomor WhatsApp <b>+62812-3456-7890</b> dan email <b>herdman.library@inovexa.id</b> segera saat buku tiba di loket.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Koleksi Populer Siap Reservasi --}}
    <div class="resv-popular-section">
        <div class="resv-popular-top-bar">
            <div>
                <h2 class="resv-popular-heading">Koleksi Populer Siap Reservasi</h2>
                <p class="resv-popular-sub">Jelajahi dan cadangkan buku terfavorit yang sedang memiliki lalu lintas peminjaman tinggi.</p>
            </div>
            <a href="{{ route('dashboard', 'cat') }}" class="resv-popular-more-link">
                Buka Katalog Lengkap &rarr;
            </a>
        </div>

        <div class="resv-popular-cards-grid">
            {{-- Card 1: Bumi Manusia --}}
            <div class="resv-popular-item">
                <img class="resv-pop-cover" src="{{ asset('foto/Bumi Manusia.jpeg') }}" alt="Sampul buku Bumi Manusia">
                <div class="resv-pop-info">
                    <span class="resv-pop-cat-orange">SASTRA KLASIK</span>
                    <h4 class="resv-pop-book-title">Bumi Manusia</h4>
                    <p class="resv-pop-author">Pramoedya Ananta Toer</p>
                    <div class="resv-pop-status-green">● Tersedia 1 Eks di Rak Sirkulasi</div>
                    <div class="resv-pop-footer-row">
                        <span class="resv-pop-loc">Lokasi: <b>Rak S-04 Lt. 2</b></span>
                        <button type="button" class="resv-pop-btn-green" onclick="toast('Buku Bumi Manusia direservasi')">Reservasi Buku</button>
                    </div>
                </div>
            </div>

            {{-- Card 2: Gadis Kretek --}}
            <div class="resv-popular-item">
                <img class="resv-pop-cover" src="{{ asset('foto/laskar pelangi.jpeg') }}" alt="Sampul buku Laskar Pelangi">
                <div class="resv-pop-info">
                    <span class="resv-pop-cat-green">FIKSI SEJARAH</span>
                    <h4 class="resv-pop-book-title">Gadis Kretek</h4>
                    <p class="resv-pop-author">Ratih Kumala</p>
                    <div class="resv-pop-status-gray">Dipinjam • Antrean 1 Pemustaka</div>
                    <div class="resv-pop-footer-row">
                        <span class="resv-pop-loc">Est. Kembali: <b>24 Okt 2026</b></span>
                        <button type="button" class="resv-pop-btn-white" onclick="toast('Bergabung ke antrean Gadis Kretek')">Gabung Antrean</button>
                    </div>
                </div>
            </div>

            {{-- Card 3: The Psychology of Money --}}
            <div class="resv-popular-item">
                <img class="resv-pop-cover" src="{{ asset('foto/The Psychology of Money.jpeg') }}" alt="Sampul buku The Psychology of Money">
                <div class="resv-pop-info">
                    <span class="resv-pop-cat-blue">FINANSIAL &amp; BISNIS</span>
                    <h4 class="resv-pop-book-title">The Psychology of Money</h4>
                    <p class="resv-pop-author">Morgan Housel</p>
                    <div class="resv-pop-status-gray">Dipinjam • Antrean 3 Pemustaka</div>
                    <div class="resv-pop-footer-row">
                        <span class="resv-pop-loc">Est. Kembali: <b>28 Okt 2026</b></span>
                        <button type="button" class="resv-pop-btn-white" onclick="toast('Bergabung ke antrean Psychology of Money')">Gabung Antrean</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Sistem --}}
    <footer class="resv-page-footer">
        <div>&copy; 2026 <b>Inovexa Library System</b>. Terhubung dengan Katalog Induk Perpustakaan Nasional RI.</div>
        <div class="resv-footer-links">
            <a href="javascript:void(0)" onclick="openModal('contact-modal')">Bantuan Sirkulasi</a>
            <span>•</span>
            <a href="javascript:void(0)" onclick="toast('Ketentuan reservasi: Maksimal 2 judul aktif, masa simpan loker 2x24 jam.')">Tata Tertib &amp; Sanksi Denda</a>
            <span>•</span>
            <span>Versi 4.2.1 - Prod</span>
        </div>
    </footer>
</div>
