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
ob_start();
include 'debugging.php';

if (empty($_SESSION['uid'])) {
// User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

$title = $_GET['title'];
$major = $_GET['filter'];
$sort = $_GET['sort'];

//echo $title;
//echo $major;
//echo $sort;

if ($_GET['title'] != ""){
    //search by title, filter and sort
    $result = CourseBank::searchCourseWithTitle($title, $major, $sort);

} elseif ($_GET['title'] == "") {
    //search by filter and sort
    $result = CourseBank::searchCourseNoTitle($major, $sort);

}   else {
    $result = CourseBank::getCourses();

}
   
if (!empty($result)) {
                               for ($i = 0; $i < count($result); $i++) {
        // Rest of your code...

        // Truncate the title if it exceeds a certain number of characters
        $shortTitle = $result[$i]->ShortTitle;
        if (strlen($shortTitle) > 20) {
            $shortTitle = substr($shortTitle, 0, 20) . '...';
        }

                    echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="course-item bg-light position-relative">
                            <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/course-1.jpg" alt="">';

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
                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                    style="border-radius: 0 30px 30px 0;">Join Now</a>
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
                    <small class="flex-fill text-center border-end py-2"><i
                    class="fa fa-user-tie text-primary me-2"></i>' . $result[$i]->ProgramManager . '</small>
                    <small class="flex-fill text-center border-end py-2"><i
                    class="fa fa-clock text-primary me-2"></i>' . $result[$i]->Credits . ' Credits</small>
                    <small class="flex-fill text-center py-2"><i
                    class="fa fa-level-up-alt text-primary me-2"></i>' . $result[$i]->CourseLevel . ' Level</small>
                    </div>
                    </div>
                    </div>';
    }
} else {
    echo '<h6>Oops, no courses available.</h6>';
}

 ?>

      