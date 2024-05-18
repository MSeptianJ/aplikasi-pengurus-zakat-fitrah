<?php
header('Content-Type: application/json');
require "../includes/dbh.inc.php";

$sql = mysqli_query($conn, "SELECT * FROM kategori_mustahik");

$array = [];
while ($data = mysqli_fetch_assoc($sql)) {
    $array[] = $data;
}

echo json_encode($array);

