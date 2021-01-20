<div class="modal" id="modalEdit_<?= $data['idkategori'] ?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form role="form" method="POST" action="proses/edit.php">
      <!-- <div class="modal-header">
      </div> -->
      <div class="modal-body" >
        <div class="row" style="font-weight: bold;">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="idkategori">Jenis Kategori</label>
              <input  type="hidden" id="idkategori" name="idkategori" value="<?= $data['idkategori']?>" >
              <input style="background-color: #CBCBCB; color: black; font-size: 18px;" class="form-control" placeholder="namakategori" id="namakategori" name="namakategori"  value="<?= $data['namakategori'] ?>">
            </div>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>