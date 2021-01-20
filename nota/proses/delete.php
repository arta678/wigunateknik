<?php 
include '../../config/config.php';
$iddetailnota = $_POST['iddetailnota'];
$idbarang = $_POST['idbarang'];
$jumlah = $_POST['jumlah'];

$sql= "DELETE FROM tbdetailtransaksi WHERE tbdetailtransaksi.iddetailtransksi = '$iddetailnota'";
$berhasil = mysqli_query($conn, $sql);
kurangiStok($idbarang,$jumlah);

if (!$berhasil) {
	header("location:".url('nota/detailnota.php')."?idnota=".$idnota."&edit=0");
}else{
	header("location:".url('nota/detailnota.php')."?idnota=".$idnota."&edit=1");
}
?>