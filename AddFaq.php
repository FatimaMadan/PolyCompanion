<?php   
ob_start();
include 'debugging.php';
include 'header.php';
include 'Users.php';
include 'FaqBank.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}else if($_SESSION['roleId'] != 3){
    echo "You do not have permissions to view this page";
}

    if (isset($_POST['submitted'])) {
     
        $newFaq = new FaqBank();
        $newFaq->setFQuestion($_POST['Question']);
        $newFaq->setFAnswer($_POST['Answer']);
        $newFaq->setUser_UserId($_SESSION['uid']);
        
        
         if($newFaq->isValid())
      {
            if($newFaq->addFaq())
            {  
                echo '<script>alert("Posted Successfully!");</script>';
                  header('Location: FAQ.php');
            }else
            {
                echo '<script>alert("Not successful! Try Again.");</script>';
                header('Location: AddFaq.php');
            }
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
<title> Add FAQ </title>
</head>
<body>
      <!-- Login Start -->
    <div class="login-page">
      <div class="form" >
        <div class="login">
          <div class="login-header">
            <h3>Post an FAQ </h3>
          </div>
        </div>
        <form class="login-form" method="POST">
          
        <input required type="text" name="Question" placeholder="Question"/><br>
        <input required type="text" name="Answer" placeholder="Answer"/><br>
          <button name="submitted" value="TRUE">Post</button>
        </form>
      </div>
    </div>
	 <!-- Login End -->
	
</html>

<?php
    include 'footer.php';
?>
