<?php 
include '../../config/config.php';

$idtransaksi = $_POST["idnota"];
$tanggal = $_POST["tanggal"];
$sisapembayaran = hapusTitik($_POST["sisapembayaran"]);
$jumlahpembayaran = hapusTitik($_POST["jumlahpembayaran"]);
$query_pembayaran = " INSERT INTO tbpembayaran
VALUES
(null,'$idtransaksi','$tanggal','$jumlahpembayaran')
";

$transaksi = mysqli_query($conn,$query_pembayaran) or die ;

if ($jumlahpembayaran==$sisapembayaran) {
	$sqlUbahSatatus = "UPDATE tbtransaksi SET
	status = '1'
	WHERE idtransaksi = '$idtransaksi'
	";
	$berhasil = mysqli_query($conn, $sqlUbahSatatus);	
}

if (!$transaksi) {
	echo "Gagal";
}else{
	echo "Sukses";
}
?>