<?php

$path = "http://localhost/zakat-fitrah";
session_start();
session_unset();
session_destroy();
header("Location: $path/index.php");