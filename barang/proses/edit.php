<?php 
include '../../config/config.php';
$namabarang = $_POST['nama'];
$hargabeli = hapusTitik($_POST['hargabeli']);
$hargajual = hapusTitik($_POST['hargajual']);
$kategori = $_POST['kategori'];
$stokbarang =$_POST['stokbarang'];
$idbarang =$_POST['idbarang'];
$cari = $_POST['cari'];

$sql = "UPDATE tbbarang SET
				namabarang = '$namabarang',
				hargabeli = '$hargabeli',
				hargajual = '$hargajual',
				kategori = '$kategori',
				stokbarang = '$stokbarang'
			  WHERE idbarang = '$idbarang'
			";
$berhasil = mysqli_query($conn, $sql);
if (!$berhasil) {
	header("location:".url('barang')."?edit=0");
}else{
	if ($cari !== 'nol') {
		header("location:".url('barang')."?cari=".$cari."&edit=1");
	}else{
		header("location:".url('barang')."?edit=1");
	}

}
?>