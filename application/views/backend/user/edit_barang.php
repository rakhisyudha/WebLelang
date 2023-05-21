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
            <h1>Edit Barang</h1>
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <?php if (isset($error)) : ?>
                <div class="invalid-feedback"><?= $error ?></div>
            <?php endif; ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user/rbarang') ?>">Barang</a></li>
              <li class="breadcrumb-item active">Edit Barang</li>
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
              <form class="form-horizontal form-material" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                    <label for="nama_barang"><strong>Barang Name</strong></label>
                        <div class="col-md-12 border-bottom p-0">
                        <input type="text" value="<?= $barang->nama_barang ?>" class="form-control p-0 b-0" name="nama_barang" required maxlength="200" />
                        </div>
                    </div>
                    <div class="form-group mb-4">
                    <label for="deskripsi"><strong>Barang Description</strong></label>
                        <div class="col-md-12 border-bottom p-0">
                        <input type="hidden" class="form-control" name="deskripsi" value="<?= html_escape($barang->deskripsi) ?>" />
                        <div id="editor" class="form-control" style="min-height: 160px;"><?= $barang->deskripsi ?></div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                    <label for="harga_awal"><strong>Initial Price</strong></label>
                        <div class="col-md-12 border-bottom p-0">
                        <input type="number" value="<?= $barang->harga_awal ?>" min=1 max=1000000000 class="form-control" name="harga_awal" required />
                        </div>
                    </div>
                    <img src="<?= empty($barang->gambar) ? base_url('assets/images/no_image.png')  : base_url('assets/img/barang/' . $barang->gambar) ?>" class="img-thumbnail my-1" style="width: 120px;">
                    <div class="form-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>Main Image</strong></span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar">Choose file</label>
                    </div>
                    <div class="float-right">
                    <a href="<?= site_url('backend/user/rbarang'); ?>" class="btn btn-secondary">
                        <i href="#" class="fa-solid fa-backward"></i> Back
                    </a>
                    <button type="submit" id="save" value="save" class="btn btn-warning"><i class="fa-regular fa-floppy-disk"></i> Save</button>
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
</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>