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
//  function displayFlaggedPosts() {
//    document.getElementById("flagged-posts-content").style.display = "block";
//    
//    document.getElementById("flagged-posts-button").classList.add("active");
//  }
   function toggleSubcategory(event) {
      const subcategory = event.target.nextElementSibling;
      subcategory.classList.toggle('visible');
    }
  
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
    $TUser = new Users();
 echo '<div class="blue-div">
     <h3 style= "color: #06BBCC; margin-top: 20px;">————Stats————</h3>
     <div class ="container">
<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Total Questions:</p>
<h4 class="my-1 text-info"> '. $qts ->getCountQuestions() . '</h4>
</div>
 <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 55px"; src="img/qtt.jpg">
</div>
</div>

<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Total Answers:</p>
<h4 class="my-1 text-info">'. $ans ->getCountAnswers() . '</h4>
</div>
   <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 55px"; src="img/ans.jpg">
</div>
</div>

<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Total Users:</p>
<h4 class="my-1 text-info">'. $TUser->getTotalUsers().'</h4>
</div>
   <img class="rounded-circle" style="width: 63px; height: 63px; margin-left: 72px"; src="img/users.png">
</div>
</div>

<div class="card-body">
<div class="d-flex align-items-center">
<div>
<p class="mb-0 font-13" style="color: white;">Flagged Posts:</p>';

          
if ($qts->getFlaggedQuestions() > 0){
//echo '<h4 style="color: red;"><a href="DisplayFlags.php" style="color: red;">'. $qts->getFlaggedQuestions() . '</a></h4>';

 $allLogs = new FlagsBank();
$Ldata = $allLogs->getAllFlags();
 echo '<ul class="expandable-list">
    <li>
      <div class="category" onclick="toggleSubcategory(event)" style="color: red; font-size: 20px; margin-left: 0px;">Show '. $qts->getFlaggedQuestions() . '</div>
      <ul class="subcategory">
          <div>';
        for ($i = 0; $i < count($Ldata); $i++) {
  
    echo '<tr>
            <td>' .$Ldata[$i]->UserId. '</td>
             <td><a href="view_posts.php?QtId=' . $Ldata[$i]->QuestionId . '">'. $Ldata[$i]->QuestionId.'</a></td><br>
    </tr>';
}
          echo '</div>
      </ul>
    </li>';

    }elseif ($qts->getFlaggedQuestions() == 0){
        
        echo '<h4 style="color: #06BBCC;">'. $qts->getFlaggedQuestions() . '</h4>';
    }
echo '</div>
   <img class="rounded-circle" style="width: 60px; height: 60px; margin-left: 48px"; src="img/saved.jpg">
</div>
</div>

</div>
</div>
  </div>';
?>
   
  
<div class="whitetest-div">
      <!--<h3 style= "color: #181d38; margin-top: 20px;">————ADMIN DASHBOARD————</h3>-->
<div class="row">
<div class="col-xl-11">
<div class="card" style="margin-top: 30px;">
<div class="card-body pb-0">
<div class="row align-items-center">
<div class="col-md-3">
<div class="text-center border-end">
     <?php $uuser = new Users();
  $UserData = $uuser->initWithUid($_SESSION['uid']);
   echo '<img class="img-fluid avatar-xxl rounded-circle" src='. $uuser->getUserDp().'>
<form method="POST" enctype="multipart/form-data" >
<input type="file" name="imageFile" class="custom-file-input" id="fileInput">
  <button type="submit" name="save" value="TRUE" style="background-color: #06BBCC; width: 130px; color: white; margin-top: 15px;">Save Picture</button><br>
</form>
</div>
</div>
<div class="col-md-9">
<div class="ms-3">
<div>
<h4 class="text-primary font-size-20 " >'. $uuser->getFirstName().'  '. $uuser->getLastName().' </h4>
    <p class="text-muted fw-medium mb-0"><i class="mdi mdi-account me-2"></i>'. $uuser->getUsername().'</p>
<p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i>'. $uuser->getEmail().'</p>';
?>
<!--</div>
<div class="row my-4">
<div class="col-md-12">
</div>
</div>
<ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link px-4 active" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1" id="flagged-posts-button" onclick="displayFlaggedPosts()">
<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
<span class="d-none d-sm-block">Flagged Posts</span>
</a>
</li>

</ul>
--></div>
</div>
</div>
</div>
</div>
    </div>  
    <!--START manage users table-->
    <?php
$allUser = new Users();

$data = $allUser->getAllusers();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div style="margin-left: 0px; width: 90%; border: 2px solid black;">
     <h4>Manage Users
      <a href="DisplayUsers.php" style="float: right; margin-bottom: 10px; margin-right: 10px; font-size: 16px;">View All</a></h4>
        <table class="my-table">
            <thead>
                <tr>
                     <th>Profile Pic</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>';
for ($i = 0; $i < 5; $i++) {
    $allUser->initWithUid($data[$i]->UserId);
  
    echo '<tr>';?>

            <td><img class="border rounded-circle p-2 mx-auto mb-3" src=<?php echo $data[$i]->UserDp; ?> style="width: 50px; height: 50px;"></td>
         
 <?php
          echo '<td>' .$data[$i]->UserName. '</td>
            <td>' .$data[$i]->FirstName. '</td>
            <td>' .$data[$i]->LastName. '</td>
            <td><a href="EditUser.php?id=' . $data[$i]->UserId . '">Edit</a></td>
            <td><a href="DeleteUser.php?id=' . $data[$i]->UserId . '">Delete</a></td>
          </tr>';
}

echo '</tbody>
      </table>
    </div>'
;
}
        else {
             echo '<br />';
            echo '<p>Sorry no users were found in the database</p>';
        }
    

?>
    
      <!--END manage users table-->
      <?php
$allLogs = new LogsBank();
$data = $allLogs->getAllLogs();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div style="margin-left: 0px; width: 90%; margin-top: 15px; border: 2px solid black;">
     <h4>Users Logs
      <a href="DisplayLogs.php" style="float: right; margin-bottom: 10px; margin-right: 10px; font-size: 16px;">View All</a></h4>
        <table class="my-table">
            <thead>
            </thead>
            <tbody>';
for ($i = 0; $i < 15; $i++) {
  
    if($data[$i]->Action == "Logged in"){
    echo '<tr>
            <td style="color: #06BBCC;">' .$data[$i]->UserName. ' ' .$data[$i]->Action. ' at ' .$data[$i]->Time. ' </td>
    </tr>';}
    elseif($data[$i]->Action == "Logged out"){
    echo '<tr>
            <td>' .$data[$i]->UserName. ' ' .$data[$i]->Action. ' at ' .$data[$i]->Time. ' </td>
    </tr>';}
}

echo '</tbody>
      </table>
    </div>'
;
}
        else {
             echo '<br />';
            echo '<p>Sorry no users were found in the database</p>';
        }
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