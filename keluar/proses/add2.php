<?php 
include '../../config/config.php';


$idtransaksi = kodetransaksi();
$tanggal = $_POST["tanggal"];
$tipetransaksi = "Out";
$idbarang = $_POST["idbarang"];
$jumlah = $_POST["jumlah"];
$harga = $_POST["harga"];

if (isset($_POST['status'])) {
	$status = "hutang";
} else {
	$status = "lunas";
}


$sqlTransaksi = "INSERT INTO tbtransaksi
VALUES 
('$idtransaksi', '$tanggal', '$tipetransaksi')";
$transaksi = mysqli_query($conn, $sqlTransaksi);

foreach ($_POST["idbarang"] as  $key => $sampah) {
	$jumlah = $_POST["jumlah"][$key];
	$harga = $_POST["harga"][$key];
	$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
	VALUES
	(null,'$idtransaksi', '$sampah','$harga', '{$_POST['jumlah'][$key]}','$status')
	";
	
	$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
	tambahStok($sampah,$jumlah);
	
}
if (!$transaksi) {
		echo "Gagal";
	}else{
		echo "Sukses";
	}

?>