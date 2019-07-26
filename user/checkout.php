<?php require_once 'header.php'; 
if(!isset($_SESSION['pelanggan'])){
echo "<script>alert('Silahkan Login Untuk Berbelanja');</script>";
echo "<script>location = 'login.php'</script>";
}
error_reporting(0);
?>

<div class="breadcrumb-area pt-195 pb-205"">
    <div class=" container">
    <div class="breadcrumb-content text-center">
        <h2 style="color: black">checkout</h2>
        <ul>
            <li><a href="index.php" style="color: black">home</a></li>
            <li style="color: black"> checkout </li>
        </ul>
    </div>
</div>
</div>
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form method="post">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Full Name <span class="required">*</span></label>
                                    <strong><input type="text" readonly
                                            value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>"></strong>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" readonly
                                        value="<?= $_SESSION['pelanggan']['alamat_pelanggan']; ?>"
                                        name="alamat_pengiriman">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" readonly
                                        value="<?= $_SESSION['pelanggan']['email_pelanggan']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" readonly
                                        value="<?= $_SESSION['pelanggan']['telepon_pelanggan']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Country <span class="required">*</span></label>
                                    <select name="id_ongkir" required>
                                        <option disabled selected> Pilih Ongkos Kirim</option>
                                        <?php 
										$ambildata = $koneksi->query("SELECT * FROM ongkir ORDER BY nama_kota ASC");
										while($ambil = $ambildata->fetch_assoc()){
											?>
                                        <option value="<?= $ambil['id_ongkir']; ?>"><?= $ambil['nama_kota']; ?> - Rp.
                                            <?= number_format($ambil['tarif']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="order-notes">
                            <div class="checkout-form-list mrg-nn">
                                <label>Order Notes</label>
                                <textarea name="catatan" cols="30" rows="10"
                                    placeholder="Notes about your order, e.g. special notes for delivery or size."></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $totalbelanja = 0;
                                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                                <!-- menampilkan produk yang berada dikeranjang berdasarkan id_produk -->
                                <?php 
                                    $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                    $ambil = $ambildata->fetch_assoc();
                                    $totalharga = $ambil['harga_produk']*$jumlah;
                                    ?>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <?= $ambil['nama_produk']; ?> <strong class="product-quantity">x
                                            <?= $jumlah; ?></strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">Rp. <?= number_format($totalharga); ?></span>
                                    </td>
                                </tr>
                                <?php 
                                $totalbelanja+=$totalharga;
                                endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">Rp. <?= number_format($totalbelanja); ?></span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">Rp.
                                                <?= number_format($totalbelanja); ?></span></strong>
                                    </td>
                                    <?php if(number_format($totalbelanja) == 0){
									echo "<script>alert('Belum Ada Produk Yang Dibeli')</script>";
									echo "<script>location='produk.php';</script>";
								} 
								?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="order-button-payment">
                                <input type="submit" value="Place order" name="submit">
                            </div>
                        </div>
                    </div>
                    </form>
                    <?php 
				if(isset($_POST['submit'])){
					$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
					$id_ongkir = $_POST['id_ongkir'];
					$tanggal_pembelian = date("y-m-d");
					$alamat_pengiriman = $_POST['alamat_pengiriman'];
					$catatan = $_POST['catatan'];
					$ambildata = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
					$ambil = $ambildata->fetch_assoc();
					$nama_kota = $ambil['nama_kota'];
					$tarifongkir = $ambil['tarif'];
					$total_pembelian = $totalbelanja + $tarifongkir;
					//memasukan data ke tabel pembelian
					$koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman, catatan_pembelian) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarifongkir', '$alamat_pengiriman', '$catatan')");

					//mendapatkan id_pembelian
					$id_pembelian = $koneksi->insert_id;
					//memasukan data ke tabel pembelian_produk
					foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
						$ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
						$ambil = $ambildata->fetch_assoc();

						$nama = $ambil['nama_produk'];
						$harga = $ambil['harga_produk'];
						$subharga = $ambil['harga_produk']*$jumlah;

						$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, subharga) VALUES ('$id_pembelian', '$id_produk', '$jumlah', '$nama', '$harga', '$subharga')");

						//script update stock
						$koneksi->query("UPDATE produk SET stock_produk=stock_produk - $jumlah WHERE id_produk = '$id_produk'");
					}
					//mengkosongkan keranjang
					unset($_SESSION['keranjang']);
					echo "<script>alert('Pembelian Berhasil!')</script>";
					echo "<script>location='nota.php?id=$id_pembelian';</script>";
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
<?php require_once 'footer.php'; ?>