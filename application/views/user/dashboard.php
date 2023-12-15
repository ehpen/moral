<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url('assets/img/')?>test.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('assets/img/')?>test.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('assets/img/')?>test.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- CARA MENYEWA -->
<section class="page-section mt-5" id="services">
            <div class="container px-4 px-lg-5">
                <h1 class="text-center mt-0">CARA MENYEWA</h1>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="fas fa-sign-in-alt" style="font-size: 50px"></i></div>
                            <h3 class="h4 mb-2">Login Terlebih Dahulu</h3>
                            <p class="text-muted mb-0">Setelah Cutomer login, customer bisa memilih mobil yang ingin disewa.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="fas fa-user-edit" style="font-size: 50px"></i></div>
                            <h3 class="h4 mb-2">Mengisi Form Data Sewa</h3>
                            <p class="text-muted mb-0">Setelah memilih mobil yang ingin disewa, customer diwajibkan mengisi form sewa.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="fas fa-money-check-alt"  style="font-size: 50px"></i></div>
                            <h3 class="h4 mb-2">Melakukan Pembayaran</h3>
                            <p class="text-muted mb-0">Setelah mengisi form sewa, customer bisa langsung melakukan pembayaran.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="fas fa-car-side" style="font-size: 50px"></i></div>
                            <h3 class="h4 mb-2">Pengambilan Mobil Yang Disewa</h3>
                            <p class="text-muted mb-0">Setelah pembayaran di konfirmasi customer bisa mengambil mobil yang dia sewa di dealer kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section mt-5" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="text-dark mt-0">About</h1>
                        <hr class="divider divider-light" />
                        <p class="text-dark-75 mb-4">Kami, PT. YTTA, merupakan perusahaan penyedia jasa penyewaan kendaraan mobil yang diresmikan pada tahun 2023 dengan brand Moral.</p>
                    <p>Pada awal mulanya kami berjualan seblak saja namun karena banyaknya permintaan untuk membuat jasa rental mobil maka kini kami
                    membuat usaha dalam bidang rental mobil.</p>
                    <p>MORAL Selalu Memberikan Pelayanan Secara Profesional Kepada Seluruh Customer Kami, 
                    Kami Juga Bertekad Untuk Selalu Memperbaiki Dan Berinovasi Dalam Membuat Program Sewa Mobil Dan 
                    Beragam Jenis Armada Dengan Pelayanan Yang Optimal</p>
                    </div>
                </div>
            </div>
        </section>
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
                                        <a class="btn btn-outline-dark mt-auto" href="<?= base_url('user/dashboard/detail_mobil/') . $mb->id_mobil ?>">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
</section>
<section class="py-3 py-md-5 py-xl-8">
    <div class="container px-4 px-lg-5">
        <h1 class="text-center mt-0">Testimoni</h1>
        <hr class="divider" />

  <div class="container overflow-hidden">
    <div class="row gy-3 gy-lg-4">
    <?php foreach($testimoni as $ts):?>
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-body p-4 p-xxl-5">
            <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0"></div>
            <blockquote class="bsb-blockquote-icon mb-3"><?=$ts->testimoni?></blockquote>
            <figure class="d-flex align-items-center m-0 p-0">
              <img class="img-fluid rounded rounded-circle m-0 border border-5" loading="lazy" src="./assets/img/testimonial-img-1.jpg" alt="">
              <figcaption class="ms-3">
                <h4 class="mb-1 h5"><?="Rating:".$ts->rating ?></h4>
                <h5 class="fs-6 text-secondary mb-0"><?=$ts->nama_customer?></h5>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
      <?php endforeach;?>
      </div>
    </div>
  </div>
</section>
    