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
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><?php echo $course->getCourseCode() ?> &bull; <?php echo $course->getShortTitle() ?></h5>
                                <h1 class="display-3 text-white animated slideInDown"><?php echo $course->getCourseTitle() ?></h1>
                                <p class="fs-5 text-white mb-4 pb-2"><?php echo $course->getCredits() ?> Credits &bull;
                                                                     Level <?php echo $course->getCourseLevel() ?> &bull;
                                                                     <?php echo $major->getMajorName() ?> Major
                                </p>
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
                        <i class="fa fa-3x fa-check-square text-primary mb-4"></i>
                        <h5 class="mb-3">Prerequisites</h5>
                        <p><?php echo $course->getPreRequisite() ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3 h-100">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Sources</h5>
                        <p><?php echo $course->getRecommended_book_resources() ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3 h-100">
                    <div class="p-4">
                        <i class="fa fa-3x fa-clock text-primary mb-4"></i>
                        <h5 class="mb-3">Total Hours</h5>
                        <p><?php echo $course->getTotal_hours() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
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

</body><!-- comment -->

<?php
include 'footer.php';
?>