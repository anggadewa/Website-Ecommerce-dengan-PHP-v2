<?php require_once 'header.php'; 
$cari = $_GET['cari'];

$semuadata = array();
$ambildata = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' OR deskripsi_produk LIKE '%$cari%'");
while($ambil = $ambildata->fetch_assoc()){
	$semuadata[]=$ambil;
}
?>

<div class="breadcrumb-area pt-195 breadcrumb-padding pb-205">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center" style="color: black">
            <h2 style="color: black">Hasil Pencarian</h2>
            <ul>
                <li><a href="index.php" style="color: black">home</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
                                <?php if (empty($semuadata)): ?>
                                <div class="alert alert-danger">Produk <strong><?= $cari; ?></strong> Tidak Ditemukan
                                </div>
                                <?php endif ?>
                                <div class="row">
                                    <?php foreach ($semuadata as $key => $ambil): ?>
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
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="grid-sidebar4" class="tab-pane fade">
                                <div class="row">
                                    <?php foreach ($semuadata as $key => $ambil): ?>
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
                                    <?php endforeach; ?>
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