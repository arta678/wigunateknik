<?php 
include '../../config/config.php';
?>
<link href="../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<label for="suplier">Suplier</label>
<!-- <select  class="form-control" data-live-search="false" data-size="5" name="suplier"  id="suplier" title="Pilih Supplier" form="formedittanggal">
  <?php 
  $input =    "SELECT * FROM tbsuplier";
  $hasil = mysqli_query($conn, $input);

  while ( $row = mysqli_fetch_array($hasil) ) { ?>

    <option data-lookup="<?= $row['namasuplier']; ?>" value="<?= $row['idsuplier'] ?>"><?= $row['namasuplier']; ?></option>
      <?php 
    }
    ?>
  </select> -->


  <select  class="form-control" data-live-search="false" data-size="5" name="suplier"  id="suplier" title="Pilih Supplier" form="formedittanggal">
    <?php 
    $input = "SELECT * FROM tbsuplier";
    $hasil = mysqli_query($conn, $input);
    while ( $baris = mysqli_fetch_array($hasil) ) { ?>
      <option <?php if($databarang[0]['namasupplier'] == $baris['namasupplier'])  echo 'selected'; ?> value="<?= $baris['idsuplier'] ?>" ><?= $baris['namasuplier']; ?></option>
    <?php } ?>
  </select>


  <script type="text/javascript">
    $(document).ready(function(){

      $('#suplier').select2({
        placeholder: 'Pilih Barang',
        theme: "bootstrap",
        width: '100%',
        allowClear: true,
        matcher: matchCustom
      });

      // untuk mencari berdasarkan kategori
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
      }


    });
  </script>

