<?php
class LogsBank {
        private $LogId;
        private $UserName;
        private $Action;
        private $Time;
    
     public function __construct() {
            $this->LogId = null;
            $this->UserName = null;
            $this->Action = null;
            $this->Time = null;
        }
        
         public function getLogId() {
            return $this->LogId;
        }
        
         public function setLogId($LogId): void {
            $this->LogId = $LogId;
        }
        
         public function getUserName() {
            return $this->UserName;
        }
        
         public function setUserName($UserName): void {
            $this->UserName = $UserName;
        }
        
        public function getAction() {
            return $this->Action;
        }
        
         public function setAction($Action): void {
            $this->Action = $Action;
        }
        
         public function getTime() {
            return $this->Time;
        }
        
         public function setTime($Time): void {
            $this->Time = $Time;
        }
        
        function getAllLogs(){
             $db = Database::getInstance();
            $data = $db->multiFetch('Select * from Logs');
            return $data;
        }
        
}
