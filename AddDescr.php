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

if (isset($_POST['save'])) {
//UPLOAD FILE *****************
      if(!empty($_FILES)) {
        $upload = new UploadDescr();
        $upload->setUploadDir('images/');
        $msg = $upload->upload('name');
           if(empty($msg)){
        $file = new DescriptorBank();
        $file->setUser_UserId($_SESSION['uid']);
        $file->setFileName($upload->getFilepath());
        $file->setFileLocation($upload->getUploadDir() . $upload->getFilepath());
        $file->setFileType($upload->getFileType());
        $max = new CourseBank();
        $num = $max->getMaxCourseId();
        $file->setCourseId($num + 1);

           if ($file->addFile()){
            header("Location: AddCourse.php");
exit();
        }else{
         echo 'Error Uploading Descriptor';
        }
         }
         
         
      }else{
 echo '<p> try again';

    }
    
}


?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="css/AddQt.css">
<title> Upload the course Descriptor </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Upload the course Descriptor</h3>
          </div>
        </div>
          <form action="" class="login-form" method="POST" enctype="multipart/form-data">
              
              <?php
    if (!empty($msg)) {
        echo '<p style="color: #ff0000;">' . $msg . '</p>';
    }
    ?>
              <p style="color: #a52834; font-size: 9px; float: left;">*Upload the Course PDF descriptor here. </p>
             <input type="file" name="name" multiple/> 
             <button name="save" value="TRUE" style="padding: 5px 10px; background-color: #181d38; width: 100px">Save File</button><br>
        </form>
      </div>
    </div>
</body>
</body>
</html>

<?php
    include 'footer.php';
?>
