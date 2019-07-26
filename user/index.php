<?php require_once 'header.php'; ?>
<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider-4 slider-height-4 bg-img" style="background-image: url(assets/img/slider/logo.png)">
            <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-6">
                        <div class="furniture-content fadeinup-animated">
                            <!-- <strong>
                                <h2 class="animated">Comfort <br>Collection.</h2>
                                <p class="animated">Pilihan Batik khas Kota Pekalongan Jawa Tengah yang memiliki
                                    kualitas
                                    bahan yang bagus. </p>
                                <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop
                                    Now</a>
                            </strong> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider-4 slider-height-6 bg-img">
            <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-6">
                        <div class="furniture-content fadeinup-animated">
                            <strong>
                                <h2 class="animated">Comfort <br>Collection.</h2>
                                <p class="animated">Pilihan Batik khas Kota Pekalongan Jawa Tengah yang memiliki
                                    kualitas
                                    bahan yang bagus. </p>
                                <a class="furniture-slider-btn btn-hover animated" href="produk.php">Shop
                                    Now</a>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product area start -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
    <div class="container-fluid">
        <div class="section-title-6 text-center mb-50">
            <h2>Product</h2>
            <p>Produk-produk batik pililhan untuk anda</p>
        </div>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                <?php $ambildata = $koneksi->query("SELECT * FROM produk ORDER BY RAND() LIMIT 7"); 
					while($ambil = $ambildata->fetch_assoc()){?>
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="detail.php?id=<?= $ambil['id_produk']; ?>">
                            <img src="../foto_produk/<?= $ambil['foto_produk']; ?>" alt="Foto Produk">
                        </a>
                        <div class="product-action">
                            <!-- <a class="animate-top" title="Add To Cart" href="#" name="submit">
                                <i class="pe-7s-cart"></i>
                            </a> -->
                            <a class="animate-right" title="Detail View"
                                href="detail.php?id=<?= $ambil['id_produk']; ?>">
                                <i class="pe-7s-look"></i>
                            </a>
                        </div>
                    </div>
                    <div class="funiture-product-content text-center">
                        <h4><a href="detail.php?id=<?= $ambil['id_produk']; ?>"> <?= $ambil['nama_produk']; ?> </a></h4>
                        <span><?= number_format($ambil['harga_produk']); ?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<center><a class="furniture-slider-btn btn-hover animated" href="produk.php">More Product</a></center>
<br><br>
<hr>
<!-- product area end -->
<!-- services area start -->
<div class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
    <div class="container-fluid">
        <div class="services-wrapper">
            <div class="single-services mb-40">
                <div class="services-img">
                    <img src="assets/img/icon-img/26.png" alt="">
                </div>
                <div class="services-content">
                    <h4>Fastest Shippig</h4>
                    <p>Fastest and Reliable Shipping. Trust we are Never Lie</p>
                </div>
            </div>
            <div class="single-services mb-40">
                <div class="services-img">
                    <img src="assets/img/icon-img/27.png" alt="">
                </div>
                <div class="services-content">
                    <h4>24/7 Support</h4>
                    <p>Customer Service that can be contacted at any time</p>
                </div>
            </div>
            <div class="single-services mb-40">
                <div class="services-img">
                    <img src="assets/img/icon-img/28.png" alt="">
                </div>
                <div class="services-content">
                    <h4>Secure Payments</h4>
                    <p>Payments are very safe and monitored</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services area end -->
<?php require_once 'footer.php'; ?>