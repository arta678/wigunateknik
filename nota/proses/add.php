<?php 
include '../../config/config.php';
$idtransaksi = $_POST["idnota"];
$idbarang = $_POST["barang"];
$jumlah = $_POST["jumlahbarang"];
$harga = $_POST["hargabeli"];
$idsatuan = $_POST["idsatuan"];

$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
VALUES
(null,'$idtransaksi','$idbarang','$harga','$jumlah','$idsatuan','$dis1','$dis2')
";


$transaksi = mysqli_query($conn,$query_detail_transaksi) or die ;
tambahStok($idbarang,$jumlah);

if (!$transaksi) {
		echo "Gagal";
	}else{
		echo "Sukses";
	}
?>