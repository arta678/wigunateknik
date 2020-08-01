<?php 
include '../../config/config.php';
$namakategori = $_POST['namakategori'];
$idkategori = $_POST['idkategori'];

$sql = "UPDATE tbkategori SET
				namakategori = '$namakategori'
			  WHERE idkategori = '$idkategori'
			";
$berhasil = mysqli_query($conn, $sql);
if (!$berhasil) {
	header("location:".url('kategori')."?edit=0");
	// echo "Gagal";
}else{
		header("location:".url('kategori')."?edit=1");
	// echo "Berhasil";
}
?>