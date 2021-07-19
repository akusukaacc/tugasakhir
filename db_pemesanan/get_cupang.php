<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

if (isset($input['id'])) {

    $id_cupang = $input['id'];

    $q = mysqli_query($con, "SELECT id,namaikan,jenisikan, harga, deskripsi, stock, img_url FROM dataikan WHERE id='$id_cupang'");
    $r = mysqli_fetch_array($q);

    $response["status"] = 0;
    $response["message"] = "Get cupang berhasil";
    $response["id"] = $r['id'];
    $response["namaikan"] = $r['namaikan'];
    $response["jenisikan"] = $r['jenisikan'];
    $response["harga"] = $r['harga'];
    $response["deskripsi"] = $r['deskripsi'];
    $response["stock"] = $r['stock'];
    $response["img_url"] = $r['img_url'];
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
