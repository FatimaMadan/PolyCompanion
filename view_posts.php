<?php
ob_start();
include 'debugging.php';
include 'header.php';
//include "Users.php";
//include "CourseBank.php";
//include "QuestionBank.php";
//include "AnswerBank.php";
//include "Files.php";
//include "Upload.php";

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

    $id = $_SESSION['uid'];
    $user = new Users();
    $user->initWithUid($id);
    
?><!DOCTYPE html>
<html lang="en">

<head>
       <!-- JavaScript code -->
    <script>
        // Get the current page URL
        var url = window.location.href;

        // Check each menu item's URL against the current page URL
        var menuItems = document.querySelectorAll('.nav-item.nav-link');
        menuItems.forEach(function(item) {
            if (item.href === url) {
                item.classList.add('active'); // Add the 'active' class to the matching menu item
            }
        });
        
      function toggleSubcategory(event) {
      const subcategory = event.target.nextElementSibling;
      subcategory.classList.toggle('visible');
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    
    <!-- Side Blue Div Start -->
    <div class="blue-div">
        <br>
        <h6 style="color: white"><img class="border rounded-circle p-2 mx-auto mb-3" src=<?php echo $user->getUserDp(); ?> style="width: 70px; height: 70px;"> Welcome <?php echo $user->getFirstName(). " " . $user->getLastName(); ?>!</h6>
   <div>
    <h4 class="course-list">
        <a href="inquiry.php" name="allCourse" style="color: white">All Courses</a>
    </h4>
</div>
        <div><h3 class="course-list">Choose a Course</h3></div>
       
     
     <?php
$allCourse = new CourseBank();
$data = $allCourse->getAllCourses();

for ($i = 0; $i < count($data); $i++) {
    echo '<a href=inquiry.php?courseId=' . $data[$i]->CourseId . '>' .
         '<h6 class="course-list" style="color: white;">' . $data[$i]->CourseTitle .'</h6>' .
         '</a>';
}
?>
     
     
     
      <div><h4 class="course-list">Specific to your Major</h4></div>
       
     <!--LIST DIV-->
     <div>
            
 <ul class="expandable-list">
    <li>
      <div class="category" onclick="toggleSubcategory(event)">Programming</div>
      <ul class="subcategory">
          <div>
         <?php
         $PCourse = new CourseBank();
                $Pdata = $PCourse->initWithMid(2);
                for ($i = 0; $i < count($Pdata); $i++) {
                echo '<li><a style="color: black;" href=inquiry.php?courseId=' . $Pdata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'black\';">' . $Pdata[$i]->CourseTitle . '</a></li>'; 
                         }
                ?>
          </div>
      </ul>
    </li>
    <li>
      <div class="category" onclick="toggleSubcategory(event)">Information Systems</div>
      <ul class="subcategory">
        <?php
         $ICourse = new CourseBank();
                $Idata = $ICourse->initWithMid(3);
                for ($i = 0; $i < count($Idata); $i++) {
                         echo '<li><a style="color: black;" href="inquiry.php?courseId=' . $Idata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'black\';">' . $Idata[$i]->CourseTitle . '</a></li>'; 
                         }
                ?>
      </ul>
    </li>
    <li>
      <div class="category" onclick="toggleSubcategory(event)">Networking</div>
      <ul class="subcategory">
        <?php
         $NCourse = new CourseBank();
                $Ndata = $NCourse->initWithMid(5);
                for ($i = 0; $i < count($Ndata); $i++) {
                echo '<li><a style="color: black;" href="inquiry.php?courseId=' . $Ndata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'black\';">' . $Ndata[$i]->CourseTitle . '</a></li>'; 
                         }
                ?>
      </ul>
    </li>
    <li>
      <div class="category" onclick="toggleSubcategory(event)">Database Systems</div>
      <ul class="subcategory">
        <?php
         $DSCourse = new CourseBank();
                $DSdata = $DSCourse->initWithMid(4);
                for ($i = 0; $i < count($DSdata); $i++) {
              echo '<li><a style="color: black;" href="inquiry.php?courseId=' . $DSdata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'black\';">' . $DSdata[$i]->CourseTitle . '</a></li>'; 
                           }
                ?>
      </ul>
    </li>
     <li>
      <div class="category" onclick="toggleSubcategory(event)">Cyber Security</div>
      <ul class="subcategory">
        <?php
         $CSCourse = new CourseBank();
                $CSdata = $CSCourse->initWithMid(6);
                for ($i = 0; $i < count($CSdata); $i++) {
                       echo '<li><a style="color: black;" href="inquiry.php?courseId=' . $CSdata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'black\';">' . $CSdata[$i]->CourseTitle . '</a></li>'; 
                          }
                ?>
      </ul>
    </li>
  </ul>
        </div>
    
    </div>
    <!-- Side Blue Div End -->
    
  
   
    <!-- Main white Div Start -->
    <div class="viewPost-div">
        <br>
         <!-- QUESTION AREA START -->
            <?php
    $QuesId = $_GET['QtId'];
    $question = new QuestionBank();
 $displayQt = $question->initWithQid($QuesId);
    
    $Quser = new Users();
    $UserData = $Quser->initWithUid($question->getUser_UserId());

    
    
  echo '<h5 style="font-weight: bold; text-align: center; color: #06BBCC;"> —————————— Question ——————————</h5>'
    . '<div><h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Quser->getUserDp() .' style="width: 50px; height: 50px;">'. $Quser->getFirstName() .' '. $Quser->getLastName() .'</h6>';

  echo '<h6 style="font-family: Arial;">'. $question->getQuesTitle() .'</h6>';
  
  echo '<p>'. $question->getQuesDescription() .'</p>';
  
// Donwload files Start
    $files = new Files();
    $row = $files->getFileWithQuesid($QuesId);
  echo '<p><h6 style="font-weight: bold; color: #181d38;">Uploaded Files: </h6>';
  if (!empty($row)) {
       for ($i = 0; $i < count($row); $i++) {
  echo '<a target="_blank" href="view_file.php?fid=' . $row[$i]->FileId . '">' . $row[$i]->FileName . '</a>';
       }
  }
  else{
      echo "No files uploaded.";
  }
  
  
  

//// list files goes here ... just create an object and call getAllFiles function
//$files = new Files();
//$row = $files->getFileWithQuesid($QuesId);
//
//
//if (!empty($row)) {
//    echo '<br />';
//    //display a table of results
//    echo '<table align="center" cellspacing = "2" cellpadding = "4" width="75%">';
//    echo '<tr bgcolor="#87CEEB">
//          <td><b>Edit</b></td>
//          <td><b>Delete</b></td>
//          <td><b>File Name</b></td>
//          <td><b>File Type</b></td>
//          </tr>';
//
//
//    $bg = '#eeeeee';
//
//    for ($i = 0; $i < count($row); $i++) {
//        $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
//
//        echo '<tr bgcolor="' . $bg . '">
//             <td><a href="edit_file.php?fid=' . $row[$i]->FileId . '">Edit</a></td>
//             <td><a href="delete_file.php?fid=' . $row[$i]->FileId . '">Delete</a></td>
//             <td><a target="_blank" href="view_file.php?fid=' . $row[$i]->FileId . '">' . $row[$i]->FileName . '</a></td>
//             <td>' . $row[$i]->FileType . '</td>
//             </tr>';
//    }
//    echo '</table>';
//} else {
//    echo '<p class="error">' . $q . '</p>';
//    echo '<p class="error">No files are uploaded yet</p>';
//    echo '<p class="error">' . mysqli_error($dbc) . '</p>';
//}


// Donwload files END

// ICONS Start
    echo '<i class="far fa-star" style="display: inline-block; float: right; margin-left: 15px; margin-right: 15px;">Save</i>';
    echo '<i class="far fa-comment" style="display: inline-block; float: right; margin-left: 15px;"></i>';
    echo '<i class="far fa-thumbs-up" style="display: inline-block; float: right; margin-left: 15px;">15</i></p>';
    echo '</div>';
  // ICONS END
    
    //***************ANSWERS START****************
   echo '<br><h5 style="font-weight: bold; text-align: center; color: #06BBCC;"> ————— Responses —————</h5><br>';
   
   
    $ans = new AnswerBank();
// Set the number of articles to display per page
$ans_per_page = 3;

  $QId = $_GET['QtId'];
  $total_ans = $ans->getTotalPostedAnswersByQuestion($QId);
//  echo $total_qts;
  if ($total_ans == 0 ){
      echo ' <h3> No Answers to display </h3>';
  }

// Calculate the total number of pages
$total_pages = ceil($total_ans / $ans_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($current_page - 1) * $ans_per_page;

  $QtId = $_GET['QtId'];
  $page = $ans->getAnswersByQuestionAndPage($QtId, $offset, $ans_per_page);

  
//<!-- PAGINATION 1 START -->
if ($total_ans != 0 ){
    
       echo '<div class="pagination-links">
    <label style="margin-left: 600px; font-weight: bold; font-size: 20px;">Page: </label>';
    
    $QId = $_GET['QtId']; // Retrieve the courseId from the URL parameters

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span class=\"current\">$i</span> ";
        } elseif (empty($QId)) {
            echo "<a href=\"?page=$i\">$i</a> ";
        }else{
             echo "<a href=\"?courseId=$QId&page=$i\">$i</a> ";
        }
    }
echo '</div>';
}


