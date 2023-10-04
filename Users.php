<?php
include 'Database.php';

class Users 
    {
        private $uid;
        private $username;
        private $firstName;
        private $lastName;
        private $password;
        private $roleId;
        
        public function __construct() {
            echo 'constructor';
            $this->uid = null;
            $this->username = null;
            $this->firstName = null;
            $this->lastName = null;
            $this->password = null;
            $this->roleId = null;
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

        public function getPassword() {
            return $this->password;
        }

        public function getRoleId() {
            return $this->roleId;
        }
        
        public function setUid($uid): void {
            $this->uid = $uid;
        }

        public function setUsername($username): void {
            echo 'haha';
            $this->username = $username;
        }

        public function setFirstName($firstName): void {
            $this->firstName = $firstName;
        }

        public function setLastName($lastName): void {
            $this->lastName = $lastName;
        }

        public function setPassword($password): void {
            $this->password = $password;
        }

        public function setRoleId($roleId): void {
            $this->roleId = $roleId;
        }
        
        function initWith($uid, $username, $firstName, $lastName, $password, $roleId) 
        {
            echo "blah";
            $this->uid = $uid;
            $this->username = $username;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->roleId = $roleId;
            
            
        }
        
        function initWithUid($uid) 
        {
            $db = Database::getInstance();
            $data = $db->singleFetch('SELECT * FROM User WHERE UserId = ' . $uid);
            $this->initWith($data->UserId, $data->UserName, $data->FirstName, $data->LastName, $data->Password, $data->Roles_RoleId);
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
    echo 'Inside registerUser method';
    if ($this->isValid()) {
        echo 'Back from isValid method';
        try {
            echo 'Trying for database';
            $db = Database::getInstance();
            echo 'Trying inserting';
            $sql = 'INSERT INTO User(UserId, UserName, FirstName, LastName, Password, Roles_RoleId) VALUES (NULL, \'' . $this->username . '\', \'' . $this->firstName . '\', \'' . $this->lastName . '\', \'' . $this->password . '\', \'' . $this->roleId . '\')';
            echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
            echo 'Inserted';
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
        
        public function isValid() 
        {
            echo 'valid';
            $errors = true;

            if (empty($this->username))
                $errors = false;


            if (empty($this->firstName))
                $errors = false;
            
            if (empty($this->lastName))
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
            //AES_DESCRYPT
//          $data = $db->singleFetch('SELECT * FROM dbProj_Users WHERE Username = \'' . $username . '\' AND AES_DECRYPT(Password,'.'\'qwe\''.') = \'' . $password . '\';');
            $data = $db->singleFetch('SELECT * FROM User WHERE UserName = \'' . $username . '\' AND Password = \'' . $password . '\'');
            $this->initWith($data->UserId, $data->UserName, $data->FirstName, $data->LastName, $data->Password, $data->RoleId);
        
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

        
        
         function updateUser() {
        try {
            $db = Database::getInstance();
             $data = 'UPDATE User set
			RoleId = ' . $this->roleId . ' 
                            WHERE UserId = ' . $this->uid;
             echo $data;

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
      

        for ($i = 0; $i < count($data); $i++) {
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


    }
   

