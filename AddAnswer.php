<?php 
ob_start();
include 'debugging.php';
include 'header.php';
include 'QuestionBank.php';
include 'AnswerBank.php';
include 'CourseBank.php';
include 'Users.php';

if (empty($_SESSION['uid'])) {
    // User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}


// Check if the value is present in the URL
if (isset($_GET['QtId'])) {
    $QuesId = $_GET['QtId'];
    // Store the value in a session variable
    $_SESSION['QtId'] = $QuesId;
} 
// Check if the value is present in the session variable
elseif (isset($_SESSION['QtId'])) {
    $QuesId = $_SESSION['QtId'];
} 
// If the value is not present in the URL or session, assign a default value
else {
    $QuesId = null; // Assign your default value here
}

if (isset($_POST['save'])) {
    echo "inside save file";
//UPLOAD FILE *****************
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
          $ans = new AnswerBank();
        $maxAnsId = $ans->getMaxAnswerId();
        $file->setAnswers_AnsId(1);
        $file->setAId($maxAnsId + 1);
        $file->setQuestions_QuestionId($QuesId);
        $file->setQId($QuesId);
        $file->setType("Answer");
        $file->addFile();
        
         }
         
         else  { print_r ($msg);}
      }else{
 echo '<p> try again';
    }
    
}


 if (isset($_POST['submitted'])) {
     
    $newAns = new AnswerBank();
    $newAns->setAnsText($_POST['Answer']);
        $newAns->setLikes(0);
        $newAns->setQuestions_QuestionId($QuesId);
        $newAns->setUser_UserId($_SESSION['uid']);
        
   if ($newAns->addAnswer()){
           echo "ANSWER ADDED";
exit();
        }else{
         echo 'Error Adding Answer';
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="css/AddQt.css">
<title> Post Answer </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Post an Answer</h3>
          </div>
        </div>
          <form action="" class="login-form" method="POST" enctype="multipart/form-data">
               <textarea required placeholder="Write your Answer here..." name="Answer"><?php echo isset($_POST['Answer']) ? $_POST['Answer'] : ''; ?></textarea>
 
              <p style="color: #a52834; font-size: 9px; float: left;">*For security purpose, zip all your files and upload. </p>
             <input type="file" name="name" multiple/> 
             <button name="save" value="TRUE" style="padding: 5px 10px; background-color: #181d38; width: 100px">Save File</button><br>
 <?php
    $files = new Files();
    $answer = new AnswerBank();
    $maxAnsId = $answer->getMaxAnswerId();
    $row = $files->getFileWithAnsid($maxAnsId + 1);
    
if (!empty($row)) {
   
     $userFile = new Files();
     $uid = $_SESSION['uid'];
      $userFile->getFileWithAnsidAndUserId($maxAnsId + 1, $uid);
    
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
             <td><a href="DeleteAnsFile.php?fid=' . $row[$i]->FileId . '">Delete</a></td>
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
           <button name="submitted" value="TRUE">Post Answer</button>
        </form>
      </div>
    </div>
</body>
</body>
</html>

<?php
    include 'footer.php';
?>
