<?php
$old = takeOldInput();
$nama = (string) ($old['nama'] ?? '');
$email = (string) ($old['email'] ?? '');
$telepon = (string) ($old['telepon'] ?? '');
?>
<section class="page-heading"><p class="eyebrow">Modul CRUD · Create</p><h1>Tambah Pengguna</h1></section>
<section class="panel">
<form method="post" action="index.php?page=user/add">
    <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
    <div class="field"><label for="nama">Nama *</label>
        <input type="text" id="nama" name="nama" maxlength="100" value="<?= e($nama) ?>" required></div>
    <div class="field"><label for="email">Email *</label>
        <input type="email" id="email" name="email" maxlength="150" value="<?= e($email) ?>" required></div>
    <div class="field"><label for="telepon">Telepon</label>
        <input type="tel" id="telepon" name="telepon" maxlength="25" value="<?= e($telepon) ?>">
        <small>Opsional, maksimal 25 karakter.</small></div>
    <div class="actions"><button class="button" type="submit">Simpan Pengguna</button>
        <a class="button-secondary" href="index.php?page=user/list">Batal</a></div>
</form>
</section>
