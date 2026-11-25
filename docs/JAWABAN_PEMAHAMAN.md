# Jawaban Pertanyaan Pemahaman — Praktikum 9

1. **Apa itu modularisasi dan tiga manfaatnya?** Modularisasi adalah pemecahan aplikasi menjadi beberapa bagian menurut tanggung jawabnya. Manfaatnya: (1) mengurangi duplikasi, (2) mempermudah pemeliharaan, dan (3) memudahkan pengujian serta pembagian kerja.

2. **Perbedaan include dan require saat file tidak ditemukan?** `include` memunculkan warning dan umumnya melanjutkan baris setelahnya. `require` menyebabkan error sehingga eksekusi terhenti. Perilaku pesan yang terlihat juga dipengaruhi konfigurasi error PHP.

3. **Mengapa require_once untuk konfigurasi database?** Konfigurasi merupakan file wajib. `require_once` memastikan file dimuat, tetapi tidak dideklarasikan ulang bila dipanggil oleh beberapa modul.

4. **Parameter, argumen, dan return?** Parameter adalah nama variabel pada definisi fungsi, argumen adalah nilai yang diberikan saat pemanggilan, dan `return` adalah nilai hasil yang dikirim kembali ke pemanggil agar bisa dipakai lagi.

5. **Mengapa header dan footer dipisahkan dari konten?** Header dan footer dipakai oleh banyak halaman. Memisahkannya membuat tampilan konsisten dan perubahan navigasi atau footer cukup dilakukan pada satu tempat.

6. **Apa fungsi index.php dalam routing?** `index.php` menerima permintaan, membaca parameter `page`, menentukan halaman melalui daftar rute, lalu memanggil template dan konten yang sesuai. Pola ini disebut satu titik masuk aplikasi (*front controller*).

7. **Mengapa menggunakan whitelist rute?** Whitelist hanya mengizinkan modul yang memang didaftarkan. Ini membuat rute lebih mudah ditelusuri dan mengurangi risiko pemanggilan file di luar daftar aplikasi.

8. **Risiko menyusun path dari input page langsung?** Input yang tidak divalidasi bisa digunakan untuk mencoba *path traversal*, memuat file yang tidak semestinya, atau mengakibatkan eksekusi konten tidak diinginkan. Karena itu input tidak boleh langsung menjadi argumen `require`.

9. **Fungsi RewriteCond dan RewriteRule?** `RewriteCond` menyatakan syarat kapan aturan berlaku, contohnya hanya jika URL bukan file/direktori fisik. `RewriteRule` mendefinisikan bagaimana URL dimodifikasi atau diarahkan, misalnya dari `/user/list` ke `index.php?page=user/list`.

10. **Apa yang dimasukkan ke config, views, helpers, dan modules pada CRUD?** `config` berisi pengaturan serta koneksi database, `views` memuat header/footer dan halaman umum, `helpers` berisi fungsi yang dapat dipakai ulang, dan `modules` mengelompokkan fitur CRUD seperti daftar, tambah, ubah, dan hapus pengguna.

> Jawaban ini disusun sesuai konsep pada modul. Sertakan pengalaman dan hasil pengamatan sendiri pada laporan akhir.
