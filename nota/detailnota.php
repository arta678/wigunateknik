<?php 
$judul = "Nota";
include "../config/config.php";
$idnota = $_GET["idnota"];
$databarang = query("
    SELECT
    tbdetailtransaksi.iddetailtransksi as iddetailnota,
    tbdetailtransaksi.idbarang as idbarang,
    tbtransaksi.tanggal as tanggal,
    tbbarang.namabarang as namabarang,
    tbkategori.namakategori as namakategori,
    tbdetailtransaksi.jumlahbarang as jumlah,
    tbdetailtransaksi.hargabeli as harga,
    tbdetailtransaksi.diskon1 as diskon1,
    tbdetailtransaksi.diskon2 as diskon2,
    (((tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100)) - (tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100))*tbdetailtransaksi.diskon2/100))*tbdetailtransaksi.jumlahbarang as total,
    tbsatuan.namasatuan as namasatuan,
    tbsatuan.idsatuan as idsatuan,
    tbsuplier.namasuplier as namasupplier
    FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    INNER JOIN tbsatuan
    ON tbdetailtransaksi.idsatuan = tbsatuan.idsatuan
    INNER JOIN tbbarang
    ON tbdetailtransaksi.idbarang = tbbarang.idbarang
    INNER JOIN tbkategori
    ON tbbarang.kategori = tbkategori.idkategori
    INNER JOIN tbsuplier
    ON tbtransaksi.idsuplier = tbsuplier.idsuplier
    WHERE  tbtransaksi.idtransaksi ='$idnota'");

$total = (" SELECT 
    SUM((((tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100)) - (tbdetailtransaksi.hargabeli-(tbdetailtransaksi.hargabeli*tbdetailtransaksi.diskon1/100))*tbdetailtransaksi.diskon2/100))*tbdetailtransaksi.jumlahbarang) as total, 
    tbtransaksi.ppn as ppn FROM tbtransaksi 
    INNER JOIN tbdetailtransaksi on tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi 
    WHERE tbtransaksi.idtransaksi = '$idnota' 
    GROUP BY tbtransaksi.idtransaksi ");

