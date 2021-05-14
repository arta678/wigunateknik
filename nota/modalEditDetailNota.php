<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
}else{
    $cari = "nol";
} 
?>
<div class="modal modalEditDetailNota" id="modalEditDetailNota<?= $data['iddetailnota'] ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" id="formEditDetailNota" action="proses/edit.php"></form>
            <div class="modal-body">
                <div class="row" style="font-weight: bold;">
                    <div class="col-lg-12">
                        <div class="form-group" >
                            <h5 for="nama">Nama Barang</h5>
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;"  class="form-control" placeholder="Nama" id="nama" name="nama" disabled value="<?= $data['namabarang']?>" form="formEditDetailNota">
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden"  name="iddetailnota" value="<?= $data['iddetailnota']?>" form="formEditDetailNota">
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden" name="cari" value="<?= $cari;?>" form="formEditDetailNota">
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden" name="idnota" value="<?= $idnota;?>" form="formEditDetailNota">
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="hidden" name="idbarang" value="<?= $data['idbarang'];?>" form="formEditDetailNota">
                        </div>
                        <div class="form-group">
                            <h5 for="hargabeli"><strong>Qty</strong></h5>
                            
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Harga Beli" id="jumlah" name="jumlah" value="<?= number_format($data['jumlah'])?>" required form="formEditDetailNota">
                        </div>
                        <div class="form-group">
                            <h5 for="harga"><strong>Harga Modal</strong></h5>
                            <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Harga Jual" id="harga" name="harga" value="<?= rupiahTanpaRp($data['harga'])?>" required form="formEditDetailNota">
                        </div>
                        <div class="form-group">
                          <label for="idsatuan">Satuan</label>
                          <select class="form-control col-md-12" name="ideditsatuan" required  id="ideditsatuan" form="formEditDetailNota">
                            <?php 
                            $input = "SELECT * FROM tbsatuan ";
                            $hasil = mysqli_query($conn, $input);
                            while ( $row = mysqli_fetch_array($hasil) ) { ?>

                                <option <?php if($data['idsatuan'] == $row['idsatuan'])  echo 'selected'; ?> value="<?= $row['idsatuan'] ?>" ><?= $row['namasatuan']; ?></option>

                            <!--   <option   value="<?= $row['idsatuan'] ?>" data-lookup="<?= $row['namasatuan']; ?>" data-namasatuan="<?=  $row['namasatuan']; ?>"><?= $row['namasatuan']; ?></option> -->


                            <?php 
                          }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <h5 for="hargabeli"><strong>Diskon 1</strong></h5>
                    <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Harga Beli" id="diskon1" name="diskon1" value="<?= number_format($data['diskon1'])?>" required form="formEditDetailNota">
                </div>
                <div class="form-group">
                    <h5 for="hargabeli"><strong>Diskon 2</strong></h5>
                    <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="Harga Beli" id="diskon2" name="diskon2" value="<?= number_format($data['diskon2'])?>" required form="formEditDetailNota">
                </div>




                <button type="submit" class="btn btn-success btn-edit-barang" form="formEditDetailNota"><strong>Simpan</strong></button>

                <button type="button" class="btn btn-danger btn-edit-barang"  id="hapusDetailNota" data-iddetailnota="<?= $data['iddetailnota'] ?>" data-idbarang="<?= $data['idbarang'] ?>" data-jumlah="<?= $data['jumlah'] ?>"><strong>Hapus Transaksi</strong></button>
            </div>
        </div>
    </div>

</div>
</div>
</div>