<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/user_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar')?>
         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Officer's Dashboard</h2>
              <?php if($this->session->flashdata('pesan')){echo $this->session->flashdata('pesan');} ?>
              <?php if($this->session->flashdata('sukses')){echo $this->session->flashdata('sukses');} ?>
              <?php if($this->session->flashdata('gagal')){echo $this->session->flashdata('gagal');} ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Ongoing Auction Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="berlangsung" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Harga Awal</th>
                            <th>Total Penawaran</th>
                            <th>Penawaran Tertinggi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berlangsung as $b) : ?>
                            <tr>
                                <td><img src="<?= empty($b->gambar) ? base_url('assets/images/no_image.png')  : base_url('assets/img/barang/' . $b->gambar) ?>" width="100px"></td>
                                <td><?= $b->nama_barang ?></td>
                                <td><?= $b->tgl_mulai ?></td>
                                <td><?= $b->tgl_akhir ?></td>
                                <td>IDR <?= number_format($b->harga_awal, 2) ?></td>
                                <td><?= $b->total_penawaran ?></td>
                                <td>IDR <?= number_format($b->harga_tertinggi, 2) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Auction's Winner (Unconfirmed)</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="pemenang" class="table table-striped table-bordered">
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
                            <?php if ($activeUser->role == "Petugas") : ?>
                                <th>Action</th>
                            <?php endif ?>
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
                                <?php if ($activeUser->role == "Petugas") : ?>
                                    <td>
                                        <a href="#" data-confirm-url="<?= site_url('backend/user/confirm/' . $p->id_lelang) ?>" onclick="dataConfirm(this)"><button type="button" class="btn btn-success" title="Confirm"><i class="fa-solid fa-circle-check"></i></button></a>
                                    </td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            

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
  $(function () {
    $("#berlangsung").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#berlangsung_wrapper .col-md-6:eq(0)');
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
    function dataConfirm(event) {
        Swal.fire({
            title: 'Confirmation!',
            text: 'The Winner has been confirmed?',
            icon: 'info',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            confirmButtonColor: 'greed'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.confirmUrl);
            }
        });
    }
</script>