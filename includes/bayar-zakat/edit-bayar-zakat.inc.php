<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['edit-submit'])) {
    require '../dbh.inc.php';
    $id = $_GET['id'];
    $nama = $_POST['nama_muzakki'];
    $tngpn = $_POST['jml_tngpn'];
    $jmlBayar = $_POST['jml_bayar'];
    $jenis = $_POST['jenis'];
    $jmlUang = $_POST['jml_uang'];
    $jmlBeras = $_POST['jml_beras'];

    if (empty($jenis)) {
        header("Location: {$path}/includes/edit.inc.php?idBayar=".$id."&error=emptyJenisFields");
        exit();
    }
    else {
        $sql = "UPDATE bayarzakat SET nama_muzakki=?, jumlah_tanggungan=?, jenis_bayar=?, jumlah_tanggunganyangdibayar=?, bayar_beras=?, bayar_uang=? WHERE id_zakat=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: {$path}/pages/bayar-zakat.php?error=sqlerror-update");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "sisiddi", $nama, $tngpn, $jenis, $jmlBayar, $jmlBeras, $jmlUang, $id);
            mysqli_stmt_execute($stmt);
            header("Location: {$path}/pages/bayar-zakat.php?editZakat=success");
        }
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/bayar-zakat.php");
    exit();
}