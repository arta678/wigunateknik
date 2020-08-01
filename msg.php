<?php 
if(isset($_GET['tambah'])){
    if($_GET['tambah'] == 1){
        echo "<script>alert('Berhasil Tambah Data')</script>";
    }else{
        echo "<script>alert('Berhasil Tambah Data')</script>";
    }
}

if(isset($_GET['edit'])){
    if($_GET['edit'] == 1){
        echo "<script>alert('Berhasil Edit Data')</script>";
    }else{
        echo "<script>alert('Gagal Edit Data')</script>";
    }
}

if(isset($_GET['delete'])){
    if($_GET['delete'] == 1){
        echo "<script>alert('Berhasil Hapus Data')</script>";
    }else{
        echo "<script>alert('Gagal Hapus Data')</script>";
    }
}
?>