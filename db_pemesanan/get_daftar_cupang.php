<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

$q = mysqli_query($con, "SELECT id,namaikan,jenisikan, harga,deskripsi,stock,img_url FROM dataikan ORDER BY id DESC");

$response["cupang"] = array();
while ($r = mysqli_fetch_array($q)) {
    $cupang = array();
    $cupang["id"] = $r['id'];
    $cupang["namaikan"] = $r['namaikan'];
    $cupang["jenisikan"] = $r['jenisikan'];
    $cupang["harga"] = $r['harga'];
    $cupang["deskripsi"] = $r['deskripsi'];
    $cupang["stock"] = $r['stock'];
    $cupang["img_url"] = $r['img_url'];
    array_push($response["cupang"], $cupang);
}
$response["status"] = 0;
$response["message"] = "Get list cupang berhasil";

echo json_encode($response);
