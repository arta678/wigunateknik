<?php 
include '../../config/config.php';
?>
<link href="../../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<label for="kategori">Kategori</label>
<select class="form-control col-md-12" name="kategori" required form="formaddbarang" id="kategori">
  <?php 
  $input = "SELECT * FROM tbkategori ";
  $hasil = mysqli_query($conn, $input);
  while ( $row = mysqli_fetch_array($hasil) ) { ?>
    <option value="<?= $row['idkategori'] ?>"><?= $row['namakategori']; ?></option>
    <?php 
  }
  ?>
</select>
<script type="text/javascript">
  $(document).ready(function(){

    $('#kategori').select2({
            theme: "bootstrap",
            width: '100%',
            placeholder: 'Pilih Kategori',
            allowClear: true,
            dropdownParent: $('#modalTambah')
        });

    
  });
</script>

