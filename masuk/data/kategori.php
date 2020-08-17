 <?php 
include '../../config/config.php';
?>
<link href="../../asset/plugins/select2/css/select2.min.css" rel="stylesheet" > 
<link href="../../asset/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet">

<label for="kategoriTambah">Kategori</label>
<select class="form-control col-md-12" name="kategoriTambah" required form="formaddbarang" id="kategoriTambah">
  <?php 
  $input = "SELECT * FROM tbkategori ";
  $hasil = mysqli_query($conn, $input);
  while ( $row = mysqli_fetch_array($hasil) ) { ?>
    <option value="<?= $row['idkategori'] ?>"><?= $row['namakategori']; ?></option>
  <?php } ?>
</select>
<script type="text/javascript">
  $(document).ready(function(){

    $('#kategoriTambah').select2({
            theme: "bootstrap",
            width: '100%',
            placeholder: 'Pilih Kategori'
        });

    
  });
</script>
