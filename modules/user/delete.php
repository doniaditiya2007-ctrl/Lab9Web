<?php
// Pemrosesan penghapusan dilakukan oleh process.php.
// File ini sengaja tidak bisa diakses sebagai halaman GET.
http_response_code(405);
header('Allow: POST');
exit('Penghapusan harus menggunakan formulir POST melalui index.php?page=user/delete.');
