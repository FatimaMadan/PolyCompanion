<?php 
ob_start();
include 'debugging.php';
include 'header.php';
include 'CourseBank.php';
include 'Users.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

     // Check if the user is logged in and has the appropriate role
    if ($_SESSION['roleId'] != 1) {
        
        // Redirect the user to a different page or display an error message
        header('Location: index.php');
        exit;
    }
    
    
if (isset($_POST['save'])) {
    
//UPLOAD FILE *****************
      if(!empty($_FILES)) {
        $upload = new UploadDescr();
        $upload->setUploadDir('descriptors/');
        $msg = $upload->upload('name');
        
           if(empty($msg)){
        $file = new DescriptorBank();
        $file->setUser_UserId($_SESSION['uid']);
        $file->setFileName($upload->getFilepath());
        $file->setFileLocation($upload->getUploadDir() . $upload->getFilepath());
        $file->setFileType($upload->getFileType());
        $file->addFile();
                
         }
         
         else   print_r ($msg);
      }else{
 echo '<p> try again';
    }
    
}


 if (isset($_POST['submitted'])) {
     
     
    $newcourse = new CourseBank();
        $newcourse->setCourseCode($_POST['code']);
        $newcourse->setCourseTitle($_POST['title']);

        $newcourse->setMajor_MajorId(1);
        
   if ($newcourse->addQuestion()){
       
            header("Location: view_courses.php");
exit();
        }else{
         echo 'Error Adding Course';
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="css/AddQt.css">
<title> Add a Course </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3> Add a Course </h3>
          </div>
        </div>
          <form action="" class="login-form" method="POST" enctype="multipart/form-data">
             <select required name="course">
          <option value="">Select A year</option>
          <option value="">Year 1</option>
          <option value="">Year 2</option><!-- <option value="">Select A year</option> -->
          <option value="">Year 3</option><!-- comment -->
          <option value="">Year 4</option>
          
             </select><br>

             <select required name="course">
          <option value="">Select A Semester</option>         
          <option value="">Semester A</option><!-- comment -->
          <option value="">Semester B</option>
             </select><br>
             
             
<!--              <p style="color: #a52834; font-size: 9px; float: left;">*For security purpose, zip all your files and upload. </p>-->
             <input type="file" name="name" multiple required/> 
             <button name="save" value="TRUE" style="padding: 5px 10px; background-color: #181d38; width: 100px">Save File</button><br>
 <?php
    $files = new DescriptorBank();
    
if (!empty($row)) {
   
     $userFile = new DescriptorBank();
     $uid = $_SESSION['uid'];
    $userFile->getFileWithQuesidAndUserId($maxQuesId + 1, $uid);
    if($uid == $userFile->getUser_UserId()){
        
    echo '<br />';
    
    echo '<table align="center" cellspacing = "2" cellpadding = "4" width="75%">';
    echo '<tr bgcolor="#87CEEB">
          <td><b>Delete</b></td>
          <td><b>File Name</b></td>
          </tr>';


    $bg = '#eeeeee';

    for ($i = 0; $i < count($row); $i++) {
        $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');

        echo '<tr bgcolor="' . $bg . '">
             <td><a href="DeleteFile.php?fid=' . $row[$i]->FileId . '">Delete</a></td>
             <td><a target="_blank" href="view_file.php?fid=' . $row[$i]->FileId . '">' . $row[$i]->FileName . '</a></td>
             </tr>';
    }
    echo '</table>';
    }
    
    } else {
    echo '<p class="error">' . $q . '</p>';
    echo '<p class="error">No files are uploaded yet</p>';
    echo '<p class="error">' . mysqli_error($dbc) . '</p>';
}
?><br />
           <button name="submitted" value="TRUE">Submit</button>
          <!--<p class="message">Already have an account? <a href="login.php">Sign in</a></p>-->
        </form>
      </div>
    </div>
</body>
</body>
</html>

<?php
    include 'footer.php';
?>
