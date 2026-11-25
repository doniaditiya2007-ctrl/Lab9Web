# Lab9Web — Praktikum 9 PHP Modular

Aplikasi latihan PHP modular yang dibuat **dari nol** berdasarkan `Modul_Praktikum_9_PHP_Modular.pdf`.
Karena tidak ada proyek CRUD praktikum sebelumnya, latihan **refactoring CRUD** diterapkan pada proyek CRUD baru yang disusun modular sejak awal. Ini adalah **adaptasi yang transparan**, bukan klaim telah memodularisasi proyek lama.

## 1. Tujuan

- Membedakan `include`, `require`, `include_once`, dan `require_once`.
- Memakai header dan footer yang sama pada beberapa halaman.
- Menyusun fungsi reusable dengan parameter, nilai default, dan `return`.
- Mengatur struktur direktori sesuai tanggung jawab.
- Membuat router `index.php?page=...` dengan **whitelist** dan halaman 404.
- Menjalankan CRUD pengguna (create, read, update, delete) menggunakan MySQL dan PDO.

## 2. Perangkat yang diperlukan

- PHP 8.1+ dan ekstensi `pdo_mysql` aktif.
- MySQL/MariaDB dan web server (Apache via XAMPP/Laragon adalah pilihan mudah).
- Browser dan editor (Visual Studio Code disarankan).
- phpMyAdmin (opsional, untuk impor database).

> Project ini dibuat untuk pembelajaran lokal. Belum memiliki sistem login dan tidak boleh dipublikasikan di internet tanpa autentikasi, otorisasi, HTTPS, dan penguatan konfigurasi server.

## 3. Cara instalasi dengan XAMPP (Windows)

1. Ekstrak ZIP sehingga folder bernama `Lab9Web`.
2. Pindahkan `Lab9Web` ke `C:\xampp\htdocs\Lab9Web` (atau folder `htdocs` instalasi XAMPP kamu).
3. Jalankan **Apache** dan **MySQL** pada XAMPP Control Panel.
4. Buka `http://localhost/phpmyadmin/`, lalu pilih tab **Import**.
5. Pilih `Lab9Web/database.sql`, klik **Import/Go**. Database `db_lab9web` dan tabel `users` beserta data contoh akan dibuat.
6. Jika MySQL XAMPP memakai `root` tanpa kata sandi, konfigurasi default sudah cukup. Jika berbeda, salin `config/database.local.php.example` menjadi `config/database.local.php`, lalu sesuaikan `user`, `pass`, `host`, dan `port`.
7. Buka `http://localhost/Lab9Web/index.php`.
8. Klik **Data Pengguna** untuk mencoba fitur tambah, lihat, ubah, dan hapus.

**Menggunakan Laragon:** letakkan folder di `C:\laragon\www\Lab9Web`, nyalakan Apache/MySQL, impor SQL dengan HeidiSQL/phpMyAdmin, lalu kunjungi URL project sesuai konfigurasi Laragon.

**Menggunakan PHP built-in server:** dari folder `Lab9Web`, jalankan `php -S 127.0.0.1:8000`, lalu buka `http://127.0.0.1:8000`. MySQL tetap harus berjalan dan ekstensi `pdo_mysql` harus tersedia.

## 4. Struktur direktori

```text
Lab9Web/
├── index.php                 # Router tunggal dengan whitelist
├── database.sql              # Database dan contoh data
├── .htaccess                 # URL rewrite (opsional, Apache)
├── config/
│   ├── database.php          # Koneksi PDO pada satu tempat
│   ├── database.local.php.example
│   └── routes.php            # Daftar rute yang diizinkan
├── views/
│   ├── header.php            # Header + navigasi bersama
│   ├── footer.php            # Footer bersama
│   ├── dashboard.php         # Home
│   ├── about.php                # Tentang aplikasi (latihan D)
│   ├── profil.php            # Profil
│   ├── kontak.php            # Kontak
│   ├── functions-demo.php    # Fungsi yang dapat dipakai ulang
│   ├── 404.php               # Rute tidak dikenal
│   └── 405.php               # Metode HTTP tidak sesuai
├── helpers/
│   └── functions.php         # Helper fungsi, CSRF, flash
├── modules/
│   └── user/
│       ├── list.php          # Read
│       ├── add.php           # Form Create
│       ├── edit.php          # Form Update
│       ├── delete.php        # GET tidak diizinkan
│       └── process.php       # POST Create/Update/Delete
├── assets/
│   └── css/style.css
├── latihan/
│   ├── pesan.php             # File yang di-include/require
│   ├── uji-include.php
│   ├── uji-require.php
│   └── uji-once.php
├── tests/
│   ├── check_helpers.php
│   └── check_routes.php
└── docs/
    ├── PANDUAN_LAPORAN.md
    ├── JAWABAN_PEMAHAMAN.md
    └── CEKLIST_PENGUJIAN.md
```

## 5. Daftar rute

