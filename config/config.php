<?php 
$conn = mysqli_connect("localhost", "artawgn", "kopibali", "wigunateknik");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function formatTanggal($data){
  $date=date_create($data);
  return date_format($date,"d/m/Y");
}

function url($url = null){
  $base_url = "http://192.168.1.123/wigunateknik";
  if ($url != null) {
    return $base_url."/".$url;
  }else{
    return $base_url;
  }
}

function toHuruf($data){
  $huruf = array("R","W","I","G","U","N","A","M","O","T");
  $potongan = str_split($data);
  $jumlah = strlen($data);

  for ($i=0; $i < $jumlah; $i++) { 
    echo $huruf[$potongan[$i]];
    if ($jumlah == 4) {
      if ($i== "0") {
        echo " ";
      }
    }
    if ($jumlah == 5) {
      if ($i== "1") {
        echo " ";
      }
    }
    if ($jumlah == 6) {
      if ($i== "2") {
        echo " ";
      }
    }
    if ($jumlah == 7) {
      if ($i== "0") {
        echo " ";
      }
      if ($i== "3") {
        echo " ";
      }
    }
    if ($jumlah == 8) {
      if ($i== "1") {
        echo " ";
      }
      if ($i== "4") {
        echo " ";
      }
    }
  }

}

function upload() {

  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];


  $ekstensifotoValid = ['jpg', 'jpeg', 'png'];
  $ekstensifoto = explode('.', $namaFile);
  $ekstensifoto = strtolower(end($ekstensifoto));

  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensifoto;

  move_uploaded_file($tmpName, '../nota/gambar/' . $namaFileBaru);

  return $namaFileBaru;
}




function rupiah($uang){
	$rupiah = number_format($uang,0,',','.');
	return "Rp. ".$rupiah;
}
function rupiahTanpaRp($uang){
  $rupiah = number_format($uang,0,',','.');
  return $rupiah;
}

function stringToInt($string){
	$bar = (float) $string;
	return $bar;
}
function hilangkanTitik($nilai){
   	$a= str_replace("Rp.", "", $nilai);
	$a = stringToInt($a);
	return $a;
}

function kodetransaksi(){
    global $conn;
    $query = mysqli_query($conn, "select max(idtransaksi) as id from tbtransaksi");
    $data = mysqli_fetch_assoc($query);
    $kodetransaksi = $data['id'];
    $nourut = (int)substr($kodetransaksi,3, 3);
    $nourut++;
    $char = "TR";
    $kodetransaksi = $char.sprintf("%03s", $nourut);
    return $kodetransaksi;
}

function kurangiStok($idbarang,$jumlah){
	global $conn;	
	$sqlStok = "
	SELECT stokbarang FROM tbbarang 
	WHERE idbarang ='".$idbarang."'
	";
	$hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
	$stok =  $hasil["stokbarang"];
	$stokAkhir = $stok - $jumlah;
	$sqlTambahStok = "UPDATE tbbarang SET
			stokbarang = '".$stokAkhir."'
		  WHERE idbarang = '".$idbarang."'
		";	
	mysqli_query($conn,$sqlTambahStok);	
	return $stok;

}

function tambahStok($idbarang,$jumlah){
  global $conn; 
  $sqlStok = "
  SELECT stokbarang FROM tbbarang 
  WHERE idbarang ='".$idbarang."'
  ";
  $hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
  $stok =  $hasil["stokbarang"];
  $stokAkhir = $stok + $jumlah;
  $sqlTambahStok = "UPDATE tbbarang SET
      stokbarang = '".$stokAkhir."'
      WHERE idbarang = '".$idbarang."'
    ";  
  mysqli_query($conn,$sqlTambahStok); 
  return $stok;

}



function tampilkanJumlahLama($iddetailtransaksi){
  global $conn; 
  $sqlStok = "
  SELECT jumlahbarang FROM tbdetailtransaksi 
  WHERE iddetailtransksi ='".$iddetailtransaksi."'
  ";
  $hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
  $jumlah =  $hasil["jumlahbarang"];
  return $jumlah;
}

function ubahStokBarang($idbarang,$jumlahBaru,$iddetailtransaksi){
  global $conn; 
  $jumlahlama = tampilkanJumlahLama($iddetailtransaksi);
  $jumlahbaru = $jumlahBaru;

  if ($jumlahlama > $jumlahbaru) {
    $jumlah = $jumlahlama - $jumlahbaru;
    $stoklama = tampilkanStokLama($idbarang);
    $stokbaru = $stoklama-$jumlah;
    $updateStok = "UPDATE tbbarang SET
    stokbarang = '".$stokbaru."'
    WHERE idbarang = '".$idbarang."'
    ";  
    mysqli_query($conn,$updateStok); 
    return $stokbaru;
  }else{
    $jumlah = $jumlahbaru - $jumlahlama;
    $stoklama = tampilkanStokLama($idbarang);
    $stokbaru = $stoklama+$jumlah;
    $updateStok = "UPDATE tbbarang SET
    stokbarang = '".$stokbaru."'
    WHERE idbarang = '".$idbarang."'
    ";  
    mysqli_query($conn,$updateStok); 
    return $stokbaru;

  }
  

}
function tampilkanStokLama($idbarang){
  global $conn; 
  $sqlStok = "
  SELECT stokbarang FROM tbbarang 
  WHERE idbarang ='".$idbarang."'
  ";
  $hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
  $jumlah =  $hasil["stokbarang"];
  return $jumlah;
}




function ubahHargaBarang($idbarang,$hargabaru){
  global $conn; 
  $sqlStok = "
  SELECT hargabeli FROM tbbarang 
  WHERE idbarang ='".$idbarang."'
  ";
  $hasil = mysqli_fetch_assoc(mysqli_query($conn,$sqlStok));
  $hargaLama =  $hasil["hargabeli"];

  $sqlUbahHarga = "UPDATE tbbarang SET
      hargabeli = '".$hargabaru."'
      WHERE idbarang = '".$idbarang."'
    ";  
  mysqli_query($conn,$sqlUbahHarga); 
  return $hargabaru;

}

function hapusTitik($nilai){
    $a= str_replace(".", "", $nilai);
    $a = stringToInt($a);
    return $a;
   }


?>
