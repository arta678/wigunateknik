<?php 
include '../../config/config.php';


$idtransaksi = kodetransaksi();
$tanggal = $_POST["tanggal"];
$tipetransaksi = "In";
$idbarang = $_POST["idbarang"];
$jumlah = $_POST["jumlah"];
$harga = $_POST["harga"];
$supplier = $_POST["supplier"];


if (isset($_POST['status'])) {
	$status = "1";
	$sqlTransaksi = "INSERT INTO tbtransaksi
	VALUES 
	('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null)";
	$transaksi = mysqli_query($conn, $sqlTransaksi);

	foreach ($_POST["idbarang"] as  $key => $sampah) {
		$jumlah = $_POST["jumlah"][$key];
		$harga = $_POST["harga"][$key];
		$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
		VALUES
		(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}',null,'$supplier')
		";
		
		$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
		tambahStok($sampah,$jumlah);
	}
} else {
	$status = "0";
	$sqlTransaksi = "INSERT INTO tbtransaksi
	VALUES 
	('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null)";
	$transaksi = mysqli_query($conn, $sqlTransaksi);

	foreach ($_POST["idbarang"] as  $key => $sampah) {
		$jumlah = $_POST["jumlah"][$key];
		$harga = $_POST["harga"][$key];
		$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
		VALUES
		(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}',null,'$supplier')
		";
		
		$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
		tambahStok($sampah,$jumlah);
	}
}

if (!$transaksi) {
		echo "Gagal";
	}else{
		echo "Sukses";
	}

?>