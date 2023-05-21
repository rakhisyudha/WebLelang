<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/templates/header') ?>
</head>

<body>
    <main class="main">
      <?php $this->load->view('backend/templates/user_sidebar') ?>
      <?php $this->load->view('backend/templates/topbar'); ?>

      <div class="content">
          <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Lelang</h1>
            <a href="<?= site_url('backend/user/alelang') ?>" class="btn btn-primary justify-content-end mt-2" title="Add New"><i class="fa-solid fa-folder-plus"></i> Lelang</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Lelang</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                   <thead>
                  <tr>
                      <th>No</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Berakhir</th>
                      <th>Nama Barang</th>
                      <th>Harga awal</th>
                      <th>Penawaran Terakhir</th>
                      <th>Penanggung Jawab</th>
                      <th>Penawar Terakhir</th>
                      <th>Status</th>
                      <th>Action</th>
                   </tr>   
                  </thead>
                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($lelang as $kenapa) : 
                  $no++?>
                  <tr>
                       <td><?= $no ?></td>
                       <td><?= $kenapa->tgl_mulai ?></td>
                       <td><?= $kenapa->tgl_akhir ?></td>
                       <td class="txt-oflo"><?= $kenapa->nama_barang ?></td>
                       <td><?= $kenapa->harga_awal ?></td>
                       <td><?= $kenapa->harga_akhir ?></td>
                       <td><?= $kenapa->penanggungjawab ?></td>
                       <td><?= $kenapa->pemenang ?></td>
                       <td><?= $kenapa->status ?></td>
                       <td>
                       <?php if ($kenapa->allow_edit == 1 && $kenapa->status == "open") : ?>
                                            <a href="<?= site_url('backend/user/edit_lelang/' . $kenapa->id_lelang) ?>"><button type="button" class="btn btn-warning" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href="#" data-delete-url="<?= site_url('backend/user/cancel/' . $kenapa->id_lelang) ?>" onclick="deleteConfirm(this)"><button type="button" class="btn btn-danger" title="Cancel"><i class="fa-solid fa-xmark"></i></button></a>
                                        <?php endif ?>
                                        <?php if ($kenapa->allow_edit == 0 && $kenapa->status == "open") : ?>
                                            <a href="#" data-closed-url="<?= site_url('backend/user/close/' . $kenapa->id_lelang) ?>" onclick="closeConfirm(this)"><button type="button" class="btn btn-primary" title="Close"><i class="fa-solid fa-lock"></i></button></a>
                                        <?php endif ?>
                       </td>
                  </tr>
                  <?php endforeach; ?>
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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

<!-- Sweatalert JS -->
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Cancel Confirmation!',
            text: 'Be sure to cancel this data?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes, Cancel',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }


    function closeConfirm(event) {
        Swal.fire({
            title: 'Close Confirmation!',
            text: 'Be sure to close this data?',
            icon: 'info',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes, Close',
            confirmButtonColor: 'blue'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.closedUrl);
            }
        });
    }
</script>