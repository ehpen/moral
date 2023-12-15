 <!-- Header-->
 <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Halaman Armada Kami</h1>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
        <div class="text-center">
            <h1>ARMADA KAMI</h1>
            <hr class="divider">
        </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                    <?php foreach ($mobil as $mb) : ?>
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url() . 'assets/img/' . $mb->foto_mbl ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $mb->nama_mobil ?></h5><hr>
                                    <p><?= $mb->kapasitas ?></p><hr>
                                    <!-- Product price-->
                                    <?= rupiah($mb->tarif)?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                <?php  if($mb->status_mbl == "Tersedia"){?>
                                        <a class="btn btn-outline-dark mt-auto" href="<?= base_url('user/sewa/sewa_view/') . $mb->id_mobil ?>">Sewa</a>
                                    <?php }else{?>
                                        <a class="btn btn-outline-dark mt-auto">Tidak Ada</a>
                                    <?php }?>
                                        <a class="btn btn-outline-dark mt-auto" href="#">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
      
