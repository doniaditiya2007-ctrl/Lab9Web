<?php
declare(strict_types=1);

/** Escape teks sebelum diletakkan ke HTML (mencegah XSS). */
function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Menampilkan salam sederhana tanpa parameter (latihan Bagian E). */
function tampilkanSalam(): string
{
    return 'Selamat belajar PHP modular!';
}

/** Membuat sapaan berdasarkan nama pengguna (latihan Bagian E). */
function sapaPengguna(string $nama): string
{
    return 'Halo, ' . e($nama);
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

/** Besar potongan harga; bukan harga setelah diskon. */
function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $maks = 75): string
{
    if ($maks < 4) {
        return '';
    }
    $panjang = function_exists('mb_strlen') ? mb_strlen($teks, 'UTF-8') : strlen($teks);
    if ($panjang <= $maks) {
        return $teks;
    }
    $potongan = function_exists('mb_substr')
        ? mb_substr($teks, 0, $maks - 3, 'UTF-8')
        : substr($teks, 0, $maks - 3);
    return rtrim($potongan) . '...';
}

function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string
{
    if ($nilai < 0 || $nilai > 100) {
        return 'Nilai tidak valid';
    }
    if ($nilai >= 85) return 'A (Sangat Baik)';
    if ($nilai >= 70) return 'B (Baik)';
    if ($nilai >= 60) return 'C (Cukup)';
    if ($nilai >= 50) return 'D (Kurang)';
    return 'E (Perlu Perbaikan)';
}

function hitungTotal(float $harga, int $jumlah): float
{
    return $harga * $jumlah;
}

function csrfToken(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        throw new RuntimeException('Session harus dimulai sebelum meminta token CSRF.');
    }
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function checkCsrf(): bool
{
    return isset($_POST['csrf_token'])
        && is_string($_POST['csrf_token'])
        && hash_equals(csrfToken(), $_POST['csrf_token']);
}

function setFlash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function takeFlash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return is_array($flash) ? $flash : null;
}

function setOldInput(array $input): void
{
    $_SESSION['old_input'] = $input;
}

function takeOldInput(): array
{
    $old = $_SESSION['old_input'] ?? [];
    unset($_SESSION['old_input']);
    return is_array($old) ? $old : [];
}

function go(string $page = 'dashboard', array $params = []): never
{
    // Tujuan redirect selalu ke index.php internal, tidak menerima URL bebas.
    header('Location: index.php?' . http_build_query(array_merge(['page' => $page], $params)), true, 303);
    exit;
}
