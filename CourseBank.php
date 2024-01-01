<?php
class CourseBank {
        private $CourseId;
        private $CourseCode;
        private $CourseTitle;
        private $ShortTitle;
        private $CourseLevel;
        private $ValidFrom;
        private $Credits;
        private $uncontrolledAssess;
        private $exams;
        private $AssessmentMethod;
        private $CourseAim;
        private $PreRequisite;
        private $Major_MajorId;
        private $owner;
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

        public function getUncontrolledAssess() {
            return $this->uncontrolledAssess;
        }

        public function getExams() {
            return $this->exams;
        }

        public function setUncontrolledAssess($uncontrolledAssess): void {
            $this->uncontrolledAssess = $uncontrolledAssess;
        }

        public function setExams($exams): void {
            $this->exams = $exams;
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

    function initWith($CourseId, $CourseCode, $CourseTitle, $ShortTitle, $CourseLevel, $ValidFrom, $Credits, $AssessmentMethod, $CourseAim, $PreRequisite, $Major_MajorId, $owner, $uncontrolledAssess, $exams) {
    $this->CourseId = $CourseId;
    $this->CourseCode = $CourseCode;
    $this->CourseTitle = $CourseTitle;
    $this->ShortTitle = $ShortTitle;
    $this->CourseLevel = $CourseLevel;
    $this->ValidFrom = $ValidFrom;
    $this->Credits = $Credits;
    $this->AssessmentMethod = $AssessmentMethod;
    $this->CourseAim = $CourseAim;
    $this->PreRequisite = $PreRequisite;
    $this->Major_MajorId = $Major_MajorId;
    $this->TeachingStrategies = $TeachingStrategies;
    $this->uncontrolledAssess = $uncontrolledAssess;
    $this->exams = $exams;
}
    
    function initWithId($course_id) {
        $db = Database::getInstance();
        $data = $db->singleFetch('SELECT * FROM Course WHERE CourseId = \'' . $course_id .  '\'');
        $this->initWith($data->CourseId, $data->CourseCode, $data->CourseTitle, $data->ShortTitle, $data->CourseLevel, $data->ValidFrom, $data->Credits, $data->AssessmentMethod, $data->CourseAim, $data->PreRequisite, $data->Major_MajorId, $data->owner, $data->uncontrolledAssess, $data->exams);
    }
    
    
     function getAllCourses() {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from Course where Major_MajorId = 1');
        return $data;
    }
    
// Retrieve all courses from the database
    public static function getCourses() {
    $db = Database::getInstance();
    $q = 'SELECT * FROM Course ORDER BY CourseTitle Asc';
    $data = $db->multiFetch($q);
    return $data;
}

public static function searchCourseWithTitle($searchText, $major, $sort) {
    $db = Database::getInstance();
    if ($major == "All Majors") {
        $q = "SELECT * FROM Course WHERE (CourseCode LIKE '%$searchText%' OR CourseTitle LIKE '%$searchText%' OR ShortTitle LIKE '%$searchText%') ORDER BY CourseTitle $sort";
    } else {
        $q = "SELECT * FROM Course WHERE (CourseCode LIKE '%$searchText%' OR CourseTitle LIKE '%$searchText%' OR ShortTitle LIKE '%$searchText%') AND Major_MajorId = '$major' ORDER BY CourseTitle $sort";
    }
    
    // echo $q; // Uncomment this line for debugging purposes
    $data = $db->multiFetch($q);
    return $data;
}
    
public static function searchCourseNoTitle($major, $sort) {
    $db = Database::getInstance();
    if ($major == "All Majors") {
        $q = "SELECT * FROM Course ORDER BY CourseTitle " . $sort;
    } else {
        $q = "SELECT * FROM Course WHERE Major_MajorId = '" . $major . "' ORDER BY CourseTitle " . $sort;
    }
    
    // echo $q; // Uncomment this line for debugging purposes
    $data = $db->multiFetch($q);
    return $data;
}
    
    //SELECT * FROM Course ORDER BY CourseTitle \'' . Asc . '\'
    //SELECT * FROM Course WHERE Major_MajorId = \'' . 1 . '\' ORDER BY CourseTitle \'' . Asc . '\'
        



//// Search for courses by title and filter by major
//    static function searchByTitleAndFilter($searchText, $filter){
//        $db = Database::getInstance();
//        $mid = MajorBank::getMajorFromName($filter);
//        $query = "SELECT * FROM Course WHERE MATCH(CourseCode, CourseTitle, ShortTitle)"
//                . "AGAINST('*".$searchText."*' AND Major_MajorId = \'' . $mid . '\')";
//        $result = $db->multiFetch($query);    
//        return $result;
//    }
    
//    // Search for courses by title, code and short title
//        static function searchByTitle($searchText){
//        $db = Database::getInstance();
//        $query = "SELECT * FROM Course WHERE MATCH(CourseCode, CourseTitle, ShortTitle)"
//                . "AGAINST('*".$searchText."*' IN BOOLEAN MODE)";
//        $result = $db->multiFetch($query);    
//        return $result;
//    } 

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
    $columnNames = $db->multiFetch('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "Course"');

    $columnMappings = array(
        'Credits' => 'Credits',
        'AssessmentMethod' => 'Assessment Method',
        'CourseAim' => 'Course Aim',
        'PreRequisite' => 'Pre-Requisite',
        'owner' => 'Owner',
        'Year' => 'Year',
        'Semester' => 'Semester',
        'uncontrolledAssess' => 'Uncontrolled Assessment',
        'exams' => 'Exams',
        'CourseCode' => 'Course Code',
        'CourseTitle' => 'Course Title',
        'ShortTitle' => 'Short Title',
        'CourseLevel' => 'Course Level'
    );

    $displayColumnNames = array();

    foreach ($columnNames as $column) {
        $columnName = $column->COLUMN_NAME;
        
        if (isset($columnMappings[$columnName])) {
            $displayColumnName = $columnMappings[$columnName];
            $displayColumnNames[$columnName] = $displayColumnName;
        }
    }

    return $displayColumnNames;
}

// Retrieve all columns of the Course table
//public static function getAllColumns() {
//    $db = Database::getInstance();
//    $data = $db->multiFetch('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS'
//        . ' WHERE TABLE_NAME = "Course"');
//    
//    $columnNames = array();
//    
//    // Define a mapping between original column names and display names
//    $columnMappings = array(
//        'Column1' => 'Display Name 1',
//        'Column2' => 'Display Name 2',
//        'Column3' => 'Display Name 3',
//        // Add more columns and their display names as needed
//    );
//    
//    foreach ($data as $column) {
//        $columnName = $column->COLUMN_NAME;
//        
//        // Check if a display name is defined for the column
//        if (isset($columnMappings[$columnName])) {
//            $displayColumnName = $columnMappings[$columnName];
//        } else {
//            $displayColumnName = $columnName; // Use the original column name as the default display name
//        }
//        
//        $columnNames[] = $displayColumnName;
//    }
//    
//    return $columnNames;
//}
    
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
    echo $q;
    $db->singleFetch($query);
}

    
     function addCourse() {
        try {
            $db = Database::getInstance();
            $sql = "INSERT INTO Course(CourseId, CourseCode , CourseTitle, Major_MajorId) VALUES (NULL, '$this->CourseCode', '$this->CourseTitle', '$this->Major_MajorId')";
          // echo 'Executing SQL: ' . $sql;           
            $data = $db->querySQL($sql);
            return true;
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }

}

}
