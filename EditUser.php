<?php
ob_start();
include 'debugging.php';    
include 'header.php';

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
        $user->setRoleId($_POST['Role']);
        
       
        
//validate and save the Article object
//        if ($newArticle->isValid()) {
            if ($user->updateUser()) {
                echo "<h2>User Role has been Updated successfully</h2>";
            }else{
                 echo "<h2>Fitttay mou</h2>";
            }
//        }
       
    } // end if submitted conditional
   

    ?>

<html>
<head>
    <link rel="stylesheet" href="css/AddArticle.css">
<title> Edit User </title>
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
            <input required type="text" name="ArticleName" size="50" value="<?php echo $user->getUsername(); ?>" readonly/>
            <label>First Name </label>
            <input required type="text" name="FirstName" value="<?php echo $user->getFirstName(); ?>"readonly/>
             <label>Last Name </label>
           <input required type="text" name="LastName" value="<?php echo $user->getLastName(); ?>" readonly/>
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
