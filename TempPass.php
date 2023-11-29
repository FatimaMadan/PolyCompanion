<?php
include 'Users.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Request for Reset Password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ForgotPass.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/logo.jpeg" alt="" class="small-image">PolyCompanion</h2>
        </a>
    </nav> 

<!--    <div class="FP-page">
        <div class="form">
            <div class="FP">
                <div class="FP-header">
                    <h3>Reset Password</h3>
                    <p>Please provide your username below:</p>
                </div>
            </div>
            <form class="FP-form" action="send.php" method="POST">
                <input required type="text" name="UserName" placeholder="UserName" />
               <input type="email" name="email" value=""  placeholder="Email"/>
                <button type="submit" name="send">Send Verification Code</button>
            </form>
        </div>
    </div>-->


<div class="FP-page">
  <div class="form left-form">
<div class="FP">
      <div class="FP-header">
         
        <h3 style="font-family: Arial; color:white">Temporary Password Sent Successfully!</h3>
        <p style="font-family: Arial; color: whitesmoke">
           A temporary password has been sent to your email. Kindly use it to login to your account. You may reset your password of your choice once logged in.</p>
                   <button type="submit" name="send">Go to Login</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
//include 'footer.php';
?>