<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
}else{
    $cari = "nol";
} 
?>
<div class="modal modalEditBarang" id="modaledit_<?= $data['idbarang'] ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" id="formeditbarang" action="proses/edit.php">
                <div class="modal-body">
                    <div class="row" style="font-weight: bold;">
                        <div class="col-lg-12">
                            <div class="form-group" >
                                <h5 for="nama">Nama Barang</h5>
                                <input style="background-color: #CBCBCB; color: black; font-size: 18px;"  class="form-control" placeholder="Nama" id="nama" name="nama" value="<?= $data['namabarang']?>">
                                <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden"  name="idbarang" value="<?= $data['idbarang']?>">
                                <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden" name="cari" value="<?= $cari;?>">
                            </div>
                            <div class="form-group">
                                <h5 for="hargabeli">Harga Beli</h5>
                                <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Harga Beli" id="hargabeliedit" name="hargabeli" value="<?= rupiahTanpaRp($data['hargabeli'])?>" required>
                            </div>
                            <div class="form-group">
                                <h5 for="hargajual">Harga Jual</h5>
                                <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Harga Jual" id="hargajualedit" name="hargajual" value="<?= rupiahTanpaRp($data['hargajual'])?>" required>
                            </div>
                            <div class="form-group">
                                <h5 for="stokbarang">Stok Barang</h5>
                                <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="number" class="form-control"  id="stokbarang" name="stokbarang" value="<?= $data['stokbarang']?>" required>
                            </div>
                            <div class="form-group">
                                <h5 for="kategori" >Kategori</h5>
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