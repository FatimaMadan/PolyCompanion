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


