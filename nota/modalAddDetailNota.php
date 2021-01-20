
<div class="modal" id="modalTambahBarangMasuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formAddDetailNota"></form>
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">

            <div class="form-group databarang"></div>

            <div class="form-group">
              <h5 for="hargabeli"><strong>Harga Modal</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="text" class="form-control"  id="hargabeli" name="hargabeli" required form="formAddDetailNota">
              <input type="hidden" name="idnota" value="<?php echo $_GET["idnota"]?>" form="formAddDetailNota">
            </div>

            <div class="form-group">
              <h5 for="jumlahbarang"><strong>Jumlah Barang</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="jumlahbarang" name="jumlahbarang" required form="formAddDetailNota">
            </div>


            
            <button type="submit" class="btn btn-success" form="formAddDetailNota">Simpan</button>
            <button type="button" data-toggle="modal" data-target="#modalAddBarang" class="btn btn-primary">Add Barang</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
