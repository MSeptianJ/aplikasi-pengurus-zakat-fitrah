<?php
$path = "http://localhost/zakat-fitrah";
if (isset($_POST['mustahik-submit'])) {
    require '../dbh.inc.php';
    $nama = $_POST['nama_kategori'];
    $jml = $_POST['jml_hak'];

    if (empty($nama) || empty($jml)) {
        header("Location: {$path}/pages/mustahik.php?error=emptyFields&uid=".$nama."&jml=".$jml);
        exit();
    }
    else {
        $sql = "SELECT nama_kategori FROM kategori_mustahik WHERE nama_kategori=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: {$path}/pages/mustahik.php?error=sqlerror-name");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $nama);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: {$path}/pages/mustahik.php?error=nameTaken");
                exit();
            }
            else {
                $sql = "INSERT INTO kategori_mustahik (nama_kategori, jumlah_hak) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: {$path}/pages/mustahik.php?error=sqlerror-insert");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "si", $nama, $jml);
                    mysqli_stmt_execute($stmt);
                    header("Location: {$path}/pages/mustahik.php?addMustahik=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: {$path}/pages/mustahik.php");
    exit();
}