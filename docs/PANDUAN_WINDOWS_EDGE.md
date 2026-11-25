# Panduan Menjalankan Lab9Web di Windows + Microsoft Edge

## A. Persiapan
1. Ekstrak folder `Lab9Web` ke `C:\xampp\htdocs\Lab9Web`.
2. Buka XAMPP Control Panel.
3. Klik **Start** pada Apache dan MySQL.
4. Pastikan keduanya berstatus berjalan.

## B. Membuat database
1. Buka Microsoft Edge.
2. Masukkan `http://localhost/phpmyadmin/` pada address bar.
3. Pilih tab **Import**.
4. Klik **Choose File**, lalu pilih `C:\xampp\htdocs\Lab9Web\database.sql`.
5. Klik **Import** atau **Go** di bagian bawah.
6. Pastikan database `db_lab9web` dan tabel `users` muncul.

Konfigurasi default menggunakan host `127.0.0.1`, port `3306`, username `root`, dan password kosong. Jika konfigurasi XAMPP berbeda, salin `config/database.local.php.example` menjadi `config/database.local.php`, kemudian sesuaikan nilainya.

## C. Membuka aplikasi di Edge
Buka alamat berikut satu per satu:

- `http://localhost/Lab9Web/`
- `http://localhost/Lab9Web/index.php?page=about`
- `http://localhost/Lab9Web/index.php?page=profil`
- `http://localhost/Lab9Web/index.php?page=kontak`
- `http://localhost/Lab9Web/index.php?page=functions`
- `http://localhost/Lab9Web/index.php?page=user/list`
- `http://localhost/Lab9Web/index.php?page=user/add`
- `http://localhost/Lab9Web/index.php?page=admin/rahasia` (harus menampilkan 404)

## D. Uji CRUD
1. Buka menu **Data Pengguna**.
2. Klik **Tambah Pengguna**, isi nama, email unik, dan telepon, lalu simpan.
3. Pastikan data baru muncul di daftar.
4. Klik **Edit**, ubah salah satu data, lalu simpan.
5. Pastikan perubahan tampil pada daftar.
6. Klik **Hapus** pada data uji dan setujui konfirmasi.
7. Pastikan data uji hilang dari daftar.
8. Jangan menghapus data contoh kecuali memang diperlukan.

## E. Mengambil screenshot dengan Microsoft Edge
Gunakan `Windows + Shift + S`, pilih area browser, lalu simpan gambar PNG ke folder `screenshots`.

Ambil bukti berikut:

1. `01-struktur-folder.png` — folder project terbuka di File Explorer atau VS Code.
2. `02-home-edge.png` — halaman Home.
3. `03-about-edge.png` — halaman Tentang.
4. `04-kontak-edge.png` — halaman Kontak.
5. `05-functions-edge.png` — halaman Demo Function.
6. `06-routing-404-edge.png` — halaman 404 dari URL rute yang salah.
7. `07-crud-list-edge.png` — daftar pengguna.
8. `08-crud-tambah-edge.png` — form tambah atau hasil data berhasil ditambahkan.
9. `09-crud-edit-edge.png` — form edit atau hasil perubahan data.
10. `10-crud-hapus-edge.png` — daftar setelah data uji dihapus.
11. `11-include-edge.png` — hasil latihan include.
12. `12-require-edge.png` — hasil latihan require.

Untuk uji file hilang pada include/require, ubah nama `latihan/pesan.php` sementara, lakukan pengujian, lalu kembalikan nama file menjadi `pesan.php`.

**Penting:** screenshot dalam folder ini harus diambil dari aplikasi yang benar-benar dijalankan di laptop. Jangan mengisi folder dengan gambar ilustrasi atau screenshot contoh.
