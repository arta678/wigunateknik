<?php 
include '../../config/config.php';
$idtransaksi = $_POST["idnota"];
$idbarang = $_POST["barang"];
$jumlah = $_POST["jumlahbarang"];
// $harga = $_POST["hargabeli"];
$idsatuan = $_POST["idsatuan"];
$dis1 = $_POST["diskon1"];
$dis2 = $_POST["diskon2"];

$sqlStok = "
SELECT isisatuan as isi FROM tbsatuan
WHERE idsatuan = '".$idsatuan."'
";
$hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
$isisatuan =  $hasil["isi"];

$hargaBarangSatuan = $_POST["hargabeli"];
$harga = $hargaBarangSatuan/$isisatuan;

$diskon = $harga-($harga*$dis1/100);
$diskon = $diskon-($diskon*$dis2/100);
$harga = $diskon;

// $jumlah = $_POST["jumlah"][$key];
$jumlahBarangReal = $jumlah*$isisatuan;

$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
VALUES
(null,'$idtransaksi','$idbarang','$hargaBarangSatuan','$jumlah','$idsatuan','$dis1','$dis2')
";

$transaksi = mysqli_query($conn,$query_detail_transaksi) or die ;
// tambahStok($idbarang,$jumlah);
tambahStok($idbarang,$jumlahBarangReal);
if ($harga>0) {
	ubahHargaBarang($idbarang, $harga);
}


if (!$transaksi) {
	echo "Gagal";
}else{
	echo "Sukses";
}
?>