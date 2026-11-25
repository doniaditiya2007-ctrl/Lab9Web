<?php
declare(strict_types=1);

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/functions.php';

/** Menangani POST dari tiga operasi CRUD dengan validasi server dan CSRF. */
function processUserAction(string $page): never
{
    if (!checkCsrf()) {
        http_response_code(403);
        exit('Permintaan ditolak: token CSRF tidak valid. Kembali dan muat ulang formulir.');
    }

    if ($page === 'user/delete') {
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($id === false || $id === null) {
            setFlash('error', 'ID pengguna untuk dihapus tidak valid.');
            go('user/list');
        }
        $statement = db()->prepare('DELETE FROM users WHERE id = :id');
        $statement->execute(['id' => $id]);
        setFlash($statement->rowCount() ? 'success' : 'error',
                 $statement->rowCount() ? 'Pengguna berhasil dihapus.' : 'Pengguna tidak ditemukan.');
        go('user/list');
    }

    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $id = $page === 'user/edit'
        ? filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])
        : null;

    if (!is_string($nama) || !is_string($email) || !is_string($telepon)) {
        http_response_code(400);
        exit('Bentuk input tidak sesuai.');
    }
    $nama = trim($nama);
    $email = trim($email);
    $telepon = trim($telepon);
    $redirectPage = $page === 'user/edit' ? 'user/edit' : 'user/add';
    $redirectParams = $page === 'user/edit' && is_int($id) ? ['id' => $id] : [];

    if ($page === 'user/edit' && !is_int($id)) {
        setFlash('error', 'ID pengguna untuk diubah tidak valid.');
        go('user/list');
    }

    if ($nama === '' || strlen($nama) > 100 || !validasiEmail($email)
        || strlen($email) > 150 || strlen($telepon) > 25) {
        setOldInput(['nama' => $nama, 'email' => $email, 'telepon' => $telepon]);
        setFlash('error', 'Isi nama, email valid, dan pastikan panjang input tidak melebihi batas.');
        go($redirectPage, $redirectParams);
    }

    try {
        if ($page === 'user/add') {
            $statement = db()->prepare('INSERT INTO users (nama, email, telepon) VALUES (:nama, :email, :telepon)');
            $statement->execute(['nama' => $nama, 'email' => $email, 'telepon' => $telepon ?: null]);
            setFlash('success', 'Pengguna baru berhasil ditambahkan.');
        } elseif ($page === 'user/edit') {
            $statement = db()->prepare('UPDATE users SET nama = :nama, email = :email, telepon = :telepon WHERE id = :id');
            $statement->execute(['nama' => $nama, 'email' => $email, 'telepon' => $telepon ?: null, 'id' => $id]);
            setFlash('success', 'Perubahan data pengguna telah disimpan.');
        }
        go('user/list');
    } catch (PDOException $exception) {
        error_log('Lab9Web CRUD: ' . $exception->getMessage());
        setOldInput(['nama' => $nama, 'email' => $email, 'telepon' => $telepon]);
        $duplicate = $exception->getCode() === '23000';
        setFlash('error', $duplicate ? 'Email tersebut sudah dipakai.' : 'Data gagal disimpan. Periksa koneksi database.');
        go($redirectPage, $redirectParams);
    }
}
