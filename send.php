<?php
include 'Users.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'polycompanion@gmail.com';
    $mail->Password = 'ehok akog sehr xagg';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('polycompanion@gmail.com');

    $username = $_POST['UserName'];
    $user = new Users();
    $user->setUsername($username);

   if ($user->initWithUsername()) {
    echo "<script> alert('UserName Does not Exist!'); document.location.href = 'ForgotPassword.php'; </script>";
    echo '<p style="color: red;">UserName Does not Exist!</p>';
}
    else {
        $useremail = $user->getUserEmail($username);
        if (empty($useremail)) {
            echo "<script> alert('Email Does not Exist'); document.location.href = 'ForgotPassword.php'; </script>";
        }
    }
    $mail->addAddress($useremail);
    $mail->isHTML(true);
    $mail->Subject = "Code for your PolyCompanion Account";

    $code = rand(1000, 9999);
    $mail->Body = "Code: " . $code;

    if ($mail->send()) {

        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Email Sent</title>
            <script>
                function submitForm() {
                    var form = document.getElementById("myForm");
                    var codeInput = document.getElementById("codeInput");
                    var usernameInput = document.getElementById("usernameInput");
                    codeInput.value = ' . $code . ';
                    usernameInput.value = "' . $username . '";
                    form.submit();
                }
            </script>
        </head>
        <body onload="submitForm()">
            <form id="myForm" method="POST" action="FPverify.php">
                <input type="hidden" id="codeInput" name="code" value="">
                <input type="hidden" id="usernameInput" name="username" value="">
            </form>
        </body>
        </html>';

    } else {
        echo '<script>
            alert("Failed to send email. Please try again later.");
            window.location.href = "ForgotPassword.php";
        </script>';
    }
}
?>