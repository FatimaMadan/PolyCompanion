<?php
include 'Database.php';

class Users 
    {
        private $uid;
        private $username;
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $roleId;
        private $UserDp;
        
        public function __construct() {
            $this->uid = null;
            $this->username = null;
            $this->firstName = null;
            $this->email = null;
            $this->password = null;
            $this->roleId = null;
            $this->UserDp = null;
        }
        
        
        
        public function getUid() {
            return $this->uid;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }
         public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getRoleId() {
            return $this->roleId;
        }
         public function getUserDp() {
            return $this->UserDp;
        }
        
        public function setUid($uid): void {
            $this->uid = $uid;
        }

        public function setUsername($username): void {
           
            $this->username = $username;
        }

        public function setFirstName($firstName): void {
            $this->firstName = $firstName;
        }

        public function setLastName($lastName): void {
            $this->lastName = $lastName;
        }
        public function setEmail($email): void {
            $this->email = $email;
        }

        public function setPassword($password): void {
            $this->password = $password;
        }

        public function setRoleId($roleId): void {
            $this->roleId = $roleId;
        }
         public function setUserDp($UserDp): void {
            $this->UserDp = $UserDp;
        }
        
        function initWith($uid, $username, $firstName, $lastName, $email, $password, $roleId, $UserDp) 
        {
            
            $this->uid = $uid;
            $this->username = $username;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->roleId = $roleId;
            $this->UserDp = $UserDp;
            
        }
        function initWithUid($uid) 
{
    $db = Database::getInstance();
    $sql = 'SELECT * FROM User WHERE UserId = ' . $uid;
   // echo 'SQL Statement: ' . $sql . '<br>'; // Echo the SQL statement
    $data = $db->singleFetch($sql);
    $this->initWith($data->UserId, $data->UserName, $data->FirstName, $data->LastName, $data->Email, $data->Password, $data->Roles_RoleId, $data->UserDp);
}
        function updateUserDp($id) {
        try {
            $db = Database::getInstance();
             $data = 'UPDATE User set
                              UserDp = \'' . $this->UserDp . '\' 
                            WHERE UserId = ' . $id;

            $db->querySql($data);

            return true;
        } catch (Exception $e) {

            echo 'Exception: ' . $e;
            return false;
        }
    }
        function initWithUsername() 
        {
            $db = Database::getInstance();
            $data = $db->singleFetch('SELECT * FROM User WHERE UserName = \'' . $this->username . '\'');
            if ($data != null) {
                return false;
            }
            return true;
        }
        
        function registerUser() {
    if ($this->isValid()) {
        try {
            $db = Database::getInstance();
            $sql = "INSERT INTO User(UserId, UserName, FirstName, LastName,Email, Password, Roles_RoleId, UserDp) VALUES (NULL, '$this->username', '$this->firstName', '$this->lastName', '$this->email', AES_ENCRYPT('$this->password', 'qwe'), '$this->roleId', '$this->UserDp')";
          //  echo 'Executing SQL: ' . $sql;
            
            $data = $db->querySQL($sql);
            
            return true;
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }
    } else {
        return false;
    }
}
        
        function getAllusers() 
        {
            $db = Database::getInstance();
            $data = $db->multiFetch('Select * from User');
            return $data;
        }
        
         function getTotalUsers(){
            $db = Database::getInstance();
       $result= $db->singleFetch("SELECT COUNT(*) AS total FROM User");
       
        return $result->total;
        }
        
        public function isValid() 
        {
            
            $errors = true;

            if (empty($this->username))
                $errors = false;


            if (empty($this->firstName))
                $errors = false;
            
            if (empty($this->lastName))
                $errors = false;

            if (empty($this->email))
                $errors = false;

            if (empty($this->password))
                $errors = false;

            return $errors;
        }
        
        function deleteuser() 
        {
            try {
                $db = Database::getInstance();
                $data = $db->querySql('Delete from User where UserId=' . $this->uid);
                return true;
            } catch (Exception $e) {
                echo 'Exception: ' . $e;
                return false;
            }
        }
        
        function checkUser($username, $password) 
{
    
    $db = Database::getInstance();
    $sql = "SELECT UserId, UserName, FirstName, LastName, Email, AES_DECRYPT(Password,'qwe') as Password, Roles_RoleId, UserDp FROM User WHERE UserName = '$username' AND AES_DECRYPT(Password,'qwe') = '$password'";
  //  echo $sql;
    
    $data = $db->singleFetch($sql);
    
    $this->initWith($data->UserId, $data->UserName, $data->FirstName, $data->LastName, $data->Email, $data->Password, $data->Roles_RoleId, $data->UserDp);
}
        
        function login($username, $password){
            try{
                
                $this->checkUser($username, $password);
                //echo $this->getFirstName();
                if($this->getUid() != null){
                    $_SESSION['uid'] = $this->getUid();
                      $_SESSION['username'] = $this->getUsername();
                        $_SESSION['roleId'] = $this->getRoleId();
                           return true;
                           
                }
                else 
                {
                    $error[] = 'Wrong Username or Password';
                }
                return false;
            } catch (Exception $ex) {
                    $error[] = $ex->getMessage();
            }
            return false;
        }
    
        function logout(){
            $_SESSION['uid'] = '';
              $_SESSION['username'] = '';
                $_SESSION['roleId'] = '';

              session_destroy();
        }

          function enterLog($username){
              $db = Database::getInstance();
            $sql = "INSERT INTO Logs(LogId, UserName, Action) VALUES (NULL, '$username', 'Logged in')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }
        
           function enterLogout($username){
              $db = Database::getInstance();
            $sql = "INSERT INTO Logs(LogId, UserName, Action) VALUES (NULL, '$username', 'Logged out')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }
        
        function updateUser() {
    try {
        $db = Database::getInstance();
        $data = 'UPDATE User SET 
                    Roles_RoleId = ' . $this->roleId . ',
                    FirstName = "' . $this->firstName . '",
                    LastName = "' . $this->lastName . '",
                    UserName = "' . $this->username . '"
                WHERE UserId = ' . $this->uid;
        
        $db->querySql($data);

        return true;
    } catch (Exception $e) {
        
        echo 'Exception: ' . $e;
        return false;
    }
}
    
    public function createRoleList() {
        $list = '';
        $db = Database::getInstance();
        $data = $db->multiFetch('SELECT * FROM Role');
      
        //Kept it as 3 so that students won't be there in the list
        for ($i = 0; $i < 4; $i++) {
            $list .='<option value="' . $data[$i]->RoleId . '"';

            if ($data[$i]->RoleId == $this->roleId)
                $list .= ' selected ';

            $list.='>' . $data[$i]->RoleName . '</option>';
        }
        return $list;
    }

public function getAUserName($userid) {
        $db = Database::getInstance();
        $q = 'SELECT UserName FROM User WHERE UserId = ' .$userid;
      
        $data = $db->singleFetch($q);
            
       return $data->UserName;
        
    }
    
    
   public function getUserEmail($username) {
    $db = Database::getInstance();
    $q = 'SELECT Email FROM User WHERE UserName = \'' . $username . '\'';
    $data = $db->singleFetch($q);
    if ($data != null) {
        return $data->Email;
    }
    return null;
}

   function updatePassword($username,$password) {
      
        try {
           
            $db = Database::getInstance();
           
             $data = "UPDATE User SET Password = AES_ENCRYPT('$password', 'qwe') WHERE UserName = $username";
           //  echo $data;

            $db->querySql($data);
            

            return true;
        } catch (Exception $e) {

            echo 'Exception: ' . $e;
            return false;
        }
    }
    }
   

