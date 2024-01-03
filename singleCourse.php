<?php
ob_start();
include 'header.php';
include 'debugging.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

$id = $_GET['cid'];

//get article details
$course = new CourseBank();
$course->initWithId($id);

$major_id = $course->getMajor_MajorId();

$major = new MajorBank();
$major->initWithId($major_id);

$des = new DescriptorBank();
$down = $des->getFileWithCourseid($id);
        
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

      </head>
<body>

          <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/cat-1.jpg" alt="">
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
                                <br><!-- comment -->
                                <p class="fs-5 text-white mb-4 pb-2"> Year <?php echo $course->getYear() ?> &bull;
                                    Semester <?php echo $course->getSem() ?>
                                </p>
<!--                                
-->                               <a href="inquiry.php?cid=<?php echo $id; ?>">
    <button class="btn btn-primary py-md-3 px-md-5 me-3">Ask Away</button>
</a>
    <?php 
                                
                                // Establish a database connection
                                $conn = mysqli_connect("localhost", "u202001312", "u202001312", "db202001312");
                                
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
                                
                                

<!--                                
                            
-->                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--
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
            <p><?php 
            if ($course->getPreRequisite() == ""){
                echo "No Pre-Requisite";
            } else {
                echo $course->getPreRequisite();
              }
                 ?></p>
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
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
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
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Looks like there is not learning outcomes for this course yet</p>
                        </div>';
                            }
                            ?>
                    </div>
                    <?php
                    // Donwload files Start
    $files = new DescriptorBank();
    $row = $files->getFileWithCourseid($id);
  if (!empty($row)) {

  echo '<a class="btn btn-primary py-3 px-5 mt-2" href="view_descr.php?fid=' . $row->FileId . '">Download Course Descriptor</a>';
       
  }
  else{
      echo '<a class="btn btn-primary py-3 px-5 mt-2">No Descriptor for this course</a>';
  }
// Donwload files END
?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


</body><!-- comment -->

<?php
include 'footer.php';
?>