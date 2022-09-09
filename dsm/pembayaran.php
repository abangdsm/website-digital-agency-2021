<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
}


require 'adminhub.php';

$data = query("SELECT * FROM confirmbayar ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Status Pembayaran | Dwi Star Muda | Web Developer Expert</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">


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

            <h1 class="logo me-auto"><a href="https://thisoneway.com">DSM</a></h1>

            <!-- silahkan uncomment jika ingin mengggunakan logo -->
            <!-- <a href="https://thisoneway.com" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/dsm/admin-panel">Dashboard</a></li>
                    <li class="dropdown"><a href="#"><span><?= $_SESSION["username"]; ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="#">Akun Saya</a></li>
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
                <h2>Status Pembayaran</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4 mb-5">
                    <div class="col-lg-12">
                        <div class="portfolio-info">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Order</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Kategori Jasa</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bukti Transfer</th>
                                            <th>Nama Pemilik Rekening</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data as $info) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $info["tgl_order"]; ?></td>
                                                <td><?= $info["nama_user"]; ?></td>
                                                <td><?= $info["nama_jasa"]; ?></td>
                                                <td><?= $info["tgl_bayar"]; ?></td>
                                                <td><a href="../assets/img/bukti_transfer/<?= $info["bukti_transfer"]; ?>" data-gallery="portfolioGallery" title="Bukti Transfer: <?= $info["rekening"]; ?> <br>Tanggal Konfirmasi: <?= $info["tgl_bayar"]; ?>" class="link-preview portfolio-lightbox"><?= $info["bukti_transfer"]; ?></a></td>
                                                <td><?= $info["rekening"]; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="status-order?id=<?= $info["id_jasa"]; ?>"><i class="bi bi-check2-circle"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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