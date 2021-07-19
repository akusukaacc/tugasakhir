<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

if (isset($input['username']) && isset($input['password'])) {

    $username = $input['username'];
    $str = $input['password'];
    $p = sha1($str);

    $q = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$p'");
    if (mysqli_num_rows($q) == 0) {
        $response["status"] = 1;
        $response["message"] = "Username dan Password salah";
    } else {
        $r = mysqli_fetch_array($q);
        $response["status"] = 0;
        $response["message"] = "Login berhasil";
        $response["id"] = $r['id'];
        $response["nama"] = $r['nama'];
        $response["role"] = $r['role'];
        $response["username"] = $r['username'];
    }
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);