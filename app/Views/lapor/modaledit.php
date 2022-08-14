<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('lapor/updatedata', ['class' => 'formlapor'])?>
            <?= csrf_field()?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="id" name="id" value="<?=$id?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="npm" name="npm" value="<?=$npm?>" readonly>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Perwakilan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="perwakilan" name="perwakilan"
                            value="<?=$perwakilan?>" readonly>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback errorMerk">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Petugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="petugas" name="petugas">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback errorMerk">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                            <option value="Accept">Accept</option>
                            <option value="Reject">Reject</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="status" name="status" value="<?=$status?>">
                        -->
                        <div id="status" class="invalid-feedback errorRuang">
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.formlapor').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disabled', 'disabled');
                $('.btnsimpan').html(
                    '<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disabled');
                $('.btnsimpan').html('Update');
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.success
                })
                $('#modaledit').hide();
                $('.modal-backdrop').remove();
                datalapor();
                //location.reload();

            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});
</script>