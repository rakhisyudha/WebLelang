<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/admin_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar')?>

        <div class="content">
           <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">User</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h5>Change Password</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama"><strong>Nama User</strong></label>
                                    <input type="text" class="form-control" value="<?= $user->nama ?>" name="nama" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="username"><strong>Username</strong></label>
                                    <input type="text" class="form-control" value="<?= $user->username ?>" id="username" name="username" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current"><strong>Current Password</strong></label>
                                    <input type="password" class="form-control" id="current" name="current" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="password"><strong>New Password</strong></label>
                                    <input type="password" class="form-control" id="password" name="password" required maxlength="100">
                                </div>
                                <div class="float-right">
                                    <a href="<?= site_url('backend/admin/user'); ?>" class="btn btn-secondary">
                                        <i href="#" class="fa-solid fa-backward"></i> Kembali
                                    </a>
                                    <button type="submit" id="save" value="save" class="btn btn-info"><i class="fa-regular fa-floppy-disk"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
      </div><!-- /.container-fluid -->
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
            icon: 'warning',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>