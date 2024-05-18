<?php
$path = "http://localhost/zakat-fitrah";
require '../dbh.inc.php';

$id = $_GET['id'];

$sql_muzzaki = "DELETE FROM muzakki WHERE id_muzakki=?";
$sql_bayar = "DELETE FROM muzakki_bayar WHERE id_muzakki_bayar=?";
$sql_distribusi = "DELETE FROM muzakki_distribusi WHERE id_muzakki_distribusi=?";
$stmt_muzzaki = mysqli_stmt_init($conn);
$stmt_bayar = mysqli_stmt_init($conn);
$stmt_distribusi = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt_muzzaki, $sql_muzzaki)) {
    header("Location: {$path}/pages/muzakki.php?error=sqlerror-delete");
}
else {
    mysqli_stmt_bind_param($stmt_muzzaki, "i", $id);
    mysqli_stmt_execute($stmt_muzzaki);
    header("Location: {$path}/pages/muzakki.php?deleteMuzakki=success");
}

if (!mysqli_stmt_prepare($stmt_bayar, $sql_bayar)) {
    header("Location: {$path}/pages/muzakki.php?error=sqlerror-delete");
}
else {
    mysqli_stmt_bind_param($stmt_bayar, "i", $id);
    mysqli_stmt_execute($stmt_bayar);
    header("Location: {$path}/pages/muzakki.php?deleteMuzakki=success");
}

if (!mysqli_stmt_prepare($stmt_distribusi, $sql_distribusi)) {
    header("Location: {$path}/pages/muzakki.php?error=sqlerror-delete");
}
else {
    mysqli_stmt_bind_param($stmt_distribusi, "i", $id);
    mysqli_stmt_execute($stmt_distribusi);
    header("Location: {$path}/pages/muzakki.php?deleteMuzakki=success");
}

exit();
