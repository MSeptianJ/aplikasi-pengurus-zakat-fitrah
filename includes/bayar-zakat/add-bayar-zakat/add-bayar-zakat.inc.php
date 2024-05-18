<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['bayar-zakat-submit'])) {
    require '../../dbh.inc.php';
    $id = $_GET['id'];
    $nama = $_POST['nama_muzakki'];
    $tngpn = $_POST['jml_tngpn'];
    $jenis = $_POST['jenis'];
    $jmlBayar = $_POST['jml_bayar'];
    $jmlUang = $_POST['jml_uang'];
    $jmlBeras = $_POST['jml_beras'];

    if (empty($jenis)) {
        header("Location: {$path}/includes/bayar-zakat/add-bayar-zakat/add-bayar-zakat-form.php?id=".$id."&error=emptyJenisField");
        exit();
    }
    else {
        $addSql = "INSERT 
                    INTO bayarzakat (
                        nama_muzakki, jumlah_tanggungan, jenis_bayar,
                        jumlah_tanggunganyangdibayar, bayar_beras, bayar_uang
                        ) 
                    VALUES (?, ?, ?, ?, ?, ?)";
        $deleteSql = "DELETE FROM muzakki_bayar WHERE id_muzakki_bayar=?";
        $addStmt = mysqli_stmt_init($conn);
        $deleteStmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
            header("Location: {$path}/pages/bayar-zakat.php?error=sqlerror-delete");
            exit();
        }
        else {
            mysqli_stmt_bind_param($deleteStmt, "i", $id);
            mysqli_stmt_execute($deleteStmt);
            header("Location: {$path}/pages/bayar-zakat.php?deleteMuzakki=success");
        }

        if (!mysqli_stmt_prepare($addStmt, $addSql)) {
            header("Location: {$path}/pages/bayar-zakat.php?error=sqlerror-add");
            exit();
        }
        else {
            mysqli_stmt_bind_param($addStmt, "sisiii", $nama, $tngpn, $jenis, $jmlBayar, $jmlBeras, $jmlUang);
            mysqli_stmt_execute($addStmt);
            header("Location: {$path}/pages/bayar-zakat.php?addBayarZakat=success");
        }

        exit();
    }
    mysqli_stmt_close($addSql);
    mysqli_stmt_close($deleteSql);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/bayar-zakat.php");
    exit();
}