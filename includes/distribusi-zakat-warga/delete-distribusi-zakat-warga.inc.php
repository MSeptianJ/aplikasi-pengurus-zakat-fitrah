<?php
require '../dbh.inc.php';
$path = "http://localhost/zakat-fitrah";

// URL Variables
$id = $_GET['id'];
$nama = $_GET['nama'];

// Get muzakki datas
$sql = mysqli_query($conn, "SELECT * FROM muzakki WHERE nama_muzakki='$nama'");
while ($data = mysqli_fetch_array($sql)) {
    $id_muzakki= $data["id_muzakki"];
    $tngpn = $data["jumlah_tanggupan"];
    $ket = $data["keterangan"];
}

// Delete data form bayarzakat and Insert to muzakki_bayar
$deleteSql = "DELETE FROM mustahik_warga WHERE id_mustahikwarga=?";
$addSql = "INSERT INTO muzakki_distribusi (id_muzakki_distribusi, nama_muzakki, jumlah_tanggupan, keterangan) VALUES (?, ?, ?, ?)";
$deleteStmt = mysqli_stmt_init($conn);
$addStmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($addStmt, $addSql)) {
    header("Location: {$path}/pages/distribusi-zakat-warga.php?error=sqlerror-add");
    exit();
}
else {
    mysqli_stmt_bind_param($addStmt, "isis", $id_muzakki, $nama, $tngpn, $ket);
    mysqli_stmt_execute($addStmt);
    header("Location: {$path}/pages/distribusi-zakat-warga.php?addMuzakki=success");
}

if (!mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
    header("Location: {$path}/pages/distribusi-zakat-warga.php?error=sqlerror-delete");
    exit();
}
else {
    mysqli_stmt_bind_param($deleteStmt, "i", $id);
    mysqli_stmt_execute($deleteStmt);
    header("Location: {$path}/pages/distribusi-zakat-warga.php?deleteMustahik=success");
}

exit();
