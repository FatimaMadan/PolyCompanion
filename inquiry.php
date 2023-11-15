<?php
ob_start();
include 'debugging.php';
include 'header.php';
include "Users.php";
include "CourseBank.php";
include "QuestionBank.php";

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

if (isset($_POST['redirect'])) {
    
    header("Location: AddQuestion.php");
}
    $id = $_SESSION['uid'];
    $user = new Users();
    $user->initWithUid($id);
    
?><!DOCTYPE html>
<html lang="en">

<head>
       <!-- JavaScript code -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    
$(document).ready(function() {
  $('.delete-btn').click(function() {
    var questionId = this.getAttribute("data-question-id");

    $.ajax({
      type: 'POST',
      url: 'DeletePost.php',
      data: {questionId: questionId},
      dataType: 'json',
      success: function(response) {
        if (response.success) {
            location.reload();
          // Update the UI to reflect the new like/dislike count
          // You can update the button appearance or display a message indicating the action was successful
          console.log('Deleted successfully.');
        } else {
             
          console.error('Failed to delete: ' + response.error);
        }
      },
      error: function(xhr, status, error) {
        console.error('AJAX request failed: ' + error);
      }
    });
  });
   });
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
    echo '<a href="?courseId=' . $data[$i]->CourseId . '">' .
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
                echo '<li><a style="color: #06BBCC;" href="?courseId=' . $Pdata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'#06BBCC\';">' . $Pdata[$i]->CourseTitle . '</a></li>'; 
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
                         echo '<li><a style="color: #06BBCC;" href="?courseId=' . $Idata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'#06BBCC\';">' . $Idata[$i]->CourseTitle . '</a></li>'; 
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
                echo '<li><a style="color: #06BBCC;" href="?courseId=' . $Ndata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'#06BBCC\';">' . $Ndata[$i]->CourseTitle . '</a></li>'; 
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
              echo '<li><a style="color: #06BBCC;" href="?courseId=' . $DSdata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'#06BBCC\';">' . $DSdata[$i]->CourseTitle . '</a></li>'; 
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
                       echo '<li><a style="color: #06BBCC;" href="?courseId=' . $CSdata[$i]->CourseId . '" onmouseover="this.style.color=\'white\';" onmouseout="this.style.color=\'#06BBCC\';">' . $CSdata[$i]->CourseTitle . '</a></li>'; 
                          }
                ?>
      </ul>
    </li>
  </ul>
        </div>
    
    </div>
    <!-- Side Blue Div End -->
    
    
    
    <!-- Main white Div Start -->
    <div class="white-div">
        <br>
        
        
          <!--Search 1 Start--> 
      <div class="search-container">
    <form method="POST" action="">
        <input type="text" placeholder="Search..." name="searchText">
        <button type="submit" name="searchbtn" style="background-color: #181d38;">Search</button>
         <button type="submit" name="redirect" style="background-color: #06BBCC; border-radius: 60%; width: 60px; height: 60px; font-size: 30px; font-weight: bold;" title="Click to Post a Question">+</button>   </form>
        </div><br>
          <!--Search 1 End--> 

         <!-- POST 1 START -->
            
            <?php
            
