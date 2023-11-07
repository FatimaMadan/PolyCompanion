<?php
class CourseBank {
        private $CourseId;
        private $CourseCode;
        private $CourseTitle;
        private $ShortTitle;
        private $CourseLevel;
        private $ValidFrom;
        private $Credits;
        private $ProgramManager;
        private $CurrentDeveloper;
        private $AssessmentMethod;
        private $CourseAim;
        private $PreRequisite;
        private $Major_MajorId;
        private $owner;
        private $total_hours;
        private $recommended_book_resources;
    
        
     public function __construct() {
            $this->CourseId = null;
            $this->CourseCode = null;
            $this->CourseTitle = null;
            $this->Major_MajorId = null;
        }
        
        
         public function getCourseId() {
            return $this->CourseId;
        }
        
         public function setCourseId($CourseId): void {
            $this->CourseId = $CourseId;
        }
        
         public function getCourseCode() {
            return $this->CourseCode;
        }
        
         public function setCourseCode($CourseCode): void {
            $this->CourseCode = $CourseCode;
        }
        
         public function getCourseTitle() {
            return $this->CourseTitle;
        }
        
         public function setCourseTitle($CourseTitle): void {
            $this->CourseTitle = $CourseTitle;
        }
        
        public function getMajor_MajorId() {
            return $this->Major_MajorId;
        }
        
         public function setMajor_MajorId($Major_MajorId): void {
            $this->Major_MajorId = $Major_MajorId;
        }
        
        function initWithCTitle($title)
{
    echo "Init with CourseTitle";
    $db = Database::getInstance();
    $data = $db->multiFetch("SELECT * FROM Course WHERE CourseTitle = '" . $title . "'");
    return $data;
}
        
        public function initWithMid($mid) {
         $db = Database::getInstance();
        $data = $db->multiFetch("Select * from Course where Major_MajorId = " .$mid);
        return $data;
    }

    function initWithId($course_id) {
        $db = Database::getInstance();
        $data = $db->singleFetch('SELECT CourseId, CourseCode, CourseTitle, ShortTitle, CourseLevel FROM Course WHERE CourseId = \'' . $course_id .  '\'');
        $this->initWith($data->CourseId, $data->CourseCode, $data->CourseTitle, $data->ShortTitle, $data->CourseLevel );

    }
    
        public static function getCourses() {
    $db = Database::getInstance();
    $q = 'SELECT * FROM Course ORDER BY CourseId DESC';
    $data = $db->multiFetch($q);
    return $data;
}
    
     function getAllCourses() {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from Course where Major_MajorId = 1');
        return $data;
    }
    
    static function searchByTitle($searchText){
        $db = Database::getInstance();
        $query = "SELECT * FROM Course WHERE MATCH(CourseCode, CourseTitle, ShortTitle) AGAINST('*".$searchText."*' IN BOOLEAN MODE)";
        $result = $db->multiFetch($query);    
        return $result;
    }
    
    
//    private function initWith($CourseId,$CourseCode,$CourseTitle,$Major_MajorId) {
//       $this->CourseId = $CourseId;
//       $this->CourseCode = $CourseCode;
//        $this->CourseTitle = $CourseTitle;
//        $this->Major_MajorId = $Major_MajorId;
//    }

    
    
//          public function isValid() {
//        $errors = array();
//
//        if (empty($this->FQuestion))
//            $errors[] = 'You must enter a Question';
//
//        if (empty($this->FAnswer))
//            $errors[] = 'You must enter an Answer';
//        
//        $this->MissingError=$errors;
//        if (empty($errors))
//            return true;
//        else
//            return false;
//    }
        
//        function deleteCourse() {
//        try {
//            echo "inside deleteCourse";
//            $db = Database::getInstance();
//            /*     * ********************** TODO Question 4 Part B****************** */
//         // replace ...... with  Delete Query on line No 104.
//            //echo 'Delete from Books where idBook=' . $this->idBook;
//            $data = $db->querySql("DELETE FROM Course Where CourseId = ".$this->CourseId);
//            echo $data;
//            return true;
//        } catch (Exception $e) {
//            echo 'Exception: ' . $e;
//            return false;
//        }
//    }
   
//    function addCourse() {
//        
//        try {
//            $db = Database::getInstance();
//            
//            $insertQry="INSERT INTO FAQ VALUES( NULL,'$this->FQuestion', '$this->FAnswer','$this->User_UserId')";
//           
//            if(($db->querySql($insertQry)))
//            { return false; }
//            
//            return true;
//           
//        } catch (Exception $e) {
//            echo 'Exception: ' . $e;
//            return false;
//        }
//        
//    }
   
//    function updateDB() {
//        try {
//            $db = Database::getInstance();
//             $data = 'UPDATE FAQ set
//			FQuestion = \'' . $this->FQuestion . '\' ,
//                            FAnswer = \'' . $this->FAnswer . '\' ,
//                              User_UserId = \'' . $this->User_UserId. '\' 
//                            WHERE FaqId = ' . $this->FaqId;
//             echo $data;
//
//            $db->querySql($data);
//
//            return true;
//        } catch (Exception $e) {
//
//            echo 'Exception: ' . $e;
//            return false;
//        }
//    }

   
}
