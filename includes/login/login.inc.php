<?php
$path = "http://localhost/zakat-fitrah";

if (isset($_POST['login-submit'])) {

    require '../dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: {$path}/index.php?error=emptyFields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: {$path}/index.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if (!$pwdCheck) {
                    header("Location: {$path}/index.php?error=wrongPwd");
                    exit();
                }
                elseif ($pwdCheck) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: {$path}/index.php?login=success");
                    exit();
                }
                else {
                    header("Location: {$path}/index.php?error=wrongPwd");
                    exit();
                }
            }
            else {
                header("Location: {$path}/index.php?error=noUser");
                exit();
            }

        }
    }

}
else {
    header("Location: {$path}/index.php");
    exit();
}