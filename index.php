<?php
session_start();
require 'hub.php';
if (isset($_SESSION["login"])) {
    $username = $_SESSION["username"];
    $ambil = mysqli_query($conn, "SELECT * FROM tbclient WHERE username = '$username'");
    $row = mysqli_fetch_assoc($ambil);

    $porto = mysqli_query($conn, "SELECT * FROM tbporto");
    $testi = mysqli_query($conn, "SELECT * FROM tbtestimoni");

    if (isset($_POST["subs"])) {
        if (subs($_POST) > 0) {
            echo "<script>alert('Terima kasih telah berlangganan informasi.'); document.location.href='https://thisoneway.com'</script>";
        } else {
            echo "<script>alert('Mohon masukkan alamat email yang valid dengan benar.'); document.location.href='https://thisoneway.com'</script>";
        }
    }
} else {
    $porto = mysqli_query($conn, "SELECT * FROM tbporto");
    $testi = mysqli_query($conn, "SELECT * FROM tbtestimoni");

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

    <title>Dwi Star Muda | Web Developer Expert</title>
    <meta content="Jasa pembuatan web murah, paling terjangkau, dengan fitur tanpa batas." name="description">
    <meta content="jasa pembuatan web, buat website murah, jasa website murah di medan, desain web murah, desain web profesional." name="keywords">

    <meta property="og:type" content="page" />
    <meta property="og:title" content="Dwi Star Muda - Web Developer Expert" />
    <meta property="og:description" content="Jasa Pembuatan Website." />
    <meta property="og:url" content="https://www.thisoneway.com" />
    <meta property="og:image" content="https://www.thisoneway.com/up/2022/dsm.jpg" />


    <link href="assets/img/favicon.png" rel="icon">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">


    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '435114117113579');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=435114117113579&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index">DSM</a></h1>

            <!-- silahkan uncomment jika ingin mengggunakan logo -->
            <!-- <a href="https://thisoneway.com" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
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
                            <li><a class="nav-link scrollto" href="#call-to-action">Project Canvas</a></li>
                            <li><a class="nav-link scrollto" href="#pricing">Pricing</a>
                            <li><a class="nav-link scrollto" href="term-of-service">Terms of Service</a>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Digital Solution<br>to Grow Your <span>Business!</span></h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">About Me</a>
                    </div>
                </div>

                <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/solution.png" alt="solution-header" class="img-fluid">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                            <img src="assets/img/dsm.jpg" alt="dwistarmuda - Web Developer Expert">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                            <h2>About Me</h2>
                            <h3>Dwi Star Muda</h3>
                            <p>
                                Nama Lengkap Saya <b>Dwi Star Muda</b>. Biasa dipanggil dengan nama <b>Dwi</b> atau <b>Star</b> atau <b>Muda</b>. Selagi itu masih bagian dari nama lengkap saya ya tidak masalah. Nulis intro di website serasa nulis diary ya. Hehe.
                            </p>
                            <p>
                                Saya adalah seorang Web Developer Expert baik di bidang Front-End maupun Back-End atau biasa dikenal dengan Full Stack Developer.
                            </p>
                            <p>
                                Sebagai Web Developer Expert bahasa pemrograman yang paling sering mendukung saya adalah :
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> HTML</li>
                                <li><i class="bi bi-check-circle"></i> CSS</li>
                                <li><i class="bi bi-check-circle"></i> Javascript</li>
                                <li><i class="bi bi-check-circle"></i> PHP</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Jasa Pembuatan Website</h3>
                    <p>Saya menyediakan jasa pembuatan web dengan 6 kategori di bawah ini.</p>
                </header>

                <div class="row g-5">

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <div class="icon" style="background: #fceef3;"><i class="bi bi-gear-wide-connected" style="color: #ff689b;"></i></div>
                            <h4 class="title"><a href="cwebsite">Custom Website</a></h4>
                            <p class="description">
                                Website yang dapat mengikuti alur kerja yang Anda inginkan, seperti website sekolah, UMKM,care/resto, jasa rental kendaraan, jasa salon, catering dan lain-lain.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <div class="icon" style="background: #fff0da;"><i class="bi bi-building" style="color: #e98e06;"></i></div>
                            <h4 class="title"><a href="cprofile">Company Profile</a></h4>
                            <p class="description">
                                Website yang menampilkan profil perusahaan, kegiatan bisnis atau profil usaha yang Anda miliki.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="box">
                            <div class="icon" style="background: #e6fdfc;"><i class="bi bi-window-sidebar" style="color: #3fcdc7;"></i></div>
                            <h4 class="title"><a href="landingpage">Landing Page</a></h4>
                            <p class="description">
                                Website yang menampilkan sebuah halaman profil produk tertentu secara spesifik setelah iklan promosi agar meningkatkan konversi penjualan.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <div class="icon" style="background: #eafde7;"><i class="bi bi-window-dock" style="color:#41cf2e;"></i></div>
                            <h4 class="title"><a href="cms">CMS Website</a></h4>
                            <p class="description">
                                Website Content Management System yang praktis, siap pakai dan dapat Anda kembangkan sendiri tanpa paham bahasa pemrograman.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class=" box">
                            <div class="icon" style="background: #e1eeff;"><i class="bi bi-shop" style="color: #2282ff;"></i></div>
                            <h4 class="title"><a href="onlineshop">Toko Online</a></h4>
                            <p class="description">
                                Website untuk menjual berbagai macam produk. Sudah terintegrasi dengan sistem cek ongkir otomatis dan beragam metode pembayaran digital.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="box">
                            <div class="icon" style="background: #ecebff;"><i class="bi bi-window-stack" style="color: #8660fe;"></i></div>
                            <h4 class="title"><a href="rebuild">Rebuild Website</a></h4>
                            <p class="description">Untuk Anda yang sudah memiliki website namun ingin mengubah atau memperbaruinya kembali.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container-fluid" data-aos="fade-up">

            </div>

            <div class="container">
                <div class="row counters" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="76" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Clients</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="37" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Months Of Support</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects Completed</p>
                    </div>

                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action">
            <div class="container" data-aos="zoom-out">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3 class="cta-title">Project Canvas</h3>
                        <p class="cta-text">
                            Mulai membuat website dengan mengirimkan materi lengkap konten website Anda melalui prosedur Project Canvas berikut ini.
                        </p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="pjcanvas">Ajukan Project Canvas</a>
                    </div>
                </div>

            </div>
        </section><!--  End Call To Action Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="row feature-item">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="assets/img/features-1.svg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0" data-aos="fade-left" data-aos-delay="150">
                        <h4>Jangkau pelanggan lebih banyak dengan website Anda.</h4>
                        <p>Anda dapat mengintegerasikan proses pemasarn digital (Digital Marketing) melalui website Anda. Sebuah alamat web dengan domain yang profesional dapat meningkatkan kepercayaan calon pelanggan Anda, sekaligus bisnis Anda terlihat lebih profesional.
                        </p>
                        <p>Anda dapat mengumpulkan banyak calon pelanggan potensial dari berbagai kanal sosial media ke website profesional Anda. Caranya sederhana dengan melampirkan sebaris alamat website Anda di sosial media.</p>
                    </div>
                </div>

                <div class="row feature-item mt-5 pt-5">
                    <div class="col-lg-6 wow fadeInUp order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="assets/img/features-2.svg" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right" data-aos-delay="150">
                        <h4>Bagaimana website meningkatkan omset Anda?</h4>
                        <p>
                            Mana yang lebih mudah bagi seseorang untuk menghubungi Anda?
                            <br>Memberitahukannya alamat website Anda? atau
                            <br>Memberikan data profil usaha Anda secara detail pada selembar brosur?
                        </p>
                        <p>
                            Tentu hal yang paling mudah bagi banyak orang adalah dengan mengunjungi alamat web Anda dan mendapatkan informasi secara detail tentang bisnis Anda di sana. Termasuk memudahkan mereka agar segera menghubungi Anda.
                        </p>
                    </div>

                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">My Portfolio</h3>
                </header>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <?php foreach ($porto as $data) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/portfolio/<?= $data["foto"]; ?>" class=" img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4><a href=""><?= $data["nama_porto"]; ?></a></h4>
                                    <div>
                                        <a href="assets/img/portfolio/<?= $data["foto"]; ?>" data-gallery="portfolioGallery" title="<?= $data["nama_porto"]; ?>" class="link-preview portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                        <a href="" class="link-details" title="Detail"><i class="bi bi-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> <!-- akhir container porto-->

            </div>
        </section><!-- Akhir section porto -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Testimonials</h3>
                </header>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">
                                <?php foreach ($testi as $data) : ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <img src="assets/img/<?= $data["foto"]; ?>" class="testimonial-img" alt="<?= $data["nama"]; ?>">
                                            <h3><?= $data["nama"]; ?></h3>
                                            <h4><?= $data["domain"]; ?></h4>
                                            <p>
                                                <?= $data["komentar"]; ?>
                                            </p>
                                        </div>
                                    </div><!-- End testimonial item -->
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg wow fadeInUp">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Pricing</h3>
                </header>
                <br>
                <div class="row flex-items-xs-middle flex-items-xs-center">

                    <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">Custom Website</span></h3>
                                <h5><span class="currency"><s>Rp.8.500.000</s></span></h5>
                                <h3><span class="currency">Mulai Dari</span></h3>
                                <h3><span class="currency">Rp.</span>5.500<span class="period">.000</span></h3>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item">Unlimited SSD Web Space</li>
                                    <li class="list-group-item">Unlimited Bandwith</li>
                                    <li class="list-group-item">Unlimited Database</li>
                                    <li class="list-group-item">Unlimited Email</li>
                                    <li class="list-group-item">Free Domain .com/.id/.org</li>
                                    <li class="list-group-item">Free Auto SSL</li>
                                    <li class="list-group-item">Litespeed Web Server</li>
                                    <li class="list-group-item">Siap Pakai</li>
                                    <li class="list-group-item">Free Support 24/7</li>
                                    <li class="list-group-item">Bebas Revisi</li>
                                    <li class="list-group-item">Kustomisasi Fitur</li>
                                    <li class="list-group-item">Perpanjangan tahun berikutnya <br>hanya Rp.499.000,-</li>
                                </ul>
                                <a href="order?id=1" class="btn">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">Company Profile</span></h3>
                                <h5><span class="currency"><s>Rp.3000.000</s></span></h5>
                                <h3><span class="currency">Mulai Dari</span></h3>
                                <h3><span class="currency">Rp.</span>1.499<span class="period">.000</span></h3>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item">5 Halaman</li>
                                    <li class="list-group-item">Unlimited SSD Web Space</li>
                                    <li class="list-group-item">Unlimited Bandwith</li>
                                    <li class="list-group-item">Unlimited Database</li>
                                    <li class="list-group-item">Unlimited Email</li>
                                    <li class="list-group-item">Free Domain .com/.id/.org</li>
                                    <li class="list-group-item">Free Auto SSL</li>
                                    <li class="list-group-item">Litespeed Web Server</li>
                                    <li class="list-group-item">Siap Pakai</li>
                                    <li class="list-group-item">Free Suppport 24/7</li>
                                    <li class="list-group-item">Revisi 2x</li>
                                    <li class="list-group-item">Perpanjangan tahun berikutnya hanya Rp.499.000,-</li>
                                </ul>
                                <a href="order?id=2" class="btn">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">Landing Page</span></h3>
                                <h5><span class="currency"><s>Rp.1000.000</s></span></h5>
                                <h3><span class="currency">Mulai Dari</span></h3>
                                <h3><span class="currency">Rp.</span>499<span class="period">.000</span></h3>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item">1 Halaman</li>
                                    <li class="list-group-item">Belum Termasuk Hosting</li>
                                    <li class="list-group-item">Unlimited Bandwith</li>
                                    <li class="list-group-item">1 akun Database</li>
                                    <li class="list-group-item">1 akun Email</li>
                                    <li class="list-group-item">Free Domain .my.id</li>
                                    <li class="list-group-item">Free Auto SSL</li>
                                    <li class="list-group-item">Free Opt-in Page</li>
                                    <li class="list-group-item">Litespeed Web Server</li>
                                    <li class="list-group-item">Siap Pakai</li>
                                    <li class="list-group-item">Free Suppport 24/7</li>
                                    <li class="list-group-item">Perpanjangan tahun berikutnya hanya Rp.299.000,-</li>
                                </ul>
                                <a href="order?id=3" class="btn">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-4 mt-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">CMS Wordpress</span></h3>
                                <h5><span class="currency"><s>Rp.1.200.000</s></span></h5>
                                <h3><span class="currency">Mulai Dari</span></h3>
                                <h3><span class="currency">Rp.</span>599<span class="period">.000</span></h3>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item">Unlimited Halaman</li>
                                    <li class="list-group-item">Belum Termasuk Hosting</li>
                                    <li class="list-group-item">Unlimited Bandwith</li>
                                    <li class="list-group-item">1 akun Database</li>
                                    <li class="list-group-item">1 akun Email</li>
                                    <li class="list-group-item">Free Domain .my.id</li>
                                    <li class="list-group-item">Free Auto SSL</li>
                                    <li class="list-group-item">Free Opt-in Page</li>
                                    <li class="list-group-item">Litespeed Web Server</li>
                                    <li class="list-group-item">Siap Pakai</li>
                                    <li class="list-group-item">Free Suppport 24/7</li>
                                    <li class="list-group-item">Perpanjangan tahun berikutnya hanya Rp.499.000,-</li>
                                </ul>
                                <a href="order?id=4" class="btn">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-4 mt-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">Toko Online</span></h3>
                                <h5><span class="currency"><s>Rp.5.000.000</s></span></h5>
                                <h3><span class="currency">Mulai Dari</span></h3>
                                <h3><span class="currency">Rp.</span>2.499<span class="period">.000</span></h3>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item">Unlimited SSD Web Space</li>
                                    <li class="list-group-item">Unlimited Bandwith</li>
                                    <li class="list-group-item">Unlimited Database</li>
                                    <li class="list-group-item">Unlimited Email</li>
                                    <li class="list-group-item">Free Domain .my.id</li>
                                    <li class="list-group-item">Free Auto SSL</li>
                                    <li class="list-group-item">Terintegerasi Whatsapp Checkout</li>
                                    <li class="list-group-item">Unlimited Produk</li>
                                    <li class="list-group-item">Litespeed Web Server</li>
                                    <li class="list-group-item">Siap Pakai</li>
                                    <li class="list-group-item">Free Suppport 24/7</li>
                                    <li class="list-group-item">Perpanjangan tahun berikutnya hanya Rp.499.000,-</li>
                                </ul>
                                <a href="order?id=5" class="btn">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-4 mt-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">Rebuild Website</span></h3>
                                <h3><span class="currency">Call Me.</h3><br>
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item">Siap Pakai</li>
                                    <li class="list-group-item">Free Suppport 24/7</li>
                                    <li class="list-group-item">Free Konsultasi Fitur</li>
                                    <li class="list-group-item">Kustomisasi Fitur</li>
                                    <li class="list-group-item">Proses pengerjaan 5 - 7 hari kerja.</li>
                                </ul>
                                <a href="order?id=6" class="btn">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Pertanyaan Paling Sering Diajukan</h3>
                </header>
                <br>
                <ul class="faq-list" data-aso="fade-up" data-aos-delay="100">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                            Apakah jasa pembuatan website sudah termasuk hosting dan domain?
                            <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Harga yang ditawarkan sudah termasuk hosting dan domain untuk domain tertentu seperti .com/.id/.org.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">
                            Bagaimana cara saya mengirimkan materi website yang saya miliki?
                            <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Anda dapat mengirimkannya melalui <a class="badge rounded-pill bg-primary" href="#call-to-action">Project Canvas</a> cukup dengan mengklik tombol Ajukan Project Canvas.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
                            Metode pembarayan apa saja yang mendukung saat pemesanan.
                            <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Kami mendukung hampir seluruh metode pembayaran di Indonesia. Termasuk pembayaran melalui dompet digital.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
                            Apakah harga website untuk selamanya?
                            <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Harga website berlaku untuk 1 tahun pertama. Pada tahun berikutnya dan seterusnya Anda cukup membayarkan biaya perpanjangan yang sangat terjangkau.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">
                            Bagaimana jika saya sudah memiliki hosting dan domain?
                            <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Anda cukup membayar jasa pembuatan web saja. Anda dapat mengetahui rinciannya saat melakukan pemesanan.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">
                            Saya ingin memiliki website tapi saya gaptek?
                            <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Anda dapat menggunakan website <b>Content Management System</b> yang siap pakai dan dapat Anda kembangkan sendiri dengan mudah tanpa harus memahami bahasa pemrograman.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- End F.A.Q Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
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