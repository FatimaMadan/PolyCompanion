<?php


?>
<!DOCTYPE html>
<html lang="en">
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

    <!-- JavaScript code -->
    <script>
        // Get the current page URL
        var url = window.location.href;

        // Check each menu item's URL against the current page URL
        var menuItems = document.querySelectorAll('.nav-item.nav-link');
        menuItems.forEach(function(item) {
            if (item.href === url) {
                item.classList.add('active'); // Add the 'active' class to the matching menu item
            }
        });
    </script>
</head>

<body>
  
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>PolyCompanion</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="bot.php" class="nav-item nav-link">PolyBot</a>
                <a href="inquiry.php" class="nav-item nav-link">Ask Away</a>
                <a href="FAQ.php" class="nav-item nav-link">FAQ</a>
		<a href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="Register.php" class="nav-item nav-link">Register</a>

            </div>
            <a href="Login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">LOG OUT<i class="fa fa-arrow-right ms-3"></i></a>
            
        </div>
              </div>
    </nav>
    <!-- Navbar End -->
	
	

</body>

</html>