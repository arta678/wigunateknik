
<div class="modal" id="modalEditTanggalNota"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" id="formedittanggal"></form>
      <div class="modal-body">
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">

            <!-- <div class="form-group datasupplier"></div> -->
            <div class="form-grup">
              <h5 for="suplier"><strong>Supplier</strong></h5>
              <select  class="form-control" data-live-search="false" data-size="5" name="suplier"  id="suplier" title="Pilih Supplier" form="formedittanggal">

                <?php 
                $input = "SELECT * FROM tbsuplier";
                $hasil = mysqli_query($conn, $input);
                while ( $baris = mysqli_fetch_array($hasil) ) { ?>
                  <option <?php if($databarang[0]['namasupplier'] == $baris['namasuplier'])  echo 'selected'; ?> value="<?= $baris['idsuplier'] ?>" ><?= $baris['namasuplier']; ?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group">
              <h5 for="hargabeli"><strong>Tanggal Bayar</strong></h5>
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" type="date" class="form-control"  id="tanggal" name="tanggal" value="<?= $databarang[0]['tanggal']; ?>" form="formedittanggal">

              <input type="hidden" name="idnota" value="<?php echo $_GET["idnota"]?>" form="formedittanggal">

            </div>
            <div class="form-group">
              <!-- <h5 for="Diskon3"><strong>PPN <input type="checkbox" name="ppn" id="ppn" checked form="formedittanggal"></strong></h5> -->

              <?php 
                $input = "SELECT * FROM tbtransaksi WHERE idtransaksi = '".$_GET['idnota']."'";
                $hasil = mysqli_query($conn, $input);
                while ( $baris = mysqli_fetch_array($hasil) ) { ?>
                  <h5 for="ppn"><strong>PPN <input <?php if($baris['ppn'] == '10')  echo 'checked'; ?> type="checkbox" name="ppn" id="ppn"  form="formedittanggal"></strong></h5>
                <?php } ?>

            </div>
            <hr>
            <button type="submit" class="btn btn-danger" form="formedittanggal">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

