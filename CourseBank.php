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
    private $Year;
    private $sem;

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

    public function getYear() {
        return $this->Year;
    }

    public function getSem() {
        return $this->sem;
    }

    public function setYear($Year): void {
        $this->Year = $Year;
    }

    public function setSem($sem): void {
        $this->sem = $sem;
    }

    static function checkCourseCode($course_code) {
        $db = Database::getInstance();
        $sql = 'SELECT CourseCode FROM Course where CourseCode = \'' . $course_code . '\'';
        $data = $db->singleFetch($sql);

        return $data;
    }

    public function isValid() {
        $errors = [];

        if (empty($this->CourseCode) || strlen($this->CourseCode) != 6) {
            $errors[] = 'Course code must be 6 characters long.';
        }

        if ($this->checkCourseCode($this->CourseCode)) {
            $errors[] = 'Course code already exists.';
        }

        if (empty($this->CourseTitle)) {
            $errors[] = 'Course title is required.';
        }

        if (empty($this->ShortTitle)) {
            $errors[] = 'Short title is required.';
        }

        if (empty($this->CourseLevel) || $this->CourseLevel > 10 || $this->CourseLevel < 1) {
            $errors[] = 'Invalid course level.';
        }

        if (empty($this->Credits) || $this->Credits > 65 || $this->Credits < 5) {
            $errors[] = 'Invalid credits.';
        }

        if (empty($this->uncontrolledAssess)) {
            $errors[] = 'Uncontrolled assessment is required.';
        }

        if (empty($this->exams)) {
            $errors[] = 'Exams field is required.';
        }

        if (empty($this->AssessmentMethod)) {
            $errors[] = 'Assessment method is required.';
        }

        if (empty($this->CourseAim)) {
            $errors[] = 'Course aim is required.';
        }

        if (empty($this->PreRequisite)) {
            $errors[] = 'Pre-requisite is required.';
        }

        if (empty($this->Major_MajorId)) {
            $errors[] = 'Major ID is required.';
        }

        return $errors;
    }

    function addCourse() {

        $errors = $this->isValid();

        if (count($errors) === 0) {
            try {
                // Insert the course into the database
                // ...
                $db = Database::getInstance();
                $sql = "INSERT INTO Course (CourseId, CourseCode, CourseTitle, ShortTitle, CourseLevel, Credits, uncontrolledAssess, exams, AssessmentMethod, CourseAim, PreRequisite, Major_MajorId, owner, Year, Semester) 
        VALUES (NULL, '$this->CourseCode', '$this->CourseTitle', '$this->ShortTitle', '$this->CourseLevel', '$this->Credits',"
                        . " '$this->uncontrolledAssess', '$this->exams', '$this->AssessmentMethod', '$this->CourseAim', "
                        . "'$this->PreRequisite', '$this->Major_MajorId', '$this->owner', '$this->Year',  '$this->sem')";
                echo 'Executing SQL: ' . $sql;

                $data = $db->querySQL($sql);

                return true;
            } catch (Exception $e) {
                $error_message = 'Exception: ' . $e->getMessage();
                // Display the error message to the user or handle it as needed
                echo $error_message;
                return false;
            }
        } else {
            $error_message = implode('<br>', $errors);
            // Display the error message to the user or handle it as needed
            echo $error_message;
            return false;
        }
    }

    function initWithCTitle($title) {
        echo "Init with CourseTitle";
        $db = Database::getInstance();
        $data = $db->multiFetch("SELECT * FROM Course WHERE CourseTitle = '" . $title . "'");
        return $data;
    }

    public function initWithMid($mid) {
        $db = Database::getInstance();
        $data = $db->multiFetch("Select * from Course where Major_MajorId = " . $mid);
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
        $data = $db->singleFetch('SELECT * FROM Course WHERE CourseId = \'' . $course_id . '\'');
        $this->initWith($data->CourseId, $data->CourseCode, $data->CourseTitle, $data->ShortTitle, $data->CourseLevel, $data->ValidFrom, $data->Credits, $data->AssessmentMethod, $data->CourseAim, $data->PreRequisite, $data->Major_MajorId, $data->owner, $data->uncontrolledAssess, $data->exams);
    }
    
     function initForEdit($course_id) {
        $db = Database::getInstance();
        $data = $db->singleFetch('SELECT * FROM Course WHERE CourseId = \'' . $course_id . '\'');
        $this->initWith($data->CourseId, $data->CourseCode, $data->CourseTitle, $data->ShortTitle, $data->CourseLevel, $data->ValidFrom, $data->Credits, $data->AssessmentMethod, $data->CourseAim, $data->PreRequisite, $data->Major_MajorId, $data->owner, $data->uncontrolledAssess, $data->exams, $data->Year, $data->sem);
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

    // Retrieve the outcomes of a course based on CourseId
    public static function getOutcomes($CourseId) {
        $db = Database::getInstance();
        $data = $db->multiFetch('SELECT * FROM CLO WHERE CourseId = \'' . $CourseId . '\'');
        return $data;
    }

    public static function deleteOutcomes($CourseId) {
        $db = Database::getInstance();
        $outcomes = explode('*', $CLO);
        foreach ($outcomes as $outcome) {
            $outcome = trim($outcome);
            if (!empty($outcome)) {
                $q = ("Delete * form CLO WHERE CourseId = \'' . $CourseId . '\'");
                echo $q;
                $data = $db->singleFetch($q);
            }
        }
    }
    
    public static function addOutcomes($CLO, $CourseId) {
        $db = Database::getInstance();
        $outcomes = explode('*', $CLO);
        foreach ($outcomes as $outcome) {
            $outcome = trim($outcome);
            if (!empty($outcome)) {
                $q = ("INSERT INTO CLO (CourseID, OutcomeDescription) VALUES ('$CourseId', '$outcome')");
                echo $q;
                $data = $db->singleFetch($q);
            }
        }
    }

    // Retrieve courses belonging to the specified major
    public static function getCoursesByMajor($major_id) {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from Course WHERE Major_MajorId = \'' . $major_id . '\'');
        return $data;
    }

    public static function getCoursesByYear($major_id, $year) {
        $db = Database::getInstance();
        $data = $db->multiFetch('Select * from Course WHERE Major_MajorId = \'' . $major_id . '\''
                . 'AND Year=  \'' . $year . '\'');
        return $data;
    }

    // Retrieve courses belonging to the specified major, year, and semester
    public static function getCoursesBySem($major_id, $year, $sem) {

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

    public static function getColAns($courseId, $colName) {
        $db = Database::getInstance();
        $query = 'SELECT ' . $colName . ' FROM Course WHERE CourseId = \'' . $courseId . '\'';
        $data = $db->singleFetch($query);
        return $data;
    }

    public static function getCourseCol() {
        $db = Database::getInstance();
        $data = $db->multiFetch("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Course'");
        return $data;
    }

    public static function getCourseName($course_id) {

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

//        private $CourseId;
//        private $CourseCode;
//        private $CourseTitle;
//        private $ShortTitle;
//        private $CourseLevel;
//        private $ValidFrom;
//        private $Credits;
//        private $uncontrolledAssess;
//        private $exams;
//        private $AssessmentMethod;
//        private $CourseAim;
//        private $PreRequisite;
//        private $Major_MajorId;
//        private $owner;
//        private $COLUMN_NAME;
//        



    function getMaxCourseId() {
        $db = Database::getInstance();
        $sql = "SELECT MAX(CourseId) AS MaxCourseId FROM Course";
        $data = $db->singleFetch($sql);

        return (int) $data->MaxCourseId;
    }

}
