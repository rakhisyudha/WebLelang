<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama"><strong>Name User</strong></label>
                                    <input type="text" class="form-control" name="nama" required maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="nip"><strong>NIP</strong></label>
                                    <input type="text" class="form-control" name="nip" required maxlength="20" />
                                </div>
                                <div class="form-group">
                                    <label for="username"><strong>Username</strong></label>
                                    <input type="text" class="form-control" id="username" name="username" required maxlength="100">
                                    <?= form_error('username', ' <small class="text-danger pl=3">', '</small>') ?>
                                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                                </div>
                                <div class="form-group">
                                    <label for="password"><strong>Password</strong></label>
                                    <input type="password" class="form-control" id="password" name="password" required maxlength="100">
                                </div>
                                <div class="float-right">
                                <a href="<?= base_url('backend/auth') ?>" class="btn btn-secondary"><i href="#" class="fa-solid fa-backward"></i> Back</a>
                                    <button type="submit" id="save" value="save" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('backend/auth') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>