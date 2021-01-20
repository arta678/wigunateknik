<?php 
if(isset($_GET['tambah'])){
    if($_GET['tambah'] == 1){
        echo "<script>alert('Sukses!')</script>";
    }else{
        echo "<script>alert('Gagal!')</script>";
    }
}

if(isset($_GET['edit'])){
    if($_GET['edit'] == 1){
        echo "<script>alert('Sukses!')</script>";
    }else{
        echo "<script>alert('Gagal!')</script>";
    }
}

if(isset($_GET['delete'])){
    if($_GET['delete'] == 1){
        echo "<script>alert('Sukses!')</script>";
    }else{
        echo "<script>alert('Gagal!')</script>";
    }
}
?>