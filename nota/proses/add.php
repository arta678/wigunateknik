<?php 
include '../../config/config.php';
$idsuplier = $_POST['idsuplier'];
$jumlah = $_POST['jumlah'];

$namaFile = $_FILES['foto']['name'];
$ukuranFile = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmpName = $_FILES['foto']['tmp_name'];

$ekstensifotoValid = ['jpg', 'jpeg', 'png'];
$ekstensifoto = explode('.', $namaFile);
$ekstensifoto = strtolower(end($ekstensifoto));

$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensifoto;
$foo = $namaFileBaru;

move_uploaded_file($tmpName, '../../nota/gambar/' . $namaFileBaru);
$status = '0';

$sql= "INSERT INTO tbnota values(null,'$idsuplier','$jumlah','$foo','$status')";
$berhasil = mysqli_query($conn, $sql);


if (!$berhasil) {
	echo json_encode("Gagal Menambahkan Data");
}else{
	echo json_encode($namaFile);
}
?>