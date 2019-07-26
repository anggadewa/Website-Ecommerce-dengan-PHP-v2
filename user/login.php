<?php
if(isset($_SESSION['pelanggan']) == ['email_pelanggan']){
  header('Location: index.php');
}
require_once '../config/db.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Yudea Batik</title>
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
    <link rel="stylesheet" href="assets/css/bundle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="breadcrumb-area pt-195 pb-205">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2 style="color: black">login</h2>
                <ul>
                    <li><a href="index.php" style="color: black">home</a></li>
                    <li style="color: black"> login </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- login-area start -->
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <form method="post">
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <a href="lupapassword.php">
                                                <h6>Forgot Password?</h6>
                                            </a>
                                            <h6>Don't have an account <a href="registrasi.php"
                                                    style="color: blue">Register Here</a></h6>
                                        </div>
                                        <button type="submit" class="default-btn floatright"
                                            name="submit">Login</button>
                                    </div>
                                </form>
                                <?php 
                                if(isset($_POST['submit'])){
                                $ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$_POST[email]' AND password_pelanggan = '$_POST[password]' ");
                                $login = $ambildata->num_rows;

                                if($login == 1){
                                    $akun = $ambildata->fetch_assoc();
                                    $_SESSION['pelanggan'] = $akun;
                                    echo "<script>alert('Anda Berhasil Login');</script>";
                                    if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
                                    echo "<script>location='checkout.php'</script>";
                                    } else{
                                    echo "<script>location='index.php'</script>";
                                    }

                                }else{
                                    echo "<script>alert('Anda Gagal Login, Periksa Kembali Username & Password');</script>";
                                    echo "<script>location='login.php'</script>";
                                }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->
    <!-- all js here -->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>