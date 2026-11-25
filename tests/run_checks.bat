@echo off
setlocal
cd /d "%~dp0.."
echo ========================================
echo LAB9WEB - PEMERIKSAAN PROJECT
 echo ========================================
where php >nul 2>nul
if errorlevel 1 (
  echo PHP tidak ditemukan. Pastikan PHP XAMPP ada di PATH.
  echo Contoh: C:\xampp\php\php.exe
  pause
  exit /b 1
)
echo.
echo [1] Memeriksa sintaks seluruh file PHP...
for /r %%F in (*.php) do (
  php -l "%%F" || goto :failed
)
echo.
echo [2] Menjalankan pengujian helper...
php tests/check_helpers.php || goto :failed
echo.
echo [3] Menjalankan pengujian routing...
php tests/check_routes.php || goto :failed
echo.
echo Semua pemeriksaan otomatis berhasil.
echo Pengujian CRUD MySQL tetap harus dilakukan setelah database.sql diimpor.
pause
exit /b 0
:failed
echo.
echo Pemeriksaan gagal. Periksa pesan error di atas.
pause
exit /b 1
