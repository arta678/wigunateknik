<?php 
include '../../config/config.php';
$namabarang = $_POST['nama'];
$hargabeli = hapusTitik($_POST['hargabeli']) ;
$hargajual = hapusTitik($_POST['hargajual']) ;
$kategori = $_POST['kategoriTambah'];

$sql= "INSERT INTO tbbarang values(null,'$namabarang','$hargabeli','$hargajual','$kategori',0)";
$berhasil = mysqli_query($conn, $sql);


if (!$berhasil) {
	echo json_encode("Gagal Menambahkan Data");
}else{
	echo json_encode("Berhasil Menambahkan Data");
}
?>