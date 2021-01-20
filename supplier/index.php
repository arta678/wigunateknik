<?php 
$judul = "Supplier";
include "../config/config.php";

$datasupplier = query("select * from tbsuplier");

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $datasupplier = query("select * from tbbarang INNER JOIN tbkategori
        ON tbbarang.kategori = tbkategori.idkategori where namakategori like '%".$cari."%'");
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
                    <h1>
                        <!-- <strong>Data Kategori</strong>  -->
                        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#modalTambahSupplier" title="Tambah Data"><i class="fa far fa-edit"></i> Add</button>
                    </h1>
                </div>
                <?php include 'modalAdd.php'; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" >
                        <div class="panel-body" >
                            <div class="table-responsive kontentabel" >
                                <table class="table table-striped table-bordered table-hover" id="tabelbarang" >
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-center" width="150px">Supplier</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">HP</th>
                                            <th class="text-center">Rekening</th>
                                            <th class="text-center" width="145px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 15px">
                                        <?php foreach( $datasupplier as $data ) : ?>
                                            <tr class="odd gradeX">
                                                <td data-toggle="modal" data-target="#modalEdit_<?= $data['idsuplier'] ?>">
                                                    <strong ><?= $data['namasuplier'] ?></strong>
                                                </td>
                                            </td>
                                            <td class="text-left"><?= $data['alamat'] ?></td>
                                            <td class="text-left"><b><?= $data['hp1'] ?></b>  <?= $data['hp2'] ?></td>
                                            <td class="text-left"><strong><?= $data['bank']?></strong> <?= $data['norekening'] ?></td>
                                            <td class="text-center"  style="color: white; background-color: #C72D30; text-align: justify-all;" id="hapus" data-id="<?= $data['idsuplier'] ?>"><strong>Hapus</strong></td>
                                        </tr>
                                        <?php include 'modalEdit.php'; ?>
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
<script>

    $(document).ready(function(){

        $('#modalTambahSupplier').on('shown.bs.modal', function() {
            $('#supplier').focus();
        });

        $("#formaddsupplier").submit(function(e) {
            e.preventDefault();
            var datasupplier = $("#formaddsupplier").serialize();
            $.ajax({
                url: "proses/add.php",
                type: "post",
                data: datasupplier,
                success: function(data) {
                    $('#modalTambahSupplier').modal('hide');
                    document.forms['formaddsupplier'].reset();
                    alert(data);
                    location.reload();
                }
            });
        });


$(document).on('click','#hapus',function(e){
    e.preventDefault();
    if (confirm('Yakin Ingin Menghapus?')) {
        $.post('proses/delete.php',
            {idsuplier:$(this).attr('data-id')},
            function(html){
                location.reload();  
            }   
            );
    } else {
    }
});

});

</script>

</body>
</html>
