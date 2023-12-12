<?php
ob_start();
include 'debugging.php';    
include 'header.php';
include 'LogsBank.php';
$allLogs = new LogsBank();
$data = $allLogs->getAllLogs();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div style="width: 32%; margin: 0 auto;">
      <h5>Users Logs </h5>
        <table class="my-table">
            <thead>
            </thead>
            <tbody>';
for ($i = 0; $i < count($data); $i++) {
  
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
    

include 'footer.php';
?>