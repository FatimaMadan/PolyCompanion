<?php
ob_start();
include 'debugging.php';
include "header.php";
include "QuestionBank.php";
include "Users.php";

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

$id = $_SESSION['uid'];
    $user = new Users();
    $user->initWithUid($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>profile projects - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

<link rel="stylesheet" href="css/Profile.css">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="blue-div"> 
    <?php
    $u = new Users();
  $UserData = $u->initWithUid($_SESSION['uid']);
 echo '<h4 style="color: white; text-align: center; font-size: 30px; margin-top: 20px;"> Welcome ' . $u->getFirstName() .'</h4>';
?>
   
   </div>
<div class="whitetest-div">
<div class="row">
<div class="col-xl-11">
<div class="card" style="margin-top: 30px;">
<div class="card-body pb-0">
<div class="row align-items-center">
<div class="col-md-3">
<div class="text-center border-end">
     <?php $uuser = new Users();
  $UserData = $uuser->initWithUid($_SESSION['uid']);
   echo '<img class="img-fluid avatar-xxl rounded-circle" src='. $uuser->getUserDp().'>';

?>
    
</div>
</div>
<div class="col-md-9">
<div class="ms-3">
<div>
<h4 class="text-primary font-size-20 ">Aysha Cheema</h4>
    <p class="text-muted fw-medium mb-0"><i class="mdi mdi-account me-2"></i>202003059
</p>
<p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i>ayshaamajd469@gmail.com
</p>

</div>
<div>

<p class="mb-0 text-muted">Questions Asked: 56</p>
<p class="mb-0 text-muted">Answers Provided: 49</p>

</div>
<div class="row my-4">
<div class="col-md-12">
<!--<div>
<p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="317b505f425946545d5d427141435e5358521f525e5c">email address</a>
</p>
<p class="text-muted fw-medium mb-0"><i class="mdi mdi-account me-2"></i>Username
</p>
</div>-->
</div>
</div>
<ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link px-4 active" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1">
<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
<span class="d-none d-sm-block">My Posts</span>
</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link px-4" href="https://bootdey.com/snippets/view/profile-task-with-team-cards" target="__blank">
<span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
<span class="d-none d-sm-block">Saved Posts</span>
</a>
</li>
<!--<li class="nav-item" role="presentation">
<a class="nav-link px-4 " href="https://bootdey.com/snippets/view/profile-with-team-section" target="__blank">
<span class="d-block d-sm-none"><i class="mdi mdi-account-group-outline"></i></span>
<span class="d-none d-sm-block">Team</span>
</a>
</li>-->
</ul>
</div>
</div>
</div>
</div>
</div>
    </div>
<!--<div class="card">
<div class="tab-content p-4">-->
    <h5 style="font-weight: bold; color: #06BBCC; margin-bottom: 30px; margin-top: 30px;  margin-left: 200px; "> —————————— My Posts ——————————</h5>

    <?php
    
$qts = new QuestionBank();
$qts ->getAllQuestions();
// Set the number of articles to display per page
$qts_per_page = 3;

// Get the total number of qts
if (isset($_GET['courseId'])) {
//    echo "hahah";
  $courseId = $_GET['courseId'];
  $total_qts = $qts->getTotalPostedQuestionsByCourseAndSearch($courseId);
//  echo $total_qts;
  if ($total_qts == 0 ){
      echo ' <h3> No Questions to display </h3>';
  }
} else {
  $total_qts = $qts->getTotalPostedQuestionsByUser($_SESSION['uid']);
//   echo $total_qts;
   if ($total_qts == 0 ){
      echo ' <h3> No Questions to display </h3>';
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
  $page = $qts->getQuestionsByPageAndUser($offset, $qts_per_page, $_SESSION['uid']);
}

foreach ($page as $question) {
  $Quser = new Users();
  $UserData = $Quser->initWithUid($question->getUser_UserId());

  echo '<a href="view_posts.php?QtId=' . $question->getQuestionId() . '" >';
   echo '<div class="myposts-form">';
  echo '<div class="FP">';
  echo '<div class="FP-header">';
  echo '<h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="border rounded-circle p-2 mx-auto" src='. $Quser->getUserDp() .' style="width: 50px; height: 50px;">'. $Quser->getFirstName() .' '. $Quser->getLastName() .'</h6>';

  echo '<h6 style="font-family: Arial;">'. $question->getQuesTitle() .'</h6>';
  
  $shortDesc = substr($question->getQuesDescription(), 0, 150). '...';
  echo '<p>'. $shortDesc .'</p>';

  // ICONS Start
  echo '<div class="icon-container">';
  echo '5<i class="fas fa-thumbs-up"></i>';
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
    <label style="margin-left: 300px; font-weight: bold; font-size: 20px;">Page: </label>';
    
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


?>
    
    
<!--</div>
</div>-->
<!--</div>-->
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>

<?php
include "footer.php";
?>