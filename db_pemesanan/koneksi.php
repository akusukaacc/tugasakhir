<?php
$server = isset($_SERVER['PHP_ENV']) ? $_SERVER['PHP_ENV'] : 'development';

if ($server == 'development') {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'pemesanan';
} elseif ($server == 'production') {
    $db_host = 'localhost';
    $db_user = 'cepatwis_demo';
    $db_password = 'DvC6Xk[?Z;UV';
    $db_name = 'pemesanan';
}

$con = @mysqli_connect($db_host, $db_user, $db_password) or die('<center><strong>Gagal koneksi ke server database</strong></center>');
mysqli_select_db($con, $db_name) or die('<center><strong>Database tidak ditemukan</strong></center>');
