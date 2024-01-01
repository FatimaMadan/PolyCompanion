<?php
ob_start();
include 'header.php';
include 'debugging.php';

$id = $_GET['cid'];

//get article details
$course = new CourseBank();
$course->initWithId($id);

$major_id = $course->getMajor_MajorId();

$major = new MajorBank();
$major->initWithId($major_id);
        
?>
<html lang="en">

<head>
       <!-- JavaScript code -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function subscribeCourse(courseId) {
  // Perform AJAX call
  $.ajax({
    url: 'subsUserPost.php',
    type: 'POST',
    data: { courseId: courseId },
    dataType: 'json',
    success: function(response) {
      // Handle success response
      if (response.success) {
        // Refresh the page or perform any other actions
               // Show the <div> element for 5 seconds
       var popupDiv = document.getElementById('SubspopupMessage');
    popupDiv.style.display = 'block';

    // Hide the popup message after 5 seconds
    setTimeout(function() {
      popupDiv.style.display = 'none';
    }, 5000);
    
        console.log("subscribed successfully");
//        window.location.href = 'AdminDashboard.php';
      } else {
        // Handle error response
        console.log(response.error);
      }
    },
    error: function(xhr, status, error) {
      // Handle AJAX error
      console.log(error);
    }
  });
}
     function unSubscribeCourse(courseId) {
  // Perform AJAX call
  $.ajax({
    url: 'unSubsUserPost.php',
    type: 'POST',
    data: { courseId: courseId },
    dataType: 'json',
    success: function(response) {
      // Handle success response
      if (response.success) {
        // Refresh the page or perform any other actions
               // Show the <div> element for 5 seconds
       var popupDiv = document.getElementById('UnSubspopupMessage');
    popupDiv.style.display = 'block';

    // Hide the popup message after 5 seconds
    setTimeout(function() {
      popupDiv.style.display = 'none';
    }, 5000);
    
        console.log("unsubscribed successfully");
//        window.location.href = 'AdminDashboard.php';
      } else {
        // Handle error response
        console.log(response.error);
      }
    },
    error: function(xhr, status, error) {
      // Handle AJAX error
      console.log(error);
    }
  });
}
 </script>
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
      </head>
<body>

          <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/faq.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><?php echo $course->getCourseCode() ?> &bull; 
                                    <?php echo $course->getShortTitle() ?></h5>
                                <h1 class="display-3 text-white animated slideInDown"><?php echo $course->getCourseTitle() ?></h1>
                                <p class="fs-5 text-white mb-4 pb-2"><?php echo $course->getCredits() ?> Credits &bull;
                                                                     Level <?php echo $course->getCourseLevel() ?> &bull;
                                                                     <?php echo $major->getMajorName() ?> Major
                                </p>
                                <?php 
                                
                                // Establish a database connection
                                $conn = mysqli_connect("localhost", "u202003059", "u202003059", "db202003059");
                                
                                // Get the post ID and action from the AJAX request
                                $courseId = $course->getCourseId();
                                $userId = $_SESSION['uid'];

                                  $query1 = "SELECT User_UserId FROM Subscriptions WHERE Course_CourseId = $courseId";
                                  $result = mysqli_query($conn, $query1);

                                if ($result) {
                                    $existingUserIds = array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $existingUserIds[] = $row['User_UserId'];
                                    }

                                    if (in_array($userId, $existingUserIds)) {
                                        //The logged-in userId already exists in Subscriptions for the given Course_CourseId
                                           echo '<button class="btn btn-primary py-md-3 px-md-5 me-3" onclick="unSubscribeCourse('. $course->getCourseId(). ');" >UnSubscribe</button>';

                                    }else {
                                          //The logged-in userId does not exist in Subscriptions for the given Course_CourseId
                                       
                                           echo '<button class="btn btn-primary py-md-3 px-md-5 me-3" onclick="subscribeCourse('. $course->getCourseId(). ');" >Subscribe</button>';
                                    }
                                    }
                                       
                                ?>
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
 <div id="SubspopupMessage" class="blah" style="box-sizing: border-box; position: fixed; z-index: 100000; top: 30%; left: 50%; transform: translate(-50%, -50%); display: none; border: 2px solid #00A36C; background-color: #00A36C; color: white; border-radius: 10px;">✓ Course subscribed successfully!</div>
    <div id="UnSubspopupMessage" class="blah" style="box-sizing: border-box; position: fixed; z-index: 100000; top: 30%; left: 50%; transform: translate(-50%, -50%); display: none; border: 2px solid #00A36C; background-color: #00A36C; color: white; border-radius: 10px;">✓ Course Unsubscribed successfully!</div>
    
    
    <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3 h-100">
                    <div class="p-4">
                        <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                        <h5 class="mb-3">Assessment</h5>
                        <p><?php echo $course->getAssessmentMethod() ?></p>
                    </div>
                </div>
            </div>
    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item text-center pt-3 h-100">
        <div class="p-4">
            <i class="fas fa-3x fa-check-circle text-primary mb-4"></i>
            <h5 class="mb-3">Prerequisites</h5>
            <p><?php echo $course->getPreRequisite() ?></p>
        </div>
    </div>
</div>
<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="service-item text-center pt-3 h-100">
        <div class="p-4">
            <i class="fas fa-3x fa-pencil-alt text-primary mb-4"></i>
            <h5 class="mb-3">Examinations</h5>
            <p><?php echo $course->getExams() ?></p>
        </div>
    </div>
</div>

<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
    <div class="service-item text-center pt-3 h-100">
        <div class="p-4">
            <i class="fas fa-3x fa-clipboard-check text-primary mb-4"></i>
            <h5 class="mb-3">Uncontrolled Assessments</h5>
            <p><?php echo $course->getUncontrolledAssess() ?></p>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Course -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About the course</h6>
                    <h1 class="mb-4"><?php echo $course->getCourseCode() ?></h1>
                    <p class="mb-4"><b>Course aim:</b> <?php echo $course->getCourseAim() ?></p>
                    <div class="row gy-2 gx-4 mb-4">
                        
                        
                        <?php
                            $LO = CourseBank::getOutcomes($id);

                            if (!empty($LO)) {
                               echo '<p class="mb-2"><b>Learning Outcomes:</b></p>';
                                for ($i = 0; $i < count($LO); $i++) {
                                    echo '<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>'. $LO[$i]->OutcomeDescription .'</p>
                        </div>';
                                }
                            } else {
                                echo '<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Opps</p>
                        </div>';
                            }
                            ?>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Download Course Descriptor</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Team</h6>
                <h1 class="mb-5">Course Staff Team</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php //echo $course->getProgramManager() ?></h5>
                            <small>Program Manager</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php //echo $course->getCurrentDeveloper() ?></h5>
                            <small>Current Developer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

</body><!-- comment -->

<?php
include 'footer.php';
?>