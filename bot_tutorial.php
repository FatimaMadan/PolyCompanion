<?php
ob_start();
include 'debugging.php';
include 'header.php';


 if (empty($_SESSION['uid'])) {
     // User is not logged in, redirect to login page
     echo $_SESSION['username'];
     header("Location: Login.php");
     exit();
 }
 


?>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid animate__animated animate__fadeIn" src="img/tutorial1.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid animate__animated animate__fadeIn" src="img/tutorial2.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid animate__animated animate__fadeIn" src="img/tutorial3.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid animate__animated animate__fadeIn" src="img/tutorial4.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid animate__animated animate__fadeIn" src="img/tutorial5.jpg" alt="">
        </div>
    </div>
</div>


    <?php
include 'footer.php';
?>