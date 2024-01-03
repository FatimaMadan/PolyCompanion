<?php
ob_start();
include 'debugging.php';
include 'header.php';
include 'DescriptorBank.php';
include 'CourseBank.php';
include 'Users.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

if (isset($_GET['cid'])) {
    $courseId = $_GET['cid'];
    $course = new CourseBank();
    // Assuming you have a function called 'getCourseDetails' to retrieve the course details
    $courseData = $course->getCourseDetails($courseId);
} else {
    // The course ID parameter is not provided, handle the error
    echo "Invalid course ID.";
    exit;
}

if (isset($_POST['submitted'])) {

    $newcour = new CourseBank();

    $newcour->setCourseCode($_POST['CourseCode']);
    $newcour->setAssessmentMethod($_POST['AssessmentMethod']);
    $newcour->setCourseAim($_POST['CourseAim']);

    $newcour->setCourseLevel($_POST['CourseLevel']);

    $newcour->setCourseTitle($_POST['CourseTitle']);
    $newcour->setCredits($_POST['Credits']);
    $newcour->setExams($_POST['exams']);
    $newcour->setMajor_MajorId($_POST['Major_MajorId']);

    $newcour->setOwner('ICT');
    $newcour->setPreRequisite($_POST['PreRequisite']);
    
     if ($_POST['Pre-requisite'] == ""){
            $newcour->setPreRequisite("No PreRequisite");
        }
        
    $newcour->setShortTitle($_POST['ShortTitle']);
    $newcour->setUncontrolledAssess($_POST['uncontrolledAssess']);

    $newcour->setYear($_POST['Year']);

    $newcour->setSem($_POST['sem']);

    $error_message = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form submission
        if ($newcour->updateCourse($courseId)) {
            CourseBank::deleteOutcomes($courseId);
            CourseBank::addOutcomes($_POST['CLO'], $courseId);
            header("Location: singleCourse.php?cid=$courseId");
            exit();
        } else {
            $error_message = 'An Error Occur while editing the course, make sure to fill in all the fields following the conditions';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="css/AddQt.css">
        <title> Edit a Course </title>
    </head>
    <body>
    <body>
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>Edit a Course</h3>
                    </div>
                </div>
                <form action="" class="login-form" method="POST" enctype="multipart/form-data">

                    <!-- Display the error message -->
                    <?php if (!empty($error_message)) { ?>
                        <p><?php echo $error_message; ?></p>
                    <?php } elseif (!empty($errors)) { ?>
                        <ul>
                            <?php foreach ($errors as $error) { ?>
                                <li><?php echo $error; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>

                    <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 6 characters, this must be unique.</p>
                    <input required type="text" placeholder="Course Code" name="CourseCode" value="<?php echo $courseData['CourseCode']; ?>" readonly/>

                    <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 30 characters.</p>
                    <input required type="text" placeholder="Course Title" name="CourseTitle" value="<?php echo $courseData['CourseTitle']; ?>"/>

                    <p style="color: #a52834; font-size: 9px; float: left;">*Not more than six characters.</p>
                    <input required type="text" placeholder="Course Short Title" name="ShortTitle" value="<?php echo $courseData['ShortTitle']; ?>"/>

                    <p style="color: #a52834; font-size: 9px; float: left;">*A number between 0 and 10.</p>
                    <input required type="text" placeholder="Course Level" name="CourseLevel" value="<?php echo $courseData['CourseLevel']; ?>"/>

                    <p style="color: #a52834; font-size: 9px; float: left;">*A number between 5 and 65.</p>
                    <input required type="text" placeholder="Course Credits" name="Credits" value="<?php echo $courseData['Credits']; ?>"/>

                    <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 100 characters.</p>
                    <textarea required placeholder="Uncontrolled Assessments" name="uncontrolledAssess"><?php echo $courseData['uncontrolledAssess']; ?></textarea>

                    <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 100 characters.</p>
                    <textarea required placeholder="Examinations" name="exams"><?php echo $courseData['exams']; ?></textarea>        
                    <input required type="text" placeholder="Assessment Method" name="AssessmentMethod" value="<?php echo $courseData['AssessmentMethod']; ?>"/>

                    <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 100 characters.</p>
                    <textarea required placeholder="Course Aim" name="CourseAim"><?php echo $courseData['CourseAim']; ?></textarea><!-- comment -->

                    <p style="color: #a52834; font-size: 9px; float: left;">*This field is optional</p>
                    <input type="text" placeholder="Pre-Requisite" name="PreRequisite" value="<?php echo $courseData['PreRequisite']; ?>"/>
                    <select required name="Major_MajorId">
                        <option value="">Select Major</option>
                        <?php
                        $tempMajors = new MajorBank();
                        $majorList = $tempMajors->createMajorList($courseData['Major_MajorId']);
                        echo $majorList;
                        ?>
                    </select><br>

                    <select required name="Year">
                        <option value="">Select Year</option>
                        <option <?php if ($courseData['Year'] == 1) echo 'selected'; ?>>1</option>
                        <option <?php if ($courseData['Year'] == 2) echo 'selected'; ?>>2</option>
                        <option <?php if ($courseData['Year'] == 3) echo 'selected'; ?>>3</option>
                        <option <?php if ($courseData['Year'] == 4) echo 'selected'; ?>>4</option>
                    </select><br>

                    <select required name="sem">
                        <option value="">Select Semester</option>
                        <option <?php if ($courseData['sem'] == 'A') echo 'selected'; ?>>A</option>
                        <option <?php if ($courseData['sem'] == 'B') echo 'selected'; ?>>B</option>
                    </select><br>
                    <p style="color: #a52834; font-size: 9px; float: left;">*Separate them using stars(*).</p>
                    <textarea required placeholder="Course Learning Oucomes" name="CLO" value="">
                        <?php
                        $clos= $course->getOutcomes($courseId);
                         foreach ($clos as $outcome) { 
        echo $outcome->OutcomeDescription;
        echo '*';
                         }
                        ?></textarea>              
<br />
                    <button name="submitted" value="TRUE">Submit</button>
                   </form>
            </div>
        </div>
    </body>
</body>
</html>

<?php
include 'footer.php';
?>
