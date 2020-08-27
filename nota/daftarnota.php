<?php 
$judul = "Nota";
include "../config/config.php";
$namasuplier = $_GET['namasupplier'];
$databarang = query("
    SELECT tbtransaksi.tanggal as tanggal, tbtransaksi.idtransaksi as idnota, SUM(tbdetailtransaksi.hargabeli*tbdetailtransaksi.jumlahbarang) as jumlah, tbtransaksi.status as status FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    INNER JOIN tbsuplier
    ON tbdetailtransaksi.idsuplier = tbsuplier.idsuplier
    WHERE tbsuplier.namasuplier = '$namasuplier'
    AND tbtransaksi.tipetransaksi = 'In'
    GROUP BY tbtransaksi.idtransaksi
    ORDER BY tbtransaksi.idtransaksi DESC");

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
                            <h3><strong><?= $_GET["namasupplier"] ?></strong></h3>

                            <div class="table-responsive kontentabel">
                                
                                <table class="table table-bordered" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-left" width="3%">No</th>
                                            <th class="text-left">Tanggal</th>
                                            <th class="text-left">Jumlah</th>
                                            <th class="text-left">Foto</th>
                                            <th class="text-left">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr class="odd gradeX" style="background-color: #BFFFA5;">
                                                <td class="text-left"><?= $i?></td>
                                                <td ><strong><?= $data['tanggal'] ?></strong></td>
                                                <td class="text-left"><strong><?= rupiah($data['jumlah']) ?></strong></td>
                                                <td ><strong>gambar</strong></td>
                                                <td><a href="<?= url('nota/detailnota.php?idnota='.$data['idnota'].'')?>">Lihat</td>
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
