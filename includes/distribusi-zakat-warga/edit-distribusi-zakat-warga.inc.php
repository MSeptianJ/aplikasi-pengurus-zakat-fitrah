<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['edit-submit'])) {
    require '../dbh.inc.php';
    $id = $_GET['id'];
    $nama = $_POST['nama_muzakki'];
    $kategori = $_POST['kategori'];
    $jmlHak = $_POST['jml_hak'];

    if (empty($kategori)) {
        header("Location: {$path}/includes/edit.inc.php?idDistribusi=".$id."&error=emptyCategoryFields");
        exit();
    }
    else {
        $sql = "UPDATE mustahik_warga SET nama=?, kategori=?, hak=? WHERE id_mustahikwarga=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: {$path}/pages/distribusi-zakat-warga.php?error=sqlerror-update");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssii", $nama, $kategori, $jmlHak, $id);
            mysqli_stmt_execute($stmt);
            header("Location: {$path}/pages/distribusi-zakat-warga.php?editDistribusiZakat=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/distribusi-zakat-warga.php");
    exit();
}