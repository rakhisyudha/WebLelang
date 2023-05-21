<section class="py-5 bg-white">
        <div class="container px-4 px-lg-5 my-5">
        <h5 class="text-center text-black">Data User</h1>
        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <div class="border mt-2">
            <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" readonly value="<?= $masyarakat->email ?>" class="form-control" name="email" required maxlength="100" />
                    </div>
                    <div class="form-group">
                        <label for="nik"><strong>NIK</strong></label>
                        <input type="text" value="<?= $masyarakat->nik ?>" class="form-control" name="nik" required maxlength="20" />
                    </div>
                    <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label>
                        <input type="text" value="<?= $masyarakat->nama ?>" class="form-control" name="nama" required maxlength="100" />
                    </div>
                    <div class="form-group">
                        <label for="jk"><strong>Jenis Kelamin</strong></label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="Laki-laki" <?= ($masyarakat->jk == "Laki-laki") ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($masyarakat->jk == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp"><strong>No Kontak</strong></label>
                        <input type="text" value="<?= $masyarakat->no_hp ?>" class="form-control" name="no_hp" required maxlength="50" />
                    </div>
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <textarea class="form-control" name="alamat" required maxlength="250"><?= $masyarakat->alamat ?></textarea>
                    </div>
                    <div class="float-right">
                        <br>
                        <button type="submit" id="save" value="save" class="btn btn-gi"><i class="fa-regular fa-floppy-disk"></i> Update Data</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
</section>