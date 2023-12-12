<?php
class FlagsBank {
        private $FlagId;
        private $UserId;
        private $QuestionId;
    
     public function __construct() {
            $this->FlagId = null;
            $this->UserId = null;
            $this->QuestionId = null;
        }
        
         public function getFlagId() {
            return $this->FlagId;
        }
        
         public function setFlagId($FlagId): void {
            $this->FlagId = $FlagId;
        }
        
         public function getUserId() {
            return $this->UserId;
        }
        
         public function setUserId($UserId): void {
            $this->UserId = $UserId;
        }
        
        public function getQuestionId() {
            return $this->QuestionId;
        }
        
         public function setAction($QuestionId): void {
            $this->QuestionId = $QuestionId;
        }
        
        function getAllFlags(){
             $db = Database::getInstance();
            $data = $db->multiFetch('Select * from Flag');
            return $data;
        }
        
}
