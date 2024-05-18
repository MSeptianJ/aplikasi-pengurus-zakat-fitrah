<?php
require '../dbh.inc.php';
$path = "http://localhost/zakat-fitrah";

// URL Variables
$id = $_GET['id'];

// Delete data form bayarzakat and Insert to muzakki_bayar
$deleteSql = "DELETE FROM mustahik_lainnya WHERE id_mustahiklainnya=?";
$deleteStmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
    header("Location: {$path}/pages/distribusi-zakat-lainnya.php?error=sqlerror-delete");
    exit();
}
else {
    mysqli_stmt_bind_param($deleteStmt, "i", $id);
    mysqli_stmt_execute($deleteStmt);
    header("Location: {$path}/pages/distribusi-zakat-lainnya.php?deleteMustahik=success");
}

exit();
