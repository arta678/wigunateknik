<div class="modal" id="modalEdit_<?= $data['idsuplier'] ?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formeditsuplier" action="proses/edit.php">
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="supplier">Nama Supplier</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control"  id="supplier" name="supplier" autofocus  value="<?= $data['namasuplier'] ?>">
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden" class="form-control"  id="idsuplier" name="idsuplier" autofocus  value="<?= $data['idsuplier'] ?>">

            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control"  id="alamat" name="alamat"   value="<?= $data['alamat'] ?>">
            </div>
            <div class="form-group">
              <label for="hp1">Handphone 1</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="hp1" name="hp1"   value="<?= $data['hp1'] ?>">
            </div>
            <div class="form-group">
              <label for="hp2">Handphone 2</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="hp2" name="hp2"   value="<?= $data['hp2'] ?>">
            </div>
            <div class="form-group">
              <label for="bank">Bank</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control"  id="bank" name="bank"   value="<?= $data['bank'] ?>">
            </div>
            <div class="form-group">
              <label for="norekening">Nomor Rekening</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="norekening" name="norekening"   value="<?= $data['norekening'] ?>">
            </div>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>