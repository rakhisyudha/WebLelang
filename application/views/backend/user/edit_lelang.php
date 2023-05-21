<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/user_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar') ?>

        <div class="content">
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
            <a class="btn btn-primary btn-flat" href="<?= base_url('backend/user/add_barang') ?>">Tambah Barang</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="id_barang">Barang Lelang</label>
                                    <input type="text" name="barang" id="barang" value="<?= $barang->nama_barang ?>" class="form-control" readonly>
                                    </input>
                                </div>

                                <div class="form-group">
                                    <label for="id_barang">Harga Awal Lelang</label>
                                    <input type="text" name="harga_awal" id="harga_awal" value="IDR <?= number_format($lelang->harga_awal, 2) ?> " class="form-control" readonly>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" required class="form-control datepicker" id="tgl_mulai" name="tgl_mulai" value="<?= $lelang->tgl_mulai ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="tgl_akhir">Tanggal Selesai</label>
                                    <input type="date" required class="form-control datepicker" id="tgl_akhir" name="tgl_akhir" value="<?= $lelang->tgl_akhir ?>" />
                                </div>
                                <div class="float-right">
                                    <a href="<?= site_url('backend/lelang'); ?>" class="btn btn-secondary">
                                        <i href="#" class="fa-solid fa-backward"></i> Kembali
                                    </a>
                                    <button type="submit" id="save" value="save" class="btn btn-warning"><i class="fa-regular fa-floppy-disk"></i> Update</button>
                                </div>
                            </form>
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