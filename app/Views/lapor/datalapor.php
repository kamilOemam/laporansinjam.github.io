<table class="table table-sm table-striped" id="datalpr">
    <thead>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Tanggal</th>
            <th>Perwakilan</th>
            <th>Keterangan</th>
            <th>Petugas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($tampildata as $row) :
            $nomor++;
            ?>
        <tr>
            <td><?= $nomor;?>
            </td>
            <td><?= $row['npm']?>
            </td>
            <td><?= $row['tanggal']?>
            </td>
            <td><?= $row['perwakilan']?>
            </td>
            <td><?= $row['keterangan']?>
            </td>
            <td><?= $row['petugas']?>
            </td>
            <td><?= $row['status']?>
            </td>
            <td><button type="button" class="btn btn-outline-info btn-sm " onclick="edit('<?= $row['id']?>')"><i
                        class="fa fa-tags"></i></button>

            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#datalpr').DataTable();
});

function edit(id) //idbrg sebuah value yang ada pada even onclick, jadi bebas    
{
    $.ajax({
        type: "post",
        url: "<?= site_url('lapor/formedit')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#modaledit').modal('show');
            }
        },
        error: function(xhr, ajaxOption, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}
</script>