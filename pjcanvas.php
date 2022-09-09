<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coming Soon 12</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="assets/img/favicon.png" rel="icon">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/uc/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/uc/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/uc/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/uc/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/uc/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/uc/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/uc/css/main.css">
    <!--===============================================================================================-->
</head>

<body>



    <div class="flex-w flex-str size1 overlay1">
        <div class="flex-w flex-col-sb wsize1 bg0 p-l-65 p-t-37 p-b-50 p-r-80 respon1">


            <div class="w-full flex-c-m p-t-80 p-b-90">
                <div class="wsize2">
                    <h3 class="l1-txt1 p-b-34 respon3">
                        Halaman Sedang Diperbaiki
                    </h3>

                    <p class="m2-txt1 p-b-46">
                        Mohon tinggalkan email Anda dibawah ini agar kami tau bahwa Anda ingin menghubungi kami.
                    </p>

                    <form class="contact100-form validate-form m-t-10 m-b-10">
                        <div class="wrap-input100 validate-input m-lr-auto-lg" data-validate="Email is required: ex@abc.xyz">
                            <input class="s2-txt1 placeholder0 input100 trans-04" type="text" name="email" placeholder="Email">

                            <button class="flex-c-m ab-t-r size2 hov1" type="submit" name="kirim">
                                <i class="zmdi zmdi-long-arrow-right fs-30 cl1 trans-04"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <div class="wsize1 simpleslide100-parent respon2">
            <!--  -->
            <div class="simpleslide100">
                <div class="simpleslide100-item bg-img1" style="background-image: url('assets/uc/images/bg01.jpg');"></div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="assets/uc/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/uc/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/uc/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/uc/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/uc/vendor/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/uc/js/main.js"></script>

</body>

</html>