<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['edit-submit'])) {
    require '../dbh.inc.php';
    $id = $_GET['id'];
    $nama = $_POST['nama_muzakki'];
    $tngpn = $_POST['jml_tngpn'];
    $ket = $_POST['ket'];

    if (empty($nama) || empty($tngpn) || empty($ket)) {
        header("Location: {$path}/includes/edit.inc.php?idMuzakki=".$id."&error=emptyFields&uid=".$nama."&tngpn=".$tngpn."&ket=".$ket);
        exit();
    }
    else {
        $sql_muzzaki = "UPDATE muzakki SET nama_muzakki=?, jumlah_tanggupan=?, keterangan=? WHERE id_muzakki=?";
        $sql_bayar = "UPDATE muzakki_bayar SET nama_muzakki=?, jumlah_tanggupan=?, keterangan=? WHERE id_muzakki_bayar=?";
        $sql_distribusi = "UPDATE muzakki_distribusi SET nama_muzakki=?, jumlah_tanggupan=?, keterangan=? WHERE id_muzakki_distribusi=?";
        $stmt_muzzaki = mysqli_stmt_init($conn);
        $stmt_bayar = mysqli_stmt_init($conn);
        $stmt_distribusi = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt_muzzaki, $sql_muzzaki)) {
            header("Location: {$path}/pages/muzakki.php?error=sqlerror-update");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt_muzzaki, "sisi", $nama, $tngpn, $ket, $id);
            mysqli_stmt_execute($stmt_muzzaki);
            header("Location: {$path}/pages/muzakki.php?editMuzakki=success");
        }

        if (!mysqli_stmt_prepare($stmt_bayar, $sql_bayar)) {
            header("Location: {$path}/pages/muzakki.php?error=sqlerror-update");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt_bayar, "sisi", $nama, $tngpn, $ket, $id);
            mysqli_stmt_execute($stmt_bayar);
            header("Location: {$path}/pages/muzakki.php?editMuzakki=success");
        }

        if (!mysqli_stmt_prepare($stmt_distribusi, $sql_distribusi)) {
            header("Location: {$path}/pages/muzakki.php?error=sqlerror-update");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt_distribusi, "sisi", $nama, $tngpn, $ket, $id);
            mysqli_stmt_execute($stmt_distribusi);
            header("Location: {$path}/pages/muzakki.php?editMuzakki=success");
        }
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/muzakki.php");
    exit();
}