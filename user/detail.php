<?php require_once 'header.php'; 
$id_produk = $_GET['id'];

$ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$ambil = $ambildata->fetch_assoc();
?>
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/bg_6.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 style="color: black">product details</h2>
            <ul>
                <li><a href="index.php" style="color: black">home</a></li>
                <li style="color: black"> product details </li>
            </ul>
        </div>
    </div>
</div>
<div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-35 product-details-tab2">
                        <div class="product-details-large tab-content">
                            <div class="tab-pane active show fade" id="pro-details1" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay  is-ready">
                                    <a href="../foto_produk/<?= $ambil['foto_produk']; ?>">
                                        <img src="../foto_produk/<?= $ambil['foto_produk']; ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3><?= $ambil['nama_produk']; ?></h3>
                    <div class="details-price">
                        <span>Rp. <?= number_format($ambil['harga_produk']); ?></span>
                    </div>
                    <p><?= $ambil['deskripsi_produk']; ?></p>
                    <form method="post">
                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="number" min="1" id="quantity" name="jumlah" class="cart-plus-minus-box"
                                    value="1" max="<?= $ambil['stock_produk']; ?>">
                            </div>
                        </div>
                        <div class="coupon-all">
                            <div class="coupon2">
                                <input class="button" name="submit" value="Add to Cart" type="submit">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                        $jumlah = $_POST['jumlah'];
                        $_SESSION['keranjang'][$id_produk] = $jumlah;
                        echo "<script>alert('Produk Berhasil Ditambahkan ke Keranjang')</script>";
                        echo "<script>location='keranjang.php'</script>";
                        }
                        ?>
                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title">Categories :</li>
                            <li><a href="#">Batik <?= $ambil['kategori']; ?></a></li>
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Stock Produk :</li>
                            <li><?= $ambil['stock_produk']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="product-description-review text-center">
            <div class="description-review-title nav" role=tablist>
                <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                    Description
                </a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                    <p><?= $ambil['deskripsi_produk']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>