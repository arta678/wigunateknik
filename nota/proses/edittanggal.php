<?php 
include '../../config/config.php';
// $idbarang = $_POST['idbarang'];
// $hargabeli = hapusTitik($_POST['harga']);
// $jumlah = $_POST['jumlah'];
// $harga =$_POST['harga'];
// $iddetailnota =$_POST['iddetailnota'];
// $idnota =$_POST['idnota'];
// ubahStokBarang($idbarang, $jumlah, $iddetailnota);
// ubahHargaBarang($idbarang, $harga);
// $sql = "UPDATE tbdetailtransaksi SET
// 				hargabeli = '$hargabeli',
// 				jumlahbarang = '$jumlah'
// 			  WHERE iddetailtransksi = '$iddetailnota'
// 			";
// idsuplier, tanggal, ppn




$idsuplier = $_POST['suplier'];
$tanggal = $_POST['tanggal'];
$idnota = $_POST['idnota'];

if(isset($_POST['ppn'])){
	$sqlPPN = "UPDATE tbtransaksi SET
				tanggal = '$tanggal',
				ppn = '10',
				idsuplier = '$idsuplier'
			  WHERE idtransaksi = '$idnota'
			";
}else{
	$sqlPPN = "UPDATE tbtransaksi SET
				tanggal = '$tanggal',
				ppn = '0',
				idsuplier = '$idsuplier'
			  WHERE idtransaksi = '$idnota'
			";
}
if(isset($_POST['status'])){
	$sqlStatus = "UPDATE tbtransaksi SET
				tanggal = '$tanggal',
				status = '1',
				idsuplier = '$idsuplier'
			  WHERE idtransaksi = '$idnota'
			";
}else{
	$sqlStatus = "UPDATE tbtransaksi SET
				tanggal = '$tanggal',
				status = '0',
				idsuplier = '$idsuplier'
			  WHERE idtransaksi = '$idnota'
			";
}
$berhasil = mysqli_query($conn, $sqlPPN);
$berhasil = mysqli_query($conn, $sqlStatus);

// if (!$berhasil) {
// 	header("location:".url('nota/detailnota.php')."?idnota=".$idnota."&edit=0");
// }else{
// 	header("location:".url('nota/detailnota.php')."?idnota=".$idnota."&edit=1");
// }

?>