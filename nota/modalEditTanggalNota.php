
<div class="modal" id="modalEditTanggalNota"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formedittanggal"></form>
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">

            <div class="form-group datasupplier"></div>

            <div class="form-group">
              <h5 for="hargabeli"><strong>Tanggal Bayar</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="date" class="form-control"  id="tanggal" name="tanggal" value="<?= $databarang[0]['tanggal']; ?>" form="formedittanggal">

              <input type="hidden" name="idnota" value="<?php echo $_GET["idnota"]?>" form="formedittanggal">

            </div>
            <div class="form-group">
              <h5 for="Diskon1"><strong>Diskon 1</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="Diskon1"  name="Diskon1" required form="formedittanggal" value="<?= $diskon1 ?>">
            </div>
            <div class="form-group">
              <h5 for="Diskon2"><strong>Diskon 2</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="Diskon2" name="Diskon2" required form="formedittanggal" value="<?= $diskon2 ?>">
            </div>
            <div class="form-group">
              <h5 for="Diskon3"><strong>Diskon 3</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="Diskon3" name="Diskon3" required form="formedittanggal" value="<?= $diskon3 ?>">
            </div>
            <div class="form-group">
              <h5 for="Diskon3"><strong>PPN <input type="checkbox" name="lunas" id="lunas" form="formaddbarangmasuk"></strong></h5>
            </div>
            <hr>
            <button type="submit" class="btn btn-success" form="formedittanggal">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

