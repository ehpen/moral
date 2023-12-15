<div class="container-fluid" style="margin-top: 100px">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Mobil</h1>

    <div class="card">
        <div class="card-body">
                <div class="row">
                <?php foreach ($mobil as $mb) : ?>
                    <div class="col-md-6">
                        <div class="form-group ml-5">
                            <img width="250px;" height="250px;" src="<?= base_url() . 'assets/img/' . $mb->foto_mbl ?>" alt="">
                        </div>
                        <a class="btn btn-primary mt-5 ml-5" href="<?= base_url('user/dashboard')?>">Kembali</a>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="form-group text-dark">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h5>Nama Mobil</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $mb->nama_mobil?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Tarif</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= rupiah($mb->tarif)?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>No plat</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $mb->no_plat?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Kapasitas</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $mb->kapasitas?></h5></td>
                                    </tr>                                    
                                    <tr>
                                        <td><h5>Transmisi</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $mb->transmisi?></h5></td>
                                    </tr>                                    
                                    <tr>
                                        <td><h5>Mesin</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $mb->mesin?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Warna</h5></td>
                                        <td><h5>:</h5></td>
                                        <td><h5><?= $mb->warna?></h5></td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>