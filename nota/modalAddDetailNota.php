
<div class="modal" id="modalTambahBarangMasuk"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <form role="form" method="POST" id="formAddDetailNota"></form>
      <div class="modal-body" style="background-color: #00794d; color: white" >
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">
            <div class="form-group">
              <h5 for="jumlahbarang"><strong>Qty</strong></h5>
              <input style=" color: black; font-size: 18px;" type="number" class="form-control"  id="jumlahbarang" name="jumlahbarang" required form="formAddDetailNota">
            </div>

            <div class="form-group databarang"></div>

            <div class="form-group">
              <h5 for="hargabeli"><strong>Harga Modal</strong></h5>
              <input style="color: black; font-size: 18px;" type="text" class="form-control"  id="hargabeli" name="hargabeli" required form="formAddDetailNota">
              <input type="hidden" name="idnota" value="<?php echo $_GET["idnota"]?>" form="formAddDetailNota">
            </div>
            <div class="form-group">
              <label for="idsatuan">Satuan</label>
              <select class="form-control col-md-12" name="idsatuan" required  id="idsatuan" form="formAddDetailNota">
                <?php 
                $input = "SELECT * FROM tbsatuan ";
                $hasil = mysqli_query($conn, $input);
                while ( $row = mysqli_fetch_array($hasil) ) { ?>
                  <option  value="<?= $row['idsatuan'] ?>" data-lookup="<?= $row['namasatuan']; ?>" data-namasatuan="<?=  $row['namasatuan']; ?>"><?= $row['namasatuan']; ?></option>
                  <?php 
                }
                ?>
              </select>
            </div>

            
            <div class="form-group">
              <label for="diskon1">Diskon 1</label>
              <input type="input" class="form-control" name="diskon1" id="diskon1" value="0" form="formAddDetailNota">
            </div>
            <div class="form-group ">
              <label for="diskon2">Diskon 2</label>
              <input type="input" class="form-control" name="diskon2" id="diskon2" value="0" form="formAddDetailNota">
            </div>

            <hr>


            
            <button type="submit" class="btn btn-danger" form="formAddDetailNota">Simpan</button>
            <button type="button" data-toggle="modal" data-target="#modalAddBarang" class="btn btn-primary">Add Barang</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
