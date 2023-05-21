<section class="py-5 bg-white">
        <div class="container px-4 px-lg-5 my-5">
                <h5 class="text-black">Bid History Submitted</h5>
                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <div class=" card-body border mt-2">
                <table id="penawaran" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tgl Penawaran</th>
                            <th>Nama Barang</th>
                            <th>Nama Penawar</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Status Penawar</th>
                            <th>Harga Awal</th>
                            <th>Harga Penawaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penawaran as $m) : ?>
                            <tr>
                                <td><?= $m->tgl_penawaran ?></td>
                                <td><?= $m->nama_barang ?></td>
                                <td><?= $m->nama_penawar ?></td>
                                <td><?= $m->no_hp ?></td>
                                <td><?= $m->email_penawar ?></td>
                                <td><?= $m->status_penawar == 1 ? "Aktif" : "Blocked" ?></td>
                                <td>IDR <?= number_format($m->harga_awal, 2) ?></td>
                                <td>IDR <?= number_format($m->harga_penawaran, 2) ?></td>
                                <td>
                                <?php if ($m->status_lelang == "open") : ?>
                                        <a href="#" data-delete-url="<?= site_url('page/delete_penawaran/' . $m->id_penawaran) ?>" onclick="deleteConfirm(this)"><button type="button" class="btn btn-danger" title="Hapus"><i class=" fa-solid fa-trash"></i></button></a>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><br><br><br><br><br><br><br><br><br>
</section>
<?php if ($this->session->flashdata('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>


<!-- Datatable -->
<script>
    $(function () {
    $("#penawaran").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#penawaran_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Sweatalert JS -->
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Delete this bid?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes, Delete',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }
</script>
