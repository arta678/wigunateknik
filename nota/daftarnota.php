<?php 
$judul = "Nota";
include "../config/config.php";
$namasuplier = $_GET['namasupplier'];
$databarang = query("
    SELECT tbtransaksi.tanggal as tanggal, tbtransaksi.idtransaksi as idnota, SUM((((tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100)) - (tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100))*tbdetailtransaksi.diskon2/100))*tbdetailtransaksi.jumlahbarang) as jumlah,tbtransaksi.ppn as ppn, tbtransaksi.status as status FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    INNER JOIN tbsuplier
    ON tbtransaksi.idsuplier = tbsuplier.idsuplier
    WHERE tbsuplier.namasuplier = '$namasuplier'
    AND tbtransaksi.tipetransaksi = 'In'
    GROUP BY tbtransaksi.idtransaksi
    ORDER BY tbtransaksi.idtransaksi DESC");

// $databarang = query("
//     SELECT tbtransaksi.tanggal as tanggal, tbtransaksi.idtransaksi as idnota, SUM(tbdetailtransaksi.hargabeli*tbdetailtransaksi.jumlahbarang) as jumlah, tbtransaksi.status as status FROM tbtransaksi
//     INNER JOIN tbdetailtransaksi
//     on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
//     INNER JOIN tbsuplier
//     ON tbtransaksi.idsuplier = tbsuplier.idsuplier
//     WHERE tbsuplier.namasuplier = '$namasuplier'
//     AND tbtransaksi.tipetransaksi = 'In'
//     GROUP BY tbtransaksi.idtransaksi
//     ORDER BY tbtransaksi.idtransaksi DESC");



// $total = (" SELECT tbtransaksi.tanggal as tanggal, tbtransaksi.idtransaksi as idnota, SUM((((tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100)) - (tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100))*tbdetailtransaksi.diskon2/100))*tbdetailtransaksi.jumlahbarang) as jumlah,tbtransaksi.ppn as ppn, tbtransaksi.status as status FROM tbtransaksi
    // INNER JOIN tbdetailtransaksi
    // on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    // INNER JOIN tbsuplier
    // ON tbtransaksi.idsuplier = tbsuplier.idsuplier
    // WHERE tbsuplier.namasuplier = '$namasuplier'
    // AND tbtransaksi.tipetransaksi = 'In'
    // GROUP BY tbtransaksi.idtransaksi
    // ORDER BY tbtransaksi.idtransaksi DESC ");

// $totaljumlahpembayaran= ("SELECT SUM(jumlahpembayaran) as jumlahpembayaran FROM tbpembayaran
//     WHERE tbpembayaran.idtransaksi='$idnota'");

// $totaljumlahpembayaran = mysqli_fetch_assoc(mysqli_query($conn,$totaljumlahpembayaran));
// $totaljumlahpembayaran = $totaljumlahpembayaran['jumlahpembayaran'];

// $detailpembelian = mysqli_fetch_assoc(mysqli_query($conn,$total));
// $totalpembelian = $detailpembelian['total'];
// $ppn = $detailpembelian['ppn'];
// $pajak = $totalpembelian*$ppn/100;
// $ppn = $pajak;
// $netto = $totalpembelian+$ppn; 


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
                                
                                <table class="table table-bordered  " id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-center" width="3%">No</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center" colspan="2" width="5%">Jumlah</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 18px">
                                        <?php $i = 1; ?>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr class="odd gradeX" >
                                                <td class="text-left"><?= $i?></td>
                                                <td ><strong><?= $data['tanggal'] ?></strong></td>
                                                <td class="text-right"><strong>Rp.</strong></td>
                                                <td class="text-right"><strong><?= rupiahTanpaRp(($data['jumlah'])+($data['jumlah']*$data['ppn']/100)) ?></strong></td>
                                                <td class="text-center"><strong>gambar</strong></td>

                                                 <?php 
                                                if ($data['status']==1) { ?>
                                                    <td class="text-center" style="background-color: #0A9E00; color:white;"><strong>Lunas</strong></td>
                                                <?php }else{?>
                                                    <td class="text-center" style="background-color: #FF1C1C; color:white;"><strong>Hutang</strong></td>
                                                <?php }
                                                ?>

                                                

                                                <td class="text-center" style="font-size: 18px"><a href="<?= url('nota/detailnota.php?idnota='.$data['idnota'].'')?>"><strong>Lihat </strong><i class="fas fa-arrow-right"></i></td>
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
