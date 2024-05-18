<?php
    session_start();
    $path = "http://localhost/zakat-fitrah";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Zakat Fitrah</title>
        <link rel="icon" href="<?php echo $path;?>/img/home.png">
        <link rel="stylesheet" type="text/css" href="<?php echo $path;?>/styles/style.css">
        <script src="https://kit.fontawesome.com/8f037559c2.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    </head>
    <body>
        <header>
            <div class="header-logo-nav">
                <div class="header-logo">
                    <a href="<?php echo $path;?>/index.php">
                        <img src="<?php echo $path;?>/img/home.png" alt="logo">
                    </a>
                </div>

                <nav class="nav-header-main">
                    <ul>
                        <li><a href="<?php echo $path;?>/index.php">Home</a></li>
                        <li><a href="<?php echo $path;?>/pages/muzakki.php">Data Muzakki</a></li>
                        <li><a href="<?php echo $path;?>/pages/mustahik.php">Data Mustahik</a></li>
                        <li><a href="<?php echo $path;?>/pages/bayar-zakat.php">Bayar Zakat</a></li>
                        <li><a href="<?php echo $path;?>/pages/distribusi-zakat-warga.php">Distribusi Zakat</a></li>
                    </ul>
                </nav>
            </div>

            <div class="header-login">
                <?php
                    if (isset($_SESSION['userId'])) {
                        echo "
                        <form action='{$path}/includes/login/logout.inc.php' method='post'>
                            <button type='submit' name='logout-submit' title='Log Out'>
                                <i class='fa fa-sign-out'></i>
                            </button>
                        </form>
                        ";
                    } else {
                        echo "
                        <form action='{$path}/includes/login/login.inc.php' method='post'>
                            <input type='text' name='mailuid' placeholder='Username/E-mail...'>
                            <input type='password' name='pwd' placeholder='Password...'>
                            <button type='submit' name='login-submit' title='Log In'>
                                <i class='fa fa-sign-in'></i>
                            </button>
                        </form>
                        <a href='pages/signup.php'>
                            <i class='fas fa-user-plus'></i>
                        </a>
                        ";
                    }
                ?>
            </div>

        </header>
