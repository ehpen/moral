<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="" />
        <link rel="stylesheet" href="<?= base_url('assets/assets_user/') ?>css/bootstrap.min.css">
        <!-- icons-->
        <link href="<?= base_url('assets/assets_user/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets/assets_user/')?>css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top text-white bg-danger">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="<?= base_url('user/dashboard')?>">Moral</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if(isset($user)): ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-light" aria-current="page" href="<?= base_url('user/dashboard')?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url('user/armada_kami') ?>">Armada Kami</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Transaksi
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('user/transaksi') ?>">Transaksi</a>
                                <a class="dropdown-item" href="<?= base_url('user/riwayat_transaksi') ?>">Riwayat Transaksi</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="margin-left: 500px">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <b><?= $user['username'];?></b>
                            <i class="fas fa-user fa-lg"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                    <?php else: ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-light" aria-current="page" href="<?= base_url('user/dashboard')?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url('user/armada_kami') ?>">Armada Kami</a></li>
                    </ul>
                    <form class="d-flex">
                        <a href="<?= base_url('auth') ?>" class="btn btn-dark" style="margin-right: 5px;">Login</a>
                        <a href="<?= base_url('auth/register') ?>" class="btn btn-dark">Sign-up</a>
                    </form>
                    <?php endif ?>
                </div>
            </div>
        </nav>
        