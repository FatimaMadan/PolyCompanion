<?php
class AnswerBank {
        private $AnsId;
        private $AnsText;
        private $Likes;
        private $Questions_QuestionId;
        private $User_UserId;
    
     public function __construct() {
            $this->AnsId = null;
            $this->AnsText = null;
            $this->Likes = null;
            $this->Questions_QuestionId = null;
            $this->User_UserId = null;
        }
        
         public function getAnsId() {
            return $this->AnsId;
        }
        
         public function setAnsId($AnsId): void {
            $this->AnsId = $AnsId;
        }
        
         public function getAnsText() {
            return $this->AnsText;
        }
        
         public function setAnsText($AnsText): void {
            $this->AnsText = $AnsText;
        }
        
        public function getLikes() {
            return $this->Likes;
        }
        
         public function setLikes($Likes): void {
            $this->Likes = $Likes;
        }
        
         public function getQuestions_QuestionId() {
            return $this->Questions_QuestionId;
        }
        
         public function setQuestions_QuestionId($Questions_QuestionId): void {
            $this->Questions_QuestionId = $Questions_QuestionId;
        }
        
         public function getUser_UserId() {
            return $this->User_UserId;
        }
        
         public function setUser_UserId($User_UserId): void {
            $this->User_UserId = $User_UserId;
        }
        
        public function initWithQid($qid) {
            echo "inside initQID";
         $db = Database::getInstance();
    $sql = 'SELECT * FROM Answers WHERE Questions_QuestionId = ' . $qid;
   echo 'SQL Statement: ' . $sql . '<br>'; // Echo the SQL statement
    $data = $db->singleFetch($sql);
    $this->initWith($data->AnsId, $data->AnsText, $data->Likes, $data->Questions_QuestionId, $data->User_UserId);

    }
    
    function initWith($AnsId, $AnsText, $Likes, $Questions_QuestionId, $User_UserId) 
        {
            
            $this->AnsId = $AnsId;
            $this->AnsText = $AnsText;
            $this->Likes = $Likes;
            $this->Questions_QuestionId = $Questions_QuestionId;
            $this->User_UserId = $User_UserId;
            
        }
    
  function getMaxAnswerId() {
    $db = Database::getInstance();
    $sql = "SELECT MAX(AnsId) AS MaxAnswerId FROM Answers";
    $data = $db->singleFetch($sql);
    
    return (int) $data->MaxAnswerId;
}

     function addAnswer() {
    if ($this->isValid()) {
        try {
            $db = Database::getInstance();
            $sql = "INSERT INTO Answers(AnsId, AnsText, Likes, Questions_QuestionId, User_UserId) VALUES (NULL, '$this->AnsText', '$this->Likes', '$this->Questions_QuestionId',  '$this->User_UserId')";
          // echo 'Executing SQL: ' . $sql;
            
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
    
      public function isValid() 
        {
            
            $errors = true;

            if (empty($this->AnsText))
                $errors = false;

            return $errors;
        }
    
    function getAllAnswersByUsers($uid) {
    $db = Database::getInstance();
    $sql = 'SELECT * FROM Answers where User_UserId = ' . $uid;
  //  echo 'SQL Statement: ' . $sql . '<br>'; // Echo the SQL statement
    $data = $db->multiFetch($sql);
    return $data;
}

    public function getAnswersByPage($qid, $offset, $limit) {
    $db = Database::getInstance();
    $sql = "SELECT * FROM Answers where Questions_QuestionId = $qid LIMIT $offset, $limit";
   // echo "SQL Statement: " . $sql . "<br>"; // Echo the SQL statement
    
    $results = $db->multiFetch($sql);
    
    $qts = array();
    foreach ($results as $result) {
        $qt = new AnswerBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}

 public function getAnswersByQuestionAndPage($qId, $offset, $limit) {
    $db = Database::getInstance();
    $sql = "SELECT * FROM Answers where Questions_QuestionId = $qId LIMIT $offset, $limit";
 //   echo "SQL Statement: " . $sql . "<br>"; // Echo the SQL statement
    
    $results = $db->multiFetch($sql);
    
    $qts = array();
    foreach ($results as $result) {
        $qt = new AnswerBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}

  public function initWithArray($array) {
        $array = json_decode(json_encode($array), true);
        $this->AnsId = $array['AnsId'];
        $this->AnsText = $array['AnsText'];
        $this->Likes = $array['Likes'];
         $this->Questions_QuestionId = $array['Questions_QuestionId'];
        $this->User_UserId = $array['User_UserId'];
    }

  public function searchResult($search) {
        
        $q = "select * from Questions where match(QuesTitle, QuesDescription) against ('" . $search . "')";
        $q .= " ORDER BY match(QuesTitle, QuesDescription) against ('" . $search . "') DESC";

        $db = Database::getInstance();
        $data = $db->multiFetch($q);
        
        return $data;    
    }
    
    public function getTotalPostedAnswersByQuestion($qId) {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM Answers WHERE Questions_QuestionId = " . $qId;

//    echo "SQL Statement: " . $query; 

    $result = $db->singleFetch($query);

    return $result->total;
}

 public function getTotalPostedQAnswers() {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM Questions";

      $ss = $searchText;
        $query .= " WHERE (QuesTitle LIKE '%$ss%' OR QuesDescription LIKE '%$ss%')";

//echo "SQL Statement: " . $query; 
    $result = $db->singleFetch($query);

    return $result->total;
}
    
    public function getTotalPostedQuestions() {
         $db = Database::getInstance();
       $result= $db->singleFetch("SELECT COUNT(*) AS total FROM Questions");
       
        return $result->total;
    }
    
    
     public function getTotalPostedQuestionsByCourse($cId) {
         $db = Database::getInstance();
       $result= $db->singleFetch("SELECT COUNT(*) AS total FROM Questions where Course_CourseId = " . $cId);
       
        return $result->total;
    }
   
}
