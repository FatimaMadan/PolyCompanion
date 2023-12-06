<?php
ob_start();
include 'debugging.php';    
include 'header.php';
include 'ActivityBank.php';
$allActivityLogs = new ActivityBank();
$data = $allActivityLogs->getAllActivityLogs();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div style="width: 32%; margin: 0 auto;">
      <h5>Users Activity Logs </h5>
        <table class="my-table">
            <thead>
            </thead>
            <tbody>';
for ($i = 0; $i < 8; $i++) {
    if (strpos($data[$i]->ActivityText, 'added') === 0) {
    // The ActivityText starts with 'added'
    echo '<tr>
            <td style="color: #50C878 ;">' .$data[$i]->UserName. ' ' .$data[$i]->ActivityText. ' at ' .$data[$i]->Time. ' </td>
    </tr>';}
    elseif(strpos($data[$i]->ActivityText, 'deleted') === 0){
    echo '<tr>
            <td style="color: #DE3163;">' .$data[$i]->UserName. ' ' .$data[$i]->ActivityText. ' at ' .$data[$i]->Time. ' </td>
    </tr>';}
    elseif(strpos($data[$i]->ActivityText, 'edited') === 0){
    echo '<tr>
            <td style="color: #06BBCC;">' .$data[$i]->UserName. ' ' .$data[$i]->ActivityText. ' at ' .$data[$i]->Time. ' </td>
    </tr>';}
}

echo '</tbody>
      </table>
    </div>'
;
}
        else {
             echo '<br />';
            echo '<p>Sorry no activities were found in the database</p>';
        }
    

include 'footer.php';
?>