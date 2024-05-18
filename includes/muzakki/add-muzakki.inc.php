<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['muzakki-submit'])) {
    require '../dbh.inc.php';
    $nama = $_POST['nama_muzakki'];
    $tngpn = $_POST['jml_tngpn'];
    $ket = $_POST['ket'];

    if (empty($nama) || empty($tngpn) || empty($ket)) {
        header("Location: {$path}/pages/muzakki.php?error=emptyFields&uid=".$nama."&jml=".$tngpn."&ket=".$ket);
        exit();
    }
    else {
        $sql = "SELECT nama_muzakki FROM muzakki WHERE nama_muzakki=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: {$path}/pages/muzakki.php?error=sqlerror-name");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $nama);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: {$path}/pages/muzakki.php?error=nameTaken");
                exit();
            }
            else {
                $sql_muzzaki = "INSERT INTO muzakki (nama_muzakki, jumlah_tanggupan, keterangan) VALUES (?, ?, ?)";
                $sql_bayar = "INSERT INTO muzakki_bayar (nama_muzakki, jumlah_tanggupan, keterangan) VALUES (?, ?, ?)";
                $sql_distribusi = "INSERT INTO muzakki_distribusi (nama_muzakki, jumlah_tanggupan, keterangan) VALUES (?, ?, ?)";
                $stmt_muzzaki = mysqli_stmt_init($conn);
                $stmt_bayar = mysqli_stmt_init($conn);
                $stmt_distribusi = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt_muzzaki, $sql_muzzaki)) {
                    header("Location: {$path}/pages/muzakki.php?error=sqlerror-insert");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt_muzzaki, "sis", $nama, $tngpn, $ket);
                    mysqli_stmt_execute($stmt_muzzaki);
                    header("Location: {$path}/pages/muzakki.php?addMuzakki=success");
                }

                if (!mysqli_stmt_prepare($stmt_bayar, $sql_bayar)) {
                    header("Location: {$path}/pages/muzakki.php?error=sqlerror-insert");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt_bayar, "sis", $nama, $tngpn, $ket);
                    mysqli_stmt_execute($stmt_bayar);
                    header("Location: {$path}/pages/muzakki.php?addMuzakki=success");
                }

                if (!mysqli_stmt_prepare($stmt_distribusi, $sql_distribusi)) {
                    header("Location: {$path}/pages/muzakki.php?error=sqlerror-insert");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt_distribusi, "sis", $nama, $tngpn, $ket);
                    mysqli_stmt_execute($stmt_distribusi);
                    header("Location: {$path}/pages/muzakki.php?addMuzakki=success");
                }
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/muzakki.php");
    exit();
}