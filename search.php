<style>
    .course-title {
        height: 3.6em;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        margin-bottom: 0;
    }
    
</style><!-- comment -->

<?php
include 'debugging.php';

//if (is_null($_GET['filter'])){
    $result = CourseBank::searchByTitle($_GET['title']);
if (!empty($result)) {
                               for ($i = 0; $i < count($result); $i++) {
        // Rest of your code...

        // Truncate the title if it exceeds a certain number of characters
        $shortTitle = $result[$i]->ShortTitle;
        if (strlen($shortTitle) > 20) {
            $shortTitle = substr($shortTitle, 0, 20) . '...';
        }

        echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="course-item bg-light">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid" src="img/course-1.jpg" alt="">
                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                        <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                        <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                    </div>
                </div>
                <div class="text-center p-4 pb-0">
                    <h3 class="mb-0">' . $shortTitle . '</h3>
                    <div class="mb-3">
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small>(123)</small>
                    </div>
                    <h5 class="mb-2 course-title">' . $result[$i]->CourseTitle . '</h5>
                </div>
                <div class="d-flex border-top">
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>' . $result[$i]->ProgramManager . '</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>' . $result[$i]->Credits . ' Credits</small>
                    <small class="flex-fill text-center py-2"><i class="fa fa-level-up-alt text-primary me-2"></i>' . $result[$i]->CourseLevel . ' Level</small>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<h6>Oops, no COURSES yet.</h6>';
//}
//
//} else {
//    
//    
//    $result = CourseBank::searchByTitleAndFilter($_GET['title'], $mid);
//if (!empty($result)) {
//                               for ($i = 0; $i < count($result); $i++) {
//        // Rest of your code...
//
//        // Truncate the title if it exceeds a certain number of characters
//        $shortTitle = $list[$i]->ShortTitle;
//        if (strlen($shortTitle) > 20) {
//            $shortTitle = substr($shortTitle, 0, 20) . '...';
//        }
//
//        echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
//            <div class="course-item bg-light">
//                <div class="position-relative overflow-hidden">
//                    <img class="img-fluid" src="img/course-1.jpg" alt="">
//                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
//                        <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
//                        <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
//                    </div>
//                </div>
//                <div class="text-center p-4 pb-0">
//                    <h3 class="mb-0">' . $shortTitle . '</h3>
//                    <div class="mb-3">
//                        <small class="fa fa-star text-primary"></small>
//                        <small class="fa fa-star text-primary"></small>
//                        <small class="fa fa-star text-primary"></small>
//                        <small class="fa fa-star text-primary"></small>
//                        <small class="fa fa-star text-primary"></small>
//                        <small>(123)</small>
//                    </div>
//                    <h5 class="mb-2 course-title">' . $result[$i]->CourseTitle . '</h5>
//                </div>
//                <div class="d-flex border-top">
//                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>' . $result[$i]->ProgramManager . '</small>
//                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>' . $result[$i]->Credits . ' Credits</small>
//                    <small class="flex-fill text-center py-2"><i class="fa fa-level-up-alt text-primary me-2"></i>' . $result[$i]->CourseLevel . ' Level</small>
//                </div>
//            </div>
//        </div>';
//    }
//} else {
//    echo '<h6>Oops, no COURSES yet.</h6>';
//}
}
//$result = CourseBank::searchByTitle($_GET['title'], $_GET['filter']);

 ?>