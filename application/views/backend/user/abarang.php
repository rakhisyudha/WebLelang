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
            <h1>Add Item</h1>
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <?php if (isset($error)) : ?>
                <div class="invalid-feedback"><?= $error ?></div>
            <?php endif; ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user/rbarang') ?>">Item</a></li>
              <li class="breadcrumb-item active">Add Item</li>
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
                        <div class="card-header bg-secondary text-white">
                            <h5>Adding Data Item</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_barang"><strong>Item Name</strong></label>
                                    <input type="text" class="form-control" name="nama_barang" required maxlength="200" />

                                </div>
                                <div class="form-group">
                                    <label for="deskripsi"><strong>Item Description</strong></label>
                                    <input type="hidden" class="form-control" name="deskripsi" />
                                    <div id="editor" class="form-control" style="min-height: 160px;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="harga_awal"><strong>Initial Price</strong></label>
                                    <input type="number" min=1 max=1000000000 class="form-control" name="harga_awal" required />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>Main Image</strong></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a href="<?= site_url('backend/user/rbarang'); ?>" class="btn btn-secondary">
                                        <i href="#" class="fa-solid fa-backward"></i> Back
                                    </a>
                                    <button type="submit" id="save" value="save" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                </div>
                            </form>
                        </div>
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


<!-- Quill JS -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    quill.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='deskripsi']").value = quill.root.innerHTML;
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


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
            icon: 'alert',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>