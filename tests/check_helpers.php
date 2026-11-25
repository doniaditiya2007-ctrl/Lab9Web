<?php
declare(strict_types=1);
require_once __DIR__ . '/../helpers/functions.php';

$tests = [
    'tampilkanSalam' => tampilkanSalam() === 'Selamat belajar PHP modular!',
    'sapaPengguna' => sapaPengguna('Rina') === 'Halo, Rina',
    'formatRupiah' => formatRupiah(150000) === 'Rp 150.000',
    'hitungDiskon' => hitungDiskon(200000, 15) === 30000.0,
    'validasiEmail (benar)' => validasiEmail('siswa@example.com'),
    'validasiEmail (salah)' => !validasiEmail('bukan-email'),
    'ringkasTeks' => ringkasTeks('Belajar pemrograman', 10) === 'Belajar...',
    'Celsius ke Fahrenheit' => konversiCelciusKeFahrenheit(30) === 86.0,
    'status nilai' => tentukanStatusNilai(88) === 'A (Sangat Baik)',
    'hitungTotal' => hitungTotal(25000, 3) === 75000.0,
    'escaping HTML' => e('<script>') === '&lt;script&gt;',
];
foreach ($tests as $test => $success) {
    echo ($success ? '[LULUS]' : '[GAGAL]') . ' ' . $test . PHP_EOL;
}
exit(in_array(false, $tests, true) ? 1 : 0);
