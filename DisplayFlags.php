<?php
ob_start();
include 'debugging.php';    
include 'header.php';
include 'LogsBank.php';
$allLogs = new FlagsBank();
$data = $allLogs->getAllFlags();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div style="width: 32%; margin: 0 auto;">
      <h5>Flagged Posts </h5>
        <table class="my-table">
            <thead>
            </thead>
            <tbody>';
for ($i = 0; $i < count($data); $i++) {
  
    echo '<tr>
            <td>' .$data[$i]->UserId. '</td>
             <td><a href="view_posts.php?QtId=' . $data[$i]->QuestionId . '">'. $data[$i]->QuestionId.'</a></td>
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
    

include 'footer.php';
?>