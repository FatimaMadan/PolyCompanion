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
        private $COLUMN_NAME;



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
    
    
     function getAllCourses() {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from Course where Major_MajorId = 1');
        return $data;
    }
    
// Retrieve all courses from the database
           public static function getCourses() {
    $db = Database::getInstance();
    $q = 'SELECT * FROM Course ORDER BY CourseId DESC';
    $data = $db->multiFetch($q);
    return $data;
}

// Search for courses by title and filter by major
    static function searchByTitleAndFilter($searchText, $filter){
        $db = Database::getInstance();
        $mid = MajorBank::getMajorFromName($filter);
        $query = "SELECT * FROM Course WHERE MATCH(CourseCode, CourseTitle, ShortTitle)"
                . "AGAINST('*".$searchText."*' AND Major_MajorId = \'' . $mid . '\')";
        $result = $db->multiFetch($query);    
        return $result;
    }
    
    // Search for courses by title, code and short title
        static function searchByTitle($searchText){
        $db = Database::getInstance();
        $query = "SELECT * FROM Course WHERE MATCH(CourseCode, CourseTitle, ShortTitle)"
                . "AGAINST('*".$searchText."*' IN BOOLEAN MODE)";
        $result = $db->multiFetch($query);    
        return $result;
    } 

    // Retrieve the outcomes of a course based on CourseId
    public static function getOutcomes($CourseId) {
      $db = Database::getInstance();
      $data = $db->multiFetch('SELECT * FROM CLO WHERE CourseId = \'' . $CourseId . '\'');
      return $data;
    } 

    // Retrieve courses belonging to the specified major
    public static function getCoursesByMajor($major_id){
        $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Course WHERE Major_MajorId = \'' . $major_id . '\'');
      return $data;
    }
    
    // Retrieve courses belonging to the specified major and year
    public static function getCoursesByYear($major_id, $year){
        $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Course WHERE Major_MajorId = \'' . $major_id . '\''
              . 'AND Year=  \'' . $year . '\'');
      return $data;
    }
    
        // Retrieve courses belonging to the specified major, year, and semester
    public static function getCoursesBySem($major_id, $year, $sem){

     $db = Database::getInstance();
    $query = 'Select * from Course WHERE Major_MajorId = \'' . $major_id . '\''
            . 'AND Year=  \'' . $year . '\' AND Semester=  \'' . $sem . '\'';
    $data = $db->multiFetch($query);
    return $data;
    }
    
         // Retrieve all columns of the Course table
    public static function getAllColumns() {
      $db = Database::getInstance();
      $data = $db->multiFetch('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS'
              . 'WHERE TABLE_NAME = "Course"');
      return $data;
    } 
    
            public static function getColAns($courseId, $colName){
    $db = Database::getInstance();
    $query = 'SELECT ' . $colName . ' FROM Course WHERE CourseId = \'' . $courseId . '\'';
    $data = $db->singleFetch($query);
    return $data;
}
    
    
    public static function getCourseCol(){
        $db = Database::getInstance();
      $data = $db->multiFetch("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Course'");
      return $data;
    }
    


    public static function getCourseName($course_id){

     $db = Database::getInstance();
    $query = 'Select * from Course WHERE CourseId = \'' . $course_id . '\'';
    $data = $db->singleFetch($query);
    return $data;
    }
    
   public static function deleteCourse($course_id) {
    $db = Database::getInstance();
    $query = 'DELETE FROM Course WHERE CourseId = \'' . $course_id . '\'';
    $db->singleFetch($query);
}

}
