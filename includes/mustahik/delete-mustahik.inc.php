<?php
$path = "http://localhost/zakat-fitrah";
require '../dbh.inc.php';

$id = $_GET['id'];
$sql = "DELETE FROM kategori_mustahik WHERE id_kategori=?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: {$path}/pages/mustahik.php?error=sqlerror-delete");
}
else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location: {$path}/pages/mustahik.php?deleteMustahik=success");
}
exit();