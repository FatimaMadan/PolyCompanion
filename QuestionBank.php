<?php
class QuestionBank {
        private $QuestionId;
        private $QuesTitle;
        private $QuesDescription;
        private $Tags;
        private $Likes;
        private $Course_CourseId;
        private $User_UserId;
    
     public function __construct() {
            $this->QuestionId = null;
            $this->QuesTitle = null;
            $this->QuesDescription = null;
            $this->Tags = null;
            $this->Likes = null;
            $this->Course_CourseId = null;
            $this->User_UserId = null;
        }
        
         public function getQuestionId() {
            return $this->QuestionId;
        }
        
         public function setQuestionId($QuestionId): void {
            $this->QuestionId = $QuestionId;
        }
        
         public function getQuesTitle() {
            return $this->QuesTitle;
        }
        
         public function setQuesTitle($QuesTitle): void {
            $this->QuesTitle = $QuesTitle;
        }
        
         public function getQuesDescription() {
            return $this->QuesDescription;
        }
        
         public function setQuesDescription($QuesDescription): void {
            $this->QuesDescription = $QuesDescription;
        }
        
        public function getTags() {
            return $this->Tags;
        }
        
         public function setTags($Tags): void {
            $this->Tags = $Tags;
        }
        
        public function getLikes() {
            return $this->Likes;
        }
        
         public function setLikes($Likes): void {
            $this->Likes = $Likes;
        }
        
        public function getCourse_CourseId() {
            return $this->Course_CourseId;
        }
        
         public function setCourse_CourseId($Course_CourseId): void {
            $this->Course_CourseId = $Course_CourseId;
        }
        
         public function getUser_UserId() {
            return $this->User_UserId;
        }
        
         public function setUser_UserId($User_UserId): void {
            $this->User_UserId = $User_UserId;
        }
        
        public function initWithCid($cid) {
         $db = Database::getInstance();
        $data = $db->multiFetch("Select * from Questions where Course_CourseId = " .$cid);
        return $data;
    }
    
    public function initWithQid($qid) {
//   echo "Init with QId";
    $db = Database::getInstance();
    $sql = 'SELECT * FROM Questions WHERE QuestionId = ' . $qid;
   // echo 'SQL Statement: ' . $sql . '<br>'; // Echo the SQL statement
    $data = $db->singleFetch($sql);
    $this->initWith($data->QuestionId, $data->QuesTitle, $data->QuesDescription, $data->Tags, $data->Likes, $data->Course_CourseId, $data->User_UserId);

    }
    
    function initWith($QuestionId, $QuesTitle, $QuesDescription, $Tags, $Likes, $Course_CourseId, $User_UserId) 
        {
            
            $this->QuestionId = $QuestionId;
            $this->QuesTitle = $QuesTitle;
            $this->QuesDescription = $QuesDescription;
            $this->Tags = $Tags;
            $this->Likes = $Likes;
            $this->Course_CourseId = $Course_CourseId;
            $this->User_UserId = $User_UserId;
            
        }
        
        function getCountQuestions(){
            $db = Database::getInstance();
       $result= $db->singleFetch("SELECT COUNT(*) AS total FROM Questions" );
       
        return $result->total;
        }
        
        function getFlaggedQuestions(){
            $db = Database::getInstance();
       $result= $db->singleFetch("SELECT COUNT(*) AS total FROM Flag" );
       
        return $result->total;
        }
        
       function getCountUserQuestions($id){
            $db = Database::getInstance();
       $result= $db->singleFetch("SELECT COUNT(*) AS total FROM Questions where User_UserId =" . $id );
       
        return $result->total;
        }
    
  function getMaxQuestionId() {
    $db = Database::getInstance();
    $sql = "SELECT MAX(QuestionId) AS MaxQuestionId FROM Questions";
    $data = $db->singleFetch($sql);
    
    return (int) $data->MaxQuestionId;
}

     public function createCourseList() {
        $list = '';
        $db = Database::getInstance();
        $data = $db->multiFetch('SELECT * FROM Course');
      
        //Kept it as 3 so that students won't be there in the list
        for ($i = 0; $i < count($data); $i++) {
            $list .='<option value="' . $data[$i]->CourseId . '"';

            if ($data[$i]->CourseId == $this->Course_CourseId)
                $list .= ' selected ';

            $list.='>' . $data[$i]->CourseTitle . '</option>';
        }
        return $list;
    }
    
     function addQuestion() {
    if ($this->isValid()) {
        try {
            $db = Database::getInstance();
            $sql = "INSERT INTO Questions(QuestionId, QuesTitle, QuesDescription, Tags, Likes, Course_CourseId, User_UserId) VALUES (NULL, '$this->QuesTitle', '$this->QuesDescription', '$this->Tags', '$this->Likes', '$this->Course_CourseId',  '$this->User_UserId')";
          echo 'Executing SQL: ' . $sql;
            
            $data = $db->querySQL($sql);
          $this->addActivity();
            return true;
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }
    } else {
        return false;
    }
}
function addActivity(){
              $db = Database::getInstance();
         $sql = "INSERT INTO ActivityLog (ActivityId, UserName, ActivityText) VALUES (NULL, '" . $_SESSION['username'] . "', 'added a question')";
           echo 'Executing SQL: ' . $sql;
            $data = $db->querySQL($sql);
        }

