<?php 
include '../../config/config.php';
?>
<link href="../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<label for="barang">Pilih Barang</label>
<select  class="form-control" data-live-search="false" data-size="5" name="barang"  id="barang" title="Pilih Barang" form="formAddDetailNota">
  <?php 
  $input =    "SELECT * FROM tbbarang INNER JOIN tbkategori
  ON tbbarang.kategori = tbkategori.idkategori 
  ";
  $hasil = mysqli_query($conn, $input);

  while ( $row = mysqli_fetch_array($hasil) ) { ?>

    <option data-lookup="<?= $row['namakategori']; ?>" value="<?= $row['idbarang'] ?>"
      data-modal="<?=  $row['hargabeli']; ?>"><?= $row['namabarang']; ?></option>
      <?php 
    }
    ?>
  </select>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#barang').select2({
        placeholder: 'Pilih Barang',
        theme: "bootstrap",
        width: '100%',
        
        allowClear: true,
        dropdownParent: $('#modalTambahBarangMasuk'),
        matcher: matchCustom
      });

     $('#barang').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        $('#hargabeli').val(selectedOption[0].dataset.modal);
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

