<?php 
include '../../config/config.php';
$namabarang = $_POST['nama'];
// $hargabeli = hapusTitik($_POST['hargabeli']) ;
// $hargajual = hapusTitik($_POST['hargajual']) ;
$kategori = $_POST['kategoriTambah'];

$sql= "INSERT INTO tbbarang values(null,'$namabarang',null,null,'$kategori',0)";
$berhasil = mysqli_query($conn, $sql);


if (!$berhasil) {
	echo json_encode("Gagal");
}else{
	echo json_encode("Berhasil");
}
?>