<?php 
include 'header.php';
include 'Users.php';// Update the file path if necessary

 if (isset($_POST['submitted'])) {
    $user = new Users();
        echo 'class created';
        $user->setFirstName($_POST['firstname']);
        $user->setLastName($_POST['lastname']);
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setRoleId($_POST['role']) ;
        echo '  set all properties ';
 if ($user->initWithUsername()) {
//     echo 'hoho';
     
        if ($user->registerUser())
        {
            echo '<script>alert("Registered Successfully!");</script>';
            header ('Location: Login.php');
        }
        else{
            echo '<p class="error"> Not Successfull </p>';
        }
    }else {
    echo '<script>alert("Username Already Exists");</script>';
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/loginStyle.css">
<title> Register </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>REGISTER</h3>
            <p>Please fill all fields to register</p>
          </div>
        </div>
          <form class="login-form" method="POST">
            <input type="text" placeholder="First Name" name="firstname"/>
            <input type="text" placeholder="Last Name" name="lastname"/>
          <input type="text" placeholder="Username" name="username"/>
          <input type="password" placeholder="Password" name="password"/>
          <select name="role">
          <option value="">Assign Role</option>
         <?php 
          $tempuser = new Users();
          $roleList = $tempuser->createRoleList();
         echo $roleList;
         ?>
        </select>
          <button name="submitted" value="TRUE">Register</button>
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
