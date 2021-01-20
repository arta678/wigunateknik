
<div class="modal" id="modalTambahPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formTambahPembayaran"></form>
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">

            <div class="form-group">
              <h5 for="hargabeli"><strong>Tanggal Bayar</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="date" class="form-control"  id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" form="formTambahPembayaran">
              <input type="hidden" name="idnota" value="<?php echo $_GET["idnota"]?>" form="formTambahPembayaran">
            </div>

            <div class="form-group">
              <h5 for="sisapembayaran"><strong>Sisa Pembayaran</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="text" class="form-control"  id="sisapembayaran" name="sisapembayaran" required  value="<?= rupiahTanpaRp($sisapembayaran) ?>">  
            </div>

            <div class="form-group">
              <h5 for="jumlahpembayaran"><strong>Jumlah Bayar <button onclick="functionSalin()"><i class="far fa-copy"></i> salin</button></strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="text" class="form-control"  id="jumlahpembayaran" name="jumlahpembayaran" required form="formTambahPembayaran">
            </div>

            <div class="form-group">
              <h5 for="foto"><strong>Foto Nota</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 10px;" type="file" class="form-control"  id="foto" name="foto" form="formTambahPembayaran">
            </div>


            
            <button type="submit" class="btn btn-success" form="formTambahPembayaran">Simpan Pembayaran! </button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function functionSalin() {
      $("#jumlahpembayaran").val('<?= rupiahTanpaRp($sisapembayaran) ?>');        
  }
</script>
