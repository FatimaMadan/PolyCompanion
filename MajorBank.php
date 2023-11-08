<?php

class MajorBank{
    
    private $MajorId;
    private $MajorName;

    public function getMajorId() {
        return $this->MajorId;
    }

    public function getMajorName() {
        return $this->MajorName;
    }

    public function setMajorId($MajorId): void {
        $this->MajorId = $MajorId;
    }

    public function setMajorName($MajorName): void {
        $this->MajorName = $MajorName;
    }
    
    function initWith($MajorId, $MajorName) {
    $this->MajorId = $MajorId;
    $this->MajorName = $MajorName;
    
}

    function initWithId($major_id) {
        $db = Database::getInstance();
        $data = $db->singleFetch('SELECT * FROM Major WHERE MajorId = \'' . $major_id .  '\'');
        $this->initWith($data->MajorId, $data->MajorName);
    }

        public static function getAllMaj(){
         $db = Database::getInstance();
        $data = $db->multiFetch('SELECT * FROM Major');
        return $data;
    }
    
    
    
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


