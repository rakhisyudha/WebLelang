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
            <h1>Winner's History Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Winner's History</li>
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
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No_hp</th>
                            <th>Alamat</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Akhir</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Harga Akhir</th>
                            <th>Status</th>
                        </tr>   
                    </thead>
                    <tbody>
                    <?php foreach ($pemenang_lelang as $apa) : 
                        ?>
                        <tr>
                            <td><?= $apa->nik ?></td>
                            <td><?= $apa->pemenang ?></td>
                            <td><?= $apa->email ?></td>
                            <td><?= $apa->no_hp ?></td>
                            <td><?= $apa->alamat ?></td>
                            <td><?= $apa->tgl_mulai ?></td>
                            <td><?= $apa->tgl_akhir ?></td>
                            <td><?= $apa->nama_barang ?></td>
                            <td><?= $apa->harga_awal ?></td>
                            <td><?= $apa->harga_akhir ?></td>
                            <td><?= $apa->status?></td>
                        </tr>
                     <?php endforeach; ?>           
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
    $("#example").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
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