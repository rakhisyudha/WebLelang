<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/user_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar')?>

        <div class="content">
           <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Lelang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('user/klelang') ?>">Lelang</a></li>
              <li class="breadcrumb-item active">Tambah Lelang</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Lelang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url('backend/user/add_lelang') ?>">
                <div class="card-body">
                <div class="form-group">
                        <label class="cont">Nama Barang</label>
                        <div class="col-md-12">
                        <select name="id_barang" id="id_barang" class="form-control" required >
                            <option value="Pilih Data"></option>
                            <?php foreach ($barang as $row) { ?>
                                <option value="<?= $row->id_barang; ?>">
                                    <?= $row->nama_barang; ?> (IDR <?= $row->harga_awal; ?>)
                            </option>
                                <?php } ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Mulai </label>
                        <div class="col-md-12">
                            <input name="tgl_mulai" class="form-control" type="date" required="">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Berakhir</label>
                        <div class="col-md-12">
                            <input name="tgl_akhir" class="form-control" type="date" required="">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-primary">Tambah Data</button>
                  <a href="<?= base_url('backend/user/klelang') ?>" class="btn btn-secondary">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
            <?php $this->load->view('backend/templates/footer') ?>
        </div>
    </main>
</body>

</html>


<!-- Quill JS -->

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