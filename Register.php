<?php 
ob_start();
include 'debugging.php';
include 'header.php';
include 'Users.php';// Update the file path if necessary


if (empty($_SESSION['uid']) || $_SESSION['roleId'] != 1) {
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}

 if (isset($_POST['submitted'])) {
    $user = new Users();
        echo 'class created';
        $user->setFirstName($_POST['firstname']);
        $user->setLastName($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setUserDp("img/dp.jpg");
//        if($_POST['role'] == ''){
//            
//       echo '<script>alert("Role not selected!");</script>';
//       
//        }else {
        
        $user->setRoleId($_POST['role']) ;
        
            if ($user->initWithUsername()) {

     
                 if ($user->registerUser())
        {
            echo '<script>alert("Registered Successfully!");</script>';
            header ('Location: Login.php');
        }
                 else{
            echo '<script>alert("Not Successful!");</script>';
        }
             }else {
    echo '<script>alert("Username Already Exists!");</script>';
}
//        }
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
          <input required type="text" placeholder="First Name" name="firstname"/>
          <input required type="text" placeholder="Last Name" name="lastname"/>
          <input required type="email" placeholder="Email" name="email"/>
          <input required type="text" placeholder="Username" name="username"/>
          <input required type="password" placeholder="Password" name="password"/>
          <select required name="role">
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
