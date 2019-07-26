<?php require_once '../config/db.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>YUDEA BATIK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/css/icofont.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/easyzoom.css">
    <link rel="stylesheet" href="assets/css/bundle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <header>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 furniture-logo ptb-30">
                        <a href="index.html">
                            <img src="assets/img/logo/2.png" alt="" width="180" height="45">
                        </a>
                    </div>
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="index.php">home</a></li>
                                <li><a href="produk.php">all product</a>
                                    <ul class="single-dropdown">
                                        <li><a href="produkpria.php">product for man</a></li>
                                        <li><a href="produkwanita.php">product for woman</a></li>
                                    </ul>
                                </li>
                                <?php if (isset($_SESSION['pelanggan'])) : ?>
                                <li><a href="riwayat.php">shopping history</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart">
                        <a class="icon-cart-furniture" href="keranjang.php">
                            <i class="ti-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="index.php">home</a></li>
                                    <li><a href="produk.php">all product</a></li>
                                    <li><a href="produkpria.php">product for man</a></li>
                                    <li><a href="produkwanita.php">product for woman</a></li>
                                    <?php if (isset($_SESSION['pelanggan'])) : ?>
                                    <li><a href="riwayat.php">shopping history</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
            <div class="container-fluid">
                <div class="furniture-bottom-wrapper">
                    <div class="furniture-login">
                        <ul>
                            <?php if (isset($_SESSION['pelanggan'])) : ?>
                            <li><a href="logout.php">logout </a></li>
                            <li>
                                <h5>Hai <?= $_SESSION['pelanggan']['nama_pelanggan']; ?>!</h5>
                            </li>
                            <?php else: ?>
                            <li>Get Access: <a href="login.php">Login </a></li>
                            <li><a href="registrasi.php">Register </a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="furniture-search">
                        <form action="cari.php" method="get">
                            <input placeholder="I am Searching for . . ." type="text" name="cari" autocomplete="off">
                            <button>
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->