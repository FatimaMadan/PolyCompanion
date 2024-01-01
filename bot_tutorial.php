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
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/tutorial1.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/tutorial2.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/tutorial3.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/tutorial4.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/tutorial5.jpg" alt="">
        </div>
    </div>
</div>
<!-- Carousel End -->


    <?php
include 'footer.php';
?>