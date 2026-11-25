<section class="hero">
    <p class="eyebrow">Praktikum 9 · PHP Modular</p>
    <h1>Selamat datang di Lab9Web</h1>
    <p>Contoh aplikasi PHP modular dengan header dan footer bersama, fungsi yang dapat digunakan ulang,
       routing menggunakan whitelist, serta pengelolaan data pengguna melalui database.</p>
    <a class="button" href="index.php?page=user/list">Kelola Data Pengguna →</a>
</section>
<div class="grid-3">
    <article class="tile"><h2>Template</h2><p>Menu Home, Profil, dan Kontak memakai satu file header dan footer.</p></article>
    <article class="tile"><h2>Function</h2><p>Helper format mata uang, diskon, validasi email, dan perhitungan.</p></article>
    <article class="tile"><h2>Router + CRUD</h2><p>URL dibatasi whitelist. Operasi data menggunakan PDO dan prepared statement.</p></article>
</div>
<section class="panel">
    <h2>Petunjuk cepat</h2>
    <ol>
        <li>Coba menu <a href="index.php?page=about">Tentang</a>, <a href="index.php?page=profil">Profil</a>, dan <a href="index.php?page=kontak">Kontak</a>.</li>
        <li>Buka <a href="index.php?page=functions">Demo Function</a> untuk melihat hasil helper.</li>
        <li>Impor <code>database.sql</code> ke MySQL, lalu buka menu Data Pengguna.</li>
        <li>Uji <a href="index.php?page=admin/rahasia">rute tidak dikenal</a> untuk melihat halaman 404.</li>
    </ol>
</section>
<section class="panel">
    <h2>Contoh fungsi pada halaman kedua</h2>
    <p>Selain di menu Demo Function, helper juga dipanggil dari beranda.
       Harga contoh <?= e(formatRupiah(120000)) ?> dengan diskon 10% menghasilkan potongan
       <?= e(formatRupiah(hitungDiskon(120000))) ?>.</p>
    <p><?= e(ringkasTeks('Fungsi dapat digunakan dari berbagai halaman tanpa menulis kode yang sama.', 48)) ?>
       — pemeriksaan alamat email contoh:
       <?= validasiEmail('contoh@example.com') ? 'valid' : 'tidak valid' ?>.</p>
    <p>Latihan function tambahan: suhu 30°C = <?= e((string) konversiCelciusKeFahrenheit(30)) ?>°F;
       nilai 88 mendapat predikat <?= e(tentukanStatusNilai(88)) ?>; dan total tiga barang
       dengan harga satuan Rp25.000 adalah <?= e(formatRupiah(hitungTotal(25000, 3))) ?>.</p>
</section>
