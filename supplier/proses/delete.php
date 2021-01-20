<?php 
include '../../config/config.php';
$idsuplier = $_POST['idsuplier'];

$sql= "DELETE FROM tbsuplier WHERE idsuplier = '$idsuplier'";
$berhasil = mysqli_query($conn, $sql);
// if (!$berhasil) {
// 	echo "Gagal Hapus Data";
// 	// header("location: barang/?delete=0");
// }else{
// 	echo "Berhasil Hapus Data";
// 	// header("location: barang/?delete=1");
// }
?>