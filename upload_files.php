<?php

include 'debugging.php';

if (isset($_POST['submitted'])) {

    //upload code goes here ...
    
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
        $file->setAnswers_AnsId(1);
        $file->setQuestions_QuestionId(1);//Max qtId le k one increase kr k add it here, that's all
        $file->addFile();
        }else   print_r ($msg);
    }
    else
        echo '<p> try again';
    
}


include 'header.php';

echo '<h1> Upload Files </h1>';

// form to be added here ...

echo '<div> <form action="" method ="post" enctype="multipart/form-data">
    <p><h1>Upload Form </h1>
    <p> 
    <p> File <input type="file" name="name" /></p>
    </p>
    <p><input type="submit" name="submit" value="Upload" /></p>
    
<input type = "hidden" name="submitted" value="TRUE">
</form></div>';




// list files goes here ... just create an object and call getAllFiles function
$files = new Files();
$row = $files->getAllFiles();


if (!empty($row)) {
    echo '<br />';
    //display a table of results
    echo '<table align="center" cellspacing = "2" cellpadding = "4" width="75%">';
    echo '<tr bgcolor="#87CEEB">
          <td><b>Edit</b></td>
          <td><b>Delete</b></td>
          <td><b>File Name</b></td>
          <td><b>File Type</b></td>
          </tr>';


    $bg = '#eeeeee';

    for ($i = 0; $i < count($row); $i++) {
        $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');

        echo '<tr bgcolor="' . $bg . '">
             <td><a href="edit_file.php?fid=' . $row[$i]->FileId . '">Edit</a></td>
             <td><a href="delete_file.php?fid=' . $row[$i]->FileId . '">Delete</a></td>
             <td><a target="_blank" href="view_file.php?fid=' . $row[$i]->FileId . '">' . $row[$i]->FileName . '</a></td>
             <td>' . $row[$i]->FileType . '</td>
             </tr>';
    }
    echo '</table>';
} else {
    echo '<p class="error">' . $q . '</p>';
    echo '<p class="error">No files are uploaded yet</p>';
    echo '<p class="error">' . mysqli_error($dbc) . '</p>';
}

include 'footer.php';
?>