<?php
// Eksperimen file yang dipanggil berkali-kali namun dieksekusi satu kali.
include_once __DIR__ . '/pesan.php';
include_once __DIR__ . '/pesan.php';
require_once __DIR__ . '/../helpers/functions.php';
require_once __DIR__ . '/../helpers/functions.php';
echo 'Fungsi helper aman dimuat tanpa deklarasi ganda: ' . e(formatRupiah(150000));
