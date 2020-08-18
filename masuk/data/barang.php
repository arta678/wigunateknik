<?php 
include '../../config/config.php';
?>
<link href="../../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<!-- <label for="barang">Barang</label>
<select class="form-control col-md-12" name="barang" required form="formaddbarang" id="barang" >
<?php 
$input = "SELECT * FROM tbbarang ";
$hasil = mysqli_query($conn, $input);
while ( $row = mysqli_fetch_array($hasil) ) { ?>
<option value="<?= $row['idbarang'] ?>"><?= $row['namabarang']; ?></option>
<?php 
}
?>
</select> -->
<label for="barang">Pilih Barang</label>
<select  class="form-control" data-live-search="true" data-size="5" name="barang[]" required  id="barang" title="Pilih Barang">
  <?php 
  $input =    "SELECT * FROM tbbarang INNER JOIN tbkategori
  ON tbbarang.kategori = tbkategori.idkategori 
  ";
  $hasil = mysqli_query($conn, $input);

  while ( $row = mysqli_fetch_array($hasil) ) { ?>

    <option data-lookup="<?= $row['namakategori']; ?>" value="<?= $row['idbarang'] ?>" data-stok="<?=  $row['stokbarang']; ?>"  data-harga="<?=  $row['hargajual']; ?>"
      data-modal="<?=  $row['hargabeli']; ?>" data-namabarang="<?=  $row['namabarang']; ?>" data-kategori="<?=  $row['namakategori']; ?>"><?= $row['namabarang']; ?></option>
      <?php 
    }
    ?>
  </select>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#barang').select2({
        theme: "bootstrap",
        width: '100%',
        placeholder: 'Pilih Barang',
        matcher: matchCustom
      });
      $('#barang').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        $('#namabarang').val(selectedOption[0].dataset.namabarang);
        $('#stok').val(selectedOption[0].dataset.stok);
        $('#harga').val(selectedOption[0].dataset.harga);
        $('#kategori').val(selectedOption[0].dataset.kategori);
        $('#modal').val(selectedOption[0].dataset.modal);

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
      }


    });
  </script>

