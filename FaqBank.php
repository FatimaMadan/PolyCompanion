<?php
class FaqBank {
        private $FaqId;
        private $FQuestion;
        private $FAnswer;
        private $User_UserId;
    
     public function __construct() {
            $this->FaqId = null;
            $this->FQuestion = null;
            $this->FAnswer = null;
            $this->User_UserId = null;
        }
        
         public function getFaqId() {
            return $this->FaqId;
        }
        
         public function setFaqId($FaqId): void {
            $this->FaqId = $FaqId;
        }
        
         public function getFQuestion() {
            return $this->FQuestion;
        }
        
         public function setFQuestion($FQuestion): void {
            $this->FQuestion = $FQuestion;
        }
        
         public function getFAnswer() {
            return $this->FAnswer;
        }
        
         public function setFAnswer($FAnswer): void {
            $this->FAnswer = $FAnswer;
        }
        
        public function getUser_UserId() {
            return $this->User_UserId;
        }
        
         public function setUser_UserId($User_UserId): void {
            $this->User_UserId = $User_UserId;
        }
        
        
         public function initWithFid($id) {
             echo "inside initi";
        $db = Database::getInstance();
        $data = $db->singleFetch("SELECT * FROM FAQ WHERE FaqId = " . $id );
        $this->initWith($data->FaqId, $data->FQuestion, $data->FAnswer, $data->User_UserId);
    }

    private function initWith($FaqId,$FQuestion,$FAnswer,$User_UserId) {
       $this->FaqId = $FaqId;
       $this->FQuestion = $FQuestion;
        $this->FAnswer = $FAnswer;
        $this->User_UserId = $User_UserId;
    }
    
    
    static function getAllFaqs() {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from FAQ');
        return $data;
    }
    
    static function getAns($quesId){
        $db = Database::getInstance();
        $data = $db->singleFetch("SELECT * FROM FAQ WHERE FaqId = " . $quesId ); 
        return $data;
    }
        
          public function isValid() {
        $errors = array();

        if (empty($this->FQuestion))
            $errors[] = 'You must enter a Question';

        if (empty($this->FAnswer))
            $errors[] = 'You must enter an Answer';
        
        $this->MissingError=$errors;
        if (empty($errors))
            return true;
        else
            return false;
    }
        
        function deleteFaq() {
        try {
            $db = Database::getInstance();
            $data = $db->querySql("DELETE FROM FAQ Where FaqId = ".$this->FaqId);
           // echo $data;
            $this->deleteActivity();
            return true;
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }
    }
    
    function deleteActivity(){
              $db = Database::getInstance();
         $sql = "INSERT INTO ActivityLog (ActivityId, UserName, ActivityText) VALUES (NULL, '" . $_SESSION['username'] . "', 'deleted a FAQ')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }
   
    function addFaq() {
        
        try {
            $db = Database::getInstance();
            
            $insertQry="INSERT INTO FAQ VALUES( NULL,'$this->FQuestion', '$this->FAnswer','$this->User_UserId')";
            $this->addActivity();
            if(($db->querySql($insertQry)))
            { return false; }
            
            return true;
           
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }
        
    }
   
     function addActivity(){
              $db = Database::getInstance();
         $sql = "INSERT INTO ActivityLog (ActivityId, UserName, ActivityText) VALUES (NULL, '" . $_SESSION['username'] . "', 'added a FAQ')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }
        
        
    function updateDB() {
        try {
            $db = Database::getInstance();
             $data = 'UPDATE FAQ set
			FQuestion = \'' . $this->FQuestion . '\' ,
                            FAnswer = \'' . $this->FAnswer . '\' ,
                              User_UserId = \'' . $this->User_UserId. '\' 
                            WHERE FaqId = ' . $this->FaqId;
             echo $data;

            $db->querySql($data);
            $this->editActivity();
            return true;
        } catch (Exception $e) {

            echo 'Exception: ' . $e;
            return false;
        }
    }

     function editActivity(){
              $db = Database::getInstance();
         $sql = "INSERT INTO ActivityLog (ActivityId, UserName, ActivityText) VALUES (NULL, '" . $_SESSION['username'] . "', 'edited a FAQ')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }
        
    function getAllFaq() {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from FAQ');
        return $data;
    }
}

