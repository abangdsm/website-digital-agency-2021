<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: index');
    exit;
}
require 'adminhub.php';
$username = $_SESSION["username"];
// mengambil nama user dari sesi username
$ambil = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username'");
$row = mysqli_fetch_array($ambil);

$orderan = mysqli_query($conn, "SELECT * FROM tborder");
$order = mysqli_num_rows($orderan);

$bayaran = mysqli_query($conn, "SELECT * FROM confirmbayar");
$bayar = mysqli_num_rows($bayaran);

$pelanggan = mysqli_query($conn, "SELECT * FROM tbclient");
$user = mysqli_num_rows($pelanggan);

$subs = mysqli_query($conn, "SELECT * FROM subscriber");
$totalsubs = mysqli_num_rows($subs);

$pesan = mysqli_query($conn, "SELECT * FROM tbpesan");
$jlhPesan = mysqli_num_rows($pesan);

$portfolio = mysqli_query($conn, "SELECT * FROM tbporto");
$porto = mysqli_num_rows($portfolio);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Panel | Dwi Star Muda | Web Developer Expert</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="../assets/img/favicon.png" rel="icon">



    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">


    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="https://thisoneway.com/dsm/admin-panel">DSM</a></h1>

            <!-- silahkan uncomment jika ingin mengggunakan logo -->
            <!-- <a href="https://thisoneway.com" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/dsm/admin-panel">Dashboard</a></li>
                    <li class="dropdown"><a href="#"><span><?= $_SESSION["username"]; ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="akunsaya">Akun Saya</a></li>
                            <li><a class="nav-link scrollto" href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <h2>Hello, <?= $_SESSION["username"]; ?>.</h2>
                <small><?= $row["email"]; ?></small>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4 mb-5">
                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Orderan Masuk</h3>
                            <ul>
                                <li><strong>Jumlah Permintaan</strong></li>
                                <h3><?= $order; ?></h3>
                                <a class="btn btn-primary btn-sm" href="orderan">Lihat Data</a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Data Pembayaran</h3>
                            <ul>
                                <li><strong>Pembayaran Dikonfirmasi</strong></li>
                                <h3><?= $bayar; ?></h3>
                                <a class="btn btn-primary btn-sm" href="pembayaran">Lihat Data</a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Data Pelanggan</h3>
                            <ul>
                                <li><strong>Jumlah Pelanggan</strong></li>
                                <h3><?= $user; ?></h3>
                                <a class="btn btn-primary btn-sm" href="clients">Lihat Data</a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Portofolio</h3>
                            <ul>
                                <li><strong>Portofolio Saat ini</strong></li>
                                <h3><?= $porto; ?></h3>
                                <a class="btn btn-primary btn-sm" href="porto">Lihat Data</a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Pesan Masuk</h3>
                            <ul>
                                <li><strong>Jumlah Pesan</strong></li>
                                <h3><?= $jlhPesan; ?></h3>
                                <a class="btn btn-primary btn-sm" href="pesan?id=1">Baca Pesan</a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Subscriber</h3>
                            <ul>
                                <li><strong>Jumlah Subscriber</strong></li>
                                <h3><?= $totalsubs; ?></h3>
                                <a class="btn btn-primary btn-sm" href="subscriber">Lihat Data</a>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <footer id="footer" class="section-bg">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>DSM</strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://thisoneway.com/">Dwi Star Muda</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>