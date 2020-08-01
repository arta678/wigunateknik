<div class="modal" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form  method="POST"  enctype="multipart/form-data" id="formuploaddata">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">Pilih file CSV</h4>
                </div>
                <div class="modal-body">
                   <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div >
                                <input  type="file" name="file" required="required" >
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="submit" name="import" class="btn btn-info">Import</button>
            </div>
        </form>
    </div>
</div>
</div>