<?php 
$judul = "Dashboard";
include "../config/config.php";

$databarang = query("select * from tbbarang INNER JOIN tbkategori
    ON tbbarang.kategori = tbkategori.idkategori order by idbarang desc limit 10");

$sql  = "SELECT SUM(tbdetailtransaksi.totaltransaksi) as jumlahpenjualan FROM tbtransaksi
INNER JOIN tbdetailtransaksi
ON tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
INNER JOIN tbbarang
ON tbdetailtransaksi.idbarang = tbbarang.idbarang
INNER JOIN tbkategori
ON tbbarang.kategori = tbkategori.idkategori
where status = 'lunas' 
and day(tbtransaksi.tanggal) = day(now())
    and month(tbtransaksi.tanggal) = month(now())
    and year(tbtransaksi.tanggal) = year(now())";
$jumlahpenjualan = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$jumlahpenjualan = $jumlahpenjualan['jumlahpenjualan'];

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

</head>
<body>
    <div id="wrapper">
        <?php include '../sidebar.php'; ?>
        <div id="page-wrapper">
            <!-- JUDUL -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
            <!-- ALERT -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>ARTA WIGUNA </b>
                    </div>
                </div>
            </div>
            <!-- ISI DATA -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fas fas fa-search-dollar fa-3x"></i>
                        <h5>Penjualan</h5>
                        <h3><strong><?= rupiah($jumlahpenjualan) ?></strong></h3>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <i class="fa  fas fa-user-check fa-3x"></i>
                        <h5>Pagawai</h5>
                        <h3><strong><?= rupiah($jumlahpenjualan) ?></strong></h3>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fas fa-hand-holding-usd fa-3x"></i>
                        <h5>Keuntungan/Hari</h5>
                        <h3><strong><?= rupiah($jumlahpenjualan) ?></strong></h3>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b>2,000 $ </b>Payment Dues For Rejected Items
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../msg.php'; ?>
<script src="../asset/plugins/jquery-1.10.2.js"></script>
<script src="../asset/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/scripts/shotcut.js"></script> 
<script type="text/javascript" src="../asset/scripts/resizewindows.js"></script>
<script>

    $(document).ready(function(){
});

</script>

</body>
</html>
