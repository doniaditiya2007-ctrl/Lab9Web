@echo off
setlocal
cd /d "%~dp0"
set "MYSQL=C:\xampp\mysql\bin\mysql.exe"
if not exist "%MYSQL%" (
  echo MySQL XAMPP tidak ditemukan di:
  echo %MYSQL%
  echo Periksa lokasi instalasi XAMPP kamu.
  pause
  exit /b 1
)
echo =============================================
echo IMPORT DATABASE LAB9WEB MELALUI CMD
echo =============================================
echo Pastikan MySQL pada XAMPP Control Panel sudah Running.
echo Jika root MySQL menggunakan password, jalankan perintah manual:
echo mysql -u root -p ^< database.sql
echo.
"%MYSQL%" -u root < "%~dp0database.sql"
if errorlevel 1 (
  echo.
  echo Import gagal. Jika root MySQL memakai password, buka CMD dan jalankan:
  echo cd /d C:\xampp\mysql\bin
  echo mysql -u root -p ^< C:\xampp\htdocs\Lab9Web\database.sql
  pause
  exit /b 1
)
echo.
echo Import database selesai. Database db_lab9web dan tabel users sudah dibuat.
pause
