<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/admin_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar')?>
         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Admin's Dashboard</h2>
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
<!-- Datatable -->
<script>
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