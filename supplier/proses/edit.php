<?php 
include '../../config/config.php';
$supplier = $_POST['supplier'];
$alamat = $_POST['alamat'];
$hp1 = $_POST['hp1'];
$hp2 = $_POST['hp2'];
$bank = $_POST['bank'];
$norekening = $_POST['norekening'];
$idsuplier =$_POST['idsuplier'];
$sql = "UPDATE tbsuplier SET
namasuplier = '$supplier',
alamat = '$alamat',
hp1 = '$hp1',
hp2 = '$hp2',
bank = '$bank',
norekening = '$norekening'
WHERE idsuplier = '$idsuplier'
";
$berhasil = mysqli_query($conn, $sql);
if (!$berhasil) {
	header("location:".url('supplier')."?edit=0");
}else{
	header("location:".url('supplier')."?edit=1");
	

}
?>