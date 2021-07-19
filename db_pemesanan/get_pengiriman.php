<?php
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

if (isset($input['id'])) {

    $id = $input['id'];

    $q = mysqli_query($con, "SELECT id,tglpemesanan, jasapengiriman, namaikan, noresi, status FROM datapengiriman WHERE id='$id'");
    $r = mysqli_fetch_array($q);

    $response["status1"] = 0;
    $response["message"] = "Get cupang berhasil";
    $response["id"] = $r['id'];
    $response["namaikan"] = $r['namaikan'];
    $response["tglpemesanan"] = $r['tglpemesanan'];
    $response["jasapengiriman"] = $r['jasapengiriman'];
    $response["noresi"] = $r['noresi'];
    $response["status"] = $r['status'];
} else {
    $response["status1"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
