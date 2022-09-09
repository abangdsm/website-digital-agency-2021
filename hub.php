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

function pesan($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $whatsapp = htmlspecialchars($data["whatsapp"]);
    $pesan = htmlspecialchars($data["pesan"]);
    $query = "INSERT INTO tbpesan VALUES 
            ('', '$nama', '$email', '$whatsapp', '$pesan')";
    mysqli_query($conn, $query);
    return (mysqli_affected_rows($conn));
}

function subs($data)
{
    global $conn;
    $email = htmlspecialchars($data["email"]);
    $query = "INSERT INTO subscriber VALUES ('', '$email')";
    mysqli_query($conn, $query);
    return (mysqli_affected_rows($conn));
}

function reg_user($data)
{
    global $conn;
    $tgl_reg = $data["tgl_reg"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $whatsapp = htmlspecialchars($data["whatsapp"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_escape_string($conn, $data["password"]);
    $conpassword = mysqli_escape_string($conn, $data["conpassword"]);

    $adaemail = mysqli_query($conn, "SELECT email FROM tbclient WHERE email = '$email'");
    if (mysqli_fetch_assoc($adaemail)) {
        echo "<script>alert('Email sudah terdaftar. Silahkan gunakan email yang berbeda.')</script>";
        return false;
    }

    $adawa = mysqli_query($conn, "SELECT whatsapp FROM tbclient WHERE whatsapp = '$whatsapp'");
    if (mysqli_fetch_assoc($adawa)) {
        echo "<script>alert('Nomor whatsapp sudah terdaftar. Silahkan gunakan nomor yang berbeda.')</script>";
        return false;
    }

    $adauser = mysqli_query($conn, "SELECT username FROM tbclient WHERE username = '$username'");
    if (mysqli_fetch_assoc($adauser)) {
        echo "<script>alert('Username sudah terdaftar. Silahkan gunakan username yang berbeda.')</script>";
        return false;
    }

    if ($password !== $conpassword) {
        echo "<script>alert('Password tidak sama, silahkan ulangi.')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO tbclient VALUES ('', '$tgl_reg', '$nama', '$email', '$whatsapp', '$username', '$password')");
    return (mysqli_affected_rows($conn));
}

function getorder($data)
{
    global $conn;
    $tgl_order = htmlspecialchars($data["tgl_order"]);
    $jasa = htmlspecialchars($data["jasa"]);
    $harga = htmlspecialchars($data["harga"]);
    $status_order = htmlspecialchars($data["status_order"]);
    $status_project = htmlspecialchars($data["status_project"]);
    $id_nama = htmlspecialchars($data["id_nama"]);
    $insert = "INSERT INTO tborder VALUES('', '$tgl_order', '$jasa', '$harga', '$status_order', '$status_project', '$id_nama')";
    mysqli_query($conn, $insert);
    return (mysqli_affected_rows($conn));
}

function bayar($data)
{
    global $conn;
    $tgl_order = htmlspecialchars($data["tgl_order"]);
    $tgl_bayar = htmlspecialchars($data["tgl_bayar"]);
    $nama_jasa = htmlspecialchars($data["nama_jasa"]);
    $bukti = buktitf();
    if (!$bukti) {
        return false;
    }
    $rekening = htmlspecialchars($data["rekening"]);
    $nama_user = htmlspecialchars($data["nama"]);
    $id_jasa = htmlspecialchars($data["id_jasa"]);
    $insert = "INSERT INTO confirmbayar VALUES ('', '$tgl_order', '$tgl_bayar', '$nama_jasa', '$bukti', '$rekening', '$nama_user', '$id_jasa')";
    mysqli_query($conn, $insert);
    return (mysqli_affected_rows($conn));
}

function buktitf()
{
    $namaFile = $_FILES['bukti_transfer']['name'];
    $ukuranFile = $_FILES['bukti_transfer']['size'];
    $error = $_FILES['bukti_transfer']['error'];
    $tmpName = $_FILES['bukti_transfer']['tmp_name'];
    if ($error === 4) {
        echo "<script>alert('Anda belum mengupload foto struk.')</script>";
        return false;
    }
    $fmtBoleh = ['jpg', 'jpeg', 'png'];
    $fmtStruk = explode('.', $namaFile);
    $fmtStruk = strtolower(end($fmtStruk));
    if (!in_array($fmtStruk, $fmtBoleh)) {
        echo "<script>alert('Format foto struk yang diperbolehkan: JPG, JPEG, PNG. Format yang ada upload adalah $fmtStruk')</script>";
        return false;
    }
    if ($ukuranFile > 2000000) {
        echo "<script>alert('Maksimal ukuran file foto struk adalah 2Mb')</script>";
        return false;
    }
    $newString = uniqid();
    $newString .= ".";
    $newString .= $fmtStruk;
    move_uploaded_file($tmpName, 'assets/img/bukti_transfer/' . $newString);
    return $newString;
}
