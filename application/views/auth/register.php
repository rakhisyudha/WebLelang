
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <center><h2 class="title">Registration</h2></center>
                    <form method="POST" action="<?= base_url('auth/register') ?>">
                        <div class="input-group">
                              <label class="label">Name</label>
                              <input class="input--style-4" type="text" name="nama" value="<?= set_value('nama') ?>">
                              <?= form_error('nama', ' <small class="text-danger pl=3">', '</small>') ?>
                        </div>
                        <div class="input-group">
                              <label class="label">Username</label>
                              <input class="input--style-4" type="text" name="username" value="<?= set_value('username') ?>">
                              <?= form_error('username', ' <small class="text-danger pl=3">', '</small>') ?>
                        </div>
                        <div class="input-group">
                              <label class="label">Email</label>
                              <input class="input--style-4" type="email" name="email" value="<?= set_value('email') ?>">
                              <?= form_error('email', ' <small class="text-danger pl=3">', '</small>') ?>
                        </div>
                        <div class="input-group">
                              <label class="label">Phone Number</label>
                              <input class="input--style-4" type="number" name="no_hp" value="<?= set_value('no_hp') ?>">
                        </div>
                        <div class="input-group">
                              <label class="label">Nik</label>
                              <input class="input--style-4" type="number" name="nik" value="<?= set_value('nik') ?>">
                              <?= form_error('nik', ' <small class="text-danger pl=3">', '</small>') ?>
                        </div>
                        <div class="input-group">
                              <label class="label">Password</label>
                              <input class="input--style-4" type="password" name="password1" id="password1">
                              <?= form_error('password1', ' <small class="text-danger pl=3">', '</small>') ?>
                        </div>
                        <div class="input-group">
                              <label class="label">Repeat Password</label>
                              <input class="input--style-4" type="password" name="password2" id="password2">
                        </div>
                        <div class="input-group">
                            <label class="label">Gender</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jk">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option name="jk" value="Laki-Laki">Boy</option>
                                    <option name="jk" value="Perempuan">Girl</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                              <label class="label">Address</label>
                              <input class="input--style-4" type="text" name="alamat" value="<?= set_value('alamat') ?>">
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                          </div><br>
                          <center>
                          <div class="signup_link">Already have an account? <a href="<?= base_url('auth') ?>">Login</a></div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
