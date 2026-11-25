# PANDUAN PRAKTIKUM 9 PHP MODULAR — MULAI DARI AWAL

Panduan ini dibuat untuk Windows 10/11, XAMPP, Visual Studio Code, Command Prompt (CMD), dan Microsoft Edge.
**Tidak perlu membuka phpMyAdmin.** Database diimpor melalui CMD.

> Catatan tugas: Modul meminta aplikasi CRUD dari praktikum sebelumnya. Jika kamu memang belum memiliki project CRUD sebelumnya, folder ini menyediakan contoh CRUD pengguna baru yang dibuat modular. Ini adalah penyesuaian, bukan klaim memindahkan project lama.

## 1. Ekstrak ZIP
1. Klik kanan ZIP `Lab9Web_Paket_Mulai_Dari_Awal.zip`.
2. Pilih **Extract All / Ekstrak Semua**.
3. Buka folder hasil ekstrak sampai terlihat folder `Lab9Web`.

## 2. Salin project ke folder XAMPP
1. Buka File Explorer dengan `Windows + E`.
2. Buka `C:\xampp\htdocs`.
3. Salin folder `Lab9Web` dari hasil ekstrak ke dalam `htdocs`.
4. Pastikan alamat folder menjadi `C:\xampp\htdocs\Lab9Web`.

## 3. Jalankan XAMPP
1. Klik Start Windows, ketik **XAMPP Control Panel**, lalu buka.
2. Pada baris **Apache**, klik **Start**.
3. Pada baris **MySQL**, klik **Start**.
4. Tunggu sampai keduanya berwarna hijau dan tertulis **Running**.

Jika Apache tidak bisa berjalan karena port 80/443 dipakai aplikasi lain, berhenti dulu dan kirim screenshot XAMPP. Jangan mengubah port secara acak.

## 4. Impor database menggunakan CMD (tanpa phpMyAdmin)
Cara paling mudah:
1. Buka folder `C:\xampp\htdocs\Lab9Web`.
2. Klik dua kali file `IMPORT_DATABASE_CMD.bat`.
3. Jendela CMD akan terbuka dan menjalankan file `database.sql` menggunakan MySQL bawaan XAMPP.
4. Jika MySQL XAMPP memakai konfigurasi standar (user `root`, password kosong), proses akan berjalan tanpa meminta password.
5. Jika muncul tulisan berhasil, tekan tombol apa saja untuk menutup jendela.

Jika Windows menolak menjalankan file BAT atau ingin menjalankan manual:
1. Buka Start Windows, ketik `cmd`, lalu buka Command Prompt.
2. Ketik perintah berikut satu per satu:

```cmd
cd /d C:\xampp\mysql\bin
mysql -u root < C:\xampp\htdocs\Lab9Web\database.sql
```

Jika MySQL root kamu memakai password, gunakan:

```cmd
mysql -u root -p < C:\xampp\htdocs\Lab9Web\database.sql
```

Lalu ketik password MySQL saat diminta. Saat mengetik password, karakter memang tidak terlihat.

Database yang dibuat bernama `db_lab9web`, tabelnya `users`.

## 5. Buka project di Visual Studio Code
1. Buka VS Code.
2. Klik **File → Open Folder**.
3. Pilih `C:\xampp\htdocs\Lab9Web`.
4. Klik **Select Folder**.
5. Jika muncul Restricted Mode, pilih **Trust** hanya jika kamu yakin folder ini adalah project yang kamu ekstrak sendiri.

## 6. Buka aplikasi di Microsoft Edge
1. Buka Microsoft Edge.
2. Ketik alamat berikut di address bar:

```text
http://localhost/Lab9Web/
```

3. Tekan Enter. Halaman utama Lab9Web seharusnya tampil.

## 7. Uji halaman template
Buka alamat berikut satu per satu:

```text
http://localhost/Lab9Web/index.php
http://localhost/Lab9Web/index.php?page=about
http://localhost/Lab9Web/index.php?page=profil
http://localhost/Lab9Web/index.php?page=kontak
```

Periksa bahwa header, navigasi, dan footer digunakan bersama, sementara konten halaman berbeda.

## 8. Uji include, require, dan once
Buka satu per satu:

```text
http://localhost/Lab9Web/latihan/uji-include.php
http://localhost/Lab9Web/latihan/uji-require.php
http://localhost/Lab9Web/latihan/uji-once.php
```

