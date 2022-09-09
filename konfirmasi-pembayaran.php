<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login');
    exit;
}
require 'hub.php';
$username = $_SESSION["username"];
$ambil = mysqli_query($conn, "SELECT * FROM tbclient WHERE username = '$username'");
$row = mysqli_fetch_assoc($ambil);

date_default_timezone_set("Asia/Jakarta");
$tgl_bayar = date("Y/m/d H:i");

$id = $_GET["id"];
$data = query("SELECT * FROM tborder WHERE id = $id")[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Konfirmasi Pembayaran | Dwi Star Muda | Web Developer Expert</title>
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
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/dashboard">Dashboard</a></li>
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/#services">Services</a></li>
                    <li class="dropdown"><a class="" href=""><span><?= $row["nama"]; ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="dashboard">Dashboard</a></li>
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
                <a class="btn btn-primary btn-sm" href="https://thisoneway.com/dashboard"><i class="bi bi-house"></i> Kembali Ke Beranda</a>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-5 mb-5">
                        <div class="portfolio-info">
                            <h3>Detail Layanan Jasa</h3>
                            <?php
                            if (isset($_POST["konfirmasi"])) {
                                if (bayar($_POST) > 0) {
                                    header('location: sukses');
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan saat mengirim data.</div>";
                                }
                            }
                            ?>
                            <span class="badge bg-primary text-white">ID Order : <?= uniqid($id); ?></span>
                            <br><br>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="nama_jasa">Nama Layanan :</label>
                                <input class="form-control" type="text" name="nama_jasa" id="nama_jasa" readonly value="<?= $data["jasa"]; ?>"><br>

                                <label for="harga">Harga :</label>
                                <input class="form-control" type="text" name="harga" id="harga" readonly value="<?= number_format($data["harga"], 0, ',', '.'); ?>"><br>

                                <label for="bukti_transfer">Bukti Pembarayan :</label>
                                <input class="form-control" type="file" name="bukti_transfer" id="bukti_transfer"><br>

                                <label for="rekening">Nama Pemilik Rekening :</label>
                                <input class="form-control" type="text" name="rekening" id="rekening" placeholder="Nama Lengkap" required autocomplete="off"><br>

                                <input type="hidden" name="nama" value="<?= $row["nama"]; ?>">
                                <input type="hidden" name="id_jasa" value="<?= $id; ?>">
                                <input type="hidden" name="tgl_bayar" value="<?= $tgl_bayar; ?>">
                                <input type="hidden" name="tgl_order" value="<?= $data["tgl_order"]; ?>">


                                <button class="btn btn-primary btn-md" type="submit" name="konfirmasi">Kirim</button>
                            </form>
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