 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang Image</h1>
            <?php if($this->session->flashdata('sukses')){echo $this->session->flashdata('sukses');} ?>
            <?php if($this->session->flashdata('gagal')){echo $this->session->flashdata('gagal');} ?>
            <?php if($this->session->flashdata('error')){echo $this->session->flashdata('error');} ?>
            <?php if($this->session->flashdata('berhasil')){echo $this->session->flashdata('berhasil');} ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('backend/user/rbarang') ?>">Barang</a></li>
              <li class="breadcrumb-item active">Image</li>
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
                <h3 class="card-title">Add Barang's Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url('backend/user/add_gambar/'.$barang->id_barang) ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Barang Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $barang->nama_barang; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <input class="" type="file" name="gambar" required="">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Add Image</button>
                    <a href="<?= base_url('backend/user/rbarang') ?>" class="btn btn-secondary"><i href="#" class="fa-solid fa-backward"></i> Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
                <table id="example1" class="table table-bordered table-hover">
                   <thead>
                  <tr>
                                    <th>No</th>
                                    <th>Image Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                            <?php 
                            $no=1;
                              foreach ($gambar as $kita)
                              if ($kita->id_barang === $barang->id_barang) { { 
                                echo "<tr>
                                    <td> $no </td>
                                    <td> $kita->nama_gambar</td>
                                    <td> <img src='".base_url('assets/img/barang/')."$kita->gambar' width='150px' height='100%'></td>
                                    <td>";
                                      echo "<a class='btn btn-xs btn-danger btn-flat' id=\"printPageButton\" href='".base_url()."backend/user/hapus_gambar/$kita->id_gambar'><i class='fa fa-times'></i> Hapus</a> ";  
                               $no++; }
                            } else {
                            }
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
