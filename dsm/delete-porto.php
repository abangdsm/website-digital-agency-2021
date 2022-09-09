<?php
include 'adminhub.php';

$id = $_GET["id"];

if (delporto($id) > 0) {
    echo "<script>alert('Satu portofolio Anda dihapus'); document.location.href='porto'</script>";
} else {
    echo "<script>alert('Satu portofolio Anda gagal dihapus'); document.location.href='porto'</script>";
}
