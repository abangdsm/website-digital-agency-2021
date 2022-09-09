<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login');
    exit;
}
require 'hub.php';
$username = $_SESSION["username"];
$ambil = mysqli_query($conn, "SELECT * FROM tbclient WHERE username = '$username'");
$row = mysqli_fetch_array($ambil);
$id = $row["id"];
// $data = "SELECT * FROM tborder WHERE id_nama = $id";
// $result = mysqli_query($conn, $data);

$join = "SELECT o.id, o.tgl_order, o.jasa, o.harga, o.status_order, s.status, p.proses, o.id_nama FROM tborder AS o INNER JOIN tbclient AS c ON c.id = o.id_nama INNER JOIN sts_order AS s ON s.id = o.status_order INNER JOIN tb_proses AS p ON p.id = o.status_project WHERE id_nama = '$id'";
$result = mysqli_query($conn, $join);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Client Dashboard | Dwi Star Muda | Web Developer Expert</title>
    <meta content="Jasa pembuatan web murah, paling terjangkau, dengan fitur tanpa batas." name="description">
    <meta content="jasa pembuatan web, buat website murah, jasa website murah di medan, desain web murah, desain web profesional." name="keywords">


    <link href="assets/img/favicon.png" rel="icon">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">


    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
                    <li><a class="nav-link scrollto active" href="dashboard">Dashboard</a></li>
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/#services">Services</a></li>
                    <li class="dropdown"><a class="" href=""><span><?= $row["nama"]; ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="profil">Akun Saya</a></li>
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
                <h2>Selamat Datang, <?= $row["nama"]; ?></h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 mb-5">
                        <div class="portfolio-info">
                            <h3>Profil Pengguna</h3>
                            <ul>
                                <li><img src="assets/img/user_default.png" alt="user-default" width="80" class="rounded-circle"></li>
                                <li><strong>Username</strong>: <?= $row["username"]; ?></li>
                                <li><strong>Nama</strong>: <?= $row["nama"]; ?></li>
                                <li><strong>Email</strong>: <?= $row["email"]; ?></li>
                                <li><strong>Whatsapp</strong>: <?= $row["whatsapp"]; ?></li>
                                <li><strong>Bergabung Sejak</strong>: <?= $row["tgl_reg"]; ?> wib</li>
                            </ul>
                            <a class="btn btn-primary btn-sm" href="" type="submit" name="edit-profil">Edit Profil</a>
                        </div>
                    </div>

                    <div class="col-lg-9 mb-5">
                        <div class="portfolio-info">
                            <h3>Informasi Project</h3>
                            <div class="table-responsive mb-2">
                                <table class="table table-stripped">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Order</th>
                                        <th>Jasa</th>
                                        <th>Harga</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Project</th>
                                        <th>Konfirmasi Pembayaran</th>
                                    </tr>

                                    <?php $no = 1; ?>
                                    <?php while ($res = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $res["tgl_order"]; ?></td>
                                            <td><?= $res["jasa"]; ?></td>
                                            <td>Rp. <?= number_format($res["harga"], 0, ",", "."); ?></td>
                                            <td><?= $res["status"]; ?></td>
                                            <td><?= $res["proses"]; ?></td>
                                            <td><a class="btn btn-success btn-sm" href="konfirmasi-pembayaran?id=<?= $res["id"]; ?>"><i class="bi bi-wallet2"></i></a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </table>
                            </div>
                            <a class="btn btn-primary btn-sm" href="https://thisoneway.com#pricing">Order Layanan</a>
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
                Developed By <a href="https://thisoneway.com/">Dwi Star Muda</a> - Web Developer Expert
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>