<?php 
include '../../config/config.php';
$namabarang = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];

$sql= "INSERT INTO tbcustomer values(null,'$namabarang','$alamat','$hp')";
$berhasil = mysqli_query($conn, $sql);

if (!$berhasil) {
	echo json_encode("Gagal Tambah Customer");
}else{
	echo json_encode("Berhasil Tambah Customer");
}
?>