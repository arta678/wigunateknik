<?php 
if(isset($_POST["download"]))  { 
      $connect = mysqli_connect("localhost", "artawgn", "kopibali", "wigunateknik"); 
      header('Content-Type: text/csv; charset=utf-8'); 
      header('Content-Disposition: attachment; filename=DataBarang.csv'); 
      $output = fopen("php://output", "w"); 
      fputcsv($output, array('ID', 'BARANG', 'HARGA BELI', 'HARGA JUAL', 'KATEGORI', 'STOK')); 
      $query = "SELECT 
      tbbarang.idbarang,
      tbbarang.namabarang,
      tbbarang.hargabeli,
      tbbarang.hargajual,
      tbkategori.namakategori,
      tbbarang.stokbarang
      FROM tbbarang
      INNER JOIN tbkategori
      ON tbbarang.kategori = tbkategori.idkategori"; 
      $result = mysqli_query($connect, $query); 
      while($row = mysqli_fetch_assoc($result)) 
      { 
            fputcsv($output, $row); 
      } 
      fclose($output); 
} 
?> 