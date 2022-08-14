<?php $this->extend('template') ?>

<?php $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pinjaman</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-info" data-toggle="modal" data-target="#modalTambah"
                    id="tombolTambah">Tambah</button>
                <b class="ml-5">Menampilkan Pinjaman :</b>
                <select name="lunasBelum" id="lunasBelum" class="btn btn-outline-info" onchange="tampilkan()">
                    <option value="0">Belum Dikembalikan</option>
                    <option value="1">Dikembalikan</option>
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
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulForm">Tambah Pinjaman</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">npm</label>
                        <div class="col-sm-10">
                            <input oninput="cekData()" onchange="cekData()" type="text" class="form-control" id="npm"
                                autocomplete="TRUE" list="daftarMahasiswa" placeholder="">
                            <datalist onchange="cekData()" id="daftarMahasiswa">
                            </datalist>
                            <div id="errorMahasiswa"></div>
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
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Barang</label>
                        <div class="col-sm-10">
                            <input oninput="cekDatabrg()" onchange="cekDatabrg()" type="text" class="form-control"
                                id="idbrg" autocomplete="TRUE" list="daftarBarang" placeholder="">
                            <datalist onchange="cekDatabrg()" id="daftarBarang">
                            </datalist>
                            <div id="errorBarang"></div>
                            <!-- <input type="text" class="form-control" id="barang" name="barang" placeholder=""> -->
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
                <button type="button" class="btn btn-primary" onclick="tambah()" id="simpan" disabled>Simpan</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCicilan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulCicilan">Cicilan untuk pinjaman</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" name="idPinjaman" id="idPinjaman">
                        <input type="number" class="form-control" id="nominalCicilan">
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-info btn-sm" onclick="tambahCicilan()">Tambah</button>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-12">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Barang</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody id="tabelCicilan">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
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
                <p>Hapus data pinjaman dengan NPM <b id="detailHapus">....</b> ?</p>
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
muatMahasiswa()
muatBarang()

function tampilkan() {
    var baris =
        '<table class="table table-bordered" id="tabelPinjaman" width="100%" cellspacing="0"><thead><tr><th>NO</th><th>Npm</th><th>NAMA</th><th>TANGGAL</th><th>KETERANGAN</th><th>Pinjaman</th><th>Pengembalian</th><th>Barang</th><th>STATUS</th><th>TindakLanjut</th></tr></thead><tbody>'
    $.ajax({
        url: '<?= base_url() ?>/pinjaman/data',
        method: 'post',
        data: "lunas=" + $("#lunasBelum").val(),
        dataType: 'json',
        success: function(data) {
            for (let i = data.length - 1; i >= 0; i--) {
                baris += "<tr><td>" + (data.length - i) + "</td><td>" + data[i].npm + "</td><td>" + data[i]
                    .nama + "</td><td>" + data[i].tanggal + "</td><td>" + data[i].keterangan + "</td><td>" +
                    data[i].nominal + "</td><td>" + data[i].cicilan + "</td><td>" + data[i].barang +
                    "</td><td>"
                if (data[i].status == 1) {
                    baris += "Dikembalikan"
                } else {
                    baris += "Belum Dikembalikan"
                }
                baris += "</td><td><button class='btn btn-outline-info btn-sm' onClick='muatCicilan(" +
                    data[i].id +
                    ", \"" + data[i].nama + "\",\"" + data[i].keterangan +
                    "\")'><i class='fa fa-eye'></i></button><button class='btn btn-outline-primary btn-sm ml-2'id='hapus" +
                    data[i].id + "' onclick='tryHapus(" + data[i]
                    .id + ", \"" + data[i].npm + "\", \"" + data[i].keterangan +
                    "\")'><i class='fa fa-trash-alt'></i></button></td></tr>"
            }

            baris += "</tbody></table>"
            $("#tempatTabel").html(baris)

            $('#tabelPinjaman').DataTable({
                "pageLength": 10,
            });
        }
    });
}

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

function muatBarang() {
    $.ajax({
        type: 'POST',
        url: '<?= base_url() ?>/barang/databrg',
        dataType: 'json',
        success: function(data) {
            barang = data;
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<option value="' + data[i].namabrg + '">' + data[i].idbrg + '</option>';;
            }
            $("#daftarBarang").html(html);
        }
    });
}

