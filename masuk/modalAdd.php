<div class="modal" id="modalTambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formaddbarang"></form>
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">
            <div class="form-group">
              <h5 for="nama">Nama Barang</h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Nama" id="nama" name="nama" autofocus required form="formaddbarang">
            </div>
            <div class="form-group">
              <h5 for="hargabeli">Harga Beli</h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="text" class="form-control" placeholder="Harga beli" id="hargabeli" name="hargabeli" required form="formaddbarang">
            </div>
            <div class="form-group">
              <h5 for="hargajual">Harga Jual</h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="text" class="form-control" placeholder="Harga jual" id="hargajual" name="hargajual" required form="formaddbarang">
            </div>

            <div class="form-group datakategori">

            </div>
            <button type="submit" class="btn btn-danger" form="formaddbarang">Simpan</button>
            <button type="button" data-toggle="modal" data-target="#modalTambahKategori" class="btn btn-primary">Tambah Kategori</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>