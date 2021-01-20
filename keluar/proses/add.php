<?php 
include '../../config/config.php';


$idtransaksi = kodetransaksi();
$tanggal = $_POST["tanggal"];
$tipetransaksi = "Out";
$idbarang = $_POST["idbarang"];
$jumlah = $_POST["jumlah"];
$harga = $_POST["harga"];


if (isset($_POST['cekpelanggan'])) {
	if (isset($_POST['hutang'])) {
		$status = "0";
		$customer = $_POST['customer'];
		$sqlTransaksi = "INSERT INTO tbtransaksi
		VALUES 
		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,null,null,null,null,'$customer',null)";
		$transaksi = mysqli_query($conn, $sqlTransaksi);

		foreach ($_POST["idbarang"] as  $key => $sampah) {
			$jumlah = $_POST["jumlah"][$key];
			$harga = $_POST["harga"][$key];
			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
			VALUES
			(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
			";

			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
			kurangiStok($sampah,$jumlah);
		}
	}else{
		$status = "1";
		$customer = $_POST['customer'];
		$sqlTransaksi = "INSERT INTO tbtransaksi
		VALUES 
		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,null,null,null,null,'$customer',null)";
		$transaksi = mysqli_query($conn, $sqlTransaksi);

		foreach ($_POST["idbarang"] as  $key => $sampah) {
			$jumlah = $_POST["jumlah"][$key];
			$harga = $_POST["harga"][$key];
			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
			VALUES
			(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
			";

			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
			kurangiStok($sampah,$jumlah);
		}
	}
} else {
	$status = "1";
	$sqlTransaksi = "INSERT INTO tbtransaksi
	VALUES 
	('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,null,null,null,null,null,null)";
	$transaksi = mysqli_query($conn, $sqlTransaksi);

	foreach ($_POST["idbarang"] as  $key => $sampah) {
		$jumlah = $_POST["jumlah"][$key];
		$harga = $_POST["harga"][$key];
		$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
		VALUES
		(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
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