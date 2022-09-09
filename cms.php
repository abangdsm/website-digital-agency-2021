<?php
session_start();
require 'hub.php';
if (isset($_SESSION["login"])) {
    $username = $_SESSION["username"];
    $ambil = mysqli_query($conn, "SELECT * FROM tbclient WHERE username = '$username'");
    $row = mysqli_fetch_assoc($ambil);

    if (isset($_POST["subs"])) {
        if (subs($_POST) > 0) {
            echo "<script>alert('Terima kasih telah berlangganan informasi.'); document.location.href='https://thisoneway.com'</script>";
        } else {
            echo "<script>alert('Mohon masukkan alamat email yang valid dengan benar.'); document.location.href='https://thisoneway.com'</script>";
        }
    }
} else {
    if (isset($_POST["subs"])) {
        if (subs($_POST) > 0) {
            echo "<script>alert('Terima kasih telah berlangganan informasi.'); document.location.href='https://thisoneway.com'</script>";
        } else {
            echo "<script>alert('Mohon masukkan alamat email yang valid dengan benar.'); document.location.href='https://thisoneway.com'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CMS | Dwi Star Muda | Web Developer Expert</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="assets/img/favicon.png" rel="icon">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">


    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
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
                    <li><a class="nav-link scrollto active" href="#services">Services</a></li>
                    <li class="dropdown"><a href=""><span><?php if (isset($_SESSION["login"])) {
                                                                echo $row["nama"];
                                                            } else {
                                                                echo "Client Area";
                                                            }; ?>
                            </span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <?php if (isset($_SESSION["login"])) {
                                echo "<li><a class='nav-link scrollto' href='dashboard'>Dashboard</a></li>";
                                echo "<li><a class='nav-link scrollto' href='logout'>Logout</a></li>";
                            } else {
                                echo "<li><a class='nav-link scrollto' href='login'>Login</a></li>";
                            }; ?>
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

                <ol>
                    <li><a href="https://thisoneway.com">Home</a></li>
                    <li><a href="https://thisoneway.com/#services">Services</a></li>
                    <li>CMS</li>
                </ol>
                <h2>CMS Website (Content Management System)</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="assets/img/dashboard-custom.png" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/company2.png" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/flex.png" alt="">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong>: CMS Website</li>
                                <li><strong>Price</strong>: Mulai dari <a class="badge rounded-pill bg-primary" href="">Rp.599.000,-</a></li>
                                <ul><strong>Features</strong>:
                                    <li>Belum termasuk hosting</li>
                                    <li>Unlimited Bandwith</li>
                                    <li>1 Database</li>
                                    <li>1 akun Email</li>
                                    <li>Free Auto SSL</li>
                                    <li>Free Domain .my.id</li>
                                    <li>Litespeed Web Server</li>
                                    <li>Siap Pakai</li>
                                    <li>Free Support 24/7</li>
                                    <li>Revisi 2x</li>
                                    <li>Perpanjangan tahun berikutnya hanya Rp.299.000,-</li>
                                </ul>
                            </ul>
                            <div class="text-center">
                                <a href="order?id=4" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
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