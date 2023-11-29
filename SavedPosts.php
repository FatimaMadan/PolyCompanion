<?php

class SavedPosts
    {
        private $SavedPostId;
        private $User_UserId;
        private $Questions_QuestionId;
     
        
        public function __construct() {
          //  echo " inside User Constructor ";
            $this->SavedPostId = null;
            $this->User_UserId = null;
            $this->Questions_QuestionId = null;
          
        }
        
        
        
        public function getSavedPostId() {
            return $this->SavedPostId;
        }

        public function getUser_UserId() {
            return $this->User_UserId;
        }

        public function getQuestions_QuestionId() {
            return $this->Questions_QuestionId;
        }

        
        public function setSavedPostId($SavedPostId): void {
            $this->SavedPostId = $SavedPostId;
        }

        public function setUser_UserId($User_UserId): void {
           
            $this->User_UserId = $User_UserId;
        }

        public function setQuestions_QuestionId($Questions_QuestionId): void {
            $this->Questions_QuestionId = $Questions_QuestionId;
        }

        
        function initWith($SavedPostId, $User_UserId, $Questions_QuestionId) 
        {
            
            $this->SavedPostId = $SavedPostId;
            $this->User_UserId = $User_UserId;
            $this->Questions_QuestionId = $Questions_QuestionId;
            
        }
        
       public function getTotalSavedQuestionsByUser($uid) {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM SavedPosts
              JOIN Questions ON SavedPosts.Questions_QuestionId = Questions.QuestionId
              WHERE SavedPosts.User_UserId = " . $uid;

    $result = $db->singleFetch($query);

    return $result->total;
}

        function getSavedQuestionsByPageAndUser($offset, $limit, $uid){
  $db = Database::getInstance();
$query = "SELECT Questions.* FROM SavedPosts
          JOIN Questions ON SavedPosts.Questions_QuestionId = Questions.QuestionId
          WHERE SavedPosts.User_UserId = " . $uid;

 $query .= " LIMIT $offset, $limit";
 
//  echo "SQL Statement: " . $query . "<br>"; // Echo the SQL statement
    
$results = $db->multiFetch($query);

$qts = array();
foreach ($results as $result) {
    $qt = new QuestionBank();
    $qt->initWithArray($result);
    $qts[] = $qt;
}
return $qts;
}
    }
   

