<?php
ob_start();
include 'debugging.php';
include 'Users.php';

if ($_FILES && $_FILES['imageFile']['name']) {
    echo "Inside upload_dp.php";
    $user = new Users();
   $name = "img//" . $_FILES['imageFile']['name'];
            move_uploaded_file($_FILES['imageFile']['tmp_name'], $name);
            if ($_FILES['imageFile']['error'] > 0) 
            {
                echo "<p>There was an error</p>";
                echo $_FILES['imageFile']['error'];
            }
        $user->setUserDp($name);
     $user->updateUserDp($_SESSION['uid']);
}
