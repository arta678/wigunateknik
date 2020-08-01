<?php 
include '../../config/config.php';
$cekbox = $_POST['delete'];
$jumlahcek = count($cekbox);
if(isset($_POST['but_delete'])){
	if(isset($cekbox)){
		if ($jumlahcek > 0) {
			foreach($_POST['delete'] as $deleteid){
				$deleteUser = "DELETE from tbcustomer WHERE idcustomer=".$deleteid;
				$berhasil = mysqli_query($conn,$deleteUser);
			}
			if (!$berhasil) {
				header("location: ".url('customer')."?delete=0");
			}else{
				header("location: ".url('customer')."?delete=1");
			}
		}else{
			header("location: ".url('customer')."?delete=0");
		}
	}
}
?>