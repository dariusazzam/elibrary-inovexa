@if($u['role'] === 'member')
    {{-- ======================================================== --}}
    {{-- TAMPILAN DASHBOARD ANGGOTA (100% IDENTIK IMAGE 2 FIGMA)   --}}
    {{-- ======================================================== --}}

    {{-- Top Section: Kartu ATM Digital + Halo Herdman & Quick Action --}}
    <div class="member-hero-grid">
        {{-- Card 1: Kartu Anggota Digital Bergaya Smart Card / ATM Sesuai Image 2 --}}
        <div class="atm-card-container">
            <div class="atm-card-header">
                <div class="atm-card-brand">
                    <span class="atm-brand-badge">IN</span>
                    <div class="atm-brand-text">
                        <b>KARTU ANGGOTA DIGITAL</b>
                        <small>INOVEXA LIBRARY</small>
                    </div>
                </div>
                <span class="atm-status-pill">STATUS: AKTIF</span>
            </div>

            <div class="atm-card-chip-row">
                <div class="atm-chip"></div>
                <span class="atm-wireless">)))</span>
            </div>

            <div class="atm-card-num-wrap">
                <span class="atm-num-label">NO. ANGGOTA</span>
                <div class="atm-card-number">
                    8912 • 4022 • 9012 • 0026
                </div>
            </div>

            <div class="atm-card-footer">
                <div>
                    <span class="atm-label">NAMA PEMEGANG KARTU</span>
                    <div class="atm-holder-name">HERDMAN</div>
                    <small style="font-size:9px;color:#a9cbb7">Berlaku s/d 20 Des 2028</small>
                </div>
                <div class="atm-qr-box">
                    {{-- QR Code Pattern 3 Kotak Figma Asli --}}
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="7" height="7" rx="1.5" stroke="#111" stroke-width="2"/>
                        <rect x="4" y="4" width="3" height="3" fill="#111"/>
                        <rect x="15" y="2" width="7" height="7" rx="1.5" stroke="#111" stroke-width="2"/>
                        <rect x="17" y="4" width="3" height="3" fill="#111"/>
                        <rect x="2" y="15" width="7" height="7" rx="1.5" stroke="#111" stroke-width="2"/>
                        <rect x="4" y="17" width="3" height="3" fill="#111"/>
                        <rect x="15" y="15" width="3" height="3" fill="#111"/>
                        <rect x="19" y="19" width="3" height="3" fill="#111"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Card 2: Banner Salam & Menu Aksi Cepat Sesuai Image 2 --}}
        <div class="welcome-action-box">
            <span class="welcome-badge">Selamat Datang Kembali</span>
            <h2>Halo, Herdman! Ingin membaca apa hari ini?</h2>
            <p>
                Gunakan fasilitas peminjaman mandiri menggunakan kartu Digital Anda, pantau batas waktu pengembalian buku agar terbebas dari denda keterlambatan, atau nikmati ribuan e-book langsung di genggaman.
            </p>

            <div class="quick-action-grid">
                <a href="{{ route('dashboard', 'cat') }}" class="quick-action-btn">
                    <span class="quick-icon-round" style="background:#f4fbf7;color:#1e3b2c">🔍</span>
                    <div>
                        <b>Cari Katalog</b>
                        <small>OPAC Inovexa</small>
                    </div>
                </a>

                <a href="{{ route('dashboard', 'resv') }}" class="quick-action-btn">
                    <span class="quick-icon-round" style="background:#fdf6ec;color:#b45309">🪑</span>
                    <div>
                        <b>Reservasi Kursi</b>
                        <small>Pojok Hadir</small>
                    </div>
                </a>

                <a href="{{ route('dashboard', 'elib') }}" class="quick-action-btn">
                    <span class="quick-icon-round" style="background:#f0fdf4;color:#166534">📱</span>
                    <div>
                        <b>E-Library</b>
                        <small>Koleksi Web</small>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- 4 Stat Counters Sesuai Image 2 Figma --}}
    <div class="stats-overview-grid">
        <div class="stat-clean-card">
            <div class="stat-clean-top">
                <small>Buku Sedang Dipinjam</small>
                <span class="stat-icon-circle" style="background:#e8f4ed;color:#1e3b2c">📖</span>
            </div>
            <div class="stat-clean-number">2 <span class="stat-unit">/ Maks 5 Buku</span></div>
            <div class="stat-clean-note" style="color:#b45309">
                ▲ Sisa waktu pinjam 5 hari lagi
            </div>
        </div>

        <div class="stat-clean-card">
            <div class="stat-clean-top">
                <small>Reservasi Siap Ambil</small>
                <span class="stat-icon-circle" style="background:#fef3e7;color:#b45309">⏳</span>
            </div>
            <div class="stat-clean-number">1 <span class="stat-unit">Buku Menunggu</span></div>
            <div class="stat-clean-note" style="color:#166534">
                Tersedia di Meja Sirkulasi
            </div>
        </div>

        <div class="stat-clean-card">
            <div class="stat-clean-top">
                <small>Denda Keterlambatan</small>
                <span class="stat-icon-circle" style="background:#e8f4ed;color:#166534">💵</span>
            </div>
            <div class="stat-clean-number">Rp 0</div>
            <div class="stat-clean-note" style="color:#166534">
                Bebas Denda / Tertib Pinjam
            </div>
        </div>

        <div class="stat-clean-card">
            <div class="stat-clean-top">
                <small>Total Riwayat Selesai</small>
                <span class="stat-icon-circle" style="background:#eef2ff;color:#4338ca">📋</span>
            </div>
            <div class="stat-clean-number">18 <span class="stat-unit">Judul Buku</span></div>
            <div class="stat-clean-note" style="color:var(--m)">
                Tingkat pembaca aktif
            </div>
        </div>
    </div>

    {{-- Main 2 Column Grid Sesuai Image 2: Daftar Buku Sedang Dipinjam & Status Reservasi Buku --}}
    <div class="main-split-grid">
        {{-- Kolom Kiri: Daftar Buku Sedang Dipinjam Sesuai Image 2 --}}
        <div class="content-box">
            <div class="content-box-header">
                <div>
                    <h3 style="margin:0;font-size:15px;font-weight:700">Daftar Buku Sedang Dipinjam</h3>
                    <small style="color:var(--m)">Pantau jatuh tempo &amp; manfaatkan fitur perpanjangan online</small>
                </div>
                <a href="{{ route('dashboard', 'loans') }}" class="header-link">Lihat Semua</a>
            </div>

            <div class="borrow-items-list">
                {{-- Item 1: Sapiens --}}
                <div class="borrow-item-row">
                    <div class="book-cover-thumb" style="background:#ebe0ca;color:#3d3326;border:1px solid #d9ccb2">
                        <small>SAPIENS</small>
                        <b>S</b>
                    </div>
                    <div class="borrow-item-detail">
                        <span class="category-badge" style="background:#e8f4ed;color:#153223">KOLEKSI UMUM</span>
                        <h4 class="borrow-book-title">Sapiens: Riwayat Singkat Umat Manusia</h4>
                        <div class="borrow-author">Yuval Noah Harari • Rak 500.1 / HAR / s</div>
                        <div class="borrow-dates-row">
                            <span class="borrow-date-info">Dipinjam: 12 Okt 2026</span>
                            <span class="due-badge-yellow">Jatuh Tempo: 26 Okt 2026 (5 Hari Lagi)</span>
                        </div>
                    </div>
                    <div class="borrow-item-action">
                        <button class="btn-extend-clean" type="button" onclick="toast('Perpanjangan berhasil diajukan untuk 7 hari ke depan.')">Perpanjang (1x)</button>
                    </div>
                </div>

                {{-- Item 2: Laskar Pelangi --}}
                <div class="borrow-item-row">
                    <div class="book-cover-thumb" style="background:#f4ebd9;color:#2b261d;border:1px solid #e2d6c1">
                        <small>LASKAR</small>
                        <b>LP</b>
                    </div>
                    <div class="borrow-item-detail">
                        <span class="category-badge" style="background:#e8f4ed;color:#153223">FIKSI &amp; SASTRA</span>
                        <h4 class="borrow-book-title">Laskar Pelangi</h4>
                        <div class="borrow-author">Andrea Hirata • Rak 813.1 / HIR / l</div>
                        <div class="borrow-dates-row">
                            <span class="borrow-date-info">Dipinjam: 18 Okt 2026</span>
                            <span class="due-badge-green">Jatuh Tempo: 01 Nov 2026</span>
                        </div>
                    </div>
                    <div class="borrow-item-action">
                        <button class="btn-extend-clean" type="button" onclick="toast('Perpanjangan berhasil diajukan untuk 7 hari ke depan.')">Perpanjang (1x)</button>
                    </div>
                </div>
            </div>

            <div class="content-box-footer-note">
                <span>Maksimal perpanjangan mandiri: 1x per peminjaman</span>
                <span>Kompensasi keterlambatan: Rp 1.000 / buku / hari</span>
            </div>
        </div>

        {{-- Kolom Kanan: Status Reservasi Buku Sesuai Image 2 --}}
        <div class="content-box">
            <div class="content-box-header">
                <div>
                    <h3 style="margin:0;font-size:15px;font-weight:700">Status Reservasi Buku</h3>
                    <small style="color:var(--m)">Antrean buku yang dipesan terlebih dahulu</small>
                </div>
                <span class="status-count-pill">1 Aktif</span>
            </div>

            {{-- Card Kuning Halus Sesuai Image 2 --}}
            <div class="resv-detail-card-figma">
                <div class="resv-card-top-row">
                    <span class="ready-badge-pill">SIAP DIAMBIL</span>
                    <div class="resv-code-meta">
                        <small>KODE BOOKING</small>
                        <b>RSV-9912C-8</b>
                    </div>
                </div>

                <h4 class="resv-book-title">Metodologi Penelitian Kualitatif</h4>
                <div class="resv-book-meta">Prof. Dr. Sugiyono • ISBN: 978-602-863</div>

                <div class="resv-grid-two-col">
                    <div>
                        <small>Lokasi Pengambilan:</small>
                        <b>Meja Sirkulasi Lt. 1</b>
                    </div>
                    <div>
                        <small>Batas Pengambilan:</small>
                        <b style="color:#b45309">25 Okt 2026 (17.00 WIB)</b>
                    </div>
                </div>

                <div class="resv-bottom-card-row">
                    <span class="resv-instruction">Perlihatkan kartu digital kepada pustakawan</span>
                    <button class="btn-cancel-text" type="button" onclick="toast('Reservasi berhasil dibatalkan.')">Batalkan Reservasi</button>
                </div>
            </div>

            <div class="resv-quota-box">
                <span>Sisa Kuota Reservasi Bulan Ini:</span>
                <b>2 dari 5 Buku</b>
            </div>

            <button class="btn-add-resv" type="button" onclick="window.location='{{ route('dashboard', 'cat') }}'">＋ Cari &amp; Reservasi Buku Lain</button>
        </div>
    </div>

    {{-- Bottom Section: Lanjutkan Membaca E-Library Sesuai Image 2 --}}
    <div class="content-box" style="margin-top:24px">
        <div class="content-box-header">
            <div>
                <h3 style="margin:0;font-size:15px;font-weight:700">Lanjutkan Membaca E-Library</h3>
                <small style="color:var(--m)">Koleksi digital interaktif yang bisa Anda baca kapan saja</small>
            </div>
            <a href="{{ route('dashboard', 'elib') }}" class="header-link">Kunjungi E-Library Lengkap ›</a>
        </div>

        <div class="elib-cards-grid">
            {{-- Card 1: Bisnis Online Revolution --}}
            <div class="elib-card-figma">
                <div class="elib-top-content">
                    <div class="elib-thumb-box" style="background:#2a4365;color:#fff">
                        <b>BOR</b>
                        <small>BISNIS</small>
                    </div>
                    <div class="elib-info-box">
                        <span class="elib-tag-badge">E-BOOK EPUB</span>
                        <h4 class="elib-title">Bisnis Online Revolution</h4>
                        <small class="elib-author">James Gwee</small>
                        <div class="elib-read-time">Terakhir dibaca: Hari ini, 09.30</div>
                    </div>
                </div>
                <div class="elib-progress-section">
                    <div class="elib-progress-meta">
                        <span>Progress Baca</span>
                        <b>68%</b>
                    </div>
                    <div class="elib-bar-bg">
                        <div class="elib-bar-fill" style="width:68%"></div>
                    </div>
                    <small class="elib-page-count">Halaman 184 dari 270</small>
                </div>
                <div class="elib-action-bottom">
                    <span class="elib-format-tag">Format: EPUB &amp; Audio</span>
                    <a href="{{ route('elib.read', 6) }}" class="btn-read-now">Lanjutkan Baca</a>
                </div>
            </div>

            {{-- Card 2: The Psychology of Money --}}
            <div class="elib-card-figma">
                <div class="elib-top-content">
                    <div class="elib-thumb-box" style="background:#524336;color:#fff">
                        <b>TPM</b>
                        <small>FINANCE</small>
                    </div>
                    <div class="elib-info-box">
                        <span class="elib-tag-badge">PDF INTERAKTIF</span>
                        <h4 class="elib-title">The Psychology of Money</h4>
                        <small class="elib-author">Morgan Housel</small>
                        <div class="elib-read-time">Terakhir dibaca: Kemarin</div>
                    </div>
                </div>
                <div class="elib-progress-section">
                    <div class="elib-progress-meta">
                        <span>Progress Baca</span>
                        <b>32%</b>
                    </div>
                    <div class="elib-bar-bg">
                        <div class="elib-bar-fill" style="width:32%"></div>
                    </div>
                    <small class="elib-page-count">Halaman 76 dari 238</small>
                </div>
                <div class="elib-action-bottom">
                    <span class="elib-format-tag">Tersedia Akses Offline</span>
                    <a href="{{ route('elib.read', 7) }}" class="btn-read-now">Lanjutkan Baca</a>
                </div>
            </div>

            {{-- Card 3: Rekomendasi Pustakawan (Prinsip Desain Antarmuka) Sesuai Image 2 --}}
            <div class="elib-card-figma recommendation-box">
                <span class="recom-badge-green">REKOMENDASI PUSTAKAWAN</span>
                <h4 class="elib-title" style="margin:8px 0 2px">Prinsip Desain Antarmuka Modern</h4>
                <small class="elib-author" style="display:block;margin-bottom:8px">Panduan lengkap UI/UX perpustakaan digital terkini untuk akademis.</small>
                
                <div class="recom-rating-row">
                    <span style="color:#eab308">★</span>
                    <b>4.9 / 5.0</b>
                    <small>• 135 Pembaca</small>
                </div>

                <div style="margin-top:auto;padding-top:16px">
                    <button class="btn-add-collection" type="button" onclick="toast('Buku telah ditambahkan ke Rak Buku Saya.')">＋ Tambahkan ke Rak Buku Saya</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Info Persis Image 2 Figma --}}
    <div class="figma-dashboard-footer">
        <div>© 2026 Inovexa Library System. Terhubung dengan Katalog Induk Perpustakaan Nasional.</div>
        <div class="footer-links-row">
            <a href="#">Bantuan Sirkulasi</a>
            <span>•</span>
            <a href="#">Tata Tertib &amp; Sanksi Denda</a>
            <span>•</span>
            <span>Versi 4.2.1-Prod</span>
        </div>
    </div>

@else
    {{-- Tampilan Dashboard Petugas Admin Sesuai Image 5 --}}
    @include('panels.circ')
@endif
