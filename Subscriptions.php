<?php

class Subscriptions
    {
        private $SubsId;
        private $User_UserId;
        private $Course_CourseId;
     
        
        public function __construct() {
            $this->SubsId = null;
            $this->User_UserId = null;
            $this->Course_CourseId = null;
          
        }
        
        
        
        public function getSubsId() {
            return $this->SubsId;
        }

        public function getUser_UserId() {
            return $this->User_UserId;
        }

        public function getCourse_CourseId() {
            return $this->Course_CourseId;
        }

        
        public function setSubsId($SubsId): void {
            $this->SubsId = $SubsId;
        }

        public function setUser_UserId($User_UserId): void {
           
            $this->User_UserId = $User_UserId;
        }

        public function setCourse_CourseId($Course_CourseId): void {
            $this->Course_CourseId = $Course_CourseId;
        }

        
        function initWith($SubsId, $User_UserId, $Course_CourseId) 
        {
            
            $this->SubsId = $SubsId;
            $this->User_UserId = $User_UserId;
            $this->Course_CourseId = $Course_CourseId;
            
        }
        
       public function getTotalSubscribedQuestionsByUser($uid) {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM Subscriptions
              JOIN Questions ON Subscriptions.Course_CourseId = Questions.Course_CourseId
              WHERE Subscriptions.User_UserId = " . $uid;

    $result = $db->singleFetch($query);

    return $result->total;
}

        function getSubscribedQuestionsByPageAndUser($offset, $limit, $uid){
  $db = Database::getInstance();
$query = "SELECT Questions.* FROM Subscriptions
          JOIN Questions ON Subscriptions.Course_CourseId = Questions.Course_CourseId
          WHERE Subscriptions.User_UserId = " . $uid;

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
   

