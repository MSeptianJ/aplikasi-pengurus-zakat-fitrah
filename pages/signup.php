<?php
    require "../header.php";
?>

    <main>
        <div class="wrapper-main">
            <h1 class="main-title">Aplikasi Zakat Fitrah</h1>
            <section class="section-default">
                <h1 class="page-title">Signup</h1>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyFields") {
                            echo '<p class="signupError">Fill in all fields!</p>';
                        }
                        elseif ($_GET["error"] == "invalidMailUid") {
                            echo '<p class="signupError">Invalid username and e-mail!</p>';
                        }
                        elseif ($_GET["error"] == "invalidUid") {
                            echo '<p class="signupError">Invalid username!</p>';
                        }
                        elseif ($_GET["error"] == "invalidMail") {
                            echo '<p class="signupError">Invalid e-mail!</p>';
                        }
                        elseif ($_GET["error"] == "passwordCheck") {
                            echo '<p class="signupError">Your password do not match!</p>';
                        }
                        elseif ($_GET["error"] == "userTaken") {
                            echo '<p class="signupError">Username is already taken!</p>';
                        }
                    }
                    elseif (isset($_GET["signup"])) {
                        if ($_GET["signup"] == "success") {
                            echo '<p class="signupSuccess">Signup successful!</p>';
                        }
                    }
                ?>
                <form class="form-signup" action="../includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="mail" placeholder="E-mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
            </section>
        </div>
    </main>

<?php
    require "../footer.php";
?>
