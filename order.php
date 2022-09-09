<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login');
    exit;
}

require 'hub.php';
$id = $_GET["id"];
$data = query("SELECT * FROM tbjasa WHERE id=$id")[0];

$username = $_SESSION["username"];
$ambil = mysqli_query($conn, "SELECT * FROM tbclient WHERE username = '$username'");
$row = mysqli_fetch_assoc($ambil);
$id_client = $row["id"];

date_default_timezone_set("Asia/Jakarta");
$tgl_order = date("Y/m/d H:i");

if (isset($_POST["order"])) {
    if (getorder($_POST) > 0) {
        echo "<script>alert('Pesanan berhasil diproses'); document.location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengirim data'); document.location.href='dashboard.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ORDER Custom Website | Dwi Star Muda | Web Developer Expert</title>
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
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li class="dropdown"><a href="#"><span><?= $row["nama"]; ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="dashboard">Dashboard</a></li>
                            <li><a class="nav-link scrollto" href="profil">Akun Saya</a></li>
                            <li><a class="nav-link scrollto" href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="social-links">
                <a href="https://github.com/abangdsm" target="_blank" class="github"><i class="bi bi-github"></i></a>
                <a href="https://instagram.com/dwistarmuda.id" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCRedcJdUuUsEMNVRANISM3g" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <h2>Order Jasa Custom Website</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4 mb-5">

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Project Detail</h3>
                            <ul>
                                <li><strong>Nama Jasa</strong>: <?= $data["nama_jasa"]; ?></li>
                                <li><strong>Harga</strong>: Mulai dari Rp.<?= number_format($data["harga"], 0, ",", "."); ?></li>
                                <li><strong>Proses Pengerjaan</strong>: <?= $data["proses_kerja"]; ?></li>
                            </ul>
                            <form action="" method="POST">
                                <input type="hidden" name="tgl_order" value="<?= $tgl_order; ?>">
                                <input type="hidden" name="jasa" value="<?= $data["nama_jasa"]; ?>">
                                <input type="hidden" name="harga" value="<?= $data["harga"]; ?>">
                                <input type="hidden" name="status_order" value="1">
                                <input type="hidden" name="status_project" value="1">
                                <input type="hidden" name="id_nama" value="<?= $id_client; ?>">

                                <button class="btn btn-primary btn-md" type="submit" name="order" onclick="return confirm('Lanjutkan Order?')">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <?php include 'footer.php'; ?>

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