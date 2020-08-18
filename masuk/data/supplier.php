<?php 
include '../../config/config.php';
?>
<link href="../../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<label for="supplier">Supplier</label>
<select class="form-control col-md-12" name="supplier" required form="formaddbarang" id="supplier" >
  <?php 
  $input = "SELECT * FROM tbsuplier ";
  $hasil = mysqli_query($conn, $input);
  while ( $row = mysqli_fetch_array($hasil) ) { ?>
    <option value="<?= $row['idsuplier'] ?>"><?= $row['namasuplier']; ?></option>
    <?php 
  }
  ?>
</select>
<script type="text/javascript">
  $(document).ready(function(){

    $('#supplier').select2({
      theme: "bootstrap",
      width: '100%',
      placeholder: 'Pilih Supplier'
    });

    
  });
</script>

