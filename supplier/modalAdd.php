<div class="modal" id="modalTambahSupplier"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formaddsupplier"></form>
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="supplier">Nama Supplier</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control"  id="supplier" name="supplier" autofocus form="formaddsupplier" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control"  id="alamat" name="alamat"  form="formaddsupplier" required>
            </div>
            <div class="form-group">
              <label for="hp1">Handphone 1</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="hp1" name="hp1"  form="formaddsupplier" >
            </div>
            <div class="form-group">
              <label for="hp2">Handphone 2</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="hp2" name="hp2"  form="formaddsupplier" >
            </div>
            <div class="form-group">
              <label for="bank">Bank</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control"  id="bank" name="bank"  form="formaddsupplier" >
            </div>
            <div class="form-group">
              <label for="norekening">Nomor Rekening</label>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="norekening" name="norekening"  form="formaddsupplier" >
            </div>
            <button type="submit" class="btn btn-danger" form="formaddsupplier">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>