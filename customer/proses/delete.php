<?php 
include '../../config/config.php';
$idcustomer = $_POST['idcustomer'];

$sql= "DELETE FROM tbcustomer WHERE idcustomer = '$idcustomer'";
$berhasil = mysqli_query($conn, $sql);
if (!$berhasil) {
	echo "Gagal Hapus Data";
	// header("location: barang/?delete=0");
}else{
	echo "Berhasil Hapus Data";
	// header("location: barang/?delete=1");
}
?>