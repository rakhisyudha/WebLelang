        <!-- Section-->
        <section class="py-5 bg-white">
            <div class="container px-4 px-lg-5 mt-5 ">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php 
            foreach ($lelang as $b) { ?>
                    <div class="col mb-5 ">
                        <div class="card h-100 bg-gi2">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('assets/img/barang/'. $b->gambar) ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $b->nama_barang; ?></h5>
                                    <!-- Product price-->
                                    IDR <?= number_format("$b->harga_awal",2) ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url('page/dbarang/'. $b->id_lelang) ?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
                </div>
            </div><br><br><br><br><br>
        </section>
