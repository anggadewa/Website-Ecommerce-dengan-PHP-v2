<?php require_once 'header.php'; 
if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
echo "<script>
    alert('Keranjang Kosong! Silahkan Beli Dahulu Produk Yang Anda Suka');
</script>";
}
error_reporting(0);
?>

<!-- <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/bg_6.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 style="color: black">cart page</h2>
            <ul>
                <li><a href="index.php" style="color: black">home</a></li>
                <li style="color: black"> cart page</li>
            </ul>
        </div>
    </div>
</div> -->

<!-- shopping-cart-area start -->
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Cart</h1>
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>No</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $totalbelanja = 0;
                                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                                <!-- menampilkan produk yang berada dikeranjang berdasarkan id_produk -->
                                <?php   
                                $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                $ambil = $ambildata->fetch_assoc();
                                $totalharga = $ambil['harga_produk']*$jumlah;
                                ?>
                                <tr>
                                    <td class="product-remove"><a href="hapuskeranjang.php?id=<?= $id_produk ?>"><i
                                                class="pe-7s-close"></i></a></td>
                                    <td><?= $no++; ?></td>
                                    <td class="product-thumbnail">
                                        <img src="../foto_produk/<?= $ambil['foto_produk']; ?>" alt="" width="50"
                                            height="75">
                                    </td>
                                    <td class="product-name"><?= $ambil['nama_produk']; ?></td>
                                    <td class="product-price-cart"><span class="amount">Rp.
                                            <?= number_format($ambil['harga_produk']); ?></span></td>
                                    <td class="product-quantity">
                                        <?= $jumlah; ?>
                                    </td>
                                    <td class="product-subtotal"><span>Rp. <?= number_format($totalharga); ?></span>
                                    </td>
                                </tr>
                                <?php 
                                $totalbelanja+=$totalharga;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal<span>Rp. <?= number_format($totalbelanja); ?></span></li>
                                    <li>Total<span>Rp. <?= number_format($totalbelanja); ?></span></li>
                                </ul>
                                <a href="checkout.php">Proceed to checkout</a> <br>
                                <a href="produk.php">Continue Shop</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->