<?php
$response = array();
include 'koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (isset($input['namapemesanan'])) {

    $namaikan = $input['namaikan'];
    $jenisikan = $input['jenisikan'];
    $harga = $input['harga'];
    $deskripsi = $input['deskripsi'];
    $img_url = $input['img_url'];
    $namapemesanan = $input['namapemesanan'];

    
        $q = "INSERT INTO keranjang(namaikan,jenisikan,harga,deskripsi,img_url,namapemesanan) VALUES ('$namaikan','$jenisikan','$harga','$deskripsi','$img_url','$namapemesanan')";
        mysqli_query($con, $q);

        $response["status"] = 0;
        $response["message"] = "Data berhasil di tambahkan";
    
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
