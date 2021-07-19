<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

$q = mysqli_query($con, "SELECT id,namaikan,jenisikan,harga, deskripsi,img_url,namapemesanan FROM keranjang ORDER BY id DESC");

$response["pemesanan"] = array();
while ($r = mysqli_fetch_array($q)) {
    $pemesanan = array();
    $pemesanan["id"] = $r['id'];
    $pemesanan["namaikan"] = $r['namaikan'];
    $pemesanan["jenisikan"] = $r['jenisikan'];
    $pemesanan["harga"] = $r['harga'];
    $pemesanan["deskripsi"] = $r['deskripsi'];
    $pemesanan["img_url"] = $r['img_url'];
    $pemesanan["namapemesanan"] = $r['namapemesanan'];
    array_push($response["pemesanan"], $pemesanan);
}
$response["status"] = 0;
$response["message"] = "Get list pemesanan berhasil";

echo json_encode($response);
