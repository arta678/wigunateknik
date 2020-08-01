<?php 
include '../../config/config.php';
$namakategori = $_POST['namakategori'];
// $namakategori = "artawiguna";

$sql= "INSERT INTO tbkategori values(null,'$namakategori')";
$berhasil = mysqli_query($conn, $sql);

if (!$berhasil) {
	echo json_encode("Gagal Menambahkan Data");
}else{
	echo json_encode("Berhasil Menambahkan Data");
}
?>