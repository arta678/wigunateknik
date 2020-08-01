<div class="modal modalEditBarang" id="modaledit_<?= $data['idbarang'] ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" id="formeditbarang" action="proses/edit.php">
                <!-- <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
                </div> -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input class="form-control" placeholder="Nama" id="nama" name="nama"  value="<?= $data['namabarang']?>">
                                <input type="hidden"  name="idbarang" value="<?= $data['idbarang']?>">
                                <input type="hidden" name="cari" value="<?= $cari;?>">
                            </div>
                            <div class="form-group">
                                <label for="hargabeli">Harga Beli</label>
                                <input class="form-control" placeholder="harga beli" id="hargabeli" name="hargabeli" value="<?= $data['hargabeli']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="hargajual">Harga Jual</label>
                                <input class="form-control" placeholder="harga jual" id="hargajual" name="hargajual" value="<?= $data['hargajual']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="stokbarang">Stok Barang</label>
                                <input class="form-control"  id="stokbarang" name="stokbarang" value="<?= $data['stokbarang']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori" >Kategori</label>
                                <select class="form-control col-md-12" name="kategori" id="sel_kategori" value="<?= $data['kategori']?>" required>
                                    <?php 
                                    $input = "SELECT * FROM tbkategori";
                                    $hasil = mysqli_query($conn, $input);
                                    while ( $baris = mysqli_fetch_array($hasil) ) { ?>
                                        <option <?php if($data['kategori'] == $baris['idkategori'])  echo 'selected'; ?> value="<?= $baris['idkategori'] ?>" ><?= $baris['namakategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger btn-edit-barang">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>