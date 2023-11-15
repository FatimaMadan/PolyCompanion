<?php
class Likes {
        private $LikesId;
        private $action;
        private $Answers_AnsId;
        private $Answers_Questions_QuestionId;
        private $Answers_User_UserId;
    	
	
     public function __construct() {
            $this->LikesId = null;
            $this->action = null;
            $this->Answers_AnsId = null;
            $this->Answers_Questions_QuestionId = null;
            $this->Answers_User_UserId = null;
        }
        
         public function getLikesId() {
            return $this->LikesId;
        }
        
         public function setLikesId($LikesId): void {
            $this->LikesId = $LikesId;
        }
        
         public function getAction() {
            return $this->action;
        }
        
         public function setAction($action): void {
            $this->action = $action;
        }
        
        public function getAnswers_AnsId() {
            return $this->Answers_AnsId;
        }
        
         public function setAnswers_AnsId($Answers_AnsId): void {
            $this->Answers_AnsId = $Answers_AnsId;
        }
        
         public function getAnswers_Questions_QuestionId() {
            return $this->Answers_Questions_QuestionId;
        }
        
         public function setAnswers_Questions_QuestionId($Answers_Questions_QuestionId): void {
            $this->Answers_Questions_QuestionId = $Answers_Questions_QuestionId;
        }
        
         public function getAnswers_User_UserId() {
            return $this->Answers_User_UserId;
        }
        
         public function setAnswers_User_UserId($Answers_User_UserId): void {
            $this->Answers_User_UserId = $Answers_User_UserId;
        }
        
        
        
    function hasUserLiked($answerId, $userId) {
//        echo "inside has user liked";
            $db = Database::getInstance();
    $query = "SELECT * FROM Likes WHERE Answers_AnsId = $answerId AND Answers_User_UserId = $userId";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        // User has already liked or disliked the post
        return true;
    } else {
        // User has not liked or disliked the post
        return false;
    }
}

 function insertLike($answerId, $action, $userId, $answerQId) {
//      echo "insert like";
           $db = Database::getInstance();
    $query = "INSERT INTO Likes (LikesId, action, Answers_AnsId, Answers_Questions_QuestionId, Answers_User_UserId) VALUES (Null, '$action' ,$answerId, $answerQId, $userId)";
  $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        // User has already liked or disliked the post
        return true;
    } else {
        // User has not liked or disliked the post
        return false;
    }
    
 }
        
        
}