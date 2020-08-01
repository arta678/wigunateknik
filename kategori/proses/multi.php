<?php 
include '../../config/config.php';
$cekbox = $_POST['delete'];
$jumlahcek = count($cekbox);
if(isset($_POST['but_delete'])){
	if(isset($cekbox)){
		if ($jumlahcek > 0) {
			foreach($_POST['delete'] as $deleteid){
				$deleteUser = "DELETE from tbkategori WHERE idkategori=".$deleteid;
				$berhasil = mysqli_query($conn,$deleteUser);
			}
			if (!$berhasil) {
				header("location: ".url('kategori')."?delete=0");
			}else{
				header("location: ".url('kategori')."?delete=1");
			}
		}else{
			header("location: ".url('kategori')."?delete=0");
		}
	}
} 

?>