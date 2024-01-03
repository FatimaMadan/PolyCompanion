<?php
ob_start();
include 'debugging.php';
include 'botReportsBank.php';
include 'header.php';


 if (empty($_SESSION['uid'])) {
     // User is not logged in, redirect to login page
     echo $_SESSION['username'];
     header("Location: Login.php");
     exit();
 }
 
     // Check if the user is logged in and has the appropriate role
    if ($_SESSION['roleId'] != 1) {
        
        // Redirect the user to a different page or display an error message
        header('Location: index.php');
        exit;
    }
 
 $uid = $_SESSION['uid'];
 
 $repo = new BotReports();
 
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
        <i class="fas fa-users fa-3x text-primary mb-4"></i>
        <h5 class="mb-3"><?php echo $repo->getTodaysAccess('access Polybot page')->click_count; ?></h5>
        <p>times users have accessed the Polybot page today</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fas fa-thumbs-up fa-3x text-primary mb-4"></i>
        <h5 class="mb-3"><?php echo $repo->getWeekAccess(' Very helpful')->click_count; ?></h5>
        <p>times users chose option "Very helpful" this week</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fas fa-times-circle fa-3x text-primary mb-4"></i>
        <h5 class="mb-3"><?php echo $repo->getWeekAccess(' Not helpful')->click_count; ?></h5>
        <p>times users chose option "Not helpful" this week</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
    <div class="service-item text-center pt-3 h-100">
      <div class="p-4">
        <i class="fas fa-question-circle fa-3x text-primary mb-4"></i>
        <h5 class="mb-3"><?php echo $repo->getMonthAccess('I want to see the Most Frequently Asked Questions')->click_count; ?></h5>
        <p>times users checked the most FAQs in the last 30 days</p>
      </div>
    </div>
  </div>
    
<!-- Second Row -->
<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="service-item text-center pt-3 h-100">
    <div class="p-4">
      <i class="fas fa-chart-line fa-3x text-primary mb-4"></i>
      <h5 class="mb-3"><?php echo $repo->getHourAccess('Asc')->report_hour; ?></h5>
      <p>is the most active hour for Polybot usage</p>
    </div>
  </div>
</div>

<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="service-item text-center pt-3 h-100">
    <div class="p-4">
      <i class="fas fa-clock fa-3x text-primary mb-4"></i>
      <h5 class="mb-3"><?php echo $repo->getHourAccess('Desc')->report_hour; ?></h5>
      <p>is the least active hour for Polybot usage</p>
    </div>
  </div>
</div>

<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="service-item text-center pt-3 h-100">
    <div class="p-4">
      <i class="fas fa-calendar-day fa-3x text-primary mb-4"></i>
      <h5 class="mb-3"><?php echo $repo->getHighDayAccess()->report_date; ?></h5>
      <p>is the busiest day for Polybot usage</p>
    </div>
  </div>
</div>

<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
  <div class="service-item text-center pt-3 h-100">
    <div class="p-4">
      <i class="fas fa-tasks fa-3x text-primary mb-4"></i>
      <h5 class="mb-3"><?php echo $repo->getAllWeekAccess()->click_count; ?></h5>
      <p>are the total actions performed on Polybot this week</p>
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