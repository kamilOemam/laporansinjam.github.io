<?php $this->extend('template') ?>

<?php $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-info" onclick="modalForm(0)">Tambah</button>
                <b class="ml-5">Menampilkan Mahasiswa :</b>
                <select name="aktifTidak" id="aktifTidak" class="btn btn-outline-info" onchange="tampilkan()">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="tempatTabel">

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulForm">Tambah Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Npm</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="npmLama" name="npmLama" placeholder="">
                            <input type="text" class="form-control" id="npm" name="npm" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">prodi</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="prodi" name="prodi">
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Ilmu Komputer">Ilmu Komputer</option>
                                <option value="Arsitektur">Arsitektur</option>
                                <option value="Budidaya Perikanan">Budidaya Perikanan</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="prodi" name="prodi" placeholder=""> -->
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambahAtauEdit()" id="simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat / Upload Foto <b id="namaUploadFoto"></b></h5>
            </div>
            <div class="modal-body text-center">
                <form enctype="multipart/form-data">
                    <input type="hidden" value="" id="npmUploadFoto" name="idUpload">
                    <img src="" id="fotoMahasiswa" style="width:50%">
                    <br>
                    <br>
                    <div class='alert alert-danger mt-2 d-none' id="err_file"></div>
                    <div class="alert displaynone" id="responseMsg"></div>
                    <input type="file" id="uploadFotoMahasiswa" class="form-control" name="uploadFotoMahasiswa"
                        value="Pilih foto" accept="image/*" onchange="ubahFoto(event)">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="upload()" class="btn btn-info">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" value="" id="idHapus" name="idHapus">
                <p>Apakah anda yakin ingin menghapus <b id="detailHapus">....</b> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="hapus()" class="btn btn-info">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
tampilkan()

function tampilkan() {
    var baris =
        '<table class="table table-bordered" id="tabelMahasiswa" width="100%" cellspacing="0"><thead><tr><th>NO</th><th>npm</th><th>NAMA</th><th>prodi</th><th>STATUS</th><th>KELOLA</th></tr></thead><tbody>'
    $.ajax({
        type: 'POST',
        url: '<?= base_url() ?>/mahasiswa/data',
        data: "aktifTidak=" + $("#aktifTidak").val(),
        dataType: 'json',
        success: function(data) {
            if (data.length) {
                for (let i = data.length - 1; i >= 0; i--) {
                    baris += "<tr><td>" + (data.length - i) + "</td><td>" + data[i].npm + "</td><td>" +
                        data[i].nama + "</td><td>" + data[i].prodi +
                        "</td><td>"
                    if (data[i].status == 1) {
                        baris += "Aktif"
                    } else {
                        baris += "Tidak Aktif"
                    }
                    baris +=
                        "</td><td><button href='#' class='btn btn-info btn-sm' onClick='modalForm(1, \"" +
                        data[i].npm + "\", \"" + data[i].nama + "\", \"" + data[i]
                        .prodi + "\", " + data[i].status +
                        ")'><i class='fa fa-edit'></i><i class='mdi mdi-food'></i></button><button class='btn btn-primary btn-sm ml-2'id='hapus" +
                        data[i].npm + "' onclick='tryHapus(" + data[i]
                        .npm + ", \"" + data[i].nama +
                        "\")'><i class='fa fa-trash-alt'></i></button><button href='#' class='btn btn-info btn-sm ml-2' onClick='tryUpload(\"" +
                        data[i].npm + "\", \"" + data[i].nama + "\" ,\"" + data[i].foto +
                        "\")'><i class='fa fa-image'></button></td></tr>"
                }
            } else {
                baris = "<td colspan='4' class='text-center'>Data Masih Kosong :)</td>"
            }
            baris += "</tbody></table>"
            $("#tempatTabel").html(baris)

            $('#tabelMahasiswa').DataTable({
                "pageLength": 10,
            });
        }
    });
}


