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
        private $TeachingStrategies;




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
            echo 'hii';
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
        
        public function getShortTitle() {
            return $this->ShortTitle;
        }

        public function getCourseLevel() {
            return $this->CourseLevel;
        }

        public function getValidFrom() {
            return $this->ValidFrom;
        }

        public function getCredits() {
            return $this->Credits;
        }

        public function getProgramManager() {
            return $this->ProgramManager;
        }

        public function getCurrentDeveloper() {
            return $this->CurrentDeveloper;
        }

        public function getAssessmentMethod() {
            return $this->AssessmentMethod;
        }

        public function getCourseAim() {
            return $this->CourseAim;
        }

        public function getPreRequisite() {
            return $this->PreRequisite;
        }

        public function getOwner() {
            return $this->owner;
        }

        public function getTotal_hours() {
            return $this->total_hours;
        }

        public function getRecommended_book_resources() {
            return $this->recommended_book_resources;
        }

        public function setShortTitle($ShortTitle): void {
            $this->ShortTitle = $ShortTitle;
        }

        public function setCourseLevel($CourseLevel): void {
            $this->CourseLevel = $CourseLevel;
        }

        public function setValidFrom($ValidFrom): void {
            $this->ValidFrom = $ValidFrom;
        }

        public function setCredits($Credits): void {
            $this->Credits = $Credits;
        }

        public function setProgramManager($ProgramManager): void {
            $this->ProgramManager = $ProgramManager;
        }

        public function setCurrentDeveloper($CurrentDeveloper): void {
            $this->CurrentDeveloper = $CurrentDeveloper;
        }

        public function setAssessmentMethod($AssessmentMethod): void {
            $this->AssessmentMethod = $AssessmentMethod;
        }

        public function setCourseAim($CourseAim): void {
            $this->CourseAim = $CourseAim;
        }

        public function setPreRequisite($PreRequisite): void {
            $this->PreRequisite = $PreRequisite;
        }

        public function setOwner($owner): void {
            $this->owner = $owner;
        }

        public function setTotal_hours($total_hours): void {
            $this->total_hours = $total_hours;
        }

        public function setRecommended_book_resources($recommended_book_resources): void {
            $this->recommended_book_resources = $recommended_book_resources;
        }
        
        public function getTeachingStrategies() {
            return $this->TeachingStrategies;
        }

        public function setTeachingStrategies($TeachingStrategies): void {
            $this->TeachingStrategies = $TeachingStrategies;
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

    function initWith($CourseId, $CourseCode, $CourseTitle, $ShortTitle, $CourseLevel, $ValidFrom, $Credits, $ProgramManager, $CurrentDeveloper, $AssessmentMethod, $CourseAim, $PreRequisite, $Major_MajorId, $owner, $total_hours, $recommended_book_resources, $TeachingStrategies) {
    $this->CourseId = $CourseId;
    $this->CourseCode = $CourseCode;
    $this->CourseTitle = $CourseTitle;
    $this->ShortTitle = $ShortTitle;
    $this->CourseLevel = $CourseLevel;
    $this->ValidFrom = $ValidFrom;
    $this->Credits = $Credits;
    $this->ProgramManager = $ProgramManager;
    $this->CurrentDeveloper = $CurrentDeveloper;
    $this->AssessmentMethod = $AssessmentMethod;
    $this->CourseAim = $CourseAim;
    $this->PreRequisite = $PreRequisite;
    $this->Major_MajorId = $Major_MajorId;
    $this->owner = $owner;
    $this->total_hours = $total_hours;
    $this->recommended_book_resources = $recommended_book_resources;
    $this->TeachingStrategies = $TeachingStrategies;
}
    
    function initWithId($course_id) {
        $db = Database::getInstance();
        $data = $db->singleFetch('SELECT * FROM Course WHERE CourseId = \'' . $course_id .  '\'');
        $this->initWith($data->CourseId, $data->CourseCode, $data->CourseTitle, $data->ShortTitle, $data->CourseLevel, $data->ValidFrom, $data->Credits, $data->ProgramManager, $data->CurrentDeveloper, $data->AssessmentMethod, $data->CourseAim, $data->PreRequisite, $data->Major_MajorId, $data->owner, $data->total_hours, $data->recommended_book_resources, $data->TeachingStrategies);
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
    
    public static function getOutcomes($CourseId) {
      $db = Database::getInstance();
      $data = $db->multiFetch('SELECT * FROM CLO WHERE CourseId = \'' . $CourseId . '\'');
      return $data;
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
