<?php
ob_start();
include 'debugging.php';    
include 'header.php';



$allUser = new Users();

$data = $allUser->getAllusers();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div class="table-container">
      <h5>Manage Users </h5>
        <table class="my-table">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Delete</th>
                     <th>Profile Pic</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>';
for ($i = 0; $i < count($data); $i++) {
    $allUser->initWithUid($data[$i]->UserId);
  
    echo '<tr>
            <td><a href="EditUser.php?id=' . $data[$i]->UserId . '">Edit</a></td>
            <td><a href="DeleteUser.php?id=' . $data[$i]->UserId . '">Delete</a></td>';?>

            <td><img class="border rounded-circle p-2 mx-auto mb-3" src=<?php echo $data[$i]->UserDp; ?> style="width: 50px; height: 50px;"></td>
         
 <?php
          echo '<td>' .$data[$i]->UserName. '</td>
            <td>' .$data[$i]->FirstName. '</td>
            <td>' .$data[$i]->LastName. '</td>
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