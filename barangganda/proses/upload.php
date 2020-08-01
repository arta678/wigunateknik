<?php 
include '../../config/config.php';
if(!empty($_FILES["file"]["name"])){ 
    $format_file = array("csv"); 

    $extension = explode(".", $_FILES["file"]["name"]); 
    $extension = end($extension);
    if(in_array($extension, $format_file)){ 

        $file_data = fopen($_FILES["file"]["tmp_name"], 'r'); 
        fgetcsv($file_data); 



        while($row = fgetcsv($file_data)){ 
            $namabarang = mysqli_real_escape_string($conn, $row[0]); 
            $hargabeli = mysqli_real_escape_string($conn, $row[1]); 
            $hargajual = mysqli_real_escape_string($conn, $row[2]); 
            $kategori = mysqli_real_escape_string($conn, $row[3]); 
            $id = "SELECT tbkategori.idkategori as id FROM tbkategori WHERE tbkategori.namakategori = '".$kategori."'";
            $run = mysqli_query($conn,$id);
            $data = mysqli_fetch_assoc($run);
            $idkategori = $data['id'];
             $query = "INSERT INTO tbbarang   VALUES (null,'$namabarang','$hargabeli','$hargajual','$idkategori',0)";
            $berhasil = mysqli_query($conn, $query); 
        } 
        if (!$berhasil) {
            echo "Gagal Upload File";
        }else{
            echo "Berhasil Upload File";
        }


    }else{ 
        echo 'file tidak CSV'; 
    } 
}else{ 
    echo "FILE KOSONG"; 

} 
?>