<?php 
$judul = "Dashboard";
include "../config/config.php";

$databarang = query("select * from tbbarang INNER JOIN tbkategori
    ON tbbarang.kategori = tbkategori.idkategori order by idbarang desc limit 10");

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
            <!-- <form method="post" id="formmulti" action="proses/multi.php"></form> -->
            <!-- <form method="post" id="formdownload" action="proses/download.php"></form> -->
            <!-- <form method="post" id="formdeletebarang" action="App/proses/barang/deleteBarang.php"></form> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1><strong></strong></h1>
                </div>
            </div>
            <?php include 'modalAdd.php'; ?>
            <?php include 'modalAddKategori.php'; ?>
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="panel panel-default ">
                        <div class="panel-body" style="background-color: #00794d; color: white">
                            <div class="form-group ">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" form="formaddbarangmasuk">
                            </div>
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <select class="form-control col-md-12" name="supplier" required form="formaddbarangmasuk" id="supplier">
                                    <?php 
                                    $input = "SELECT * FROM tbsuplier ";
                                    $hasil = mysqli_query($conn, $input);
                                    while ( $row = mysqli_fetch_array($hasil) ) { ?>
                                        <option value="<?= $row['idsuplier'] ?>"><?= $row['namasuplier']; ?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="jumlah">Qty</label>
                                <input type="number" class="form-control" name="jumlah[]" onclick="this.select()" id="jumlah" onKeyUp="enableButtonTambah()" >
                            </div>
                            <div class="form-group databarang">
                            </div>
                            <div class="form-group">
                                <label for="idsatuan">Satuan</label>
                                <select class="form-control col-md-12" name="idsatuan" required  id="idsatuan">
                                    <?php 
                                    $input = "SELECT * FROM tbsatuan ";
                                    $hasil = mysqli_query($conn, $input);
                                    while ( $row = mysqli_fetch_array($hasil) ) { ?>
                                        <option  value="<?= $row['idsatuan'] ?>" data-lookup="<?= $row['namasatuan']; ?>" data-namasatuan="<?=  $row['namasatuan']; ?>"><?= $row['namasatuan']; ?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="jumlah">Harga Baru</label>
                                <input type="text" class="form-control" name="modal" id="modal"   placeholder="Harga Baru">
                                
                            </div>
                            <div class="form-group " id="checkboxViewDiskon">
                                <input type="checkbox" name="tampilkanDiskon" id="tampilkanDiskon">
                                <label for="tampilkanDiskon">Discount</label>

                            </div>
                            <div class="classTampilkanDiskon">
                                <div class="form-group">
                                    <label for="diskon1">Diskon 1</label>
                                    <input type="input" class="form-control" name="diskon1" id="diskon1" value="0" >
                                </div>
                                <div class="form-group ">
                                    <label for="diskon2">Diskon 2</label>
                                    <input type="input" class="form-control" name="diskon2" id="diskon2" value="0" >
                                </div>
                            </div>


                            <audio id="song">
                                <source src="../asset/sound/popup.mp3" type="audio/mpeg">
                                </audio>
                                <div class="form-group " >
                                    <button type="button" class="btn btn-success" id="tambah" onclick="popup()" disabled style="font-size: 18px;"><strong>Input</strong>  <i class="fa fas fa-arrow-right fa-fw fa-lg"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" id="tambah" data-toggle="modal" data-target="#modalTambah" title="Tambah Data" style="font-size: 18px;"><strong>Barang</strong> <i class="fa fas fa-plus fa-fw"></i>
                                    </button>    
                                </div>
                                <div class="form-group ">
                                    <input type="checkbox" id="ppn" name="ppn" form="formaddbarangmasuk">
                                    <label for="ppn">PPN (10%)</label><br>
                                </div>
                                <div class="form-group " id="checkboxLunas">
                                    <input type="checkbox" name="lunas" id="lunas" form="formaddbarangmasuk">
                                    <label for="lunas" >LUNAS</label>
                                    
                                </div>


                                <div class="form-group ">
                                    <input type="hidden" class="form-control" name="kategori" id="kategori" disabled="" placeholder="Kategori" >
                                </div>
                                <div class="form-group ">
                                    <input type="hidden" class="form-control" name="namabarang" id="namabarang" disabled="" placeholder="Nama Barang">
                                </div>
                                
                                <div class="form-group ">
                                    <input type="hidden" class="form-control" name="stok" id="stok"  disabled="" placeholder="Stok Barang">
                                </div>
                                <div class="form-group ">

                                    <input type="hidden" class="form-control" name="harga" id="harga" disabled=""  placeholder="Harga Barang">
                                </div>
                                <div class="form-group ">

                                    <input type="hidden" class="form-control" name="satuan" id="satuan" disabled="" placeholder="Harga Barang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="proses/add.php" method="POST" id="formaddbarangmasuk"></form>
                                <table  class="table col-md-12 table-sm table-bordered  text-center"  >
                                    <thead class="text-left">
                                        <tr>   
                                            <th>Barang</th>
                                            <th>Qty</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Disc 1</th>
                                            <th>Disc 2</th>
                                            <th>Jumlah</th>
                                            <th width="10px">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody class=" text-left" id="tbody">
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success" name="simpan" form="formaddbarangmasuk"  disabled="disabled" id="simpan"><i class="fa fas fa-save" ></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../msg.php'; ?>
    <script type="text/javascript" src="../asset/plugins/jquery-3-5-1.js"></script>
    <script src="../asset/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../asset/plugins/select2/js/select2.min.js"></script> 
    <script type="text/javascript" src="../asset/scripts/shotcut.js"></script>
    <script type="text/javascript" src="../asset/scripts/resizewindows.js"></script>
    <script>
        var pop = document.getElementById("song");
        function popup(){
            pop.play();
        }

        function enableButtonTambah(){
            var i=document.getElementById("jumlah");
            var a=document.getElementById("stok");
            if(i.value==""){
                document.getElementById("tambah").disabled=true;
            }else
            document.getElementById("tambah").disabled=false;

            $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
                $(this).closest(".select2-container").siblings('select:enabled').select2('open');
            });
            $('select.select2').on('select2:closing', function (e) {
                $(e.target).data("select2").$selection.one('focus focusin', function (e) {
                    e.stopPropagation();
                });
                $('#tambah').focus();
            });
        }

        $(document).ready(function(){

            loadBarang();
            loadDataKategori();
            $('#idsatuan').val(null).trigger('change');
            $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
                $(this).closest(".select2-container").siblings('select:enabled').select2('open');
            });
            $('select.select2').on('select2:closing', function (e) {
                $(e.target).data("select2").$selection.one('focus focusin', function (e) {
                    e.stopPropagation();
                });
            });

            $('#supplier').select2({
                theme: "bootstrap",
                width: '100%',
                placeholder: 'Pilih Supplier'
            });
            $('#idsatuan').select2({
                theme: "bootstrap",
                width: '100%',
                placeholder: 'Pilih Satuan',
                matcher: matchCustom
            });
            $('#idsatuan').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                $('#satuan').val(selectedOption[0].dataset.namasatuan);
            });

            $('#modalTambah').on('shown.bs.modal', function() {
                $('#nama').focus();
            });
            $('#modalTambahKategori').on('shown.bs.modal', function() {
                $('#namakategori').focus();
            });

            function loadBarang(){
                var data = "data/barang.php";
                $('.databarang').load(data);
            };
            function loadDataKategori(){
                var data = "data/kategori.php";
                $('.datakategori').load(data);
            };

            $("#formaddbarangmasuk").submit(function(e) {
                e.preventDefault();
                var databarang = $("#formaddbarangmasuk").serialize();
                $.ajax({
                    url: "proses/add.php",
                    type: "post",
                    data: databarang,
                    success: function(data) {
                        document.forms['formaddbarangmasuk'].reset();
                        alert(data);
                        location.reload();
                    }
                });
            });

            $('#barang').change(function(){
                var selectid = $('#barang').val();
                var jumlah = $("#jumlah").val();
                if (selectid == '' || jumlah == '') {
                    $('#tambah').attr('disabled', 'disabled');
                }else{
                    $('#tambah').removeAttr('disabled');
                }

            });

            $('#barang').select2({
                placeholder: "Pilih Barang",
                theme: "bootstrap",
                width: '100%',
                matcher: matchCustom
            });

            $('#sel_kategori').select2({
                theme: "bootstrap",
                width: '100%'
            });

            $("#formaddbarang").submit(function(e) {
                e.preventDefault();
                var databarang = $("#formaddbarang").serialize();
                $.ajax({
                    url: "proses/addBarang.php",
                    type: "post",
                    data: databarang,
                    success: function(data) {
                        document.forms['formaddbarang'].reset();
                        alert(data);
                        loadBarang();
                        loadDataKategori();
                        $('#modalTambah').modal('hide');
                        $('#jumlah').focus();
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
                        loadDataKategori();
                    }
                });
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

            $('#tambah').click(function (e) {
                var id          = $("#barang").val();
                var harga       = $("#harga").val();
                var jumlah      = $("#jumlah").val();
                var idsatuan    = $("#idsatuan").val();
                var satuan      = $("#satuan").val();
                var kategori    = $("#kategori").val();
                var stok        = $("#stok").val();
                var modal        = $("#modal").val();
                var diskon1        = $("#diskon1").val();
                var diskon2        = $("#diskon2").val();

                // =E9-(E9*35/100)

                var jumlahDiskon1 = modal-((modal*diskon1)/100);
                var totalDiskon1 = jumlahDiskon1*jumlah;


                // var perkalian = jumlah*modal;
                // var 
                // var htm="<tr>";
                // htm += "<td>" + '<input type="hidden" form="formaddbarangmasuk" name="jumlah[]" value="' 
                // + $("#jumlah").val() + '">'+' <input type="hidden" name="idbarang[]" form="formaddbarangmasuk" value="' 
                // + $("#barang").val() + '">'+ $("#jumlah").val() +"</td>";
                // htm += "<td>" + '<input type="hidden">'+ $("#namabarang").val() +"</td>";
                // htm += "<td>" + '<input type="hidden" name="harga[]" form="formaddbarangmasuk" value="' + $("#modal").val() + '">'+ $("#kategori").val()+" </td>";
                // htm += "<td>" + '<input type="hidden" value="' + $("#harga").val() + '">'+ $("#stok").val() +"</td>";
                // htm += "<td>" + '<button id="del" class="btn btn-danger btn-sm">X</button>'+ "</td>";
                // htm += "</tr>";

                var htm="<tr>";
                htm += "<td>" + '<input type="hidden">'+ $("#namabarang").val() +"</td>";
                htm += "<td>" + '<input type="hidden" form="formaddbarangmasuk" name="jumlah[]" value="' 
                + $("#jumlah").val() + '">'+' <input type="hidden" name="idbarang[]" form="formaddbarangmasuk" value="' 
                + $("#barang").val() + '">'+ $("#jumlah").val() +"</td>";
                htm += "<td>" + '<input type="hidden" name="idsatuan[]" form="formaddbarangmasuk" value="' + idsatuan + '">'+ satuan+" </td>";
                htm += "<td>" + '<input type="hidden" name="harga[]" form="formaddbarangmasuk" value="' + modal + '">'+ modal+" </td>";
                htm += "<td>" + '<input type="hidden" name="diskon1[]" form="formaddbarangmasuk" value="' + diskon1 + '">'+ diskon1+" </td>";
                htm += "<td>" + '<input type="hidden" name="diskon2[]" form="formaddbarangmasuk" value="' + diskon2 + '">'+ diskon2+" </td>";
                htm += "<td>" + '<input type="hidden" value="' + $("#harga").val() + '">'+totalDiskon1+"</td>";
                htm += "<td>" + '<button id="del" class="btn btn-danger btn-sm">X</button>'+ "</td>";
                htm += "</tr>";


                $("#tbody").append(htm);
                $('#jumlah').val('');
                $('#kategori').val('');
                $('#namabarang').val('');
                $('#harga').val('');
                $('#jumlah').val('');
                $('#modal').val('');
                $('#stok').val('');
                $('#diskon1').val(0);
                $('#diskon2').val(0);
                // $(".classTampilkanDiskon").hide();
                
                // $('#tampilkanDiskon').prop('checked',false);
                
                $('#jumlah').focus();
                $('#simpan').removeAttr('disabled');
                $('#barang').val("Pilih Barang").trigger('change');
                $('#idsatuan').val(null).trigger('change');
                // $("#idsatuan").select2("val", "");
                document.getElementById("tambah").disabled=true;

            });

            $('#tbody').on('click','#del',function(e){
                $(this).parent().parent().remove();
            })


            $(".classTampilkanDiskon").hide();
            $("#tampilkanDiskon").click(function () {
                if ($(this).is(":checked")) {
                    $(".classTampilkanDiskon").show();
                } else {
                    $(".classTampilkanDiskon").hide();
                }
            });

            var hargabeliedit = document.getElementById('hargabeli');
            hargabeliedit.addEventListener('keyup', function(e){
                hargabeliedit.value = formatRupiah(this.value, '');
            });

            var hargajualedit = document.getElementById('hargajual');
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