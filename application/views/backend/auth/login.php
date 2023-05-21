    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card card-secondary my-5">
            <div class="text-center bg-gray">
                 <h1 class="h4 text-gray-900 p-3">Login Form</h1>
              </div>
              <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="<?= base_url('backend/auth') ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Masukan Username" value="<?= set_value('username');?>">
                    <?= form_error('username', ' <small class="text-danger pl=3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukan Password" value="<?= set_value('password');?>">
                    <?= form_error('password', ' <small class="text-danger pl=3">', '</small>') ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-block">                    
                  Login
                </button>
  </div>
  </div>
            <!-- /.card -->
