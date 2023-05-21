<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('page/template/header') ?>
</head>

<body>
    <main class="main bg-white">
    <?php $this->load->view('page/template/topbar') ?>
            <div class="container my-4 col-8">
                    <h2 class="text-dark text-center"><?= $lelang->nama_barang ?></h2>
                <div class="container">
                    <div class="col-12 mt-5">
                        <div id="carouselExampleIndicators" class="carousel-slide-card"  data-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach ($gambar as $b) : ?>
                                    <div class="carousel-item <?= $b->utama == 1 ? 'active' : '' ?>"  data-interval="5000">
                                        <img class="d-block" src="<?= base_url('assets/img/barang/' . $b->gambar); ?>" width="100%" height="100%">
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="col p-2">
                        <div class="text-center p-1">
                            <h4 class="text-black">Price : IDR <?= number_format($lelang->harga_awal, 2) ?></h4>
                        </div>
                        <div class="overflow-auto p-2" style="height: 250px;">
                            <u><h4 class="">Description:</h4></u>
                            <div class="text-black"><p class="text-black"><?= $lelang->deskripsi ?></p></div>
                        </div>
                    </div>
                </div>
                <div class=" px-2 py-2 text-black">
                    <h5 class="text-black">Highest bid : IDR <?= number_format($lelang->harga_tertinggi, 2) ?> /<small><?= $lelang->total_penawaran ?> bid</small></h5>
                </div><hr>
                <?php if ($activeUser) : ?>
                    <div class="p-4">
                        <form method="post">
                            <div class="form-group">
                                <label for="harga_penawaran " class="text-dark"><strong>Bid Price</strong></label>
                                <input type="number" min=1 max=1000000000 maxlength="10" style="width:80%;" class="" name="harga_penawaran" required />
                                <button type="submit" id="save" value="save" class="btn btn-gi"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                    <h6 class="text-dark">Previous Offers</h6>
                    <hr>
                    <div class="p-4 bg-gi2 overflow-auto" style="height: 300px;">
                        <?php foreach ($penawaran as $m) : ?>
                            <div>
                                <small>
                                    <p><?= $m->nama_penawar ?>, <?= $m->tgl_penawaran ?>
                                        <br>Offer Price : <strong>IDR <?= number_format($m->harga_penawaran, 2) ?></strong></br>
                                        <hr>
                                    </p>
                                </small>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
              </div>
              <?php $this->load->view('page/template/footer') ?>
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
            icon: 'info',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>

<!-- Datatable -->
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            buttons: [],
            dom: "<'row '<'col-md-4'l> <'col-md-4'B> <'col-md-4'f>>" +
                "<'row '<'col-md-12'tr>>" +
                "<'row '<'col-md-5'i> <'col-md-7'p>>",
            lengthChange: true
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>