# Cara Menjalankan (Laragon)

## Buka di browser

```
http://localhost/elibrary-inovexa/public/
```

Pastikan **Laragon sudah Start** (Apache jalan). Tidak perlu MySQL — aplikasi ini menyimpan data di session, bukan database.

> Kenapa `localhost/...` bukan `elibrary-inovexa.test`?
> Vhost `.test` butuh menulis ke `C:\Windows\System32\drivers\etc\hosts`, yang butuh hak admin.
> Kalau mau pakai `.test`: tutup Laragon → buka lagi dengan **Run as administrator** →
> klik kanan tray Laragon → **Quick app > Reload**. Setelah itu `http://elibrary-inovexa.test` bisa dipakai
> (folder sudah ter-*junction* ke `C:\laragon\www\elibrary-inovexa`).

## Akun untuk login

| Peran | ID | Kata sandi |
|---|---|---|
| Anggota | `24670092` (atau NIK 16 digit) | `123456` |
| Admin Pegawai | `admin` | `admin123` |
| Super Admin | `super` | `super123` |

Anggota lain yang terdaftar memakai NIM sebagai ID dan `123456` sebagai sandi
(contoh: `24670095`, `24670089`, `24670104`).

## Halaman login

- Anggota → `/masuk/member`
- Admin Pegawai → `/masuk/admin`
- Super Admin → `/masuk/super`

## Kalau perlu perintah artisan

Pakai PHP Laragon, **bukan** `php` polos (yang di PATH itu XAMPP 8.2, terlalu tua):

```powershell
cd "D:\24670092\file tugas\elibrary-inovexa"
C:\laragon\bin\php\php-8.3.35\php.exe artisan <perintah>
```

Contoh:

```powershell
C:\laragon\bin\php\php-8.3.35\php.exe artisan route:list --except-vendor
C:\laragon\bin\php\php-8.3.35\php.exe artisan config:clear
C:\laragon\bin\php\php-8.3.35\php.exe artisan serve --port=8080
```

## Kalau error "Class not found" atau vendor hilang

```powershell
cd "D:\24670092\file tugas\elibrary-inovexa"
C:\laragon\bin\php\php-8.3.35\php.exe C:\laragon\bin\composer\composer.phar install
```

## Catatan arsitektur

Aplikasi ini **versi session**, bukan database. Yang dipakai di `routes/web.php`
hanya `HomeController`, `AuthController`, `DashboardController` — ketiganya lewat
`App\Support\Library` yang menyimpan data di session.

File migration, model, policy, dan form request yang ada di repo (Book, Loan,
Reservation, Report, dll) **tidak terpakai**. Jadi:

- `.env` memakai `SESSION_DRIVER=file` dan `CACHE_STORE=file`
  (kalau `database`, akan error karena tabel `sessions`/`cache` tidak ada)
- Data akan kembali ke kondisi awal kalau session dihapus / server di-restart
- Tidak perlu setup MySQL
