<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/admin_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar'); ?>
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
            <?php if ($activeUser->role == "Admin") : ?>
              <a href="<?= site_url('backend/admin/auser') ?>" class="btn btn-success justify-content-end mt-2" style="width: 60px;" title="Add New"><i class="fa-solid fa-folder-plus"></i></a>
            <?php endif ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">User</li>
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
              <table id="users" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($User as $u) : ?>
                                <tr>
                                  <td><?= $no ?></td>
                                    <td><?= $u->nip ?></td>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->username ?></td>
                                    <td><?= $u->role ?></td>
                                    <td><?= $u->status == 1 ? "Aktif" : "Non-aktif" ?></td>
                                    <td>
                                        <?php if (($activeUser->role == "Admin" || $activeUser->id == $u->id) && $u->status <> 0) : ?>
                                            <a href="<?= site_url('backend/admin/edit/' . $u->id) ?>">
                                                <button type="button" class="btn btn-warning" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </a>
                                            <a href="<?= site_url('backend/admin/change/' . $u->id) ?>">
                                                <button type="button" class="btn btn-info" title="Change Password">
                                                    <i class="fa-solid fa-lock"></i>
                                                </button>
                                            </a>
                                            <a href="#" data-confirm-url="<?= site_url('backend/admin/block/' . $u->id) ?>" onclick="dataConfirm(this)"><button type="button" class="btn btn-danger" title="Block"><i class=" fa-solid fa-user-xmark"></i></button></a>
                                        <?php endif ?>
                                        <?php if ($u->status == 0 && $activeUser->role == "Admin") : ?>
                                            <a href="#" data-check-url="<?= site_url('backend/admin/unblock/' . $u->id) ?>" onclick="dataCheck(this)"><button type="button" class="btn btn-primary" title="Block"><i class=" fa-solid fa-check"></i></button></a>
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
    $("#users").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
  });
</script>

<!-- Sweatalert JS -->
<script>
    function dataConfirm(event) {
        Swal.fire({
            title: 'Update Confirmation!',
            text: 'Sure to Block This Data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
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
            title: 'Update Confirmation!',
            text: 'Sure to UnBlock This Data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.checkUrl);
            }
        });
    }
</script>