| URL relatif terhadap folder project | Fungsi |
|---|---|
| `index.php` atau `index.php?page=dashboard` | Halaman Home |
| `index.php?page=about` | Halaman Tentang (latihan D) |
| `index.php?page=profil` | Halaman Profil |
| `index.php?page=kontak` | Halaman Kontak |
| `index.php?page=functions` | Contoh penggunaan helper |
| `index.php?page=user/list` | Daftar pengguna (Read) |
| `index.php?page=user/add` | Form tambah pengguna (Create) |
| `index.php?page=user/edit&id=1` | Form edit pengguna (Update) |
| `index.php?page=user/delete` | **POST saja** dari form hapus |
| `index.php?page=admin/rahasia` | Rute ditolak (404) |

Rute yang tidak ditemukan dikembalikan sebagai **HTTP 404**. Operasi hapus tidak boleh diproses lewat **GET**. Input `page` **tidak pernah** disusun langsung sebagai path file PHP.

## 6. Urutan latihan sesuai modul

1. **Bagian C (include/require):** akses:
   - `http://localhost/Lab9Web/latihan/uji-include.php`
   - `http://localhost/Lab9Web/latihan/uji-require.php`
   - `http://localhost/Lab9Web/latihan/uji-once.php`
   - Untuk menguji file hilang, **ubah sementara** `latihan/pesan.php` menjadi `latihan/pesan-nonaktif.php`, jalankan dua URL pertama, catat perbedaannya, lalu **kembalikan nama file**. Saat `include` gagal, eksekusi setelah baris pemanggilan biasanya lanjut; `require` menghentikan eksekusi dengan error. Saat `display_errors` dimatikan, pesan detail bisa tercatat di log server.
2. **Bagian D (template):** klik Home, Tentang, dan Kontak (Profil juga tersedia sebagai halaman tambahan). Ubah tulisan navigasi di `views/header.php` (misalnya "Profil" menjadi "Tentang") dan lihat perubahan seragam pada semua halaman.
3. **Bagian E (function):** lihat `helpers/functions.php` dan halaman `index.php?page=functions`. Demo juga menampilkan `tampilkanSalam()` dan `sapaPengguna()`. Uji fungsi dari terminal memakai `php tests/check_helpers.php`.
4. **Bagian F (direktori):** dokumentasikan folder di VS Code/file explorer.
5. **Bagian G (routing):** uji seluruh rute pada tabel, terutama halaman tidak terdaftar dan input `?page[]=dashboard` yang harus ditolak.
6. **Bagian I (CRUD):** setelah impor database, lakukan tambah → cek daftar → edit → hapus data uji baru.
7. **Bagian J (empat latihan):** seluruh latihan inti tercakup oleh template, library function, router aman, dan CRUD modular pada codebase ini.
8. **Bagian L:** jawaban 10 pertanyaan berada di `docs/JAWABAN_PEMAHAMAN.md`.
9. **Bagian M:** catatan screenshot, kendala, dan cara pengumpulan berada di `docs/PANDUAN_LAPORAN.md`.

## 7. Menjalankan pengujian dasar

Dari direktori project:

```bash
php -l index.php
php tests/check_helpers.php
php tests/check_routes.php
```

Untuk cek syntax semua file melalui PowerShell:

```powershell
Get-ChildItem -Recurse -Filter *.php | ForEach-Object { php -l $_.FullName }
```

> Pengujian CRUD dengan database harus dilakukan pada XAMPP/Laragon atau sistem lain yang memiliki MySQL dan ekstensi `pdo_mysql`. Kode ini tidak menggantikan tangkapan layar hasil pengujian yang perlu kamu ambil sendiri.

## 8. Keamanan yang diterapkan dan batasan

- Router memakai whitelist dan mengembalikan 404 untuk rute tak dikenal.
- PDO prepared statement untuk semua operasi SQL dengan input pengguna.
- Data yang tampil di HTML melewati `e()` (`htmlspecialchars`).
- Aksi tambah/edit/hapus hanya diproses melalui POST dan token CSRF.
- Validasi input pada server, pengecekan ID, keunikan email di database.
- Error detail koneksi ditulis ke log, bukan ditampilkan kepada pengguna.
- Belum ada autentikasi, pembatasan akses, pagination, rate limiting, maupun audit log produksi.

## 9. Opsional: URL bersih dengan `.htaccess`

Jika Apache sudah mengaktifkan `mod_rewrite` dan `AllowOverride`, URL seperti
`http://localhost/Lab9Web/user/list` diarahkan ke `index.php?page=user/list`.
Jika tidak berhasil, lanjutkan menggunakan pola URL biasa `index.php?page=...` karena fitur ini bersifat opsional.

## 10. Repository GitHub dan pengumpulan

Modul mensyaratkan nama repository **Lab9Web**. Setelah pengujian lokal selesai:

```bash
git init
git add .
git commit -m "Praktikum 9: modularisasi template, helper, routing, CRUD"
git branch -M main
git remote add origin https://github.com/USERNAME/Lab9Web.git
git push -u origin main
```

Buat repository **kosong** dengan nama `Lab9Web` terlebih dahulu di GitHub, lalu ganti `USERNAME` dengan username kamu. Jangan masukkan kredensial database lokal ke GitHub; file `config/database.local.php` sudah dikecualikan oleh `.gitignore`.

Isi laporan dengan bukti pekerjaan nyata dan URL repository yang dibuat melalui akunmu sendiri. File ZIP ini **bukan** bukti bahwa aplikasi sudah diuji pada perangkatmu atau sudah diunggah ke GitHub.
