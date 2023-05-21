<section class="py-5 bg-white">
        <div class="container px-4 px-lg-5 my-5">
        <h5 class="text-center text-black">Change Password</h1>
        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <div class="border mt-2">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <input type="text" class="form-control" value="<?= $masyarakat->email ?>" name="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="current"><strong>Current Password</strong></label>
                        <input type="password" class="form-control" id="current" name="current" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="password"><strong>New Password</strong></label>
                        <input type="password" class="form-control" id="password" name="password" required maxlength="100">
                    </div>
                    <div class="float-right">
                        <br>
                        <button type="submit" id="save" value="save" class="btn btn-gi"><i class="fa-regular fa-floppy-disk"></i> Update</button>
                    </div>
                </form>
            </div>
            </div>
        </div><br><br>
</section>