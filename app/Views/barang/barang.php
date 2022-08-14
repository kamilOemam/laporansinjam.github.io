<?php $this->extend('template') ?>

<?php $this->section('content') ?>
<link href=" <?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="<?= base_url() ?>/vendor/datatables/jquery.dataTables.min.js">
</script>
<script src="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.js">
</script>

<!-- Page level custom scripts -->
<script src="<?= base_url()?>/js/demo/datatables-demo.js">
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-outline-info btn-sm tombolTambah">
                    <i class="fas fa-plus-circle">Tambah data</i>
                </button>

            </div>
        </div>
    </div>
    <div class="card-body">

        <p class="card-text viewdata"></p>

    </div>
</div>
<!-- Modal -->
<div class="viewmodal" style="display: none;"></div>

<script>
function databarang() {
    $.ajax({
        url: "<?= site_url('barang/ambildata')?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOption, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}


$(document).ready(function() {
    databarang();
    //jquery carikan saya tombol tambah  yang mana ketika diclick
    $('.tombolTambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('barang/formtambah')?>",
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data)
                    .show(); //fungsi show dipakai karena ada display none

                $('#modaltambah').modal(
                    'show'); //fungsi modal dipakai karena ada display none
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

    });


});
</script>
<?php $this->endSection();