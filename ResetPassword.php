<?php   
ob_start();
include 'debugging.php';
include 'header.php';
include 'Users.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

    if (isset($_POST['submitted'])) {
     
        $username = $_SESSION['username'];
        $password = $_POST['Password'];
        $repassword = $_POST['RePassword'];

        // Check if the password and RePassword match
        if ($password === $repassword) {
            echo "Password and Re-Password match";
            $user = new Users();
           
            if ($user->updatePassword($username, $password)){
                echo '<script>alert("Password Reset Successfully.");</script>';
                  header('Location: index.php');
            }else{
                echo "Password Reset failed!";
            }
            
            // Additional logic or actions can be performed here after a successful match
        } else {
            echo "Passwords do not match";
            // Additional logic or actions can be performed here if the values do not match
        }
    
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/loginStyle.css">
</head>

<html>
<head>
<title> Reset Password </title>
</head>
<body>
      <!-- Login Start -->
    <div class="login-page">
      <div class="form" >
        <div class="login">
          <div class="login-header">
            <h3>Reset Password</h3>
            <p>For your security, choose a strong password.</p>
          </div>
        </div>
        <form class="login-form" method="POST">
          
           <input required type="password" name="Password" placeholder="Password"/><br>
           <input required type="password" name="RePassword" placeholder="Re-Enter Password"/><br>
          <button name="submitted" value="TRUE">Reset</button>
        </form>
      </div>
    </div>
	 <!-- Login End -->
	
</html>

<?php
    include 'footer.php';
?>
