<?php
ob_start();
include 'debugging.php';
include 'botBank.php';
include 'header.php';


 if (empty($_SESSION['uid'])) {
     // User is not logged in, redirect to login page
     echo $_SESSION['username'];
     header("Location: Login.php");
     exit();
 }
 
 $uid = $_SESSION['uid'];
?>


<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="width: 100%;">
      <h6 class="section-title bg-white text-start text-primary pe-3">About Polybot</h6>
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Polybot Reports</h1>
      </div>
<div class="row g-4 align-items-stretch">
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fa fa-3x fa-users text-primary mb-4"></i>
        <h5 class="mb-3">739</h5>
        <p>people have used the Polybot today</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fa fa-3x fa-thumbs-up text-primary mb-4"></i>
        <h5 class="mb-3">87493</h5>
        <p>Times people chose option "Very helpful" this week</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
        <h5 class="mb-3">87%</h5>
        <p>of students have used the Polybot this week</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fa fa-3x fa-hourglass-start text-primary mb-4"></i>
        <h5 class="mb-3">1%</h5>
        <p>of students haven't used the Polybot yet</p>
      </div>
    </div>
  </div>
</div>
      
    </div>
  </div>
</div>
<!-- About End -->

 


<?php
include 'footer.php';
?>