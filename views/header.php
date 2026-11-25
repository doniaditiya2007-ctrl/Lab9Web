<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lab9Web - Praktikum PHP Modular dan CRUD">
    <title><?= e($pageTitle) ?> | Lab9Web</title>
    <link rel="stylesheet" href="/Lab9Web/assets/css/style.css">
</head>
<body>
<div class="container">
    <header class="site-header">
        <div class="brand"><span class="brand-mark">9</span><div><strong>Lab9Web</strong><small>Praktikum PHP Modular</small></div></div>
        <span class="header-tag">PHP · Template · Routing · CRUD</span>
    </header>
    <nav class="site-nav" aria-label="Navigasi utama">
        <?php
        $navItems = [
            'dashboard' => 'Home', 'about' => 'Tentang', 'profil' => 'Profil', 'kontak' => 'Kontak',
            'functions' => 'Demo Function', 'user/list' => 'Data Pengguna',
        ];
        foreach ($navItems as $navPage => $label):
            $active = $page === $navPage || ($navPage === 'user/list' && str_starts_with($page, 'user/'));
        ?>
            <a href="index.php?page=<?= e($navPage) ?>" class="<?= $active ? 'active' : '' ?>"
               <?= $active ? 'aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <main class="content">
        <?php if ($flash = takeFlash()): ?>
            <div class="notice <?= $flash['type'] === 'success' ? 'notice-success' : 'notice-error' ?>" role="status">
                <?= e($flash['message']) ?>
            </div>
        <?php endif; ?>
