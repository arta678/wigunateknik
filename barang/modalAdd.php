<div class="modal" id="modalTambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formaddbarang"></form>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="nama">Nama Barang</label>
              <input class="form-control" placeholder="Nama" id="nama" name="nama" autofocus required form="formaddbarang">
            </div>
            <div class="form-group">
              <label for="hargabeli">Harga Beli</label>
              <input type="text" class="form-control" placeholder="harga beli" id="hargabeli" name="hargabeli" required form="formaddbarang">
            </div>
            <div class="form-group">
              <label for="hargajual">Harga Jual</label>
              <input type="text" class="form-control" placeholder="harga jual" id="hargajual" name="hargajual" required form="formaddbarang">
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