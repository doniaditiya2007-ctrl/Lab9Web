<?php
declare(strict_types=1);

// Daftar halaman yang BOLEH diakses. Jangan require file langsung dari $_GET.
return [
    'dashboard'   => ['title' => 'Beranda',        'file' => __DIR__ . '/../views/dashboard.php'],
    'profil'      => ['title' => 'Profil',         'file' => __DIR__ . '/../views/profil.php'],
    'about'       => ['title' => 'Tentang Aplikasi','file' => __DIR__ . '/../views/about.php'],
    'kontak'      => ['title' => 'Kontak',         'file' => __DIR__ . '/../views/kontak.php'],
    'functions'   => ['title' => 'Demo Function',  'file' => __DIR__ . '/../views/functions-demo.php'],
    'user/list'   => ['title' => 'Data Pengguna',  'file' => __DIR__ . '/../modules/user/list.php'],
    'user/add'    => ['title' => 'Tambah Pengguna','file' => __DIR__ . '/../modules/user/add.php'],
    'user/edit'   => ['title' => 'Ubah Pengguna',  'file' => __DIR__ . '/../modules/user/edit.php'],
    'user/delete' => ['title' => 'Hapus Pengguna', 'file' => __DIR__ . '/../views/405.php'], // POST saja
];
