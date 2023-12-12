<?php   
ob_start();
include 'debugging.php';
include 'Users.php';

if (isset($_POST['submitted'])) {
        $user = new Users();
        $username= $_POST['Username'];
        $password = $_POST['Password'];
        
        
    
    if($user->login($username, $password))
    {
       $user->enterLog($username);
        header('Location: index.php');
    }else
    {
        echo '<script>alert("Wrong Login Credentials!");</script>';
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
<title> Login </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/logo.jpeg" alt="" class="small-image">PolyCompanion</h2>
        </a>
    </nav> 
       

      <!-- Login Start -->
    <div class="login-page">
      <div class="form" >
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form class="login-form" method="POST">
          <input required type="text" name="Username" placeholder="Username"/>
          <input required type="password" name="Password" placeholder="Password"/>
          <button name="submitted" value="TRUE">login</button>
          <p class="message">Forgot password? <a href="ForgotPassword.php">Click here</a></p>
        </form>
      </div>
    </div>
	 <!-- Login End -->
	
</html>

<?php
    include 'footer.php';
?>
