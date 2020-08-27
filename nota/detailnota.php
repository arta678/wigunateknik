<?php 
$judul = "Nota";
include "../config/config.php";
$idnota = $_GET["idnota"];
$databarang = query("
    SELECT
    tbtransaksi.tanggal as tanggal,
    tbbarang.namabarang as namabarang,
    tbkategori.namakategori as namakategori,
    tbdetailtransaksi.jumlahbarang as jumlah,
    tbdetailtransaksi.hargabeli as harga,
    (tbdetailtransaksi.hargabeli*tbdetailtransaksi.jumlahbarang) as total,
    tbsuplier.namasuplier as namasupplier
    FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    INNER JOIN tbbarang
    ON tbdetailtransaksi.idbarang = tbbarang.idbarang
    INNER JOIN tbkategori
    ON tbbarang.kategori = tbkategori.idkategori
    INNER JOIN tbsuplier
    ON tbdetailtransaksi.idsuplier = tbsuplier.idsuplier
    WHERE  tbtransaksi.idtransaksi = '$idnota'");

$total = (" SELECT
    SUM(tbdetailtransaksi.hargabeli*tbdetailtransaksi.jumlahbarang) as total
    FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    WHERE  tbtransaksi.idtransaksi = '$idnota'
    GROUP BY tbtransaksi.idtransaksi");

$totalpembelian = mysqli_fetch_assoc(mysqli_query($conn,$total));
$totalpembelian = $totalpembelian['total'];

$angka = 2705000;
$diskon1 = 20;
$diskon2 = 0;
$diskon3 = 0;
$diskon4 = 0;

$a = $angka-$angka*$diskon1/100;
$b = $a-$a*$diskon2/100;
$jumSetelahDiskon = $b-$b*$diskon3/100; 


$bb = $angka - $b;
$cc = $angka - $jumSetelahDiskon;

$jumDis1 = $angka - $a;
$jumDis2 = $bb-$jumDis1;
$jumDis3 = $cc - $bb;
$ppn = $jumSetelahDiskon*0/100;
$netto = $jumSetelahDiskon+$ppn; 

$pembayaran = query("
    SELECT * FROM tbtransaksi
    INNER JOIN tbpembayaran
    ON tbtransaksi.idtransaksi = tbpembayaran.idtransaksi
    WHERE tbtransaksi.idtransaksi = '$idnota'");

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
                            <h3><strong><?= $databarang[0]['namasupplier']; ?> (<?= $databarang[0]['tanggal']; ?>)</strong></h3>
                            <h3><strong></strong></h3>

                            <div class="table-responsive kontentabel">

                                <table class="table table-bordered" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-left" width="3%">Q</th>
                                            <th class="text-left">Nama Barang</th>
                                            <!-- <th class="text-left">Kategori</th> -->
                                            <th class="text-left">Harga</th>
                                            <th class="text-left" width="200px">Jumlah</th>
                                            <!-- <th class="text-left">Detail</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr class="odd gradeX">
                                                <td class="text-left"><strong><?= $data['jumlah'] ?></strong></td>
                                                <td ><strong><?= $data['namabarang'] ?></strong></td>
                                                <!-- <td class="text-left"><strong><?= $data['namakategori'] ?></strong></td> -->
                                                <td class="text-right"><strong><?= rupiahTanpaRp($data['harga']) ?></strong></td>
                                                <td class="text-right"><strong><?= rupiahTanpaRp($data['total']) ?></strong></td>
                                            </tr>
                                        <?php endforeach; ?>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3">Jumlah</td>
                                                <td class="text-right" style="background-color: #00794d; color: white;"  class="text-right"><strong><?= rupiahTanpaRp($totalpembelian) ?></strong></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3">Discont 1 <strong>(<?= $diskon1 ?>%)</strong></td>
                                                <td class="text-right" ><strong><?= rupiahTanpaRp($jumDis1) ?></strong></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3">Discont 2 <strong>(<?= $diskon2 ?>%)</strong></td>
                                                <td class="text-right" ><strong><?= rupiahTanpaRp($jumDis2) ?></strong></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3">Discont 3 <strong>(<?= $diskon3 ?>%)</strong></td>
                                                <td class="text-right"><strong><?= rupiahTanpaRp($jumDis3) ?></strong></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3"><strong>DPP</strong></strong></td>
                                                <td class="text-right"><strong><?= rupiahTanpaRp($jumSetelahDiskon) ?></strong></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3"><strong>PPN</strong></strong></td>
                                                <td class="text-right"><strong><?= rupiahTanpaRp($ppn) ?></strong></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td class="text-right" colspan="3"><strong>NETTO</strong></strong></td>
                                                <td class="text-right" style="background-color: #00794d; color: white;"><strong><?= rupiahTanpaRp($netto) ?></strong></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3><strong>Pembayaran</strong></h3>
                            <div class="table-responsive kontentabel">

                                <table class="table table-striped table-bordered" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <!-- <th class="text-left" width="3%">No</th> -->
                                            <th class="text-left">Tanggal</th>
                                            <!-- <th class="text-left">Kategori</th> -->
                                            <th class="text-left" width="200px">Jumlah Bayar</th>
                                            <!-- <th class="text-left">Jumlah</th> -->
                                            <!-- <th class="text-left">Detail</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $pembayaran as $data ) : ?>
                                            <tr class="odd gradeX">
                                                <td ><strong><?= $data['tanggal'] ?></strong></td>
                                                <!-- <td class="text-left"><strong><?= $data['namakategori'] ?></strong></td> -->
                                                <td class="text-right"><strong><?= rupiah($data['jumlahbayar']) ?></strong></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="odd gradeX" >
                                            <td class="text-right"><strong>Sisa</strong></td>
                                            <td style="background-color: #00794d; color: white;" class="text-right"><strong><?= rupiah($data['jumlahbayar']) ?></strong></td>
                                        </td>
                                            </tr>
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