foreach ($page as $answer) {
  $Auser = new Users();
  $UserData = $Auser->initWithUid($answer->getUser_UserId());

  echo '<div class="ans-form">';
  echo '<div class="FP">';
  echo '<div class="FP-header">';
  echo '<h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Auser->getUserDp() .' style="width: 50px; height: 50px;">'. $Auser->getFirstName() .' '. $Auser->getLastName() .'</h6>';

  echo '<p>'. $answer->getAnsText() .'</p>';

  // ICONS Start
  echo '<div class="icon-container">';
  echo '5<i class="fas fa-thumbs-up"></i>';
  echo '<i class="fas fa-flag"></i>';
  echo '<i class="fas fa-star"></i>';
  echo '</div>';

  echo '</div>';
  echo '</div>';
  echo '</div>';
}



//
//
//    $answer = new AnswerBank();
// $displayAns = $answer->initWithQid($QuesId);
//    
//    $Auser = new Users();
//    $UserData = $Auser->initWithUid($answer->getUser_UserId());
//
//    
//   echo '<div class="ans-form">';
//  echo '<div class="FP">';
//  echo '<div class="FP-header">';
//  echo '<h6 style="color: lightgray; font-size: 14px;">';
//  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Auser->getUserDp() .' style="width: 50px; height: 50px;">'. $Auser->getFirstName() .' '. $Auser->getLastName() .'</h6>';
////
////  echo '<h6 style="font-family: Arial;">'. $answer->getAnsText() .'</h6>';
////  
//  echo '<p>'. $answer->getAnsText() .'</p>';
//echo '<p><h6 style="font-weight: bold; color: #181d38;">Uploaded Files: </h6>';
//  // ICONS Start
//  echo '<div class="icon-container" >';
//  echo '5<i class="fas fa-thumbs-up"></i>';
//  echo '<i class="fas fa-flag"></i>';
//  echo '<i class="fas fa-star"></i></p>';
//  echo '</div>';
//
//  echo '</div>';
//  echo '</div>';
//  echo '</div>';
     //***************ANSWERS START****************
