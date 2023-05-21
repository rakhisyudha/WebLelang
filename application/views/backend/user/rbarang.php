<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/templates/user_sidebar') ?>
        <?php $this->load->view('backend/templates/topbar') ?>

        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Item</h1>
            <a class="btn btn-primary btn-flat" href="<?= base_url('backend/user/add_barang') ?>"><i class="fa fa-plus" ></i> Barang</a>
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
                <table id="example" class="table table-bordered table-hover">
                   <thead>
                  <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Harga Awal</th>
                                    <th>Gambar Utama</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                            <?php 
                            $no=1;
                            foreach ($barang as $b) {  
                              $num = $b->harga_awal;
                              $formattedNum = number_format($num, 2); ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $b->nama_barang ?></td>
                                    <td><?= $b->deskripsi ?></td>
                                    <td>IDR <?= $formattedNum ?></td>
                                    <td><img src="<?= empty($b->gambar) ? base_url('assets/img/no_image.png')  : base_url('assets/img/barang/' . $b->gambar) ?>" width="150px" height="100%"></td>
                                    <td><?= $b->status?></td>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('backend/user/gambar/' . $b->id_barang) ?>"><button type="button" class="btn btn-primary" title="Add Image"><i class="fa-solid fa-images"></i></button></a>
                                        <?php if ($b->status == "New") : ?>
                                            <a href="<?= site_url('backend/user/edit_barang/' . $b->id_barang) ?>"><button type="button" class="btn btn-warning" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href="#" data-delete-url="<?= site_url('backend/user/hapus_barang/' . $b->id_barang) ?>" onclick="deleteConfirm(this)"><button type="button" class="btn btn-danger" title="Hapus"><i class=" fa-solid fa-trash"></i></button></a>
                                        <?php endif ?>
                                    </td>
                                  </tr>
                               <?php  $no++;}
                            ?>
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

<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Sure to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes, delete',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }
</script>