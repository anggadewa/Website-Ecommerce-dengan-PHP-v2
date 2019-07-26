<?php require_once 'header.php'; 
if(!isset($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan Login Untuk Berbelanja');</script>";
	echo "<script>location='login.php'</script>";
}

$id_pembelian = $_GET['id'];
$ambildata = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$ambil = $ambildata->fetch_assoc();

$id_pelanggan_beli = $ambil['id_pelanggan'];
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if($id_pelanggan_beli !== $id_pelanggan_login){
	echo "<script>alert('Ini Bukan Produk Anda');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

$status = $ambil['status_pembelian'];
if($status == 'Sudah Dibayar'){
	echo "<script>alert('Produk Sudah Dibayar');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<div class="container mt-100">
    <h2>Payment confirmation</h2>
    <p>Send Proof of Your Payment Here</p>
    <div class="alert alert-info">
        Your Total Bill <strong>Rp. <?= number_format($ambil['total_pembelian']); ?></strong>
    </div>
    <div class="checkbox-form">
        <h3>Billing Details</h3>
        <form method="post" enctype="multipart/form-data">
            <?php 
		if(isset($_POST['submit'])){
			$namabukti = $_FILES['bukti']['name'];
			$lokasibukti = $_FILES['bukti']['tmp_name'];
			$namabaru = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "../bukti_pembayaran/$namabaru");
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$bank = $_POST['bank'];
			$jumlah = $_POST['jumlah'];
			$tanggal = date("y-m-d");

			$koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, email, bank, jumlah, tanggal, bukti) VALUES ('$id_pembelian', '$nama', '$email', '$bank', '$jumlah', '$tanggal', '$namabaru')");
			$koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Dibayar' WHERE id_pembelian='$id_pembelian'");
			echo "<br><div class='alert alert-info container'>Pembayaran Sukses, Silahkan Tunggu Konfirmasi</div>";
			echo "<div class='alert alert-warning container'>Konfirmasi Akan Dikirim Melalui Email</div>";
		}
		?>
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>Customer Name</label>
                        <input type="text" readonly value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>"
                            name="nama">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>Customer Email</label>
                        <input type="text" readonly value="<?= $_SESSION['pelanggan']['email_pelanggan']; ?>"
                            name="email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>Customer Bank</label>
                        <input type="text" name="bank">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>Total (Rp.)</label>
                        <input type="text" name="jumlah" value="<?= $ambil['total_pembelian']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- <div class="checkout-form-list"> -->
                    <label>Photo Proof</label>
                    <input type="file" name="bukti">
                    <p class="text-danger">
                        Photo Proof Must Be In JPG Format and Maximum Size of 2MB</p>
                    <!-- </div> -->
                </div>
                <div class="col-md-2">
                    <div class="checkout-form-list">
                        <input type="submit" name="submit" value="Pay" class="furniture-slider-btn btn-hover animated">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>