# Panduan Dokumentasi dan Laporan Praktikum 9

**Judul:** Praktikum 9 — PHP Modular: Modularisasi Program, Function, Template, dan Routing  
**Nama:** [isi sesuai identitas mahasiswa]  
**NIM / Kelas:** [isi]  
**Repository:** https://github.com/[username]/Lab9Web

## Tujuan

Mempraktikkan pemanggilan file PHP, template bersama, function yang digunakan ulang, penataan direktori, routing yang memvalidasi halaman, dan integrasi CRUD ke struktur modular.

## Langkah dan bukti screenshot

1. **Struktur direktori:** screenshot folder `Lab9Web` di VS Code yang memperlihatkan `config`, `views`, `helpers`, `modules`, `assets`, `latihan`.
2. **Include dan require:** screenshot hasil percobaan file tersedia dan saat `pesan.php` diganti nama; catat apakah output "Sesudah pemanggilan" muncul.
3. **Template:** screenshot Home, Tentang, dan Kontak (Profil dapat ditambahkan sebagai halaman tambahan) yang memperlihatkan navigasi serta footer sama.
4. **Function:** screenshot isi `helpers/functions.php` dan hasil menu Demo Function, termasuk `tampilkanSalam()` dan `sapaPengguna()`.
5. **Router:** screenshot Dashboard, Data Pengguna, dan 404 dari `?page=admin/rahasia`.
6. **CRUD:** screenshot daftar pengguna sebelum tambah, formulir tambah, hasil setelah tambah, form edit, hasil setelah edit, dan hasil setelah hapus.
7. **Pengujian:** screenshot keluaran `php tests/check_helpers.php` serta halaman GET `?page=user/delete` yang menghasilkan 405.
8. **Repository:** screenshot riwayat commit dan halaman GitHub setelah push berhasil.

## Hasil pengamatan (isi setelah menjalankan)

- Include saat file ada: [catatan dan screenshot]
- Include saat file hilang: [catatan dan screenshot]
- Require saat file hilang: [catatan dan screenshot]
- Template digunakan ulang pada tiga halaman: [catatan]
- Function ditampilkan dari halaman berbeda: [catatan]
- Router URL tidak terdaftar: [status HTTP dan screenshot]
- CRUD tambah, ubah, hapus: [catatan dan screenshot]

## Analisis singkat berdasarkan modul

Modularisasi membagi aplikasi menurut tugas file. Template digunakan bersama untuk menghindari pengulangan, helper menyatukan function, dan router memilih file hanya dari daftar yang diizinkan. Dalam project ini, koneksi MySQL dikelola pada satu file dan operasi CRUD berada di modul pengguna. Keberhasilan setiap bagian harus dikonfirmasi melalui hasil pengujian lokal.

## Kendala dan penyelesaian (contoh yang boleh dipakai bila benar dialami)

- **Database gagal diakses:** periksa MySQL aktif, database telah diimpor, dan file `config/database.local.php` benar.
- **Could not find driver:** ekstensi PHP `pdo_mysql` perlu diaktifkan, lalu Apache di-restart.
- **CSS tidak tampil:** periksa URL `assets/css/style.css` relatif terhadap `index.php`.
- **404 pada route yang benar:** periksa ejaan parameter `page` dan daftar di `config/routes.php`.
- **Rewrite tidak berfungsi:** abaikan URL pendek dan gunakan `index.php?page=...` terlebih dahulu.

## Kesimpulan laporan (lengkapi sesuai kenyataan)

Setelah menjalankan seluruh pengujian, saya mengamati bahwa: [isi hasil include/require, template, function, routing, dan CRUD]. Bagian yang masih perlu dikembangkan adalah [isi hasil evaluasi dan keterbatasan].

## Pengumpulan

- Pastikan source code ada di repository GitHub **Lab9Web** milik sendiri.
- Sertakan README, screenshot, dan catatan kendala.
- Commit pekerjaan, lalu kirim **URL repository** ke e-learning sesuai instruksi dosen.
- Jangan mengklaim screenshot, uji CRUD, atau commit sudah dilakukan sebelum benar-benar melaksanakannya.
