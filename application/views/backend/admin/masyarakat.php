<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/admin_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar') ?>

         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">List User</li>
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
              <table id="user" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Tanggal Join</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($masyarakat as $m) : ?>
                                <tr>
                                  <td><?= $no ?></td>
                                    <td><?= $m->nik ?></td>
                                    <td><?= $m->nama ?></td>
                                    <td><?= $m->username ?></td>
                                    <td><?= $m->jk ?></td>
                                    <td><?= $m->email ?></td>
                                    <td><?= $m->no_hp ?></td>
                                    <td><?= $m->alamat?></td>
                                    <td><?= $m->tgl_join ?></td>
                                    <td><?= $m->status == 1 ? "Aktif" : "Blocked" ?></td>
                                    <td>
                                        <?php if ($activeUser->role == "Admin" && $m->status == 1) : ?>
                                            <a href="#" data-confirm-url="<?= site_url('backend/admin/block_mas/' . $m->id_masyarakat) ?>" onclick="dataConfirm(this)"><button type="button" class="btn btn-danger" title="Block"><i class=" fa-solid fa-user-xmark"></i></button></a>
                                        <?php endif ?>
                                        <?php if ($activeUser->role == "Admin" && $m->status == 0) : ?>
                                            <a href="#" data-check-url="<?= site_url('backend/admin/unblock_mas/' . $m->id_masyarakat) ?>" onclick="dataCheck(this)"><button type="button" class="btn btn-primary" title="Block"><i class=" fa-solid fa-check"></i></button></a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php $no++; endforeach ?>
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
    $("#user").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');
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
<!-- Sweatalert -->
<script>
    function dataConfirm(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Sure To Block this Data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes, Block',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.confirmUrl);
            }
        });
    }
</script>
<script>
    function dataCheck(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Sure To UnBlock this Data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes, UnBlock',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.checkUrl);
            }
        });
    }
</script>