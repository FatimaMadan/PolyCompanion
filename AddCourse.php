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

        $file->addFile();
        
        
         }
         
         else   print_r ($msg);
      }else{
 echo '<p> try again';
    }
    
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
        $newcour->setShortTitle($_POST['ShortTitle']);
        $newcour->setUncontrolledAssess($_POST['uncontrolledAssess']);
        
        $newcour->setYear($_POST['Year']);
                
        $newcour->setSem($_POST['sem']);

    
        
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    if ($newcour->addCourse()) {
        $id = $newcour->getMaxCourseId();
        CourseBank::addOutcomes($_POST['CLO'], $id);
        header("Location: view_courses.php");
        exit();
    } else {
        $error_message = 'An Error Occur while adding the course, make sure to fill in all the fields following the conditions';
    }
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
            <h3>Add a Course</h3>
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
              <input required type="text" placeholder="Course Code" name="CourseCode" value="<?php echo isset($_POST['CourseCode']) ? $_POST['CourseCode'] : ''; ?>"/>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 30 characters.</p>
              <input required type="text" placeholder="Course Title" name="CourseTitle" value="<?php echo isset($_POST['CourseTitle']) ? $_POST['CourseTitle'] : ''; ?>"/>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*Not more than six characters.</p>
              <input required type="text" placeholder="Course Short Title" name="ShortTitle" value="<?php echo isset($_POST['ShortTitle']) ? $_POST['ShortTitle'] : ''; ?>"/>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*A number between 0 and 10.</p>
              <input required type="text" placeholder="Course Level" name="CourseLevel" value="<?php echo isset($_POST['CourseLevel']) ? $_POST['CourseLevel'] : ''; ?>"/>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*A number between 5 and 65.</p>
              <input required type="text" placeholder="Course Credits" name="Credits" value="<?php echo isset($_POST['Credits']) ? $_POST['Credits'] : ''; ?>"/>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 100 characters.</p>
              <textarea required placeholder="Uncontrolled Assessments" name="uncontrolledAssess"><?php echo isset($_POST['uncontrolledAssess']) ? $_POST['uncontrolledAssess'] : ''; ?></textarea>              
              
              <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 100 characters.</p>
              <textarea required placeholder="Examinations" name="exams"><?php echo isset($_POST['exams']) ? $_POST['exams'] : ''; ?></textarea>              
                           
              <input required type="text" placeholder="Assessment Method" name="AssessmentMethod" value="<?php echo isset($_POST['AssessmentMethod']) ? $_POST['AssessmentMethod'] : ''; ?>"/>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*Not more than 100 characters.</p>
              <textarea required placeholder="Course Aim" name="CourseAim"><?php echo isset($_POST['CourseAim']) ? $_POST['CourseAim'] : ''; ?></textarea>              
              
              <p style="color: #a52834; font-size: 9px; float: left;">*This field is optional</p>
              <input type="text" placeholder="Pre-Requisite" name="PreRequisite" value="<?php echo isset($_POST['PreRequisite']) ? $_POST['PreRequisite'] : ''; ?>"/>
              
              <select required name="Major_MajorId">
                  <option value="">Select Major</option>
                  
                  
                  <?php
                  $tempMajors = new MajorBank();
                  $majorList = $tempMajors->createMajorList();
                  echo $majorList;
                  ?>

              </select><br>
              
              <select required name="Year">
                  <option value="">Select Year</option>
                  
                  <option>1</option>
                  <option>2</option><!-- comment -->
                  <option>3</option><!-- comment -->
                  <option>4</option>

              </select><br><!-- comment -->
              
              <select required name="sem">
                  <option value="">Select Semester</option>
                                    <option>A</option>
                  <option>B</option><!-- comment -->
                  

              </select><br>
              
              <p style="color: #a52834; font-size: 9px; float: left;">*Separate them using stars(*).</p>
              <textarea required placeholder="Course Learning Oucomes" name="CLO"><?php echo isset($_POST['CLO']) ? $_POST['CLO'] : ''; ?></textarea>              
              

              <p style="color: #a52834; font-size: 9px; float: left;">*Upload the Course PDF descriptor here. </p>
             <input type="file" name="name" multiple/> 
             <button name="save" value="TRUE" style="padding: 5px 10px; background-color: #181d38; width: 100px">Save File</button><br>
 <?php
    $files = new DescriptorBank();
    $ques = new CourseBank();
    $maxQuesId = $ques->getMaxCourseId();
    $row = $files->getDescWithCId($maxQuesId + 1);
    
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
