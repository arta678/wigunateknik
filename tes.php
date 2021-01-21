<?php 
include_once 'config/config.php';

$sqlStok = "
			SELECT isisatuan as isi FROM tbsatuan
			WHERE idsatuan = '1'
			";
			$hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
			$harga =  $hasil["isi"];
			echo $harga;
 ?>

