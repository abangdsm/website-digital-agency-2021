<?php
$conn = mysqli_connect("localhost", "root", "", "myporto");

function query($data)
{
    global $conn;
    $hasil = mysqli_query($conn, $data);
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }
    return $rows;
}

function daftaradmin($data)
{
    global $conn;
    $email = htmlspecialchars($data["email"]);
    $username = strtolower(stripslashes($data["username"]));
    $pass = mysqli_escape_string($conn, $data["pass"]);
    $conpass = mysqli_escape_string($conn, $data["conpass"]);

    $adaemail = mysqli_query($conn, "SELECT email FROM tbuser WHERE email = '$email'");
    if (mysqli_fetch_assoc($adaemail)) {
        echo "<script>alert('Email sudah terdaftar. Silahkan gunakan email lain.')</script>";
        return false;
    }

    $adauser = mysqli_query($conn, "SELECT username FROM tbuser WHERE username = '$username'");
    if (mysqli_fetch_assoc($adauser)) {
        echo "<script>alert('Username sudah terdaftar. Silahkan gunakan username lain.')</script>";
        return false;
    }

    if ($pass !== $conpass) {
        echo "<script>alert('Password tidak sama, silahkan ulangi.')</script>";
        return false;
    }

    $pass = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO tbuser VALUES ('', '$email', '$username', '$pass')");
    return (mysqli_affected_rows($conn));
}

function addporto($data)
{
    global $conn;
    $nama_porto = htmlspecialchars($data["nama_porto"]);
    $foto = upload_porto();
    if (!$foto) {
        return false;
    }
    $insert = "INSERT INTO tbporto VALUES ('', '$nama_porto', '$foto')";
    mysqli_query($conn, $insert);
    return (mysqli_affected_rows($conn));
}

function upload_porto()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Silahkan upload foto')</script>";
        return false;
    }

    $fmtvalid = ['jpg', 'jpeg', 'png'];
    $fmtFoto = explode('.', $namaFile);
    $fmtFoto = strtolower(end($fmtFoto));
    if (!in_array($fmtFoto, $fmtvalid)) {
        echo "<script>alert('Format foto yang diperbolehkan (JPG, JPEG, PNG)')</script>";
        return false;
    }

    if ($ukuranFile > 5000000) {
        echo "<script>alert('Ukuran foto lebih dari 5MB')</script>";
        return false;
    }

    $newString = uniqid();
    $newString .= '.';
    $newString .= $fmtFoto;
    move_uploaded_file($tmpname, '../assets/img/portfolio/' . $newString);
    return $newString;
}

function delporto($data)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbporto WHERE id=$data");
    return (mysqli_affected_rows($conn));
}

function ubah_status_order($data)
{
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $status = htmlspecialchars($data["status_order"]);
    mysqli_query($conn, "UPDATE tborder SET status_order='$status' WHERE id=$id");
    return (mysqli_affected_rows($conn));
}

function ubah_status_proses($data)
{
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $status = htmlspecialchars($data["status_project"]);
    mysqli_query($conn, "UPDATE tborder SET status_project='$status' WHERE id=$id");
    return (mysqli_affected_rows($conn));
}
