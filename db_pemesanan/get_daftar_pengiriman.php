<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

$q = mysqli_query($con, "SELECT id,tglpemesanan,jasapengiriman, namaikan,namapenerima,status,noresi FROM datapengiriman ORDER BY id DESC");

$response["pengiriman"] = array();
while ($r = mysqli_fetch_array($q)) {
    $pengiriman = array();
    $pengiriman["id"] = $r['id'];
    $pengiriman["tglpemesanan"] = $r['tglpemesanan'];
    $pengiriman["jasapengiriman"] = $r['jasapengiriman'];
    $pengiriman["namaikan"] = $r['namaikan'];
    $pengiriman["namapenerima"] = $r['namapenerima'];
    $pengiriman["status"] = $r['status'];
    $pengiriman["noresi"] = $r['noresi'];
    array_push($response["pengiriman"], $pengiriman);
}
$response["status1"] = 0;
$response["message"] = "Get list pengiriman berhasil";

echo json_encode($response);
