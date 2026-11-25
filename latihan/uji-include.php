<?php
// Ketika pesan.php tidak ditemukan, include memberi warning dan biasanya lanjut.
echo 'Sebelum pemanggilan<br>';
include __DIR__ . '/pesan.php';
echo 'Sesudah pemanggilan<br>';