if (isset($_POST['searchbtn'])) {
  
$qts = new QuestionBank();
// Set the number of articles to display per page
$qts_per_page = 4;

$se = trim($_POST['searchText']);
  echo '<p> Results for SEARCH: ' . $se .'</p>';
// Get the total number of qts
if (isset($_GET['courseId'])) {
//    echo "hahah";
  $courseId = $_GET['courseId'];
  $total_qts = $qts->getTotalPostedQuestionsByCourseAndSearch($courseId, $se);
  if ($total_qts == 0 ){
     echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Questions to Display</h3>';
echo '</div>';
  }
//  echo $total_qts;
} else {
  $total_qts = $qts->getTotalPostedQuestionsAndSearch($se);
//   echo $total_qts;
   if ($total_qts == 0 ){
        echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Questions to Display</h3>';
echo '</div>';
  }
}
// Calculate the total number of pages
$total_pages = ceil($total_qts / $qts_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($current_page - 1) * $qts_per_page;

// Get the qts for the current page
if (isset($_GET['courseId'])) {
   
  $courseId = $_GET['courseId'];
  $page = $qts->getQuestionsByCourseAndPageAndSearch($courseId, $offset, $qts_per_page, $se);
} else {
  $page = $qts->getQuestionsByPageAndSearch($offset, $qts_per_page, $se);
}

foreach ($page as $question) {
  $Quser = new Users();
  $UserData = $Quser->initWithUid($question->getUser_UserId());

  echo '<a href="view_posts.php?QtId=' . $question->getQuestionId() . '" >';
  echo '<div class="left-form">';
  echo '<div class="FP">';
  echo '<div class="FP-header">';
  echo '<h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Quser->getUserDp() .' style="width: 50px; height: 50px;">'. $Quser->getFirstName() .' '. $Quser->getLastName() .'</h6>';

  echo '<h6 style="font-family: Arial;">'. $question->getQuesTitle() .'</h6>';
  
  $shortDesc = substr($question->getQuesDescription(), 0, 150). '...';
  echo '<p>'. $shortDesc .'</p>';

  // ICONS Start
  echo '<div class="icon-container">';
  echo '<i class="fas fa-flag"></i>';
  echo '<i class="fas fa-star"></i>';
  echo '</div>';

  echo '</div>';
  echo '</div>';
  echo '</div></a>';
}



//<!-- PAGINATION 1 START -->
if ($total_qts != 0 ){
       echo '<div class="pagination-links">
    <label style="margin-left: 200px; font-weight: bold; font-size: 20px;">Page: </label>';
    
    $courseId = $_GET['courseId']; // Retrieve the courseId from the URL parameters

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span class=\"current\">$i</span> ";
        } elseif (empty($courseId)) {
            echo "<a href=\"?page=$i\">$i</a> ";
        }else{
             echo "<a href=\"?courseId=$courseId&page=$i\">$i</a> ";
        }
    }
echo '</div>';}


}else{
    $qts = new QuestionBank();
// Set the number of articles to display per page
$qts_per_page = 4;

// Get the total number of qts
if (isset($_GET['courseId'])) {
//    echo "hahah";
  $courseId = $_GET['courseId'];
  $total_qts = $qts->getTotalPostedQuestionsByCourseAndSearch($courseId);
//  echo $total_qts;
  if ($total_qts == 0 ){
      echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Questions to Display</h3>';
echo '</div>';
  }
} else {
  $total_qts = $qts->getTotalPostedQuestionsAndSearch();
//   echo $total_qts;
   if ($total_qts == 0 ){
        echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Questions to Display</h3>';
echo '</div>';
  }
}
// Calculate the total number of pages
$total_pages = ceil($total_qts / $qts_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($current_page - 1) * $qts_per_page;

// Get the qts for the current page
if (isset($_GET['courseId'])) {
   
  $courseId = $_GET['courseId'];
  $page = $qts->getQuestionsByCourseAndPageAndSearch($courseId, $offset, $qts_per_page);
} else {
  $page = $qts->getQuestionsByPageAndSearch($offset, $qts_per_page);
}

foreach ($page as $question) {
  $Quser = new Users();
  $UserData = $Quser->initWithUid($question->getUser_UserId());

  echo '<a href="view_posts.php?QtId=' . $question->getQuestionId() . '" ><div class="left-form">';
  echo '<div class="FP">';
  echo '<div class="FP-header">';
  echo '<h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Quser->getUserDp() .' style="width: 50px; height: 50px;">'. $Quser->getFirstName() .' '. $Quser->getLastName() .'</h6>';

  echo '<h6 style="font-family: Arial;">'. $question->getQuesTitle() .'</h6>';
  
  $shortDesc = substr($question->getQuesDescription(), 0, 150). '...';
  echo '<p>'. $shortDesc .'</p></a>';

  // If not a Student only then show this delete button
  if($_SESSION['uid'] != 4 ){
  echo '<div class="icon-container">';
  echo '<i class="fas fa-trash-alt delete-btn" data-question-id="' . $question->getQuestionId() . '"></i>';
  echo '</div>';
  }
  
  echo '</div>';
  echo '</div>';
  echo '</div>';
}



//<!-- PAGINATION 1 START -->
if ($total_qts != 0 ){
    
       echo '<div class="pagination-links">
    <label style="margin-left: 200px; font-weight: bold; font-size: 20px;">Page: </label>';
    
    $courseId = $_GET['courseId']; // Retrieve the courseId from the URL parameters

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span class=\"current\">$i</span> ";
        } elseif (empty($courseId)) {
            echo "<a href=\"?page=$i\">$i</a> ";
        }else{
             echo "<a href=\"?courseId=$courseId&page=$i\">$i</a> ";
        }
    }
echo '</div>';
}
}

?>
            <!-- POST 1 END -->
            
            
            
            
            
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
    <div class="container-fluid bg-dark text-light footer" >
             <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs</a>
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
                        &copy; <a class="border-bottom" href="index.php">PolyCompanion</a>, All Right Reserved.

                      
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="index.php">Home</a>
                            <a href="FAQ.php">FAQs</a>
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