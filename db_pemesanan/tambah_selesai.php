<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['id'])) {

    $id = $input['id'];
    $id = empty($input['id']) ? "" : $input['id'];
    $namaikan = empty($input['namaikan']) ? "" : $input['namaikan'];
    $tglpengiriman = empty($input['tglpemesanan']) ? "" : $input['tglpemesanan'];
    $jasapengiriman = empty($input['jasapengiriman']) ? "" : $input['jasapengiriman'];
    $status = empty($input['status']) ? "" : $input['status'];
    $noresi = empty($input['noresi']) ? "" : $input['noresi'];

    $q = "UPDATE datapengiriman SET
            id='$id',
			namaikan='$namaikan',
			tglpemesanan='$tglpengiriman',
			jasapengiriman='$jasapengiriman',
            status='selesai',
            noresi='$noresi'
		WHERE id='$id'";
    mysqli_query($con, $q);

    $response["status"] = 0;
    $response["message"] = "Data berhasil disimpan";
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
