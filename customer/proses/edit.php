<?php 
include '../../config/config.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$idcustomer =$_POST['idcustomer'];
$cari = $_POST['cari'];

$sql = "UPDATE tbcustomer SET
				nama = '$nama',
				alamat = '$alamat',
				hp = '$hp'
			  WHERE idcustomer = '$idcustomer'
			";
$berhasil = mysqli_query($conn, $sql);
if (!$berhasil) {
	header("location:".url('customer')."?edit=0");
}else{
	if ($cari !== 'nol') {
		header("location:".url('customer')."?cari=".$cari."&edit=1");
	}else{
		header("location:".url('customer')."?edit=1");
	}

}
?>