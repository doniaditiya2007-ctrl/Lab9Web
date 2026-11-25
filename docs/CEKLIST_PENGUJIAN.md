# Checklist Pengujian Praktikum 9

Kolom hasil sengaja disediakan untuk diisi **setelah** aplikasi berjalan di perangkat mahasiswa.

| No. | Pengujian | Hasil yang diharapkan | Status aktual |
|---|---|---|---|
| 1 | `latihan/uji-include.php` dengan `pesan.php` tersedia | Sebelum — pesan — sesudah | [isi] |
| 2 | Ubah nama `pesan.php`, lalu uji `include` | Warning, lalu baris sesudah tetap dijalankan | [isi] |
| 3 | File hilang pada `uji-require.php` | Error dan baris sesudah tidak dijalankan | [isi] |
| 4 | `latihan/uji-once.php` | File dimuat sekali tanpa redeklarasi helper | [isi] |
| 5 | Home, Tentang, dan Kontak | Header/nav/footer sama; isi halaman berbeda | [isi] |
| 6 | Ubah label nav di header.php | Perubahan muncul di semua halaman | [isi] |
| 7 | Buka halaman `functions` | Semua function, termasuk tampilkanSalam dan sapaPengguna, tampil | [isi] |
| 8 | Jalankan `tests/check_helpers.php` | Seluruh pengujian LULUS | [isi] |
| 9 | Akses `index.php?page=user/list` | Menampilkan daftar dari MySQL | [isi] |
| 10 | Tambah pengguna baru | Data muncul di daftar dan di database | [isi] |
| 11 | Ubah pengguna | Data berubah dan tersimpan | [isi] |
| 12 | Hapus pengguna via tombol POST | Data terhapus dengan konfirmasi | [isi] |
| 13 | GET `?page=user/delete` | HTTP 405, data tidak terhapus | [isi] |
| 14 | GET `?page=admin/rahasia` | Halaman 404 dan status HTTP 404 | [isi] |
| 15 | GET `?page[]=dashboard` | Ditolak, tidak menyusun path file dari array | [isi] |

> Saat uji `include/require` selesai, jangan lupa mengembalikan nama `pesan.php` seperti semula.
