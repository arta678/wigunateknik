<?php 
include '../../config/config.php';
$cekbox = $_POST['delete'];
$jumlahcek = count($cekbox);
if(isset($_POST['but_delete'])){
	if(isset($cekbox)){
		if ($jumlahcek > 0) {
			foreach($_POST['delete'] as $deleteid){
				$deleteUser = "DELETE from tbbarang WHERE idbarang=".$deleteid;
				$berhasil = mysqli_query($conn,$deleteUser);
			}
			if (!$berhasil) {
				header("location: ".url('barang')."?delete=0");
			}else{
				header("location: ".url('barang')."?delete=1");
			}
		}else{
			header("location: ".url('barang')."?delete=0");
		}
	}
} 

if(isset($_POST["but_edit"])){
	if(isset($cekbox)){
		if ($jumlahcek > 0) {
			foreach($cekbox as $idbarang){
				// $deleteUser = "DELETE from tbbarang WHERE idbarang=".$idbarang;
				$sql = "UPDATE tbbarang SET
				kategori = 1
			  WHERE idbarang = '$idbarang'
			";
				$berhasil = mysqli_query($conn,$sql);
			}
			if (!$berhasil) {
				header("location:../../../databarang.php?delete=0");
			}else{
				header("location:../../../databarang.php?delete=1");
			}
		}else{
			header("location:../../../databarang.php?delete=3");
		}
	}
}
?>