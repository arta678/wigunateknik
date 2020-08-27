<?php 
include '../../config/config.php';


$idtransaksi = kodetransaksi();
$tanggal = $_POST["tanggal"];
$tipetransaksi = "Out";
$idbarang = $_POST["idbarang"];
$jumlah = $_POST["jumlah"];
$harga = $_POST["harga"];


if (isset($_POST['status'])) {
	$status = "0";
	$customer = $_POST['customer'];
	$sqlTransaksi = "INSERT INTO tbtransaksi
	VALUES 
	('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null)";
	$transaksi = mysqli_query($conn, $sqlTransaksi);

	foreach ($_POST["idbarang"] as  $key => $sampah) {
		$jumlah = $_POST["jumlah"][$key];
		$harga = $_POST["harga"][$key];
		$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
		VALUES
		(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}','$customer',null)
		";
		
		$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
		kurangiStok($sampah,$jumlah);
	}
} else {
	$status = "1";
	$sqlTransaksi = "INSERT INTO tbtransaksi
	VALUES 
	('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null)";
	$transaksi = mysqli_query($conn, $sqlTransaksi);

	foreach ($_POST["idbarang"] as  $key => $sampah) {
		$jumlah = $_POST["jumlah"][$key];
		$harga = $_POST["harga"][$key];
		// $total = $_POST["total"][$key];
		$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
		VALUES
		(null,'$idtransaksi', '$sampah','$harga', '{$_POST['jumlah'][$key]}',null,null)
		";
		
		$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
		kurangiStok($sampah,$jumlah);
	}
}

if (!$transaksi) {
		echo "Gagal";
	}else{
		echo "Sukses";
	}

?>