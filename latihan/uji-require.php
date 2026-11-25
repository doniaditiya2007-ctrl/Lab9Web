<?php
// Ketika pesan.php tidak ditemukan, require menghentikan eksekusi.
echo 'Sebelum pemanggilan<br>';
require __DIR__ . '/pesan.php';
echo 'Sesudah pemanggilan<br>';
