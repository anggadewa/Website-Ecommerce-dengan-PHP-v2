<?php require_once '../config/db.php'; ?>
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
                <h2 style="color: black">register</h2>
                <ul>
                    <li><a href="index.php" style="color: black">home</a></li>
                    <li style="color: black"> register </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- register-area start -->
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <form method="post">
                                    <input type="text" name="nama" placeholder="Full Name" required>
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="password" name="passwordkonfir" placeholder="Password Confirmation"
                                        required>
                                    <input type="text" name="alamat" placeholder="Address" required>
                                    <input type="number" name="telepon" placeholder="Phone Number" required>
                                    <div>
                                        <h6>Already have an account? <a href="login.php" style="color: blue">Login
                                                Here</a>
                                        </h6>
                                    </div>
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright"
                                            name="submit">Register</button>
                                    </div>
                                </form>
                                <?php 
                                        if(isset($_POST['submit'])){
                                            $nama = $_POST['nama'];
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            $passwordkonfir = $_POST['passwordkonfir'];
                                            $alamat = $_POST['alamat'];
                                            $telepon = $_POST['telepon'];
                                                            //cek email sudah digunakan atau belum
                                            $ambildata = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
                                            $ambil = $ambildata->num_rows;
                                            if($ambil == 1){
                                                echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
                                                echo "<script>location='registrasi.php';</script>";
                                            } else{
                                                if($password == $passwordkonfir){
                                                //insert ke tabel
                                                $ambildata = $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");
                                                echo "<script>alert('Pendaftaran Berhasil, Silahkan Lakukan Login');</script>";
                                                echo "<script>location='login.php';</script>";
                                                } else{
                                                    echo "<script>
                                                        alert('Pendaftaran Gagal, Password Tidak Cocok');
                                                    </script>";
                                                    echo "<script>
                                                        location = 'registrasi.php';
                                                    </script>";
                                                }
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
    <!-- register-area end -->
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