      public function isValid() 
        {
            
            $errors = true;

            if (empty($this->QuesTitle))
                $errors = false;


            if (empty($this->QuesDescription))
                $errors = false;
            
            return $errors;
        }
    
    function getAllQuestions() {
    $db = Database::getInstance();
    $sql = 'SELECT * FROM Questions ';
    echo 'SQL Statement: ' . $sql . '<br>'; // Echo the SQL statement
    $data = $db->multiFetch($sql);
    return $data;
}

    public function getQuestionsByPage($offset, $limit) {
    $db = Database::getInstance();
    $sql = "SELECT * FROM Questions LIMIT $offset, $limit";
   // echo "SQL Statement: " . $sql . "<br>"; // Echo the SQL statement
    
    $results = $db->multiFetch($sql);
    
    $qts = array();
    foreach ($results as $result) {
        $qt = new QuestionBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}


 public function getQuestionsByCourseAndPage($cId, $offset, $limit) {
    $db = Database::getInstance();
    $sql = "SELECT * FROM Questions where Course_CourseId = $cId LIMIT $offset, $limit";
    echo "SQL Statement: " . $sql . "<br>"; // Echo the SQL statement
    
    $results = $db->multiFetch($sql);
    
    $qts = array();
    foreach ($results as $result) {
        $qt = new QuestionBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}



  public function initWithArray($array) {
        $array = json_decode(json_encode($array), true);
        $this->QuestionId = $array['QuestionId'];
        $this->QuesTitle = $array['QuesTitle'];
        $this->QuesDescription = $array['QuesDescription'];
         $this->Course_CourseId = $array['Course_CourseId'];
        $this->User_UserId = $array['User_UserId'];
    }

  public function searchResult($search) {
        
        $q = "select * from Questions where match(QuesTitle, QuesDescription) against ('" . $search . "')";
        $q .= " ORDER BY match(QuesTitle, QuesDescription) against ('" . $search . "') DESC";

        $db = Database::getInstance();
        $data = $db->multiFetch($q);
        
        return $data;    
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
    
   public function getQuestionsByPageAndSearch($offset, $limit, $searchText = "") {
    $db = Database::getInstance();
    $query = "SELECT * FROM Questions";

     $ss = $searchText; 
        $query .= " WHERE (QuesTitle LIKE '%$ss%' OR QuesDescription LIKE '%$ss%')";

        $query .= " ORDER BY Time DESC";
        
    $query .= " LIMIT $offset, $limit";

//    echo "SQL Statement: " . $query . "<br>"; // Echo the SQL statement

    $results = $db->multiFetch($query);

    $qts = array();
    foreach ($results as $result) {
        $qt = new QuestionBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}

public function getQuestionsByPageAndUser($offset, $limit, $uid) {
    $db = Database::getInstance();
    $query = "SELECT * FROM Questions where User_UserId = " . $uid;

        $query .= " ORDER BY Time DESC";
        
    $query .= " LIMIT $offset, $limit";

//    echo "SQL Statement: " . $query . "<br>"; // Echo the SQL statement

    $results = $db->multiFetch($query);

    $qts = array();
    foreach ($results as $result) {
        $qt = new QuestionBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}


public function getQuestionsByCourseAndPageAndSearch($cId, $offset, $limit, $searchText = "") {
    $db = Database::getInstance();
    $query = "SELECT * FROM Questions WHERE Course_CourseId = $cId";

        $ss = $searchText; 
        $query .= " AND (QuesTitle LIKE '%$ss%' OR QuesDescription LIKE '%$ss%')";

        $query .= " ORDER BY Time DESC";
        
    $query .= " LIMIT $offset, $limit";

//    echo "SQL Statement: " . $query . "<br>";

    $results = $db->multiFetch($query);

    $qts = array();
    foreach ($results as $result) {
        $qt = new QuestionBank();
        $qt->initWithArray($result);
        $qts[] = $qt;
    }

    return $qts;
}

 public function getTotalPostedQuestionsAndSearch($searchText = "") {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM Questions";

      $ss = $searchText;
        $query .= " WHERE (QuesTitle LIKE '%$ss%' OR QuesDescription LIKE '%$ss%')";

//echo "SQL Statement: " . $query; 
    $result = $db->singleFetch($query);

    return $result->total;
}

public function getTotalPostedQuestionsByCourseAndSearch($cId, $searchText = "") {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM Questions WHERE Course_CourseId = " . $cId;

        $ss = $searchText;
        $query .= " AND (QuesTitle LIKE '%" . $ss . "%' OR QuesDescription LIKE '%" . $ss . "%')";

//    echo "SQL Statement: " . $query; 

    $result = $db->singleFetch($query);

    return $result->total;
}


public function getTotalPostedQuestionsByUser($uid) {
    $db = Database::getInstance();
    $query = "SELECT COUNT(*) AS total FROM Questions WHERE User_UserId = " . $uid;

    $result = $db->singleFetch($query);

    return $result->total;
}

public static function getPopuolarQuestions(){
    $db = Database::getInstance();
    $query ='SELECT * FROM Questions ORDER BY Likes DESC';

    $result = $db->MultiFetch($query);

    return $result;
}
   



public function getQuestionsByUser($uid) {
    $db = Database::getInstance();
    $query = "SELECT * FROM Questions where User_UserId = " . $uid;

        $query .= " ORDER BY Time DESC";

//    echo "SQL Statement: " . $query . "<br>"; // Echo the SQL statement

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
