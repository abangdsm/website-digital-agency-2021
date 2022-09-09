<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="footer-info">
                                <h3>DSM</h3>
                                <h4>Dwi Star Muda</h4>
                                <p>Digital Solution to Grow Your Business.</p>
                                <p>Jasa Pembuatan Web Profesional.</p>
                            </div>


                            <div class="footer-newsletter">
                                <h4>Berlangganan Informasi</h4>
                                <form action="" method="post">
                                    <input type="email" name="email" placeholder="email" required autocomplete="off"><input type="submit" value="Subscribe">
                                </form><br>
                            </div>
                            <!-- 
                            <div class="footer-info">
                                <h4>Metode Pembayaran</h4>
                                <img src=" assets/img/paymentgateway.png" alt="paymentgateway" width="250">
                            </div> -->

                        </div>

                        <div class="col-sm-6">
                            <div class="footer-links">
                                <h4>Menu</h4>
                                <ul>
                                    <li><a href="#hero">Home</a></li>
                                    <li><a href="#about">About us</a></li>
                                    <li><a href="#services">Services</a></li>
                                    <li><a href="#">Terms of service</a></li>
                                </ul>
                            </div>

                            <div class="footer-links">
                                <h4>Contact Us</h4>
                                <p>
                                    Tanjung Morawa <br>
                                    Kab. Deli Serdang<br>
                                    Sumatera Utara <br>
                                    <strong>Phone:</strong> +62812 6464 3110<br>
                                    <strong>Email:</strong> service@thisoneway.com<br>
                                </p>
                            </div>

                            <div class="social-links">
                                <a href="https://github.com/abangdsm" target="_blank" class="github"><i class="bi bi-github"></i></a>
                                <a href="https://instagram.com/dwistarmuda.id" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCRedcJdUuUsEMNVRANISM3g" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                                <a href="https://wa.me/6281264643110" class="discord"><i class="bi bi-whatsapp"></i></a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="form">

                        <h4>Kirim Pesan</h4>
                        <?php if (isset($_POST["kirim"])) {
                            if (pesan($_POST) > 0) {
                                echo "<script>alert('Pesan berhasil terkirim'); document.location.header='https://thisoneway.com'</script>";
                            } else {
                                echo "<script>alert('Pesan gagal terkirim'); document.location.header='https://thisoneway.com'</script>";
                            }
                        }

                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required autocomplete="off">
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autocomplete="off">
                            </div>
                            <div class="form-group mt-3">
                                <input type="number" class="form-control" name="whatsapp" id="whatsapp" placeholder="Whatsapp" required autocomplete="off">
                            </div>
                            <div class="form-group mt-3 mb-2">
                                <textarea class="form-control" name="pesan" rows="5" placeholder="Isi Pesan" required autocomplete="off"></textarea>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-info" type="submit" name="kirim" style="color:white;">Kirim Pesan</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

            <header class="section-header">
                <h3>Metode Pembayaran</h3>
            </header>
            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/partners/bank_BRI.png" class="img-fluid" alt="bank_bri"></div>
                    <div class="swiper-slide"><img src="assets/img/partners/gopay.png" class="img-fluid" alt="gopay"></div>
                    <div class="swiper-slide"><img src="assets/img/partners/ovo_logo.png" class="img-fluid" alt="ovo"></div>
                    <div class="swiper-slide"><img src="assets/img/partners/shopee_pay.png" class="img-fluid" alt="shopeepay"></div>
                    <div class="swiper-slide"><img src="assets/img/partners/jenius.png" class="img-fluid" alt="jenius"></div>
                    <div class="swiper-slide"><img src="assets/img/partners/dana.png" class="img-fluid" alt="dana"></div>
                    <div class="swiper-slide"><img src="assets/img/partners/linkaja.png" class="img-fluid" alt="linkaja"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>DSM</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Developed By <a href="https://thisoneway.com/">Dwi Star Muda</a> - Web Developer Expert
        </div>
    </div>
</footer>