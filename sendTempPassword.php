<?php
include 'Users.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'polycompanion@gmail.com';
    $mail->Password = 'ehok akog sehr xagg';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('polycompanion@gmail.com');
     
    $username = $_POST['username'];
   // echo $username;
        $user = new Users();
        $user->setUsername($username);

        if ($user->initWithUsername()) {
         echo "<script> alert('Username '{$username}' does not exist!'); document.location.href = 'ForgotPassword.php'; </script>";
            } else {
            $useremail = $user->getUserEmail($username);
            if (empty($useremail)) {
               echo "<script> alert('Email Does not Exist'); document.location.href = 'ForgotPassword.php'; </script>";
            }
        }
       $mail->addAddress($useremail);
       $mail->isHTML(true);
       $mail->Subject = "Temporary password for your PolyCompanion Account";
       
      
$password = rand(1000000, 9999999);
$mail->Body = "Temporary Password: " . $password;

if ($mail->send()) {
    
    echo '<script>
         alert("Email sent successfully! Redirecting to Login Page.");
          </script>';
    if ($user->updatePassword($username, $password)){
            echo '<script>
            window.location.href = "Login.php";
          </script>';
            }else{
                 echo '<script>
            alert("Password change failed.");
            window.location.href = "ForgetPassword.php";
          </script>';
            }
    
} else {
    echo '<script>
            alert("Failed to send email. Please try again later.");
            window.location.href = "ForgotPassword.php";
          </script>';
}