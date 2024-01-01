<?php

class BotBank{
    private $convo_id;
    private $user_id;
    private $timestamp;
    private $action;

    // Constructor
    public function __construct($convo_id, $user_id, $timestamp, $action) {
        $this->convo_id = $convo_id;
        $this->user_id = $user_id;
        $this->timestamp = $timestamp;
        $this->action = $action;
    }

    // Getters and Setters
    public function getConvoId() {
        return $this->convo_id;
    }

    public function setConvoId($convo_id) {
        $this->convo_id = $convo_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
    }
    
    static function insertHistory($user_id, $action) {
    $db = Database::getInstance();
    $query = "INSERT INTO bot_history (user_id, action) VALUES ('$user_id', '$action')";
    $data = $db->singleFetch($query);
    echo $query;
    
}

static function getUserHistory($user_id) {
    $db = Database::getInstance();
    $data = $db->multiFetch('SELECT * FROM bot_history WHERE user_id = \'' . $user_id . '\' ORDER BY timestamp DESC LIMIT 200');
    return $data;
}

static function deleteHistory($user_id) {
        $db = Database::getInstance();
        $db->singleFetch('Delete from bot_history where user_id  = \'' . $user_id . '\''); 
}
    }
    
    
