<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['distribusi-zakat-submit'])) {
    require '../../dbh.inc.php';
    $id = $_GET['id'];
    $nama = $_POST['nama_muzakki'];
    $kategori = $_POST['kategori'];
    $jmlHak = $_POST['jml_hak'];

    if (empty($kategori)) {
        header("Location: {$path}/includes/distribusi-zakat-warga/add-distribusi-zakat-warga/add-distribusi-zakat-warga-form.php?id=".$id."&error=emptyFields");
        exit();
    }
    else {
        $addSql = "INSERT 
                    INTO mustahik_warga (nama, kategori, hak)
                    VALUES (?, ?, ?)";
        $deleteSql = "DELETE FROM muzakki_distribusi WHERE id_muzakki_distribusi=?";
        $addStmt = mysqli_stmt_init($conn);
        $deleteStmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
            header("Location: {$path}/pages/distribusi-zakat-warga.php?error=sqlerror-delete");
            exit();
        }
        else {
            mysqli_stmt_bind_param($deleteStmt, "i", $id);
            mysqli_stmt_execute($deleteStmt);
            header("Location: {$path}/pages/distribusi-zakat-warga.php?deleteMuzakki=success");
        }

        if (!mysqli_stmt_prepare($addStmt, $addSql)) {
            header("Location: {$path}/pages/distribusi-zakat-warga.php?error=sqlerror-add");
            exit();
        }
        else {
            mysqli_stmt_bind_param($addStmt, "ssi", $nama, $kategori, $jmlHak);
            mysqli_stmt_execute($addStmt);
            header("Location: {$path}/pages/distribusi-zakat-warga.php?addDistribusiZakat=success");
        }

        exit();
    }
    mysqli_stmt_close($addSql);
    mysqli_stmt_close($deleteSql);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/distribusi-zakat-warga.php");
    exit();
}