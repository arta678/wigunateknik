<?php 
include '../../config/config.php';
$idkategori = $_POST['idkategori'];

$sql= "DELETE FROM tbkategori WHERE idkategori = '$idkategori'";
$berhasil = mysqli_query($conn, $sql);
// if (!$berhasil) {
// 	echo "Gagal Hapus Data";
// 	// header("location: barang/?delete=0");
// }else{
// 	echo "Berhasil Hapus Data";
// 	// header("location: barang/?delete=1");
// }
?>