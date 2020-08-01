<?php 
$judul = "Dashboard";
include "../config/config.php";

$databarang = query("select * from tbcustomer");

$sql  = "SELECT COUNT(*) AS jumlah FROM tbbarang";
$jumlahBarang = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$jumlahBarang = $jumlahBarang['jumlah'];

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
            <form method="post" id="formmulti" action="proses/multi.php"></form>
            <form method="post" id="formdownload" action="proses/download.php"></form>
            <form method="post" id="formdeletebarang" action="App/proses/barang/deleteBarang.php"></form>
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        <!-- <strong>Data Barang</strong>  -->
                        <button type="button" class="btn btn-secondary btn-circle btn-lg" data-toggle="modal" data-target="#modalTambah" title="Tambah Data"><i class="fa far fa-edit"></i></button>

                        <button type="submit" class="btn btn-secondary btn-circle btn-lg" title="Hapus data yang dipilih" form="formmulti" name='but_delete' id="but_delete" onclick="return confirm('Yakin dihapus?');" disabled ><i class="fa fa-times"></i>
                        </button>
                    </h1>
                </div>
                <?php include 'modalAdd.php'; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive kontentabel">
                                <table class="table table-striped table-bordered" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th width="3%"><input type="checkbox" id="select_all" value=""  /></th>
                                            <th class="text-center">Nama Customer</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No HP</th>
                                            <!-- <th class="text-center">Stok</th> -->
                                            <!-- <th class="text-center">Kategori</th> -->
                                            <th class="text-center" width="145px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" class="checkbox"  name='delete[]' value="<?= $data['idcustomer'] ?>" form="formmulti" /></td>
                                                <td > 
                                                    <strong data-toggle="modal" data-target="#modaledit_<?= $data['idcustomer'] ?>"><?= $data['nama'] ?></strong>
                                                </td>
                                            </td>
                                            <td class="text-center"><strong><?= $data['alamat']; ?></strong></td>
                                            <td class="text-center"><?= $data['hp']?>
                                            <td class="text-center">
                                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="hapus" data-id="<?= $data['idcustomer'] ?>">Delete</button>
                                            
                                            </td>
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
        $('#modalTambah').on('shown.bs.modal', function() {
            $('#nama').focus();
        });

        $("#formaddbarang").submit(function(e) {
            e.preventDefault();
            var databarang = $("#formaddbarang").serialize();
            $.ajax({
                url: "proses/add.php",
                type: "post",
                data: databarang,
                success: function(data) {
                    $('#modalTambah').modal('hide');
                    document.forms['formaddbarang'].reset();
                    alert(data);
                    location.reload();
                }
            });
        });

$('#select_all').on('click',function(){
    if(this.checked){
        $('.checkbox').each(function(){
            this.checked = true;
        });
        $('#but_delete').removeClass('btn-secondary');
        $('#but_delete').addClass('btn-danger');
        $("#but_delete").attr("disabled", false);
        $("#but_edit").attr("disabled", false);
    }else{
        $('.checkbox').each(function(){
            this.checked = false;
        });
        $('#but_delete').removeClass('btn-danger');
        $('#but_delete').addClass('btn-secondary');
        $("#but_delete").attr("disabled", true);
        $("#but_edit").attr("disabled", true);
    }
});

$('.checkbox').on('click',function(){
    if($('.checkbox:checked').length == $('.checkbox').length){
        $('#select_all').prop('checked',true);
    }else{  
        $('#select_all').prop('checked',false);
    }
    if ($('.checkbox:checked').length >0) {
        $('#but_delete').removeClass('btn-secondary');
        $('#but_delete').addClass('btn-danger');
        $("#but_delete").attr("disabled", false);
        $("#but_edit").attr("disabled", false);
    }else{
        $('#but_delete').removeClass('btn-danger');
        $('#but_delete').addClass('btn-secondary');
        $("#but_delete").attr("disabled", true);
        $("#but_edit").attr("disabled", true);
    }
});

$(document).on('click','#hapus',function(e){
    e.preventDefault();
    if (confirm('Yakin Ingin Menghapus?')) {
        $.post('proses/delete.php',
            {idcustomer:$(this).attr('data-id')},
            function(html){
                alert('berhasil dihapus !');
                location.reload();  
            }   
            );
    } else {
        alert('Batal Menghapus!');
    }
});
});

</script>

</body>
</html>