$totaljumlahpembayaran= ("SELECT SUM(jumlahpembayaran) as jumlahpembayaran FROM tbpembayaran
    WHERE tbpembayaran.idtransaksi='$idnota'");

$totaljumlahpembayaran = mysqli_fetch_assoc(mysqli_query($conn,$totaljumlahpembayaran));
$totaljumlahpembayaran = $totaljumlahpembayaran['jumlahpembayaran'];

$detailpembelian = mysqli_fetch_assoc(mysqli_query($conn,$total));
$totalpembelian = $detailpembelian['total'];
$ppn = $detailpembelian['ppn'];
$pajak = $totalpembelian*$ppn/100;
$ppn = $pajak;
$netto = $totalpembelian+$ppn; 
$pembayaran = query("
    SELECT * FROM tbtransaksi
    INNER JOIN tbpembayaran
    ON tbtransaksi.idtransaksi = tbpembayaran.idtransaksi
    WHERE tbtransaksi.idtransaksi = '$idnota'");
// $totalPembayaran = query("
//     SELECT SUM(tbpembayaran.jumlahpembayaran) FROM tbtransaksi
//     INNER JOIN tbpembayaran
//     ON tbtransaksi.idtransaksi = tbpembayaran.idtransaksi
//     WHERE tbtransaksi.idtransaksi = '$idnota'");


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
        <?php include 'modalAddDetailNota.php'; ?>
        <?php include 'modalAddBarang.php'; ?>
        <?php include 'modalTambahPembayaran.php'; ?>
        <?php include 'modalEditTanggalNota.php'; ?>
        <!-- <?php include 'modalLihatGambar.php'; ?> -->   
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalTambahBarangMasuk" title="Tambah Data"><i class="fa far fa-plus fa-lg"></i></button>
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalEditTanggalNota" title="Edit Data"><i class="fa far fa-edit fa-lg"></i></button>
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalTambahPembayaran" title="Tambah Pembayaran"><i class="fas fa-dollar-sign fa-lg"></i></button>
                            <button type="button" class="btn btn-light"  data-toggle="modal" data-target="#modalLihatGambar" title="Lihat Gambar"><i class="fas fa-camera-retro fa-lg"></i></button>
                            <table style="font-size: 18px" class="table">
                                <tr>
                                    <td width="150px">Nama Suplier</td>
                                    <td>: <strong><?= $databarang[0]['namasupplier']; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Order</td>
                                    <td>: <strong><?= $databarang[0]['tanggal']; ?></strong></td>
                                </tr>

                            </table>
                            <h4> <strong></strong></h4>
                            <h4><strong></strong></h4>
                            

                            <div class="table-responsive kontentabel">

                                <table class="table" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>

                                            <th class="text-left">Nama</th>
                                            <!-- <th class="text-left">Kategori</th> -->
                                            <th class="text-left" width="3%">Qty</th>
                                            <th class="text-left" >Satuan</th>
                                            <th class="text-right">Harga</th>
                                            <th class="text-right" width="3%">Dis1</th>
                                            <th class="text-right" width="3%">Dis2</th>
                                            <th class="text-right" width="150px" >Jumlah</th>
                                            <th class="text-left" width="10px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr class="odd gradeX">


                                                <td ><a href="<?= url('barang/?lihat='.$data["namabarang"].'')?>"><strong><?= $data['namabarang'] ?></strong>
                                                </a></td>
                                                <td class="text-left"><strong>
                                                    <?php
                                                    if (is_float($data['jumlah'])==true) {
                                                        echo number_format($data['jumlah'],1,",",",");
                                                    }else{
                                                        echo number_format($data['jumlah']);
                                                    } ?>
                                                </strong></td>
                                                <td class="text-left"><strong><?= $data['namasatuan']?></strong></td>
                                                <!-- <td class="text-left"><strong><?= $data['namakategori'] ?></strong></td> -->
                                                <td class="text-right"><strong><?= rupiahTanpaRp($data['harga']) ?></strong></td>
                                                <td class="text-right"><strong><?= $data['diskon1'] ?></strong></td>
                                                <td class="text-right"><strong><?= $data['diskon2'] ?></strong></td>
                                                <td class="text-right"><strong><?= rupiahTanpaRp($data['total']) ?></strong></td>
                                                <td class="text-center" data-toggle="modal" data-target="#modalEditDetailNota<?= $data['iddetailnota'] ?>"><i class="fa far fa-edit"></i></td>
                                            </tr>
                                            <?php include 'modalEditDetailNota.php'; ?>
                                        <?php endforeach; ?>
                                        <tr class="odd gradeX" >

                                            <td class="text-right" colspan="6"><strong >JUMLAH</strong></td>
                                            <td class="text-right"  style="background-color: #00794d; color: white" class="text-right"><?= rupiahTanpaRp($totalpembelian) ?></td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="text-right" colspan="6"><strong>PPN</strong></strong></td>
                                            <td class="text-right" style="background-color: #00794d; color: white"><strong><?= rupiahTanpaRp($ppn) ?></strong></td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td class="text-right" colspan="6" ><strong>TOTAL</strong></strong></td>
                                            <td class="text-right" style="background-color: #00794d; color: white; font-size: 25px"><strong><?= rupiahTanpaRp($netto) ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="table-responsive kontentabel col-lg-6" >
                                <h3><strong>Pembayaran</strong></h3>

                                <table class="table table-striped table-bordered" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-left">Tanggal</th>
                                            <th class="text-center" width="235px">Titip</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $pembayaran as $data ) : ?>
                                            <tr class="odd gradeX">
                                                <td style="background-color: #00794d; color: white;"><strong><?= $data['tanggal'] ?></td>
                                                    <td class="text-right" style="background-color: #00794d; color: white;"><?= rupiahTanpaRp($data['jumlahpembayaran']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr class="odd gradeX" >
                                                <td class="text-right">Jumlah</td>
                                                <!-- <?php if ($sisapembayaran==0) { ?> -->
                                                <td  class="text-right " style="background-color: #00794d; color: white;"><strong><?= rupiahTanpaRp($totaljumlahpembayaran) ?></strong></td>
                                        <!--  <?php }else{ ?>
                                            <td  class="text-right" style="background-color: #00794d; color: white;" >
                                                <?= rupiahTanpaRp($sisapembayaran) ?>
                                            </td>
                                            <?php } ?> -->
                                        </tr >
                                        <tr class="odd gradeX" >
                                            <td class="text-right">Yang harus dibayar</td>
                                            <td class="text-right" ><strong><?= rupiahTanpaRp($netto) ?></strong></td>
                                        </tr>
                                        <tr class="odd gradeX" >
                                            <td class="text-right" style="background-color: #00794d; color: white; font-size: 21px;"><strong>Sisa Hutang</strong></td>
                                            <td class="text-right" style="background-color: #00794d; color: white; font-size: 21px;"><strong><?php $a=$netto-$totaljumlahpembayaran; echo rupiah($a) ?></strong></td>
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
</div>
</div>
<?php include '../msg.php'; ?>
<script src="../asset/plugins/jquery-1.10.2.js"></script>
<script src="../asset/plugins/bootstrap/bootstrap.min.js"></script>
<script src="../asset/plugins/select2/js/select2.min.js"></script> 
<script type="text/javascript" src="../asset/scripts/shotcut.js"></script> 
<script type="text/javascript" src="../asset/scripts/resizewindows.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
            // focus pada modal tambahpembayaran
            $('#modalTambahPembayaran').on('shown.bs.modal', function() {
                $('#jumlahpembayaran').focus();
            });
            $('#modalTambahBarangMasuk').on('shown.bs.modal', function() {
                $('#jumlahbarang').focus();
            });

            $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
                $(this).closest(".select2-container").siblings('select:enabled').select2('open');
            });
            $('select.select2').on('select2:closing', function (e) {
                $(e.target).data("select2").$selection.one('focus focusin', function (e) {
                    e.stopPropagation();
                });
            });

            $('#idsatuan').select2({
                theme: "bootstrap",
                width: '100%',
                placeholder: 'Pilih Satuan',
                matcher: matchCustom
            });

            $('#ideditsatuan').select2({
                theme: "bootstrap",
                width: '100%',
                placeholder: 'Satuan',
                matcher: matchCustom
            });
            $('#suplier').select2({
                placeholder: 'Pilih Barang',
                theme: "bootstrap",
                width: '100%',
                allowClear: true,
                matcher: matchCustom
            });

            loadBarang();
            function loadBarang(){
                var data = "data/barang.php";
                $('.databarang').load(data);
            };

            $("#formAddDetailNota").submit(function(e) {
                e.preventDefault();
                var databarang = $("#formAddDetailNota").serialize();
                $.ajax({
                    url: "proses/add.php",
                    type: "post",
                    data: databarang,
                    success: function(data) {
                        $('#modalTambahBarangMasuk').modal('hide');
                        document.forms['formAddDetailNota'].reset();
                        alert(data);
                        location.reload();

                    }
                });
            });
            $("#formTambahPembayaran").submit(function(e) {
                e.preventDefault();
                var databarang = $("#formTambahPembayaran").serialize();
                $.ajax({
                    url: "proses/addPembayaran.php",
                    type: "post",
                    data: databarang,
                    success: function(data) {
                        $('#modalTambahPembayaran').modal('hide');
                        document.forms['formTambahPembayaran'].reset();
                        alert(data);
                        location.reload();

                    }
                });
            });

            $('#btncopy').click(function (e) {
                var jumlahuang= $("#sisapembayaran").val();
                $('#jumlahpembayaran').val(jumlahuang);
            });

            $("#formedittanggal").submit(function(e) {
                e.preventDefault();
                var databarang = $("#formedittanggal").serialize();
                $.ajax({
                    url: "proses/edittanggal.php",
                    type: "post",
                    data: databarang,
                    success: function(data) {
                        $('#modalEditTanggalNota').modal('hide');
                        document.forms['formedittanggal'].reset();
                        alert(data);
                        location.reload();

                    }
                });
            });

            $(document).on('click','#hapusDetailNota',function(e){
                e.preventDefault();
                if (confirm('Yakin Ingin Menghapus?')) {
                    $.post('proses/delete.php',
                        {iddetailnota:$(this).attr('data-iddetailnota'),
                        idbarang:$(this).attr('data-idbarang'),
                        jumlah:$(this).attr('data-jumlah')},
                        function(html){
                            location.reload();  
                        }   
                        );
                } else {
                }
            });
            function matchCustom(params, data) {
                if ($.trim(params.term) ===   '') {
                    return data;
                }

                if (typeof data.text === 'undefined') {
                    return null;
                }
                if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
                    return data;
                }

                if ($(data.element).data('lookup').toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
                    return data;
                }
                return null;
            };

            



            function formatRupiah(angka, prefix){
              var number_string = angka.replace(/[^,\d]/g, '').toString(),
              split       = number_string.split(','),
              sisa        = split[0].length % 3,
              rupiah        = split[0].substr(0, sisa),
              ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
              if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }
        var jumlahpembayaran = document.getElementById('jumlahpembayaran');
        jumlahpembayaran.addEventListener('keyup', function(e){
          jumlahpembayaran.value = formatRupiah(this.value, '');
      });

    });

</script>

</body>
</html>
