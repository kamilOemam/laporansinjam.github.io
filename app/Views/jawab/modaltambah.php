<!-- Modal -->
<div class="modal fade show" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('barang/simpandata', ['class' => 'formbarang'])?>
            <?= csrf_field()?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="idbrg" name="idbrg">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback errorKode">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namabrg" name="namabrg">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Merk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="merkbrg" name="merkbrg">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback errorMerk">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Ruangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ruangbrg" name="ruangbrg">
                        <div id="ruangbrg" class="invalid-feedback errorRuang">
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.formbarang').submit(function(e) {
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
                $('.btnsimpan').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.idbrg) {
                        $('#idbrg').addClass('is-invalid');
                        $('.errorKode').html(response.error.idbrg);
                    } else {
                        $('#idbrg').removeClass('is-invalid');
                        $('.errorKode').html('');
                    }
                    if (response.error.namabrg) {
                        $('#namabrg').addClass('is-invalid');
                        $('.errorNama').html(response.error.namabrg);
                    } else {
                        $('#namabrg').removeClass('is-invalid');
                        $('.errorNama').html('');
                    }
                    if (response.error.merkbrg) {
                        $('#merkbrg').addClass('is-invalid');
                        $('.errorMerk').html(response.error.merkbrg);
                    } else {
                        $('#merkbrg').removeClass('is-invalid');
                        $('.errorMerk').html('');
                    }
                    if (response.error.ruangbrg) {
                        $('#ruangbrg').addClass('is-invalid');
                        $('.errorRuang').html(response.error.ruangbrg);
                    } else {
                        $('#ruangbrg').removeClass('is-invalid');
                        $('.errorRuang').html('');
                    }
                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Ditambahkan'
                    })
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Berhasil',
                    //     text: response.success
                    // })
                    $('#modaltambah').hide();
                    $('.modal-backdrop').remove();
                    databarang();
                    //location.reload();

                }

            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});
</script>