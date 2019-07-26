<?php require_once 'header.php' ?>
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(assets/img/bg/bg_6.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center" style="color: black">
            <h2 style="color: black">woman product</h2>
            <ul>
                <li><a href="index.php" style="color: black">home</a></li>
                <li style="color: black">Semua Product Batik Wanita</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Search Products</h3>
                        <div class="sidebar-search">
                            <form action="cari.php" method="get">
                                <input placeholder="Search Products..." type="text" name="cari">
                                <button><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <form action="cariharga.php" method="get">
                                    <div class="label-input">
                                        <label>price minimum: </label>
                                        <input type="text" name="cariharga1" placeholder="(ex.50000)" /> <br><br>
                                        <label>price maximum: </label>
                                        <input type="text" name="cariharga2" placeholder="(ex.100000)" />
                                    </div>
                                    <button class="furniture-slider-btn btn-hover animated">
                                        <span>Filter &ensp;<i class="ti-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar3" data-toggle="tab" role="tab"
                                        aria-selected="false">
                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                    <a href="#grid-sidebar4" data-toggle="tab" role="tab" aria-selected="true">
                                        <i class="ti-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar3" class="tab-pane fade active show">
                                <div class="row">
                                    <?php $ambildata = $koneksi->query("SELECT * FROM produk WHERE kategori = 'Wanita'"); 
                                        while($ambil = $ambildata->fetch_assoc()){?>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                <a href="detail.php?id=<?= $ambil['id_produk']; ?>">
                                                    <img src="../foto_produk/<?= $ambil['foto_produk']; ?>"
                                                        alt="Foto Produk">
                                                </a>
                                                <div class="product-action">
                                                    <a class="animate-right" title="Detail View"
                                                        href="detail.php?id=<?= $ambil['id_produk']; ?>">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a
                                                        href="detail.php?id=<?= $ambil['id_produk']; ?>"><?= $ambil['nama_produk']; ?></a>
                                                </h4>
                                                <span>Rp. <?= number_format($ambil['harga_produk']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div id="grid-sidebar4" class="tab-pane fade">
                                <div class="row">
                                    <?php $ambildata = $koneksi->query("SELECT * FROM produk WHERE kategori = 'Wanita'"); 
                                        while($ambil = $ambildata->fetch_assoc()){?>
                                    <div class="col-lg-12 col-xl-6">
                                        <div
                                            class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                            <div class="product-img list-img-width">
                                                <a href="detail.php?id=<?= $ambil['id_produk']; ?>">
                                                    <img src="../foto_produk/<?= $ambil['foto_produk']; ?>"
                                                        alt="Foto Produk">
                                                </a>
                                                <div class="product-action-list-style">
                                                    <a class="animate-right" title="Detail View"
                                                        href="detail.php?id=<?= $ambil['id_produk']; ?>">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-list">
                                                <div class="product-list-info">
                                                    <h4><a href="detail.php?id=<?= $ambil['id_produk']; ?>">
                                                            <?= $ambil['nama_produk']; ?></a></h4>
                                                    <span>Rp. <?= number_format($ambil['harga_produk']); ?></span>
                                                    <p><?= $ambil['deskripsi_produk']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>