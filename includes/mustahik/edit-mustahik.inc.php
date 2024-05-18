<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['edit-submit'])) {
    require '../dbh.inc.php';
    $id = $_GET['id'];
    $nama = $_POST['nama_kategori'];
    $jml = $_POST['jml_hak'];

    if (empty($nama) || empty($jml)) {
        header("Location: {$path}/includes/edit.inc.php?idMustahik=".$id."error=emptyFields&uid=".$nama."&jml=".$jml);
        exit();
    }
    else {
        $sql = "UPDATE kategori_mustahik SET nama_kategori=?, jumlah_hak=? WHERE id_kategori=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: {$path}/pages/mustahik.php?error=sqlerror-update");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "sii", $nama, $jml, $id);
            mysqli_stmt_execute($stmt);
            header("Location: {$path}/pages/mustahik.php?editMustahik=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/mustahik.php");
    exit();
}