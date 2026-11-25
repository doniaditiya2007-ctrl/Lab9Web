# Status Pemeriksaan Otomatis Paket Lab9Web

Pemeriksaan yang dijalankan pada source paket:

- Pemeriksaan sintaks PHP seluruh file: **LULUS**.
- Tes helper (`tests/check_helpers.php`): **11 pengujian LULUS**.
- Tes whitelist routing (`tests/check_routes.php`): **10 pengujian LULUS**.
- Uji HTTP halaman utama melalui PHP built-in server: **HTTP 200**.
- Uji HTTP halaman demo function: **HTTP 200**.
- Uji rute tidak dikenal: **HTTP 404**.

Batas pemeriksaan: lingkungan pemeriksaan ini tidak menyediakan MySQL/MariaDB dan ekstensi `pdo_mysql`. Karena itu, operasi CRUD yang benar-benar menyimpan, mengubah, dan menghapus data belum dapat dinyatakan lulus di lingkungan ini. Jalankan pengujian CRUD pada XAMPP di laptop sesuai `PANDUAN_WINDOWS_EDGE.md`.

Screenshot browser asli juga perlu diambil pada laptop pengguna. Jangan menganggap screenshot contoh atau gambar ilustrasi sebagai bukti pengujian perangkat.
