<section class="py-5 bg-white">
        <div class="container px-4 px-lg-5 my-5">
            <h5 class="text-black">Auction Won</h5>
            <div class=" card-body border mt-2">
            <table id="pemenang" class="table table-striped table-bordered table-hover small">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Barang Lelang</th>
                            <th>Harga Awal</th>
                            <th>Penawaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemenang as $p) : ?>
                            <tr>
                                <th><?= $p->nik ?></th>
                                <td><?= $p->pemenang ?></td>
                                <td><?= $p->jk ?></td>
                                <td><?= $p->email ?></td>
                                <td><?= $p->no_hp ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <td>IDR <?= number_format($p->harga_awal, 2) ?></td>
                                <td>IDR <?= number_format($p->harga_akhir, 2) ?></td>
                                <td><?= $p->status ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div><br><br><br><br><br><br><br><br><br>
</section>
<!-- Datatable -->
<script>
    $(function () {
    $("#pemenang").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#pemenang_wrapper .col-md-6:eq(0)');
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
