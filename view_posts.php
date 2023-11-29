<?php
ob_start();
include 'debugging.php';
include 'header.php';
include 'Files.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

if (isset($_POST['redirect'])) {
    
    header("Location: AddAnswer.php");
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
    
//    document.addEventListener("DOMContentLoaded", function() {
//  var likeBtns = document.getElementsByClassName("like-btn");
//  for (var i = 0; i < likeBtns.length; i++) {
//    likeBtns[i].addEventListener("click", function() {
//      var answerId = this.getAttribute("data-answer-id");
//       $.ajax({
//      type: 'POST',
//      url: 'updateLikes.php', // Replace with the PHP script that handles the database update
//      data: { answerId: answerId, action: 'like' }, // Pass the answer ID and the action ('like' or 'dislike')
//      success: function(response) {
//          location.reload();
//          likeButton.classList.add("disabled");
//      },
//      error: function(xhr, status, error) {
//        // Handle error if the update fails
//        console.log(error);
//      }
//    });
//    });
//  }
//});



$(document).ready(function() {
  $('.like-btn, .dislike-btn').click(function() {
    var answerId = this.getAttribute("data-answer-id");
    var action = $(this).hasClass('like-btn') ? 'like' : 'dislike';

    $.ajax({
      type: 'POST',
      url: 'updateLikes.php',
      data: {answerId: answerId, action: action },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
            location.reload();
          // Update the UI to reflect the new like/dislike count
          // You can update the button appearance or display a message indicating the action was successful
          console.log('Likes/Dislikes updated successfully.');
        } else {
             // Show the <div> element for 5 seconds
       var popupDiv = document.getElementById('popupMessage');
    popupDiv.style.display = 'block';

    // Hide the popup message after 5 seconds
    setTimeout(function() {
      popupDiv.style.display = 'none';
    }, 5000);
      
          console.error('Failed to update likes/dislikes: ' + response.error);
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

      
    
    
    
    
    <div id="popupMessage" class="blah" style="box-sizing: border-box; position: fixed; z-index: 100000; top: 30%; left: 50%; transform: translate(-50%, -50%); display: none; border: 2px solid #00A36C; background-color: #00A36C; color: white; border-radius: 10px;">✓ This answer has been downvoted and will be shown to fewer people.</div>
    
    
    
    
    
    
    
    
    
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
    $row = $files->getFileWithQuesidAndType($QuesId);
  echo '<p><h6 style="font-weight: bold; color: #181d38;">Uploaded Files: </h6>';
  if (!empty($row)) {
       for ($i = 0; $i < count($row); $i++) {
  echo '<a target="_blank" href="view_file.php?fid=' . $row[$i]->FileId . '">' . $row[$i]->FileName . '</a>';
       }
  }
  else{
      echo "No files uploaded.";
  }
// Donwload files END

  // ICONS Start
    echo '<i class="far fa-star" style="display: inline-block; float: right; margin-left: 15px; margin-right: 15px;">Save</i>';
    echo '<i class="far fa-comment" style="display: inline-block; float: right; margin-left: 15px;"></i>';
    echo '<i class="far fa-thumbs-up" style="display: inline-block; float: right; margin-left: 15px;">15</i></p>';
    echo '</div>';
  // ICONS END
   
  
    //***************ANSWERS START****************
   echo '<br><div><h5 style="font-weight: bold; text-align: center; color: #06BBCC;"> ————— Responses —————</h5>'
    . '<a href="AddAnswer.php?QtId=' . $QuesId . '" class="button-link">Add Answer</a><br></div>
       <br>';
   
   
    $ans = new AnswerBank();
// Set the number of articles to display per page
$ans_per_page = 3;

  $QId = $_GET['QtId'];
  $total_ans = $ans->getTotalPostedAnswersByQuestion($QId);
//  echo $total_qts;
  if ($total_ans == 0 ){
     echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Answers to Display</h3>';
echo '</div>';
  }

// Calculate the total number of pages
$total_pages = ceil($total_ans / $ans_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($current_page - 1) * $ans_per_page;

  $QtId = $_GET['QtId'];
  $page = $ans->getAnswersByQuestionAndPage($QtId, $offset, $ans_per_page);

  

foreach ($page as $answer) {
  $Auser = new Users();
  $UserData = $Auser->initWithUid($answer->getUser_UserId());

  echo '<div class="ans-form">';
  echo '<div class="FP">';
  echo '<div class="FP-header">';
  echo '<h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Auser->getUserDp() .' style="width: 50px; height: 50px;">'. $Auser->getFirstName() .' '. $Auser->getLastName() .'</h6>';

  echo '<p>'. $answer->getAnsText() .'</p>';
  
// Donwload ANSWER files Start
    $AnsFiles = new Files();
    $ansId = $answer->getAnsId();
//    echo $ansId;
    $userId = $Auser->getUid();
//    echo $userId;
    $row = $AnsFiles->getFileWithAnsidAndUserIdAndType($ansId, $userId);
  echo '<p><h6 style="font-weight: bold; color: #181d38;">Uploaded Files: </h6>';
  if (!empty($row)) {
       for ($i = 0; $i < count($row); $i++) {
  echo '<a target="_blank" href="view_file.php?fid=' . $row[$i]->FileId . '">' . $row[$i]->FileName . '</a><br>';
       }
  }
  else{
      echo "No files uploaded.";
  }
// Donwload ANSWER files END

// ICONS Start
echo '<div class="icon-container">';
echo '' . $answer->getLikes() . '<i class="fas fa-arrow-up like-btn" data-answer-id="' . $answer->getAnsId() . '" style="color: green;"></i>';
echo '<i class="fas fa-arrow-down dislike-btn" data-answer-id="' . $answer->getAnsId() . '" style="color: red;"></i>';
echo '</div>';
// ICONS End

//echo '<div class="q-fixed qu-alignItems--center qu-top--huge qu-left--small qu-right--small qu-display--flex qu-flexDirection--column" style="box-sizing: border-box; position: fixed; z-index: 100000; padding-right: 0px; display: none;">Hello</div>';

  echo '</div>';
  echo '</div>';
  echo '</div>';
}


     //***************ANSWERS END****************
?>
         
           <!-- PAGINATION 1 START -->
<?php if ($total_ans != 0) {
    echo '<div class="pagination-links">';
    echo '<label style="margin-left: 400px; font-weight: bold; font-size: 20px;">Page: </label>';

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span class=\"current\">$i</span> ";
        } elseif (empty($QuesId)) {
            echo "<a href=\"?page=$i\">$i</a> ";
        } else {
            echo "<a href=\"?QtId=$QuesId&page=$i\">$i</a> ";
        }
    }
    echo '</div>';
}
            ?>
           
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

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!--Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>-->
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