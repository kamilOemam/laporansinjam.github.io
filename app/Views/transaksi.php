<?php $this->extend('template') ?>

<?php $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Transaksi Tabungan</h1>

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
                    disabled>Tambah Transaksi</button>
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
                <h5 class="modal-title" id="judulForm">Tambah Transaksi</h5>
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
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan</label>
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
        '<table class="table table-bordered" id="tabelMahasiswa" width="100%" cellspacing="0"><thead><tr><th>NO</th><th>TANGGAL</th><th>KETERANGAN</th><th>NOMINAL</th><th>PETUGAS</th><th>sisa</th></tr></thead><tbody>'
    baris += "<td colspan='6' class='text-center'>" + pesan + "</td></tbody></table>"
    $("#tempatTabel").html(baris)
}

function tampilkan() {
    cekData()
    var npm = $("#npm").val()
    $.ajax({
        url: '<?= base_url() ?>/transaksi/getData',
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
                    '<table class="table table-bordered" id="tabelMahasiswa" width="100%" cellspacing="0"><thead><tr><th>NO</th><th>TANGGAL</th><th>KETERANGAN</th><th>NOMINAL</th><th>PETUGAS</th><th>sisa</th></tr></thead><tbody>'
                for (let i = data.length - 1; i >= 0; i--) {
                    baris += "<tr><td>" + (data.length - i) + "</td><td>" + data[i].tanggal + "</td><td>" +
                        data[i].keterangan + "</td><td>" + data[i].nominal + "</td><td>" + data[i].petugas +
                        "</td><td>" + data[i].sisa + "</td>"
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
    if ($("#nominal").val() == "" || $("#nominal").val() == 0) {
        $("#nominal").focus();
    } else if ($("#keterangan").val() == "") {
        $("#keterangan").focus();
    } else {
        $.ajax({
            type: 'POST',
            data: 'npm=' + $("#npmTambah").val() + '&nominal=' + $("#nominal").val() + '&keterangan=' + $(
                "#keterangan").val(),
            url: '<?= base_url() ?>/transaksi/tambah',
            dataType: 'json',
            success: function(data) {
                $("#npmTambah").val("");
                $("#nama").val("");
                $("#nominal").val("");
                $("#keterangan").val("");

                $('#modalTambah').modal('hide');
                tampilkan();
            }
        });
    }
}
</script>
<?php $this->endSection() ?>