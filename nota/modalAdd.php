<div class="modal" id="modalTambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form role="form" method="POST" id="formaddnota"></form>
                <div class="modal-body">
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group ">
                           <label for="idsuplier">Supplier</label>
                            <select class="form-control col-md-12" name="idsuplier" required form="formaddnota" id="idsuplier">
                                <?php 
                                $input = "SELECT * FROM tbsuplier ";
                                $hasil = mysqli_query($conn, $input);
                                while ( $row = mysqli_fetch_array($hasil) ) { ?>
                                  <option value="<?= $row['idsuplier'] ?>"><?= $row['namasuplier']; ?></option>
                                  <?php 
                              }
                              ?>
                          </select>
                      </div>
                        <div class="form-group">
                            <label for="foto">Foto Nota</label>
                            <input type="file" class="form-control"  id="foto" name="foto" required form="formaddnota" accept="image/*" capture>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Total</label>
                            <input class="form-control" placeholder="jumlah" id="jumlah" name="jumlah" autofocus required form="formaddnota">
                        </div>
                      <button type="submit" class="btn btn-danger" form="formaddnota">Simpan</button>
                      <button type="button" data-toggle="modal" data-target="#modalTambahKategori" class="btn btn-primary">Tambah Kategori</button>
                  </div>
              </div>
          </div>
</div>
</div>
</div>