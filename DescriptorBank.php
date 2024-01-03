<?php


class DescriptorBank{

    private $FileId;  
    private $FileName;
    private $FileType;
    private $FileLocation;
    private $User_UserId;
    private $CourseId;


    public function getFileId() {
        return $this->FileId;
    }

    public function getFileName() {
        return $this->FileName;
    }

    public function getFileType() {
        return $this->FileType;
    }

    public function getFileLocation() {
        return $this->FileLocation;
    }

    public function getUser_UserId() {
        return $this->User_UserId;
    }


    public function setFileId($FileId): void {
        $this->FileId = $FileId;
    }

    public function setFileName($FileName): void {
        $this->FileName = $FileName;
    }

    public function setFileType($FileType): void {
        $this->FileType = $FileType;
    }

    public function setFileLocation($FileLocation): void {
        $this->FileLocation = $FileLocation;
    }

    public function setUser_UserId($User_UserId): void {
        $this->User_UserId = $User_UserId;
    }
    
    public function getCourseId() {
        return $this->CourseId;
    }

    public function setCourseId($CourseId): void {
        $this->CourseId = $CourseId;
    }

    

        
    function __construct() {
        $this->FileId = null;
        $this->FileName = null;
        $this->FileType = null;
        $this->FileLocation = null;
        $this->User_UserId = null;
        $this->CourseId = null;
    }


    function initWithFid($fid) {

        $db = Database::getInstance();
        $data = $db->singleFetch('Select * from Descriptor where FileId = ' . $fid);
        $this->initWith($data->FileId, $data->FileLocation, $data->FileType, $data->FileName, $data->User_UserId, $data->CourseId);
       
    }

function addFile() {
    try {
        $db = Database::getInstance();

        if ($this->getDescWithCId($this->CourseId) == "") {
            $sql = 'INSERT INTO Descriptor (FileId, User_UserId, FileName, FileLocation, FileType, CourseId) VALUES '
                . '(NULL, ' . $this->User_UserId . ', \'' . $this->FileName . '\', \'' . $this->FileLocation . '\', \'' . $this->FileType . '\', \'' . $this->CourseId . '\')';
            $data = $db->querySql($sql);
        } else {
            $sql = 'UPDATE Descriptor SET User_UserId = ' . $this->User_UserId . ', FileName = \'' . $this->FileName . '\', FileLocation = \'' . $this->FileLocation . '\', FileType = \'' . $this->FileType . '\' WHERE CourseId = ' . $this->CourseId;
            $data = $db->querySql($sql);
        }

        return true;
    } catch (Exception $e) {
        echo 'Exception: ' . $e;
        return false;
    }
}

    function initWith($FileId, $FileLocation, $FileType, $FileName, $User_UserId, $CourseId) {
        $this->FileId = $FileId;
        $this->FileLocation = $FileLocation;
        $this->FileType = $FileType;
        $this->FileName = $FileName;
        $this->User_UserId = $User_UserId;
        $this->CourseId = $CourseId;
    }

      function updateDB(){
        
        $db = Database::getInstance();
        $data = 'UPDATE Descriptor set 
                 FileLocation = \'' . $this->FileLocation  . '\' ,
                 FileType = \'' . $this->FileType . '\' ,
                 FileName = \'' . $this->FileName . '\' ,
                 User_UserId = \'' . $this->User_UserId  . '\' ,
                     CourseId = \'' . $this->CourseId  . '\' ,
                     where FileId = ' .$this->FileId;
        $db->querySql($data);
    }
    
  
   function getDescWithCId($cid){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Descriptor where CourseId =' . $cid);
      return $data;
      
  }
  
     function getFileWithCourseid($cid){
      $db = Database::getInstance();
      $data = $db->singleFetch('Select * from Descriptor where CourseId =' . $cid);
      return $data;
      
  }
  
  function getFileWithcourseIdAndUserId($cid, $uid){
    
        $db = Database::getInstance();
        $data = $db->singleFetch("Select * from Descriptor where CourseId = $cid and User_UserId= $uid");
        $this->initWith($data->FileId, $data->FileLocation, $data->FileType, $data->FileName, $data->User_UserId, $data->CourseId);
        return $this;
        
  }
  
}