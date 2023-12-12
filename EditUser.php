<?php
ob_start();
include 'debugging.php';    
include 'header.php';
include 'Users.php';

if( isset($_GET['id']) )
{
    $id=$_GET['id'];  
}
elseif(isset($_POST['id']))
{
    $id=$_POST['id'];    
}
else
{
     echo '<p class="error"> Error has occured</p>';   
     
     include 'footer.php';
     
     exit();
}

$user = new Users();
$user->initWithUid($id);

if (isset($_POST['submitted'])) {
   
         $user = new Users();
        $user->setUid($id);
        $user->setUsername($_POST['Username']);
        $user->setFirstName($_POST['FirstName']);
        $user->setLastName($_POST['LastName']);
        $user->setEmail($_POST['Email']);
        $user->setRoleId($_POST['Role']);
        
            if ($user->updateUser()) {
                echo '<script>alert("User has been updated successfully!");</script>';
                  header('Location: AdminDashboard.php');
            }else{
                echo '<script>alert("Error Occured!");</script>';
                  header('Location: AdminDashboard.php');
            }
       
    } 

    ?>

<html>
<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/AddArticle.css">
</head>
<body>
  <body>
    <div class="add-page">
      <div class="form" >
 <div class="add">
          <div class="add-header">
            <h3 class="message">Edit User</h3>
</div>
        </div>
        <form class="add-form" method="POST" enctype="multipart/form-data">
            <label>User Name </label>
            <input required type="text" name="Username" size="50" value="<?php echo $user->getUsername(); ?>" />
            <label>First Name </label>
            <input required type="text" name="FirstName" value="<?php echo $user->getFirstName(); ?>"/>
             <label>Last Name </label>
           <input required type="text" name="LastName" value="<?php echo $user->getLastName(); ?>" />
           <label>Email</label>
           <input required type="email" name="Email" value="<?php echo $user->getEmail(); ?>" />
             <label>Assign Role: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
               <?php 
           
      echo '<select style="width:300px;" name="Role">';      
      echo $user->createRoleList();
      echo '</select><br />';
      ?> 
          
          <button name="submitted" value="TRUE">SAVE</button>
          <!--<button name="saved" value="TRUE">SAVE</button>-->
        </form>
      </div>
    </div>
</body>
</body>
</html>


<?php 

include 'footer.php';
?>
