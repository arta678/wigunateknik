<?php 
include '../../config/config.php';

$idtransaksi = $_POST["idnota"];
$tanggal = $_POST["tanggal"];
$jumlahpembayaran = hapusTitik($_POST["jumlahpembayaran"]);

$query_pembayaran = " INSERT INTO tbpembayaran
VALUES
(null,'$idtransaksi','$tanggal','$jumlahpembayaran')
";


$transaksi = mysqli_query($conn,$query_pembayaran) or die ;
if (!$transaksi) {
		echo "Gagal";
	}else{
		echo "Sukses";
	}
?>