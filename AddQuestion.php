<?php 
ob_start();
include 'debugging.php';
include 'header.php';
include 'QuestionBank.php';
include 'CourseBank.php';
include 'Users.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

if (isset($_POST['save'])) {
    
//UPLOAD FILE *******
      if(!empty($_FILES)) {
        $upload = new Upload();
        $upload->setUploadDir('images/');
        $msg = $upload->upload('name');
        
           if(empty($msg)){
        $file = new Files();
        $file->setUser_UserId($_SESSION['uid']);
        $file->setFileName($upload->getFilepath());
        $file->setFileLocation($upload->getUploadDir() . $upload->getFilepath());
        $file->setFileType($upload->getFileType());
        $file->setAnswers_AnsId(19);
        $qt = new QuestionBank();
        $maxQId = $qt->getMaxQuestionId();
        $file->setQuestions_QuestionId(46);
        $file->setQId($maxQId + 1);
        $file->setAId(1);
        $file->setType("Question");
        $file->addFile();
        
        
         }
         
         else   print_r ($msg);
      }else{
 echo '<p> try again';
    }
    
}


 if (isset($_POST['submitted'])) {
     
    $newqt = new QuestionBank();
        $newqt->setQuesTitle($_POST['QuesTitle']);
        $newqt->setQuesDescription($_POST['QuesDescription']);
        $newqt->setTags($_POST['Tags']);
        $newqt->setLikes(0);
        
        $newqt->setUser_UserId($_SESSION['uid']);
        $newqt->setCourse_CourseId($_POST['course']);
        
   if ($newqt->addQuestion()){
      
//  //UPLOAD FILE *******
//      if(!empty($_FILES)) {
//        $upload = new Upload();
//        $upload->setUploadDir('images/');
//        $msg = $upload->upload('name');
//        
//           if(empty($msg)){
//        $file = new Files();
//        $file->setUser_UserId($_SESSION['uid']);
//        $file->setFileName($upload->getFilepath());
//        $file->setFileLocation($upload->getUploadDir() . $upload->getFilepath());
//        $file->setFileType($upload->getFileType());
//        $file->setAnswers_AnsId(1);
//        $qt = new QuestionBank();
//        $maxQId = $qt->getMaxQuestionId();
//        $file->setQuestions_QuestionId(1);
//        $file->setQId($maxQId + 1);
//        $file->addFile();
//         }else   print_r ($msg);
//      }else{
// echo '<p> try again';
//    }
            header("Location: inquiry.php");
exit();
        }else{
         echo 'Error Adding Question';
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="css/AddQt.css">
<title> Post Question </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Post a Question</h3>
          </div>
        </div>
          <form action="" class="login-form" method="POST" enctype="multipart/form-data">
              <p style="color: #a52834; font-size: 9px; float: left;">*Not more than hundred characters.</p>
              <input required type="text" placeholder="Question Title" name="QuesTitle" value="<?php echo isset($_POST['QuesTitle']) ? $_POST['QuesTitle'] : ''; ?>"/>
              <textarea required placeholder="Question Description" name="QuesDescription"><?php echo isset($_POST['QuesDescription']) ? $_POST['QuesDescription'] : ''; ?></textarea>
              <!--<textarea required placeholder="Question Description" name="QuesDescription"></textarea><br />-->
              <p style="color: #a52834; font-size: 9px; float: left;">(Optional) *Please separate the tags by commas. </p>
               <input type="text" placeholder="Tags" name="Tags" value="<?php echo isset($_POST['Tags']) ? $_POST['Tags'] : ''; ?>"/>
<!--          <div> <form action="" method ="post" enctype="multipart/form-data">-->
             <select required name="course">
          <option value="">Select Course</option>
          
         <?php 
          $tempcourse = new QuestionBank();
          $courseList = $tempcourse->createCourseList();
         echo $courseList;
         ?>
          
             </select><br>

              <p style="color: #a52834; font-size: 9px; float: left;">*For security purpose, zip all your files and upload. </p>
             <input type="file" name="name" multiple/> 
             <button name="save" value="TRUE" style="padding: 5px 10px; background-color: #181d38; width: 100px">Save File</button><br>
 <?php
    $files = new Files();
    $ques = new QuestionBank();
    $maxQuesId = $ques->getMaxQuestionId();
    $row = $files->getFileWithQuesid($maxQuesId + 1);
    
if (!empty($row)) {
   
     $userFile = new Files();
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
           <button name="submitted" value="TRUE">Post</button>
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