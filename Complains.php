<?php
class Complains {
        private $ComplainId;
        private $username;
        private $Subject;
        private $Message;
    
     public function __construct() {
            $this->ComplainId = null;
            $this->username = null;
            $this->Subject = null;
            $this->Message = null;
        }
        
         public function getComplainId() {
            return $this->ComplainId;
        }
        
         public function setComplainId($ComplainId): void {
            $this->ComplainId = $ComplainId;
        }
        
         public function getUsername() {
            return $this->username;
        }
        
         public function setUsername($username): void {
            $this->username = $username;
        }
        
        public function getSubject() {
            return $this->Subject;
        }
        
         public function setSubject($Subject): void {
            $this->Subject = $Subject;
        }
        
        public function getMessage() {
            return $this->Message;
        }
        
         public function setMessage($Message): void {
            $this->Message = $Message;
        }
        
        
        function getAllComplains(){
             $db = Database::getInstance();
            $data = $db->multiFetch('Select * from Complain');
            return $data;
        }
        
        
        function addComplains($subject, $msg){
              $db = Database::getInstance();
         $sql = "INSERT INTO Complain (ComplainId, username, Subject, Message) VALUES (NULL, '" . $_SESSION['username'] . "', '". $subject ."', '".$msg ."')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }
        
        
        
        
}
