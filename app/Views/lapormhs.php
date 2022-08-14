<?php $this->extend('template') ?>

<?php $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Laporan Mahasiswa</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input oninput="cekData()" onchange="cekData()" type="text" class="form-control" id="npm"
                            autocomplete="TRUE" list="daftarMahasiswa" placeholder="">
                        <datalist onchange="cekData()" id="daftarMahasiswa">

                        </datalist>
                        <div id="errorMahasiswa"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-info" onclick="tampilkan()" id="tombolTampilkan">Tampilkan</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#modalTambah" id="tombolTambah"
                    disabled>Tambah laporan</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="tempatTabel">

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulForm">Tambah laporan</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">npm</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npmTambah" name="npmTambah" placeholder=""
                                disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Perwakilan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="perwakilan" name="perwakilan">
                                <option value="Bem">BEM</option>
                                <option value="Hima">HIMA</option>
                                <option value="Kosma">KOSMA</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="nama" name="nama" placeholder="" disabled> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Ket.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="tambah()" id="simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Laporan</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" value="" id="idHapus" name="idHapus">
                <p>Yakin menghapus laporan dengan NPM <b id="detailHapus">....</b> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="hapus()" class="btn btn-info">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
var mahasiswa = ""
muatMahasiswa()
var barangKosong = true
kosongkanTabel("Silahkan cari Mahasiswa ya :)")

function muatMahasiswa() {
    $.ajax({
        type: 'POST',
        url: '<?= base_url() ?>/mahasiswa/dataAktif',
        dataType: 'json',
        success: function(data) {
            mahasiswa = data;
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<option value="' + data[i].npm + '">' + data[i].nama + '</option>';;
            }
            $("#daftarMahasiswa").html(html);
        }
    });
}

function cekData() {
    $("#errorMahasiswa").html("")
    barangKosong = true;
    for (var i = 0; i < mahasiswa.length; i++) {
        if ($('#npm').val() == mahasiswa[i].npm) {
            $("#errorMahasiswa").html("<small class='text-success'>Npm ditemukan. atas Nama : '" + mahasiswa[i].nama +
                "'</small>")
            barangKosong = false;
            kosongkanTabel("Silahkan Tekan Tombol 'Tampilkan' ya :)")
            $("#nama").val(mahasiswa[i].nama)
            $("#npmTambah").val(mahasiswa[i].npm)
            break
        }
    }

    if (barangKosong) {
        $("#errorMahasiswa").html("<small class='text-danger'>npm tidak ditemukan.</small>")
        $('#nama').val("");
        $('#netto').val("");
        kosongkanTabel("Data Nasabah Tidak Ditemukan :(")
    }
}

function kosongkanTabel(pesan) {
    var baris =
        '<table class="table table-bordered" id="tabelMahasiswa" width="100%" cellspacing="0"><thead><tr><th>NO</th><th>TANGGAL</th><th>PERWAKILAN</th><th>KETERANGAN</th><th>PETUGAS</th><th>STATUS</th></tr></thead><tbody>'
    baris += "<td colspan='6' class='text-center'>" + pesan + "</td></tbody></table>"
    $("#tempatTabel").html(baris)
}

function tampilkan() {
    cekData()
    var npm = $("#npm").val()
    $.ajax({
        url: '<?= base_url() ?>/lapormhs/getData',
        method: 'post',
        data: "npm=" + npm,
        dataType: 'json',
        success: function(data) {
            if (data.length || barangKosong == false) {
                $("#npm").prop("disabled", true)
                $("#tombolTambah").prop("disabled", false)
                $("#tombolTampilkan").html("Edit NPM")
                $("#tombolTampilkan").removeClass("btn-info")
                $("#tombolTampilkan").addClass("btn-success")
                $("#tombolTampilkan").attr("onclick", "edit()")

                var baris =
                    '<table class="table table-bordered" id="tabelMahasiswa" width="100%" cellspacing="0"><thead><tr><th>NO</th><th>Tanggal</th><th>Perwakilan</th><th>Keterangan</th><th>Petugas</th><th>Status</th><th>Aksi</th></tr></thead><tbody>'
                for (let i = data.length - 1; i >= 0; i--) {
                    baris += "<tr><td>" + (data.length - i) + "</td><td>" + data[i].tanggal + "</td><td>" +
                        data[i].perwakilan + "</td><td>" +
                        data[i].keterangan + "</td><td>" + data[i].petugas +
                        "</td><td>" + data[i].status +
                        "</td><td><a href='#' id='hapus" + data[i].id + "' onclick='tryHapus(" + data[i]
                        .id + ", \"" + data[i].npm + "\", \"" + data[i].perwakilan +
                        "\")' ><i class='fa fa-trash'></i></a></td></tr>"
                }

                baris += "</tbody></table>"
                $("#tempatTabel").html(baris)

                $('#tabelMahasiswa').DataTable({
                    "pageLength": 10,
                });
            } else {
                if (npm) {
                    kosongkanTabel("Pengajuan Mahasiswa Masih Kosong :(")
                } else {
                    kosongkanTabel("Silahkan cari Mahasiswa ya :)")
                }
            }
        }
    });
}

function edit() {
    $("#npm").prop("disabled", false)
    $("#tombolTambah").prop("disabled", true)
    $("#tombolTampilkan").removeClass("btn-success")
    $("#tombolTampilkan").addClass("btn-info")
    $("#tombolTampilkan").html("Tampilkan")
    $("#tombolTampilkan").attr("onclick", "tampilkan()")
}

function tambah() {
    if ($("#nominal").val() == "") {
        $("#nominal").focus();
    } else if ($("#keterangan").val() == "") {
        $("#keterangan").focus();
    } else if ($("#perwakilan").val() == "") {
        $("#perwakilan").focus();
    } else {
        $.ajax({
            type: 'POST',
            data: 'npm=' + $("#npmTambah").val() + '&nominal=' + $("#nominal").val() + '&keterangan=' + $(
                "#keterangan").val() + '&perwakilan=' + $("#perwakilan").val(),
            url: '<?= base_url() ?>/lapormhs/tambah',
            dataType: 'json',
            success: function(data) {
                $("#npmTambah").val("");
                $("#nama").val("");
                $("#nominal").val("");
                $("#keterangan").val("");
                $("#perwakilan").val("");


                $('#modalTambah').modal('hide');
                tampilkan();
            }
        });
    }
}

function tryHapus(id, npm, perwakilan) {
    $("#idHapus").val(id)
    $("#detailHapus").html(npm + " & perwakilan (" + perwakilan + ") ")
    $("#modalHapus").modal('show')
}

function hapus() {
    $("#hapus").html('<i class="fa fa-spinner fa-pulse"></i> Memproses..')
    var id = $("#idHapus").val()
    $.ajax({
        url: '<?= base_url() ?>/lapormhs/hapus',
        method: 'post',
        data: "id=" + id,
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