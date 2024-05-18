<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['distribusi-zakat-submit'])) {
    require '../../dbh.inc.php';
    $nama = $_POST['nama_muzakki'];
    $kategori = $_POST['kategori'];
    $jmlHak = $_POST['jml_hak'];

    if (empty($kategori)) {
        header("Location: {$path}/includes/distribusi-zakat-lainnya/add-distribusi-zakat-lainnya/add-distribusi-zakat-lainnya-form.php?error=emptyFields&nama=".$nama."&kategori=".$kategori."&jmlHak=".$jmlHak);
        exit();
    }
    else {
        $addSql = "INSERT 
                    INTO mustahik_lainnya (nama, kategori, hak)
                    VALUES (?, ?, ?)";
        $addStmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($addStmt, $addSql)) {
            header("Location: {$path}/pages/distribusi-zakat-lainnya.php?error=sqlerror-add");
            exit();
        }
        else {
            mysqli_stmt_bind_param($addStmt, "ssi", $nama, $kategori, $jmlHak);
            mysqli_stmt_execute($addStmt);
            header("Location: {$path}/pages/distribusi-zakat-lainnya.php?addDistribusiZakat=success");
        }

        exit();
    }
    mysqli_stmt_close($addSql);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/distribusi-zakat-lainnya.php");
    exit();
}