<?php 
$judul = "Nota";
include "../config/config.php";
$databarang = query("
    SELECT  tbsuplier.namasuplier as nama, SUM(tbdetailtransaksi.hargabeli*tbdetailtransaksi.jumlahbarang) as jumlah FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    INNER JOIN tbsuplier
    ON tbtransaksi.idsuplier = tbsuplier.idsuplier
    WHERE tbtransaksi.tipetransaksi = 'In'
    GROUP BY tbsuplier.namasuplier");

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $databarang = query("select * from tbbarang INNER JOIN tbkategori
        ON tbbarang.kategori = tbkategori.idkategori where namabarang like '%".$cari."%' OR namakategori like '%".$cari."%'");
}else{
    $cari = "nol";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link href="../asset/icon/icon.png"  rel="shortcut icon" />
    <link href="../asset/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../asset/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../asset/css/style.css" rel="stylesheet" />
    <link href="../asset/css/main-style.css" rel="stylesheet" />
    <link href="../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
    <link href="../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        <?php include '../sidebar.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><strong>Daftar Nota</strong></h3>
                            <div class="table-responsive kontentabel">
                                <table class="table  table-bordered table-striped" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-center" width="3%">No</th>
                                            <th class="text-center">Nama Suplier</th>
                                            <th class="text-center">Total Hutang</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody  class="odd gradeX" style="font-size: 18px" >
                                        <?php $i = 1; ?>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i?></td>
                                                <!-- <td><a href="<?= url('nota/daftarnota.php?namasupplier='.$data["nama"].'')?>"><strong><?= $data['nama'] ?></strong></td> -->
                                                
                                                 <td ><strong><?= $data['nama'] ?></strong></td>
                                                <td class="text-left"><strong><?= rupiah($data['jumlah']) ?></strong></td>
                                                <td><a href="<?= url('nota/daftarnota.php?namasupplier='.$data["nama"].'')?>"><strong>Lihat </strong><i class="fas fa-arrow-right"></i></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../msg.php'; ?>
    <script src="../asset/plugins/jquery-1.10.2.js"></script>
    <script src="../asset/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../asset/plugins/select2/js/select2.min.js"></script> 
    <script type="text/javascript" src="../asset/scripts/shotcut.js"></script> 
    <script type="text/javascript" src="../asset/scripts/resizewindows.js"></script>

</body>
</html>
