<?php
ob_start();
include 'debugging.php';
include 'header.php';
include 'Users.php';
include 'CourseBank.php';
include 'QuestionBank.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">

    <head>
        <!-- JavaScript code -->
        <script>
            // Get the current page URL
            var url = window.location.href;

            // Check each menu item's URL against the current page URL
            var menuItems = document.querySelectorAll('.nav-item.nav-link');
            menuItems.forEach(function (item) {
                if (item.href === url) {
                    item.classList.add('active'); // Add the 'active' class to the matching menu item
                }
            });
        </script>
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->



        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/bp.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Make Your Journey Easy</h5>
                                    <h1 class="display-3 text-white animated slideInDown">Connecting Students Together</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">Start your journey today and revolutionize the way you connect, collaborate, and succeed. Join us and discover a new era of virtual collaboration with PolyCompanion!</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!--service start-->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp d-flex" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3 flex-fill">
                    <div class="p-4">
                        <i class="fa fa-3x fa-robot text-primary mb-4"></i>
                        <h5 class="mb-3">Polybot Assistance</h5>
                        <p>Get help and support from our chatbot, Polybot.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp d-flex" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3 flex-fill">
                    <div class="p-4">
                        <i class="fa fa-3x fa-question-circle text-primary mb-4"></i>
                        <h5 class="mb-3">Ask Away</h5>
                        <p>Have questions? Our Ask Away feature lets you seek answers from your colleagues.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp d-flex" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3 flex-fill">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Courses</h5>
                        <p>Explore our wide range of courses taught by skilled instructors.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp d-flex" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3 flex-fill">
                    <div class="p-4">
                        <i class="fa fa-3x fa-question-circle text-primary mb-4"></i>
                        <h5 class="mb-3">FAQ</h5>
                        <p>Find answers to commonly asked questions in our FAQ section.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--service end-->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100" src="img/poly2.jpg" alt="" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h6 class="section-title bg-white text-start text-primary pe-3">About PolyCompanion</h6>
                        <h1 class="mb-4">Welcome to PolyCompanion</h1>
                        <p class="mb-4">PolyCompanion is designed to provide a seamless learning experience. We believe that education should be accessible to all, anytime and anywhere.</p>
                        <p class="mb-4">And to achieve that, Our platform offers a wide range of courses information, enabling you to share all your questions. With our online Polybot, we can answer your courses questions to make sure you have a smooth learning journey.</p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Polybot Assistance</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>All of your University Courses</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Interactive Online Classes</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Easy and Fast Answers</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>User-friendly Interface</p>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="inquiry.php">Ask Away</a>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="bot.php">Polybot</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Courses Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                    <h1 class="mb-5">Popular Courses</h1>
                    <div class="row">

                        <div class="row g-4 justify-content-center" id="searchResult">
                        </div>
<?php
$result = CourseBank::getPopuolarCourses();
$que = new QuestionBank();

if (!empty($result)) {
    for ($i = 0; $i < count($result); $i++) {
        
                                  if ($result[$i]->Major_MajorId == 1) {
                                        $img = "cyber";
                                    } elseif ($result[$i]->Major_MajorId == 2) {
                                        $img = "prog";
                                    } elseif ($result[$i]->Major_MajorId == 3) {
                                        $img = "is";
                                    } elseif ($result[$i]->Major_MajorId == 4) {
                                        $img = "data";
                                    } else {
                                        $img = "net";
                                    }

        echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="course-item bg-light position-relative">
                            <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/'.$img.'.jpg" alt="">';

        if ($_SESSION['roleId'] == 1) {
            echo '<div class="w-100 d-flex justify-content-center position-absolute top-0 start-0 mt-3">
                        <a href="editCourse.php?cid=' . $result[$i]->CourseId . '"
                        class="flex-shrink-0 btn btn-sm btn-primary px-2"
                        style="border-radius: 50%;"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="confirmDelete(\'' . $result[$i]->CourseId . '\', \'delete\')"
                        class="flex-shrink-0 btn btn-sm btn-danger px-2 me-1"
                        style="border-radius: 50%;">
                        <i class="fas fa-trash"></i>
                        </a>
                        </div>';
        }


        echo '<div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                    <a href="singleCourse.php?cid=' . $result[$i]->CourseId . '"
                    class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                    style="border-radius: 30px 0 0 30px;">Read More</a>
                    <a href="inquiry.php?courseId=' . $result[$i]->CourseId . '" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                    style="border-radius: 0 30px 30px 0;">Ask Away</a>
                    </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                    <h3 class="mb-0">' . $result[$i]->CourseCode . '</h3>
                    <div class="mb-3">
                    <small class="fa fa-question-circle text-primary"></small>
<small class="fa fa-question-circle text-primary"></small>
<small class="fa fa-question-circle text-primary"></small>
<small class="fa fa-question-circle text-primary"></small>
<small class="fa fa-question-circle text-primary"></small>
                    <small> (' . $que->getTotalPostedQuestionsByCourse($result[$i]->CourseId) . ')</small>
                                            
                    </div>
                    <h5 class="mb-2 course-title">' . $result[$i]->CourseTitle . '</h5>
                    </div>
                    <div class="d-flex border-top">';
//                  <small class="flex-fill text-center border-end py-2"><i 
//                   class="fa fa-user-tie text-primary me-2"></i>' . $result[$i]->ProgramManager . '</small>
        echo'<small class="flex-fill text-center border-end py-2"><i
                    class="fa fa-clock text-primary me-2"></i>' . $result[$i]->Credits . ' Credits</small>
                    <small class="flex-fill text-center py-2"><i
                    class="fa fa-level-up-alt text-primary me-2"></i>' . $result[$i]->CourseLevel . ' Level</small>
                    </div>
                    </div>
                    </div>';
    }
    echo '<div style="margin-bottom: 20px;"></div>'; // Add a space
} else {
    echo '<h6>Oops, no courses available.</h6>';
}
?>

                    </div>
                </div>


            </div>
        </div>
        <!-- Courses End -->
<?php
include 'footer.php';
