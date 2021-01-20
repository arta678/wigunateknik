<?php 
include '../../config/config.php';
$idtransaksi = kodetransaksi();
$tanggal = $_POST["tanggal"];
$tipetransaksi = "In";
$idbarang = $_POST["idbarang"];
$jumlah = $_POST["jumlah"];
$idsatuan = $_POST["idsatuan"];
$harga = $_POST["harga"];
$supplier = $_POST["supplier"];

if (isset($_POST['lunas'])) {
	if (isset($_POST['ppn'])) {
		$status = "1";
		$ppn = 10;
		$sqlTransaksi = "INSERT INTO tbtransaksi
		VALUES 
		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$ppn',null,'$supplier')";
		$transaksi = mysqli_query($conn, $sqlTransaksi);
		foreach ($_POST["idbarang"] as  $key => $sampah) {
			$jumlah = $_POST["jumlah"][$key];
			$harga = $_POST["harga"][$key];
			$idsatuan = $_POST["idsatuan"][$key];
			$dis1 = $_POST["diskon1"][$key];
			$dis2 = $_POST["diskon2"][$key];
			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
			VALUES
			(null,'$idtransaksi','$sampah','$harga','$jumlah','$idsatuan','$dis1','$dis2')
			";
			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
			tambahStok($sampah,$jumlah);
			ubahHargaBarang($sampah, $harga);
		}
	}else{
		$status = "1";
		$ppn = 0;
		$sqlTransaksi = "INSERT INTO tbtransaksi
		VALUES 
		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$ppn',null,'$supplier')";
		$transaksi = mysqli_query($conn, $sqlTransaksi);
		foreach ($_POST["idbarang"] as  $key => $sampah) {
			$jumlah = $_POST["jumlah"][$key];
			$harga = $_POST["harga"][$key];
			$idsatuan = $_POST["idsatuan"][$key];
			$dis1 = $_POST["diskon1"][$key];
			$dis2 = $_POST["diskon2"][$key];
			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
			VALUES
			(null,'$idtransaksi','$sampah','$harga','$jumlah','$idsatuan','$dis1','$dis2')
			";
			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
			tambahStok($sampah,$jumlah);
			ubahHargaBarang($sampah, $harga);
		}

	}
	
}else{
	if (isset($_POST['ppn'])) {
		$status = "0";
		$ppn = 10;
		$sqlTransaksi = "INSERT INTO tbtransaksi
		VALUES 
		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$ppn',null,'$supplier')";
		$transaksi = mysqli_query($conn, $sqlTransaksi);
		foreach ($_POST["idbarang"] as  $key => $sampah) {
			$jumlah = $_POST["jumlah"][$key];
			$harga = $_POST["harga"][$key];
			$idsatuan = $_POST["idsatuan"][$key];
			$dis1 = $_POST["diskon1"][$key];
			$dis2 = $_POST["diskon2"][$key];
			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
			VALUES
			(null,'$idtransaksi','$sampah','$harga','$jumlah','$idsatuan','$dis1','$dis2')
			";
			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
			tambahStok($sampah,$jumlah);
			ubahHargaBarang($sampah, $harga);
		}
	}else{
		$status = "0";
		$ppn = 0;
		$sqlTransaksi = "INSERT INTO tbtransaksi
		VALUES 
		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$ppn',null,'$supplier')";
		$transaksi = mysqli_query($conn, $sqlTransaksi);
		foreach ($_POST["idbarang"] as  $key => $sampah) {
			$jumlah = $_POST["jumlah"][$key];
			$harga = $_POST["harga"][$key];
			$idsatuan = $_POST["idsatuan"][$key];
			$dis1 = $_POST["diskon1"][$key];
			$dis2 = $_POST["diskon2"][$key];
			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
			VALUES
			(null,'$idtransaksi','$sampah','$harga','$jumlah','$idsatuan','$dis1','$dis2')
			";
			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
			tambahStok($sampah,$jumlah);
			ubahHargaBarang($sampah, $harga);
		}
	}

}

// if (isset($_POST['lunas'])) {
// 	if (isset($_POST['ppn'])) {
// 		$status = "1";
// 		$ppn = 10;
// 		$sqlTransaksi = "INSERT INTO tbtransaksi
// 		VALUES 
// 		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$diskon1','$diskon2','$diskon3','$ppn',null,'$supplier')";
// 		$transaksi = mysqli_query($conn, $sqlTransaksi);
// 		foreach ($_POST["idbarang"] as  $key => $sampah) {
// 			$jumlah = $_POST["jumlah"][$key];
// 			$harga = $_POST["harga"][$key];
// 			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
// 			VALUES
// 			(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
// 			";
// 			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
// 			tambahStok($sampah,$jumlah);
// 			ubahHargaBarang($sampah, $harga);
// 		}
// 	}else{
// 		$status = "1";
// 		$ppn = 0;
// 		$sqlTransaksi = "INSERT INTO tbtransaksi
// 		VALUES 
// 		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$diskon1','$diskon2','$diskon3','$ppn',null,'$supplier')";
// 		$transaksi = mysqli_query($conn, $sqlTransaksi);

// 		foreach ($_POST["idbarang"] as  $key => $sampah) {
// 			$jumlah = $_POST["jumlah"][$key];
// 			$harga = $_POST["harga"][$key];
// 			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
// 			VALUES
// 			(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
// 			";

// 			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
// 			tambahStok($sampah,$jumlah);
// 			ubahHargaBarang($sampah, $harga);
// 		}

// 	}
	
// } else {
// 	if (isset($_POST['ppn'])) {
// 		$status = "0";
// 		$ppn = 10;
// 		$sqlTransaksi = "INSERT INTO tbtransaksi
// 		VALUES 
// 		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$diskon1','$diskon2','$diskon3','$ppn',null,'$supplier')";
// 		$transaksi = mysqli_query($conn, $sqlTransaksi);

// 		foreach ($_POST["idbarang"] as  $key => $sampah) {
// 			$jumlah = $_POST["jumlah"][$key];
// 			$harga = $_POST["harga"][$key];
// 			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
// 			VALUES
// 			(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
// 			";
// 			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
// 			tambahStok($sampah,$jumlah);
// 			ubahHargaBarang($sampah, $harga);
// 		}
// 	}else{
// 		$status = "0";
// 		$ppn = 0;
// 		$sqlTransaksi = "INSERT INTO tbtransaksi
// 		VALUES 
// 		('$idtransaksi', '$tanggal', '$tipetransaksi','$status',null,'$diskon1','$diskon2','$diskon3','$ppn',null,'$supplier')";
// 		$transaksi = mysqli_query($conn, $sqlTransaksi);

// 		foreach ($_POST["idbarang"] as  $key => $sampah) {
// 			$jumlah = $_POST["jumlah"][$key];
// 			$harga = $_POST["harga"][$key];
// 			$query_detail_transaksi = " INSERT INTO tbdetailtransaksi
// 			VALUES
// 			(null,'$idtransaksi','$sampah','$harga','{$_POST['jumlah'][$key]}')
// 			";
// 			$berhasil =  mysqli_query($conn,$query_detail_transaksi) or die ;
// 			tambahStok($sampah,$jumlah);
// 			ubahHargaBarang($sampah, $harga);
// 		}

// 	}
// }

if (!$transaksi) {
		echo "Gagal";
	}else{
		echo "Sukses";
	}

?>