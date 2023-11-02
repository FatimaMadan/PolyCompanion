<?php


class Files{

    private $FileId;  
    private $FileName;
    private $FileType;
    private $FileLocation;
    private $User_UserId;
    private $Answers_AnsId;
    private $Questions_QuestionId;
    private $QId;

    function getFileId() {
        return $this->FileId;
    }

    function getFileName() {
        return $this->FileName;
    }

    function getFileType() {
        return $this->FileType;
    }

    function getFileLocation() {
        return $this->FileLocation;
    }

    function getUser_UserId() {
        echo "to get user Id";
        return $this->User_UserId;
    }
    
    function getAnswers_AnsId() {
        return $this->Answers_AnsId;
    }
    
     function getQuestions_QuestionId() {
        return $this->Questions_QuestionId;
    }
    function getQId() {
        return $this->QId;
    }

    function setFileId($FileId) {
        $this->FileId = $FileId;
    }

    function setFileName($FileName) {
        $this->FileName = $FileName;
    }

    function setFileType($FileType) {
        $this->FileType = $FileType;
    }

    function setFileLocation($FileLocation) {
        $this->FileLocation = $FileLocation;
    }

    function setUser_UserId($User_UserId) {
        $this->User_UserId = $User_UserId;
    }
    
    function setAnswers_AnsId($Answers_AnsId) {
         $this->Answers_AnsId = $Answers_AnsId;
    }
    
     function setQuestions_QuestionId($Questions_QuestionId) {
         $this->Questions_QuestionId = $Questions_QuestionId;
    }
      function setQId($QId) {
       $this->QId = $QId;
    }
    

    function __construct() {
        $this->FileId = null;
        $this->FileName = null;
        $this->FileType = null;
        $this->FileLocation = null;
        $this->User_UserId = null;
        $this->Answers_AnsId = null;
        $this->Questions_QuestionId = null;
        $this->QId = null;
        
    }

    function deleteFile() {
        try {
            $db = Database::getInstance();
            $data = $db->querySql('Delete from Files where FileId= ' . $this->FileId);
            unlink($this->FileLocation);
            return true;
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }
    }

    function initWithFid($fid) {

        $db = Database::getInstance();
        $data = $db->singleFetch('Select * from Files where FileId = ' . $fid);
        $this->initWith($data->FileId, $data->FileLocation, $data->FileType, $data->FileName, $data->Answers_AnsId, $data->User_UserId, $data->Questions_QuestionId, $data->QId);
       
    }

    function addFile() {

        try {
             $db = Database::getInstance();
            $data = $db->querySql('Insert into Files (FileId,User_UserId, FileName, FileLocation, FileType, Answers_AnsId, Questions_QuestionId, QId) values '
                    . '(NULL, ' . $this->User_UserId . ', \'' . $this->FileName . '\',\'' . $this->FileLocation . '\',\'' .$this->FileType . '\',\'' .$this->Answers_AnsId . '\',\''  .$this->Questions_QuestionId . '\',\''  .$this->QId . '\')');
           
            return true;
        } catch (Exception $e) {
            echo 'Exception: ' . $e;
            return false;
        }
    }

    function initWith($FileId, $FileLocation, $FileType, $FileName, $Answers_AnsId, $User_UserId, $Questions_QuestionId, $QId) {
        $this->FileId = $FileId;
        $this->FileLocation = $FileLocation;
        $this->FileType = $FileType;
        $this->FileName = $FileName;
         $this->Answers_AnsId = $Answers_AnsId;
         $this->User_UserId = $User_UserId;
         $this->Questions_QuestionId = $Questions_QuestionId;
         $this->QId = $QId;
    }

    function updateDB(){
        
        $db = Database::getInstance();
        $data = 'UPDATE Files set 
                 FileLocation = \'' . $this->FileLocation  . '\' ,
                 FileType = \'' . $this->FileType . '\' ,
                 FileName = \'' . $this->FileName . '\' ,
                 Answers_AnsId = \'' . $this->Answers_AnsId  . '\' ,
                 User_UserId = \'' . $this->User_UserId  . '\' ,
                 Questions_QuestionId = \'' . $this->Questions_QuestionId  . '\' ,
                 QId = \'' . $this->QId  . '
                     where FileId = ' .$this->FileId;
        $db->querySql($data);
    }
    
  function getAllFiles(){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Files');
      return $data;
      
  }
  
  function getFileWithAnsid($id){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Files where Answers_AnsId =' . $id);
      return $data;
      
  }
   function getFileWithQuesid($qid){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Files where QId =' . $qid);
      return $data;
      
  }
   function getFileWithQuesidAndUserId($qid, $uid){
    
        $db = Database::getInstance();
        $data = $db->singleFetch("Select * from Files where QId = $qid and User_UserId= $uid");
        $this->initWith($data->FileId, $data->FileLocation, $data->FileType, $data->FileName, $data->Answers_AnsId, $data->User_UserId, $data->Questions_QuestionId, $data->QId);
        return $this;
  }
    
   function getMyFiles(){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Files where User_UserId =' . $this->User_UserId);
      return $data;
      
  }
  function getAnswerFiles(){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Files where Answers_AnsId =' . $this->Answers_AnsId);
      return $data;
      
  }
  
  function getAQuestionFiles(){
      $db = Database::getInstance();
      $data = $db->multiFetch('Select * from Files where QId =' . $this->QId);
      return $data;
      
  }
  
}