<?php
declare(strict_types=1);
require_once __DIR__ . '/../../config/database.php';
$users = db()->query('SELECT id, nama, email, telepon, created_at FROM users ORDER BY id DESC')->fetchAll();
?>
<section class="toolbar page-heading">
    <div><p class="eyebrow">Modul CRUD · Read</p><h1>Data Pengguna</h1>
    <p class="muted">Menampilkan <?= count($users) ?> data dari database MySQL.</p></div>
    <a class="button" href="index.php?page=user/add">+ Tambah Pengguna</a>
</section>
<div class="panel table-scroll">
<?php if (!$users): ?>
    <p>Belum ada data pengguna. Gunakan tombol Tambah Pengguna untuk membuat data.</p>
<?php else: ?>
<table class="data-table">
    <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Telepon</th><th>Tanggal dibuat</th><th>Aksi</th></tr></thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= e($user['id']) ?></td>
            <td><?= e($user['nama']) ?></td>
            <td><?= e($user['email']) ?></td>
            <td><?= e($user['telepon'] ?: '—') ?></td>
            <td><?= e($user['created_at']) ?></td>
            <td><div class="actions">
                <a class="button-secondary" href="index.php?page=user/edit&amp;id=<?= (int) $user['id'] ?>">Edit</a>
                <form action="index.php?page=user/delete" method="post"
                      onsubmit="return confirm('Hapus pengguna ini? Tindakan ini tidak dapat dibatalkan.');">
                    <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
                    <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                    <button type="submit" class="button-danger">Hapus</button>
                </form>
            </div></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
</div>
<p class="muted">Penghapusan diproses menggunakan POST dan token CSRF, bukan melalui link GET.</p>
