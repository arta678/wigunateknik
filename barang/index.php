<?php 
$judul = "Dashboard";
include "../config/config.php";

$databarang = query("select * from tbbarang INNER JOIN tbkategori
    ON tbbarang.kategori = tbkategori.idkategori order by idbarang desc limit 10");

$sql  = "SELECT COUNT(*) AS jumlah FROM tbbarang";
$jumlahBarang = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$jumlahBarang = $jumlahBarang['jumlah'];
$cari = "cari";
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $databarang = query("select * from tbbarang INNER JOIN tbkategori
        ON tbbarang.kategori = tbkategori.idkategori where namabarang like '%".$cari."%' OR namakategori like '%".$cari."%'");
}else{
    $cari = "nol";
}

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
    $databarang = query("select * from tbbarang INNER JOIN tbkategori
        ON tbbarang.kategori = tbkategori.idkategori where namakategori ='".$filter."'
        ORDER by tbbarang.namabarang asc");
}else{
    $cari = "nol";
}
if(isset($_GET['lihat'])){
    $lihat = $_GET['lihat'];
    $databarang = query("select * from tbbarang 
    where namabarang ='".$lihat."'");
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
                        <button type="button" class="btn btn-default  btn-lg" data-toggle="modal" data-target="#modalTambah" title="Tambah Data"><i class="fa far fa-edit"></i> Add</button>

                        <button type="button" class="btn btn-default  btn-lg" data-toggle="modal" data-target="#modalUpload"  title="Upload File CVS"><i class="fa fa-upload"></i> Upload</button>

                        <button type="submit" class="btn btn-default  btn-lg" form="formdownload" title="Download File CSV" name="download"><i class="fa fa-download"></i> Download</button>

                        <button type="submit" class="btn btn-default  btn-lg" title="Hapus data yang dipilih" form="formmulti" name='but_delete' id="but_delete" onclick="return confirm('Yakin dihapus?');" disabled ><i class="fa fa-times"></i> Delete 
                        </button>

                        <a href="../kategori/"><button type="button" class="btn btn-default  btn-lg" title="Cek Data Ganda"><i class="fa fas fa-copy"></i>
                        </button></a>
                    </h1>
                </div>
                <?php include 'modalAdd.php'; ?>
                <?php include 'modalAddKategori.php'; ?>
                <?php include 'modalUpload.php'; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive kontentabel">
                                <table class="table table-striped " id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th width="3%"><input type="checkbox" id="select_all" value=""  /></th>
                                            <th class="text-center" width="200px">Barang</th>
                                            <th class="text-center">Harga Jual</th>
                                            <th class="text-center">Kode</th>
                                            <th class="text-center">Stok</th>
                                            <!-- <th class="text-center">Kategori</th> -->
                                            <th class="text-center" width="50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach( $databarang as $data ) : ?>

                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" class="checkbox"  name='delete[]' value="<?= $data['idbarang'] ?>" form="formmulti" /></td>
                                                <td data-toggle="modal" data-target="#modaledit_<?= $data['idbarang'] ?>"> 
                                                    <strong ><?= $data['namabarang'] ?></strong>
                                                </td>
                                            </td>
                                            <td class="text-right"><strong><?= rupiahTanpaRp($data['hargajual']) ?></strong></td>
                                            <td class="text-center"><?= toHuruf($data['hargabeli'])?>
                                            <td class="text-center"><strong><?= $data['stokbarang'] ?></strong></td>
                                            
                                            <td class="text-center" style="color: white; background-color: #C72D30; text-align: justify-all;" id="hapus" data-id="<?= $data['idbarang'] ?>"><strong>Hapus</strong></td>
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
        loadDataKategori();
        $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
            $(this).closest(".select2-container").siblings('select:enabled').select2('open');
        });
        $('select.select2').on('select2:closing', function (e) {
            $(e.target).data("select2").$selection.one('focus focusin', function (e) {
                e.stopPropagation();
            });
        });

        $('#modalTambah').on('shown.bs.modal', function() {
            $('#nama').focus();
        });
        $('#modalTambahKategori').on('shown.bs.modal', function() {
            $('#namakategori').focus();
        });

        $('#kategori').select2({
            theme: "bootstrap",
            width: '100%',
            placeholder: 'Pilih Kategori',
            allowClear: true,
            dropdownParent: $('#modalTambah')
        });


        function loadDataKategori(){
            var data = "data/kategori.php";
            $('.datakategori').load(data);
        };

        $('#sel_kategori').select2({
            theme: "bootstrap",
            width: '100%'
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
                    // location.reload();
                    window.location.href = "../barang/";

                }
            });
        });
         $("#formaddkategori").submit(function(e) {
            e.preventDefault();
            var databarang = $("#formaddkategori").serialize();
            $.ajax({
                url: "../kategori/proses/add.php",
                type: "post",
                data: databarang,
                success: function(data) {
                    $('#modalTambahKategori').modal('hide');
                    document.forms['formaddkategori'].reset();
                    alert(data);
                    // location.reload();
                    loadDataKategori();
                }
            });
        });

$("form#formuploaddata").submit(function(e) {
    e.preventDefault();
    var databarang = new FormData(this);
    $.ajax({
        url: "proses/upload.php",
        type: "POST",
        data:  databarang,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            $('#modalUpload').modal('hide');
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
            {idbarang:$(this).attr('data-id')},
            function(html){
                alert('berhasil dihapus !');
                location.reload();  
            }   
            );
    } else {
    }
});

    // TAMBAH
    var hargabeli = document.getElementById('hargabeli');
    hargabeli.addEventListener('keyup', function(e){
      hargabeli.value = formatRupiah(this.value, '');
    });

    var hargajual = document.getElementById('hargajual');
    hargajual.addEventListener('keyup', function(e){
      hargajual.value = formatRupiah(this.value, '');
    });


    // EDIT
    var hargabeliedit = document.getElementById('hargabeliedit');
    hargabeliedit.addEventListener('keyup', function(e){
      hargabeliedit.value = formatRupiah(this.value, '');
    });

    var hargajualedit = document.getElementById('hargajualedit');
    hargajualedit.addEventListener('keyup', function(e){
      hargajualedit.value = formatRupiah(this.value, '');
    });

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

});

</script>

</body>
</html>