Untuk menguji kondisi file tidak ditemukan:
1. Di VS Code, ubah sementara nama `latihan/pesan.php` menjadi `pesan-backup.php`.
2. Buka URL uji-include. Perhatikan bahwa PHP memberi peringatan, tetapi umumnya melanjutkan baris setelah include.
3. Buka URL uji-require. Perhatikan bahwa require yang gagal menghentikan eksekusi.
4. Segera kembalikan nama file menjadi `pesan.php`.
5. Muat ulang halaman uji-once dan pastikan berjalan.

Jangan lupa mengembalikan nama file. Jangan tinggalkan file dengan nama backup.

## 9. Uji function/helper
Buka:

```text
http://localhost/Lab9Web/index.php?page=functions
```

Halaman ini memperlihatkan contoh helper seperti format Rupiah, diskon, validasi email, dan ringkasan teks. Kode helper berada di `helpers/functions.php`.

## 10. Uji routing dan halaman 404
Buka:

```text
http://localhost/Lab9Web/index.php?page=user/list
http://localhost/Lab9Web/index.php?page=user/add
http://localhost/Lab9Web/index.php?page=admin/rahasia
```

Dua URL pertama adalah rute yang disediakan. URL ketiga harus menampilkan halaman 404 karena tidak terdaftar pada whitelist.

## 11. Uji CRUD pengguna
Pastikan database berhasil diimpor dan MySQL masih Running.
1. Buka `http://localhost/Lab9Web/index.php?page=user/list`.
2. Klik tombol tambah pengguna.
3. Isi nama, email yang belum pernah dipakai, dan nomor telepon.
4. Simpan. Periksa apakah data baru muncul pada daftar.
5. Klik Edit pada data uji tersebut, ubah salah satu kolom, lalu simpan.
6. Pastikan perubahan terlihat pada daftar.
7. Hapus hanya data uji yang baru kamu buat. Jangan menghapus data contoh yang ingin disimpan.
8. Pastikan data uji hilang dari daftar.

## 12. Jalankan pemeriksaan kode otomatis
Jika ingin mengecek sintaks dan helper/routing:
1. Buka File Explorer ke `C:\xampp\htdocs\Lab9Web\tests`.
2. Klik dua kali `run_checks.bat`.
3. Jika muncul pesan PHP tidak ditemukan, gunakan langkah manual di bawah.

Cara manual melalui CMD:

```cmd
cd /d C:\xampp\htdocs\Lab9Web
C:\xampp\php\php.exe tests\check_helpers.php
C:\xampp\php\php.exe tests\check_routes.php
```

## 13. Daftar screenshot yang benar-benar perlu diambil
Simpan hasil screenshot asli dari laptop ke folder `C:\xampp\htdocs\Lab9Web\screenshots`.
Tekan `Windows + Shift + S`, pilih area, klik notifikasi screenshot, lalu Save sebagai PNG.

Minimal sesuai ketentuan modul:
1. Struktur direktori project di VS Code/File Explorer.
2. Template: bukti halaman Home, About/Profil/Kontak dengan header/footer bersama.
3. Function: kode helper dan hasil demonstrasi function.
4. Routing: rute yang valid dan halaman 404.
5. CRUD: daftar data, form tambah, hasil tambah, form edit, hasil edit, dan hasil hapus.

Screenshot tambahan yang baik untuk dokumentasi:
- XAMPP Apache dan MySQL Running.
- Import database berhasil melalui CMD.
- Pengujian include/require/once.
- Hasil pemeriksaan otomatis.

**Penting:** folder `screenshots` sengaja tidak diisi gambar palsu. Isi dengan screenshot yang benar-benar kamu ambil dari perangkatmu.

## 14. Jika terjadi masalah
- `localhost` tidak terbuka: periksa Apache sudah Running.
- Database connection gagal: periksa MySQL Running dan database sudah diimpor.
- `could not find driver`: ekstensi `pdo_mysql` pada PHP XAMPP belum aktif.
- `Access denied for user root`: password MySQL berbeda; sesuaikan `config/database.local.php` berdasarkan contoh `config/database.local.php.example`.
- Halaman CSS tanpa desain: pastikan folder project berada tepat di `htdocs/Lab9Web` dan akses lewat `http://localhost/Lab9Web/`.

Jika ada error, foto seluruh pesan error dan kirimkan agar bisa diperbaiki sesuai kondisi laptopmu.
