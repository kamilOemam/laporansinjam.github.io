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
<h1 class="h3 mb-2 text-gray-800">Laporan Mahasiswa</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?= form_open('lapor/cetak', ['target' => '_blank'])?>
        <div>
            <button type="submit" name="btnExport" class="btn  btn-outline-primary"><i
                    class="fa fa-file-excel"></i>Export</button>
        </div>
        <?= form_close() ?>
    </div>
    <div class="card-body">
        <p class="card-text viewdata"></p>
    </div>
</div>
<!-- Modal -->
<div class="viewmodal" style="display: none;"></div>

<script>
function datalapor() {
    $.ajax({
        url: "<?= site_url('lapor/ambildata')?>",
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
    datalapor();
    // $('#datalpr').DataTable();
});
</script>
<?php $this->endSection() ?>