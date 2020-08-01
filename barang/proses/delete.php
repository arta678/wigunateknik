<?php 
include '../../config/config.php';
$idbarang = $_POST['idbarang'];

$sql= "DELETE FROM tbbarang WHERE idbarang = '$idbarang'";
$berhasil = mysqli_query($conn, $sql);
if (!$berhasil) {
	echo "Gagal Hapus Data";
	// header("location: barang/?delete=0");
}else{
	echo "Berhasil Hapus Data";
	// header("location: barang/?delete=1");
}
?>