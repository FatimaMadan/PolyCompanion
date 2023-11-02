<?php
ob_start();
include 'debugging.php';
include 'Users.php';


$passedCode = isset($_POST['code']) ? $_POST['code'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['confirm'])) {
         $username = ($_POST['username']); 
        $PCode = ($_POST['passedCode']); 
        $userCode = ($_POST['Ucode']); 
//        For Debugging::::
//        echo "Passed Code: " . $PCode . "<br>";
//        echo "User Code: " . $userCode . "<br>";
//        echo "UserNAME: " . $username . "<br>";
        
        
//         Check if the passed code matches the user-entered code
        
      if ($PCode === $userCode) {
    echo "Values matched";
    echo '<script>
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "sendTempPassword.php";
        var usernameInput = document.createElement("input");
        usernameInput.type = "hidden";
        usernameInput.name = "username";
        usernameInput.value = "' . $username . '";
        form.appendChild(usernameInput);
        
        document.body.appendChild(form);
        form.submit();
    </script>';
}
        else {
//            echo "Values do not matched";
            echo '<script>
            alert("Try again, The entered code did not match.");
            window.location.href = "ForgotPassword.php";
          </script>';
        }
    }
//}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verification</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ForgotPass.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>PolyCompanion</h2>
        </a>
    </nav>

    
    <div class="FP-page">
         <div class="form left-form">
<div class="FP">
      <div class="FP-header">
         
        <h3 style="font-family: Arial; color:white">Code Verification</h3>
        <p style="font-family: Arial; color: whitesmoke">A verification code has been sent to your registered email. Kindly provide the code to move forward. </p>
      </div>
    </div>
  </div>
  <div class="form right-form">
    <!-- Right side form content goes here -->
      <form class="FP-form" method="POST">
            <br>
        Please provide the code below:<br>
        <br>
                <input required type="text" name="Ucode" placeholder="Code" />
                 <input hidden type="text" name="passedCode" placeholder="Code" value="<?php  echo isset($_POST['code']) ? $_POST['code'] : ''?>"/>
                 <input hidden type="text" name="username" placeholder="UserName" value="<?php  echo isset($_POST['username']) ? $_POST['username'] : ''?>"/>
               
                 <button name="confirm" value="TRUE">Verify</button>
            </form>
  </div>
    </div>
</div>
</body>
</html>
