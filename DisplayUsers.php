<?php
ob_start();
include 'debugging.php';    
include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
     src="https://code.jquery.com/jquery-3.6.0.min.js";
    
 function showDeleteConfirmation(uid) {
  document.getElementById("blur-background").style.display = "block";
  document.getElementById("delete-confirmation").style.display = "block";
  document.getElementById("uid-id").value = uid;
}

function hideDeleteConfirmation() {
  document.getElementById("blur-background").style.display = "none";
  document.getElementById("delete-confirmation").style.display = "none";
}

function handleDeleteConfirmation() {
  var uid = document.getElementById("uid-id").value;

  // Perform the delete operation using the User ID
  console.log("Deleting User with ID: " + uid);

  // Send an AJAX request to the server-side script (DeleteUser.php) to perform the delete operation
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "DeleteUser.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the server
      var response = xhr.responseText;
      if (response === "success") {
        // Show success message or perform any additional actions
        location.reload();
      } else {
        // Show error message or perform any additional actions
        location.reload();
      }
    }
  };
  xhr.send("uid=" + uid);
  // Hide the delete confirmation
  hideDeleteConfirmation();

  console.log("Delete confirmed");
}

document.getElementById("confirm-delete").addEventListener("click", handleDeleteConfirmation);
document.getElementById("cancel-delete").addEventListener("click", hideDeleteConfirmation);
</script>
</head>
<body>
    <?php
$allUser = new Users();

$data = $allUser->getAllusers();

if (!empty($data)) {
   echo '<link rel="stylesheet" href="css/style.css">';
    echo '<br />';
  echo '<div style="width: 40%; margin: 0 auto;">
     <h4>Manage Users</h4>
        <table class="my-table">
            <thead>
                <tr>
                     <th>Profile Pic</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>';
for ($i = 0; $i < count($data); $i++) {
    $allUser->initWithUid($data[$i]->UserId);
  
    echo '<tr>';?>

            <td><img class="border rounded-circle p-2 mx-auto mb-3" src=<?php echo $data[$i]->UserDp; ?> style="width: 50px; height: 50px;"></td>
         
 <?php
          echo '<td>' .$data[$i]->UserName. '</td>
            <td>' .$data[$i]->FirstName. '</td>
            <td>' .$data[$i]->LastName. '</td>
            <td><a href="EditUser.php?id=' . $data[$i]->UserId . '">Edit</a></td>
            <td  style= "color: red;"><a onclick="showDeleteConfirmation(' . $data[$i]->UserId . ')">Delete</a></td>
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
    

?>
            
              <div id="blur-background"></div>

<div id="delete-confirmation" style="display: none;">
  <p>Are you sure you want to delete?</p>
  <button id="confirm-delete" onclick="handleDeleteConfirmation()">Yes</button>
  <button id="cancel-delete" onclick="hideDeleteConfirmation()">No</button>
</div>
    
    <!--hidden input field-->
    <input type="hidden" id="uid-id">
    
    
</body>
</html>

<?php
    
include 'footer.php';
?>