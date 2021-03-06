<?php 
$judul = "Dashboard";
include "../config/config.php";

$databarang = query("SELECT * FROM tbtransaksi
    INNER JOIN tbdetailtransaksi
    ON tbtransaksi.idtransaksi = tbdetailtransaksi.idtransaksi
    INNER JOIN tbbarang
    ON tbdetailtransaksi.idbarang = tbbarang.idbarang
    INNER JOIN tbkategori
    ON tbbarang.kategori = tbkategori.idkategori
    INNER JOIN tbsatuan
    ON tbdetailtransaksi.idsatuan = tbsatuan.idsatuan
    WHERE day(tbtransaksi.tanggal) = day(now())
    and month(tbtransaksi.tanggal) = month(now())
    and year(tbtransaksi.tanggal) = year(now())
    order by tbtransaksi.idtransaksi desc
    ");

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
                    <h1></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive kontentabel">
                                <table class="table table-striped table-bordered" id="tabelbarang">
                                    <thead style="background-color: #00794d; color: white;">
                                        <tr>
                                            <th class="text-center" width="10%">Date</th>
                                            <th class="text-center" width="40px"></th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Name Item</th>
                                            <!-- <th class="text-center">Price</th> -->
                                            <th class="text-center">Category</th>
                                            <!-- <th class="text-center" width="145px">Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $databarang as $data ) : ?>
                                            <tr class="odd gradeX">
                                                <td class="text-center"><strong><?= formatTanggal($data['tanggal']); ?></strong>
                                                </td>
                                                <?php 
                                                if ($data['tipetransaksi']=='Out') { ?>
                                                    <td class="text-center" style="background-color: #ffccc2 "><strong><?= $data['tipetransaksi']; ?></strong>
                                                    </td>
                                                <?php }else{?>
                                                    <td class="text-center" style="background-color: #aef5c1"><strong><?= $data['tipetransaksi']; ?></strong>
                                                    </td>
                                                <?php }
                                                ?>
                                                <td class="text-center"><strong><?= $data['jumlahbarang']; ?></strong>
                                                </td>
                                                <td class="text-center"><strong><?= $data['namasatuan']; ?></strong>
                                                </td>
                                                <td class="text-center"><strong><a href="<?= url('barang/?cari='.$data["namabarang"].'')?>"><?= $data['namabarang'] ?>
                                            </a></strong>
                                        </td>
                                       <!--  <td class="text-right"><strong><?= rupiahTanpaRp($data['hargajual']) ?></strong>
                                        </td> -->
                                        <td class="text-center"><strong><?= $data['namakategori'] ?></strong>
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
                    location.reload();
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
                alert('Batal Menghapus!');
            }
        });
    });

</script>

</body>
</html>