function cekDatabrg() {
    $("#errorBarang").html("")
    barangKosong = true;
    for (var i = 0; i < barang.length; i++) {
        if ($('#idbrg').val() == barang[i].namabrg) {
            $("#errorBarang").html("<small class='text-success'> barang ditemukan. dengan kode : '" + barang[i]
                .idbrg +
                "'</small>")
            barangKosong = false;
            $("#idbrg").val(barang[i].namabrg)
            $("#simpan").prop("disabled", false)
            break
        }
    }

    if (barangKosong) {
        $("#errorBarang").html("<small class='text-danger'>Id barang tidak ditemukan.</small>")
        $('#idbrg').val(""); //menghilangkan catatan kaki
        $("#simpan").prop("disabled", true)
    }
}

function cekData() {
    $("#errorMahasiswa").html("")
    barangKosong = true;
    for (var i = 0; i < mahasiswa.length; i++) {
        if ($('#npm').val() == mahasiswa[i].npm) {
            $("#errorMahasiswa").html("<small class='text-success'>Npm ditemukan. atas Nama : '" + mahasiswa[i].nama +
                "'</small>")
            barangKosong = false;
            $("#nama").val(mahasiswa[i].nama)
            $("#simpan").prop("disabled", false)
            break
        }
    }

    if (barangKosong) {
        $("#errorMahasiswa").html("<small class='text-danger'>Npm tidak ditemukan.</small>")
        $('#nama').val("");
        $("#simpan").prop("disabled", true)
    }
}

function tambah() {
    if ($("#nominal").val() == "" || $("#nominal").val() == 0) {
        $("#nominal").focus();
    } else if ($("#keterangan").val() == "") {
        $("#keterangan").focus();
    } else {
        $.ajax({
            type: 'POST',
            data: 'npm=' + $("#npm").val() + '&nominal=' + $("#nominal").val() + '&keterangan=' + $(
                "#keterangan").val() + '&barang=' + $("#idbrg").val(),
            url: '<?= base_url() ?>/pinjaman/tambah',
            dataType: 'json',
            success: function(data) {
                $("#npm").val("");
                $("#nama").val("");
                $("#nominal").val("");
                $("#keterangan").val("");
                $("#idbrg").val("");

                $('#modalTambah').modal('hide');
                $("#errorMahasiswa").html("")
                $("#simpan").prop("disabled", true)
                tampilkan();
            }
        });
    }
}

function muatCicilan(idPinjaman, nama = "", keterangan = "") {
    if (nama) {
        $("#judulCicilan").html("Cicilan untuk : " + keterangan + "(" + nama + ")")
    }

    var baris = ""
    $.ajax({
        url: '<?= base_url() ?>/pinjaman/dataCicilan',
        method: 'post',
        data: "idPinjaman=" + idPinjaman,
        dataType: 'json',
        success: function(data) {
            if (data.length) {
                for (let i = data.length - 1; i >= 0; i--) {
                    baris += "<tr><td>" + (data.length - i) + "</td><td>" + data[i].tanggal + "</td><td>" +
                        data[i].nominal + "</td><td>" + data[i].barang + "</td><td>" + data[i].sisa +
                        "</td>"
                }
            } else {
                baris += "<tr><td colspan='5' class='text-center'>Pinjaman ini belum dicicil :(</td></tr>"
            }

            $("#nominalCicilan").val("")
            baris += "</tbody></table>"
            $("#tabelCicilan").html(baris)
            $("#idPinjaman").val(idPinjaman)
            $("#modalCicilan").modal("show")

        }
    });
}

function tambahCicilan() {
    var idPinjaman = $("#idPinjaman").val()
    var nominalCicilan = $("#nominalCicilan").val()

    $.ajax({
        url: '<?= base_url() ?>/pinjaman/tambahCicilan',
        method: 'post',
        data: "idPinjaman=" + idPinjaman + "&nominal=" + nominalCicilan,
        dataType: 'json',
        success: function(data) {
            $("#nominalCicilan").val("")
            muatCicilan(idPinjaman)
            tampilkan()
        }
    });
}

function tryHapus(id, npm, keterangan) {
    $("#idHapus").val(id)
    $("#detailHapus").html(npm + " & keterangan (" + keterangan + ") ")
    $("#modalHapus").modal('show')
}

function hapus() {
    $("#hapus").html('<i class="fa fa-spinner fa-pulse"></i> Memproses..')
    var id = $("#idHapus").val()
    $.ajax({
        url: '<?= base_url() ?>/pinjaman/hapus',
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