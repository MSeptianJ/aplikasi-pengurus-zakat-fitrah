<?php
    require "header.php";
?>

    <main>
        <div class="wrapper-main">
            <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
            <section class="section-default">
                <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<p class="login-status-success">You are logged in!</p>';
                    }
                    elseif (isset($_GET["error"])) {
                        if ($_GET["error"] == "notLogin") {
                            echo '<p class="login-status-error">Your are not logged in</p>';
                        }
                        elseif ($_GET["error"] == "emptyFields") {
                            echo '<p class="login-status-error">Fill the login form please</p>';
                        }
                        elseif ($_GET["error"] == "wrongPwd") {
                            echo '<p class="login-status-error">Wrong Password</p>';
                        }
                        elseif ($_GET["error"] == "noUser") {
                            echo '<p class="login-status-error">There is no user like that bruh</p>';
                        }
                    }
                    else {
                        echo '<p class="login-status-success">Sign up and Log in to use the App</p>';
                    }
                ?>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>
