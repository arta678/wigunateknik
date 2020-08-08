<?php 
include '../../config/config.php';
?>
<link href="../../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<label for="barang">Barang</label>
<select class="form-control col-md-12" name="barang" required form="formaddbarang" id="barang" >
  <?php 
  $input = "SELECT * FROM tbbarang ";
  $hasil = mysqli_query($conn, $input);
  while ( $row = mysqli_fetch_array($hasil) ) { ?>
    <option value="<?= $row['idbarang'] ?>"><?= $row['namabarang']; ?></option>
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
            dropdownParent: $('#modalTambah')
        });

    
  });
</script>

