<?php 
include '../../config/config.php';
$supplier = $_POST['supplier'];
$alamat = $_POST['alamat'];
$hp1 = $_POST['hp1'];
$hp2 = $_POST['hp2'];
$bank = $_POST['bank'];
$norekening = $_POST['norekening'];

$sql= "INSERT INTO tbsuplier values(null,'$supplier','$alamat','$hp1','$hp2','$bank','$norekening')";
$berhasil = mysqli_query($conn, $sql);

if (!$berhasil) {
	echo json_encode("Gagal!");
}else{
	echo json_encode("Sukses!");
}
?>