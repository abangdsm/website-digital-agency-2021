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

    <title>Terms of Service | Dwi Star Muda | Web Developer Expert</title>
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
                    <li><a class="nav-link scrollto active" href="https://thisoneway.com">Home</a></li>
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/#about">About</a></li>
                    <li><a class="nav-link scrollto" href="https://thisoneway.com/#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="https://thisoneway.com/#portfolio">Portfolio</a></li>
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
                            <li><a class="nav-link scrollto" href="https://thisoneway.com/#call-to-action">Project Canvas</a></li>
                            <li><a class="nav-link scrollto" href="https://thisoneway.com/#pricing">Pricing</a>
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

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container text-center">
                <h2>Syarat dan Ketentuan<br>Jasa Pembuatan Website</h2>
                <h6>Terms of Service</h6>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-12 mb-2">
                        <div class="portfolio-info">
                            <h3>Syarat dan Ketentuan Umum</h3>
                            <h4>Berikut ini adalah syarat & ketentuan umum jasa pembuatan website.</h4>
                            <ol>
                                <li>
                                    Isi dari konten website seluruhnya adalah tanggungjawab pelanggan.
                                </li>
                                <li>
                                    Segala materi yang berkaitan dengan konten, tulisan, audio, gambar, video dan file lainnya yang di website merupakan tanggung jawab penuh pelanggan sehingga DSM terbebas dari tuduhan dan tuntutan pelanggaran hak cipta.
                                </li>
                                <li>
                                    Materi website tidak boleh mengandung unsur SARA, pornografi, perjudian, money game atau unsur lainnya yang dilarang dan bersifat melanggar hukum di Indonesia.
                                </li>
                                <li>
                                    Harga sudah termasuk <b>Domain</b> selain domain dengan syarat khsusus seperti <b>.sch</b>, <b>.ac.id</b>, <b>.co.id</b> atau domain lainnya yang membutuhkan syarat khusus. Harga juga sudah termasuk <b>Hosting</b> untuk 1 tahun<b> selain website CMS Wordpress dan Landing Page</b> (dengan ketentuan tidak termasuk hosting).
                                </li>
                                <li>
                                    Pelanggan tidak diperkenankan memberikan akun cpanel kepada pihak lain tanpa sepengetahuan pengelola Jasa Pembuatan Website DSM.
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!--akhir snk umum-->


                    <div class="col-lg-12 mb-2">
                        <div class="portfolio-info">
                            <h3>Kewajiban Pelanggan</h3>
                            <h4>Berikut ini adalah kewajiban pelanggan DSM.</h4>
                            <ol>
                                <li>
                                    Bersedia membaca seluruh syarat dan ketentuan ini sebelum mendaftar sebagai pelanggan dan bersedia mentaatinya setelah mendaftar sebagai pelanggan.
                                </li>
                                <li>
                                    Bersedia memberikan informasi yang lengkap, data yang valid dan email aktif yang dapat berfungsi dengan baik saat melakukan pendaftaran sebagai pelanggan.
                                </li>
                                <li>Bersedia membayar tagihan/pelunasan tepat waktu sesuai tenggat jatuh tempo.</li>
                            </ol>
                        </div>
                    </div>
                    <!--akhir kewajiban pelanggan-->


                    <div class="col-lg-12 mb-2">
                        <div class="portfolio-info">
                            <h3>Pemenuhan Materi/Konten Website</h3>
                            <h4>Berikut ini adalah metode pemenuhan materi/konten website.</h4>
                            <ol>
                                <li>
                                    Untuk jenis website CMS Wordpress dan Landing Page, jumlah halaman, fitur dan desain template telah ditentukan sesuai harga pilihan paket. Apabila terdapat tambahan halaman, fitur dan perubahan desain template akan dikenakan biaya tambahan.
                                </li>
                                <li>
                                    Data yang dikirimkan melalui project canvas adalah data yang siap digunakan tanpa harus melalui proses editing. Apabila ada permintaan editing akan dikenakan biaya tambahan.
                                </li>
                                <li>
                                    Format konten yang dikirimkan melalui halaman Project Canvas mengikuti format yang telah disediakan.
                                </li>
                                <li>
                                    Revisi hanya menyesuaikan terhadap jumlah halaman dan fitur yang telah dipilih sesuai harga paket jasa.
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-5">
                        <div class="portfolio-info">
                            <h3>Proses Pengerjaan Website dan Revisi</h3>
                            <h4>Berikut adalah ketentuan proses pengerjaan website serta revisinya.</h4>
                            <ol>
                                <li>
                                    Proses pengerjaan website dimulai setelah pelanggan melakukan Down Payment sebesar 50% dari harga final atau harga setelah negosiasi.
                                </li>
                                <li>
                                    Untuk website CMS Wordpress dan Landing Page tidak berlaku Down Payment. Proses pengerjaan dimulai setelah pelunasan.
                                </li>
                                <li>
                                    Setelah melakukan pembayaran Down Payment atau Pelunasan, mohon lakukan konfirmasi pembayaran disertai bukti pembayaran melalui halaman konfirmasi pembayaran pada Client Area.
                                </li>
                                <li>
                                    Seluruh materi dan bahan yang akan digunakan untuk membangun website custom seperti: Logo, Slide Banner, Desain Database, dan materi pendukung lainnya disediakan oleh pelanggan. Anda dapat mengunduh format materi yang perlu disediakan pada halaman <b>Project Canvas</b>.
                                </li>
                                <li>
                                    Jika belum memiliki materi untuk membuat website kami dapat membantu menyelesaikannya dengan sedikit biaya tambahan yang bersifat menyesuaikan.
                                </li>
                                <li>
                                    Informasi tentang konten website adalah data yang siap upload tanpa harus melewati proses editing. Jika terdapat materi konten website yang harus melalui tahapan editing akan dikenakan biaya tambahan.
                                </li>
                                <li>
                                    Khusus untuk website <b>CMS Wordpress</b> dan <b>Landing Page</b>, telah disediakan fitur dan template tertentu. Jika ingin fitur dan template lainnya akan dikenakan biaya tambahan di luar harga paket yang dipilih.
                                </li>
                                <li>
                                    Website dapat diselesaikan dalam 5 - 7 hari kerja kecuali <b>Custom Website</b> dengan proses pengerjaan sesuai fitur dan jumlah halaman serta penyesuaian template yang akan digunakan.
                                </li>
                                <li>
                                    Khusus untuk website CMS Wordpress dan Landing Page. Dapat diselesaikan dalam 1 hari kerja.
                                </li>
                                <li>
                                    Pemesan wajib untuk selalu rutin membackup data-data website untuk menghindari sesuatu yang tidak diinginkan yang disebabkan karena musibah atau bencana.
                                </li>
                                <li>
                                    Revisi website hanya berlaku untuk hal-hal yang berkaitan dengan proses pengerjaan seperti layout, konten, perbaikan atas kesalahan input data atau gambar.
                                </li>
                                <li>
                                    Revisi tidak termasuk penambahan fitur, perubahan desain layout dan template, penambahan halaman di luar ketentuan paket, serta perubahan logo yang telah disetujui.
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-5">
                        <div class="portfolio-info">
                            <h3>Peringatan & Pelanggaran</h3>
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading text-center">Adapun Ketentuan <b>Peringatan</b> atas <b>Pelanggaran</b> terhadap syarat dan ketentuan di atas adalah :</h4>
                                <hr>
                                <p class="mb-0">
                                <ol>
                                    <li>
                                        Peringatan keras sebanyak 1 (satu) kali dan mewajibkan pelanggan membayar denda sebesar harga jasa yang telah dibeli.
                                    </li>
                                    <li>
                                        Jika mengabaikan peringatan keras dan tetap melanggar syarat dan ketentuan, maka pihak pengelola DSM berhak menghentikan layanan secara sepihak tanpa kewajiban mengembalikan biaya berlangganan.
                                    </li>
                                </ol>
                                </p>
                                <p>
                                    <small>
                                        Syarat dan ketentuan di atas telah berlaku sejak pelanggan mendaftarkan diri dan menjadi pelanggan jasa pembuatan website DSM.
                                    </small>
                                </p>
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