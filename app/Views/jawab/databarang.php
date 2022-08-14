<table class="table table-sm table-striped" id="databrg">
    <thead>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nominal</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Perwakilan</th>
            <th>Verifikasi</th>
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
            <td><?= $row['id']?>
            </td>
            <td><?= $row['nik']?>
            </td>
            <td><?= $row['nominal']?>
            </td>
            <td><?= $row['tanggal']?>
            </td>
            <td><?= $row['keterangan']?>
            </td>
            <td><?= $row['petugas']?>
            </td>
            <td><?= $row['jwb']?>
            </td>
            <td><button type="button" class="btn btn-outline-primary btn-sm " onclick="edit('<?= $row['idbrg']?>')"><i
                        class="fa fa-tags"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['idbrg']?>')"><i
                        class="fa fa-trash-alt"></i></button>

            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#databrg').DataTable();
});

function edit(idbrg) //idbrg sebuah value yang ada pada even onclick, jadi bebas    
{
    $.ajax({
        type: "post",
        url: "<?= site_url('barang/formedit')?>",
        data: {
            idbrg: idbrg
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

function hapus(idbrg) {
    Swal.fire({
        title: 'Hapus',
        text: `Yakin Hapus Barang Dengan Kode ${idbrg} ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK!',
        cancelButtonText: 'Tidak..',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: "<?= site_url('barang/hapus')?>",
                data: {
                    idbrg: idbrg
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success
                        })
                        databarang();
                    }
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })

}