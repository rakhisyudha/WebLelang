<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/user_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar') ?>

         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Auction History Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Auction History</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="penawaran" class="table table-bordered table-hover">
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
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <?php $this->load->view('backend/templates/footer') ?>
        </div>
    </main>
</body>

</html>

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