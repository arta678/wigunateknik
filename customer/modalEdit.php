<div class="modal modalEditBarang" id="modaledit_<?= $data['idcustomer'] ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" id="formeditbarang" action="proses/edit.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama Customer</label>
                                <input class="form-control" placeholder="Nama" id="nama" name="nama"  value="<?= $data['nama']?>">
                                <input type="hidden"  name="idcustomer" value="<?= $data['idcustomer']?>">
                                <input type="hidden" name="cari" value="<?= $cari;?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input class="form-control" placeholder="harga beli" id="alamat" name="alamat" value="<?= $data['alamat']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="hp">Hp</label>
                                <input class="form-control" placeholder="harga jual" id="hp" name="hp" value="<?= $data['hp']?>" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-edit-barang">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>