?>
            <!-- QUESTION AREA END -->
            
            
            
            
            
 <!-- PAGINATION 1 START -->
   <?php
//           echo '<div class="pagination-links">
//    <label style="margin-left: 600px; font-weight: bold; font-size: 20px;">Page: </label>';
//    
//    $courseId = $_GET['courseId']; // Retrieve the courseId from the URL parameters
//
//    for ($i = 1; $i <= $total_pages; $i++) {
//        if ($i == $current_page) {
//            echo "<span class=\"current\">$i</span> ";
//        } elseif (empty($courseId)) {
//            echo "<a href=\"?page=$i\">$i</a> ";
//        }else{
//             echo "<a href=\"?courseId=$courseId&page=$i\">$i</a> ";
//        }
//    }
//echo '</div>';
     ?>
  <!-- PAGINATION 1 END -->

            
  
  
  
  
  
           <!--hard-coded POST START--> 
<!--           <div class="left-form">
        <div class="FP">
        <div class="FP-header">
          <h6 style="color: lightgray; font-size: 14px;"><img class="border rounded-circle p-2 mx-auto" src=<?php // echo $user->getUserDp(); ?> style="width: 50px; height: 50px;"><?php // echo " ". $user->getFirstName(). " " . $user->getLastName(); ?>
    <div class="icon-container">
          5<i class="fas fa-thumbs-up"></i>
          <i class="fas fa-flag"></i>
          <i class="fas fa-star"></i>
  </div>
                  </h6>
        <h6 style="font-family: Arial;">
            Question 2: What is the name of the project we need to have to do?
        </h6>
          <p>A The main idea behind all of this was to make sure that you all know what all is happening....</p>
         
      </div>
    </div>
       </div>-->
            <!--hard-coded POST START--> 
          
        
          
        
           
       
           
    </div>
    <!-- Main white Div End -->
    
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>