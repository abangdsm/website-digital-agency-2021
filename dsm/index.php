<?php
session_start();
require 'adminhub.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM tbuser WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row["username"])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header('Location: admin-panel');
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username'");
    // cek username

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["password"])) {

            // buat sesi
            $_SESSION["login"] = true;


            // cek tetap masuk
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 3600);

                setcookie('key', hash('sha256', $row["username"]));
                $_SESSION["login"] = true;
            }
        }
        header('Location: admin-panel');
        exit;
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dwi Star Muda | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../img/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(../assets/img/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Login Admin
                    </span>
                </div>
                <div class="row text-center mb-5">
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Username atau Password Anda salah!
                        </div>
                    <?php endif; ?>
                </div>
                <form action="" method="POST" class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Enter username" required autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="Enter password" required autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="remember" type="checkbox" name="remember">
                            <label class="label-checkbox100" for="remember">
                                Ingat Saya
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Lupa Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="login">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>