function tambahAtauEdit() {
    if ($("#npm").val() == "") {
        $("#npm").focus();
    } else if ($("#nama").val() == "") {
        $("#nama").focus();
    } else if ($("#telp").val() == "") {
        $("#telp").focus();
    } else if ($("#prodi").val() == "") {
        $("#prodi").focus();
    } else {
        $.ajax({
            type: 'POST',
            data: 'npm=' + $("#npm").val() + '&nama=' + $("#nama").val() + '&telp=' + $("#telp").val() +
                '&prodi=' + $("#prodi").val() + '&status=' + $("#status").val() + '&npmLama=' + $("#npmLama")
                .val(),
            url: '<?= base_url() ?>/mahasiswa/tambah',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $("#npm").val("");
                $("#nama").val("");
                $("#telp").val("");
                $("#prodi").val("");
                $("#status").val(1);

                $('#modalForm').modal('hide');
                tampilkan();
            }
        });
    }
}

function modalForm(jenis, npm = "", nama = "", telp = "", prodi = "", status = 0) {
    if (jenis) {
        $("#npm").prop("disabled", true)
        $("#judulForm").html("Edit Mahasiswa")
        $("#npmLama").val(npm)
        $("#npm").val(npm)
        $("#nama").val(nama)
        $("#telp").val(telp)
        $("#prodi").val(prodi)
        $("#status").val(status)
    } else {
        $("#npm").prop("disabled", false)
        $("#judulForm").html("Tambah Mahasiswa")
        $("#npmLama").val(false)
        $("#npm").val("")
        $("#nama").val("")
        $("#telp").val("")
        $("#prodi").val("")
        $("#status").val(1)
    }

    $("#modalForm").modal('show')
}

function tryUpload(npm, nama, foto) {
    $("#npmUploadFoto").val(npm)
    $.ajax({
        url: '<?= base_url() ?>/mahasiswa/getData',
        method: 'post',
        data: "npm=" + npm,
        dataType: 'json',
        success: function(data) {
            $("#fotoMahasiswa").attr('src', '<?= base_url() . "/public/upload/" ?>' + data.foto + "?=" +
                new Date().getTime())
            $("#namaUploadFoto").html(data.nama)
            $("#modalUpload").modal("show")
        }
    });
}

function upload() {
    var files = $('#uploadFotoMahasiswa')[0].files;

    if (files.length > 0) {
        var fd = new FormData();
        fd.append('file', files[0]);
        fd.append('npm', $("#npmUploadFoto").val());

        $('#responseMsg').hide();

        $.ajax({
            url: '<?= base_url() ?>/mahasiswa/upload',
            method: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#err_file').removeClass('d-block');
                $('#err_file').addClass('d-none');

                if (response.success == 1) {
                    $('#responseMsg').removeClass("alert-danger");
                    $('#responseMsg').addClass("alert-success");
                    $('#responseMsg').html(response.message);
                    $('#responseMsg').show();

                    $('#responseMsg').hide();
                    $('#uploadFotoMahasiswa').val("")

                    $("#modalUpload").modal("hide")
                } else if (response.success == 2) {
                    $('#responseMsg').removeClass("alert-success");
                    $('#responseMsg').addClass("alert-danger");
                    $('#responseMsg').html(response.message);
                    $('#responseMsg').show();
                } else {
                    $('#err_file').text(response.message);
                    $('#err_file').removeClass('d-none');
                    $('#err_file').addClass('d-block');
                }
            },
            error: function(response) {
                console.log("error : " + JSON.stringify(response));
            }
        });
    } else {
        $('#responseMsg').removeClass("alert-success");
        $('#responseMsg').addClass("alert-danger");
        $('#responseMsg').html("Pilih foto dulu ya.");
        $('#responseMsg').show();
    }
}

function ubahFoto(event) {
    $("#fotoMahasiswa").attr("src", URL.createObjectURL(event.target.files[0]))
}

function tryHapus(npm, nama) {
    $("#idHapus").val(npm)
    $("#detailHapus").html(nama + " (" + npm + ") ")
    $("#modalHapus").modal('show')
}

function hapus() {
    $("#hapus").html('<i class="fa fa-spinner fa-pulse"></i> Memproses..')
    var npm = $("#idHapus").val()
    $.ajax({
        url: '<?= base_url() ?>/mahasiswa/hapus',
        method: 'post',
        data: "npm=" + npm,
        dataType: 'json',
        success: function(data) {
            $("#idHapus").val("")
            $("#detailHapus").html("")
            $("#modalHapus").modal('hide')
            $("#hapus").html('Hapus')
            tutupModal()
            location.reload()
            // muatMahasiswa()
        }
    });
}

function tutupModal() {
    $("#modalHapus").modal('hide')
}
</script>
<?php $this->endSection() ?>