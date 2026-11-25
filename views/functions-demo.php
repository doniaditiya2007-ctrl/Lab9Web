<section class="page-heading"><p class="eyebrow">Latihan function · Bagian E dan J</p><h1>Demo Function PHP</h1></section>
<p class="intro">Seluruh fungsi disimpan dalam <code>helpers/functions.php</code> dan dipanggil dari halaman ini serta halaman lain.</p>
<div class="panel table-scroll">
<table class="data-table"><thead><tr><th>Function</th><th>Contoh pemanggilan</th><th>Hasil</th></tr></thead><tbody>
    <tr><td>tampilkanSalam()</td><td><code>tampilkanSalam()</code></td><td><?= e(tampilkanSalam()) ?></td></tr>
    <tr><td>sapaPengguna()</td><td><code>sapaPengguna('Rina')</code></td><td><?= e(sapaPengguna('Rina')) ?></td></tr>

    <tr><td>formatRupiah()</td><td><code>formatRupiah(150000)</code></td><td><?= e(formatRupiah(150000)) ?></td></tr>
    <tr><td>hitungDiskon()</td><td><code>hitungDiskon(200000, 15)</code></td><td><?= e(formatRupiah(hitungDiskon(200000, 15))) ?></td></tr>
    <tr><td>validasiEmail()</td><td><code>validasiEmail('siswa@example.com')</code></td><td><?= validasiEmail('siswa@example.com') ? 'Valid' : 'Tidak valid' ?></td></tr>
    <tr><td>ringkasTeks()</td><td><code>ringkasTeks('Belajar PHP modular lebih mudah', 18)</code></td><td><?= e(ringkasTeks('Belajar PHP modular lebih mudah', 18)) ?></td></tr>
    <tr><td>konversiCelciusKeFahrenheit()</td><td><code>konversiCelciusKeFahrenheit(30)</code></td><td><?= e((string) konversiCelciusKeFahrenheit(30)) ?> °F</td></tr>
    <tr><td>tentukanStatusNilai()</td><td><code>tentukanStatusNilai(88)</code></td><td><?= e(tentukanStatusNilai(88)) ?></td></tr>
    <tr><td>hitungTotal()</td><td><code>hitungTotal(25000, 3)</code></td><td><?= e(formatRupiah(hitungTotal(25000, 3))) ?></td></tr>
</tbody></table></div>
<section class="panel"><h2>Penerapan ulang helper</h2>
<p>Contoh hasil perhitungan kedua: harga setelah diskon 10% dari Rp200.000 adalah
   <?= e(formatRupiah(200000 - hitungDiskon(200000))) ?>.
   Lihat juga <a href="index.php?page=user/list">daftar pengguna</a>: helper <code>e()</code> digunakan untuk menampilkan teks dengan aman.</p>
</section>
