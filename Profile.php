<?php
ob_start();
include 'debugging.php';
include "header.php";
include "QuestionBank.php";
include "AnswerBank.php";
include "SavedPosts.php";
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
    
// Check if the form was submitted and the file was uploaded
if (isset($_POST['save'])){
    
     if ($_FILES && $_FILES['imageFile']['name']) 
        {
            $name = "img//" . $_FILES['imageFile']['name'];
            move_uploaded_file($_FILES['imageFile']['tmp_name'], $name);
           if ($_FILES['imageFile']['error'] > 0) 
{
    $errorCode = $_FILES['imageFile']['error'];
    $errorMessage = '';

    switch ($errorCode) {
        case UPLOAD_ERR_INI_SIZE:
            $errorMessage = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $errorMessage = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            break;
        case UPLOAD_ERR_PARTIAL:
            $errorMessage = 'The uploaded file was only partially uploaded';
            break;
        case UPLOAD_ERR_NO_FILE:
            $errorMessage = 'No file was uploaded';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $errorMessage = 'Missing a temporary folder';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $errorMessage = 'Failed to write file to disk';
            break;
        case UPLOAD_ERR_EXTENSION:
            $errorMessage = 'File upload stopped by extension';
            break;
        default:
            $errorMessage = 'Unknown error occurred';
            break;
    }

    echo "<p>There was an error:</p>";
    echo "<p>Error message: $errorMessage</p>";
}
        }
        $user->setUserDp($name);
        $user->updateUserDp($_SESSION['uid']);
}
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

    
    
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><!-- comment -->
    
    
    
    
    
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
<!--<script>
  function displayMyPosts() {
    document.getElementById("my-posts-content").style.display = "block";
    document.getElementById("saved-posts-content").style.display = "none";
  }

  function displaySavedPosts() {
    document.getElementById("my-posts-content").style.display = "none";
    document.getElementById("saved-posts-content").style.display = "block";
  }
