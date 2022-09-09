<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
}
require 'adminhub.php';
$id = $_GET["id"];

$data = query("SELECT * FROM tborder WHERE id=$id")[0];

if (isset($_POST["update"])) {
    if (ubah_status_order($_POST) > 0) {
        echo "<script>alert('Status Order berhasil diperbarui'); document.location.href='orderan'</script>";
    } else {
        echo "<script>alert('Status Order gagal diperbarui'); document.location.href='orderan'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Status Order | Dwi Star Muda | Web Developer Expert</title>
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
                <h2>Ubah Status Orderan</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4 mb-5">
                    <div class="col">
                        <div class="portfolio-info">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                                <label for="status_order" class="form-label">Status Order :</label><br>
                                <select class="form-select mb-2" name="status_order">
                                    <option value="1" <?= ($data['status_order'] === '1') ? 'selected' : '' ?>>Open Order</option>
                                    <option value="2" <?= ($data['status_order'] === '2') ? 'selected' : '' ?>>Down Payment</option>
                                    <option value="3" <?= ($data['status_order'] === '3') ? 'selected' : '' ?>>Lunas</option>
                                </select>
                                <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('Anda akan mengubah status order?');">Ubah Status</button>
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