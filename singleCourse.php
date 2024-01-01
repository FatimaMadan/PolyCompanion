<?php
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
                                <a href=inquiry.php?courseId=<?php echo $id?> class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Ask Away</a>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    
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