<?php
class ActivityBank {
        private $ActivityId;
        private $UserName;
        private $ActivityText;
        private $Time;
    
     public function __construct() {
            $this->ActivityId = null;
            $this->UserName = null;
            $this->ActivityText = null;
            $this->Time = null;
        }
        
         public function getActivityId() {
            return $this->ActivityId;
        }
        
         public function setActivityId($ActivityId): void {
            $this->ActivityId = $ActivityId;
        }
        
         public function getUserName() {
            return $this->UserName;
        }
        
         public function setUserName($UserName): void {
            $this->UserName = $UserName;
        }
        
        public function getActivityText() {
            return $this->ActivityText;
        }
        
         public function setActivityText($ActivityText): void {
            $this->ActivityText = $ActivityText;
        }
        
         public function getTime() {
            return $this->Time;
        }
        
         public function setTime($Time): void {
            $this->Time = $Time;
        }
        
        function getAllActivityLogs(){
             $db = Database::getInstance();
            $data = $db->multiFetch('Select * from ActivityLog');
            return $data;
        }
        
}
