<?php
declare(strict_types=1);
require_once __DIR__ . '/../../config/database.php';
$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    http_response_code(404);
    echo '<section class="panel">ID tidak valid. <a href="index.php?page=user/list">Kembali</a>.</section>';
    return;
}
$statement = db()->prepare('SELECT id, nama, email, telepon FROM users WHERE id = :id');
$statement->execute(['id' => $id]);
$user = $statement->fetch();
if (!$user) {
    http_response_code(404);
    echo '<section class="panel">Pengguna tidak ditemukan. <a href="index.php?page=user/list">Kembali</a>.</section>';
    return;
}
$old = takeOldInput();
$user = array_replace($user, $old);
?>
<section class="page-heading"><p class="eyebrow">Modul CRUD · Update</p><h1>Ubah Pengguna #<?= (int) $id ?></h1></section>
<section class="panel">
<form method="post" action="index.php?page=user/edit">
    <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
    <input type="hidden" name="id" value="<?= (int) $id ?>">
    <div class="field"><label for="nama">Nama *</label>
        <input type="text" id="nama" name="nama" maxlength="100" value="<?= e($user['nama']) ?>" required></div>
    <div class="field"><label for="email">Email *</label>
        <input type="email" id="email" name="email" maxlength="150" value="<?= e($user['email']) ?>" required></div>
    <div class="field"><label for="telepon">Telepon</label>
        <input type="tel" id="telepon" name="telepon" maxlength="25" value="<?= e($user['telepon'] ?? '') ?>"></div>
    <div class="actions"><button type="submit" class="button">Simpan Perubahan</button>
        <a class="button-secondary" href="index.php?page=user/list">Batal</a></div>
</form>
</section>