</script>-->
<script>
     src="https://code.jquery.com/jquery-3.6.0.min.js";
  function displayMyPosts() {
    document.getElementById("my-posts-content").style.display = "block";
    document.getElementById("saved-posts-content").style.display = "none";
    
    document.getElementById("my-posts-button").classList.add("active");
    document.getElementById("saved-posts-button").classList.remove("active");
  }

  function displaySavedPosts() {
    document.getElementById("my-posts-content").style.display = "none";
    document.getElementById("saved-posts-content").style.display = "block";
    
    document.getElementById("my-posts-button").classList.remove("active");
    document.getElementById("saved-posts-button").classList.add("active");
  }
  
  function openModal() {
    document.getElementById('myModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    document.getElementById('myModal').style.display = 'none';
    document.body.style.overflow = 'auto';
  }

  function savePhoto() {
    // Implement your logic to save the photo here
    closeModal();
  }
  
  displayMyPosts();
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
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <?php
    $qts = new QuestionBank();
    $ans = new AnswerBank();
    $sPosts = new SavedPosts();
 echo '<div class="blue-div">
     <h3 style= "color: #06BBCC; margin-top: 20px;">————Stats————</h3>
     <div class ="container">
<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Total Questions:</p>
<h4 class="my-1 text-info"> '. $qts ->getCountUserQuestions($_SESSION['uid']) . '</h4>
</div>
 <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 55px"; src="img/qtt.jpg">
</div>
</div>

<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Total Answers:</p>
<h4 class="my-1 text-info">'. $ans ->getCountUserAnswers($_SESSION['uid']) . '</h4>
</div>
   <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 55px"; src="img/ans.jpg">
</div>
</div>

<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Subscriptions:</p>
<h4 class="my-1 text-info">18</h4>
</div>
   <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 55px"; src="img/bell.jpg">
</div>
</div>

<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Saved Posts:</p>
<h4 class="my-1 text-info">'. $sPosts ->getTotalSavedQuestionsByUser($_SESSION['uid']) . '</h4>
</div>
   <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 62px"; src="img/saved.jpg">
</div>
</div>

</div>
</div>
  </div>';
?>
   
  
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
//   echo '<img class="img-fluid avatar-xxl rounded-circle" src='. $uuser->getUserDp().'>
//    echo '<div class="image-container" onmouseover="showFileInput(this)" onmouseout="hideFileInput(this)">';
//        ?>
  <!--<img class="img-fluid avatar-xxl rounded-circle" src="<?php // echo $uuser->getUserDp(); ?>" alt="User Avatar">-->
  <?php 
//  echo '<input class="file-input" type="file" name="imageFile" onchange="previewImage(event) style="display: none;">
//</div>';
//  ?>
  

<div class="image-container" onclick="openModal()">
  <img class="img-fluid avatar-xxl rounded-circle" src="<?php echo $uuser->getUserDp(); ?>" alt="User Avatar">
</div>

<!-- Modal Dialog -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>Choose a Photo</h3>
    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input class="file-input" type="file" name="imageFile" onchange="previewImage(event)">
      <button type="submit" name="save" value="TRUE" style="background-color: #06BBCC; width: 130px; color: white; margin-top: 15px;">Save Picture</button>
    </form>
  </div>
</div>

<?php
//<form method="POST" enctype="multipart/form-data" >
//<input type="file" name="imageFile" class="custom-file-input" id="fileInput">
//  <button type="submit" name="save" value="TRUE" style="background-color: #06BBCC; width: 130px; color: white; margin-top: 15px;">Save Picture</button><br>
//</form>
echo '</div>
</div>
<div class="col-md-9">
<div class="ms-3">
<div>
<h4 class="text-primary font-size-20 " >'. $uuser->getFirstName().'  '. $uuser->getLastName().' </h4>
    <p class="text-muted fw-medium mb-0"><i class="mdi mdi-account me-2"></i>'. $uuser->getUsername().'</p>
    <p class="text-muted fw-medium mb-0"><i class="mdi mdi-school  me-2"></i>Fourth Year</p>
<p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i>'. $uuser->getEmail().'</p>';
?>
</div>
<div class="row my-4">
<div class="col-md-12">
</div>
</div>
<ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link px-4 active" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1" id="my-posts-button" onclick="displayMyPosts()">
<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
<span class="d-none d-sm-block">My Posts</span>
</a>
</li>
<li class="nav-item" role="presentation">
  <a class="nav-link px-4" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1" id="saved-posts-button" onclick="displaySavedPosts()">
    <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
    <span class="d-none d-sm-block">Saved Posts</span>
  </a>
</li>

</ul>
</div>
</div>
</div>
</div>
</div>
    </div>
   
    
    <?php
//******MY POSTS START
//
echo '<div id="my-posts-content">
<h5 class="headings_dashed"> —————————— My Posts ——————————</h5>';

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
    echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Questions to Display</h3>';
echo '</div>';
  }
} else {
  $total_qts = $qts->getTotalPostedQuestionsByUser($_SESSION['uid']);
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
  echo '<img class="rounded-circle p-2 mx-auto" src='. $Quser->getUserDp() .' style="width: 50px; height: 50px;">'. $Quser->getFirstName() .' '. $Quser->getLastName() .'</h6>';

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
echo '</div>';
?>

    <?php
//******Saved POSTS START
echo '<div id="saved-posts-content" style="display: none;">

<h5 class="headings_dashed"> —————————— Saved Posts ——————————</h5>';
 $qts = new SavedPosts();

// Set the number of articles to display per page
$qts_per_page = 3;

  $total_qts = $qts->getTotalSavedQuestionsByUser($_SESSION['uid']);
//   echo $total_qts;
   if ($total_qts == 0 ){
       echo '<div class="no-questions-message">';
echo '<h3 class="text-center">No Questions to Display</h3>';
echo '</div>';
  }

// Calculate the total number of pages
$total_pages = ceil($total_qts / $qts_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($current_page - 1) * $qts_per_page;

// Get the qts for the current page

  $page = $qts->getSavedQuestionsByPageAndUser($offset, $qts_per_page, $_SESSION['uid']);

foreach ($page as $question) {
  $Quser = new Users();
  $UserData = $Quser->initWithUid($question->getUser_UserId());

  echo '<a href="view_posts.php?QtId=' . $question->getQuestionId() . '" >';
   echo '<div class="myposts-form">';
  echo '<div class="FP">';
  echo '<div class="FP-header">';
  echo '<h6 style="color: lightgray; font-size: 14px;">';
  echo '<img class="rounded-circle p-2 mx-auto" src='. $Quser->getUserDp() .' style="width: 50px; height: 50px;">'. $Quser->getFirstName() .' '. $Quser->getLastName() .'</h6>';

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
echo '</div>';
?>
    
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