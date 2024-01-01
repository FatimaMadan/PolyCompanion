<?php 

    class BotReports {
    
    private $report_id;
    private $report_timestamp;
    private $action;
    private $clicks;
    
        public function __construct() {
        $this->report_id = null;
        $this->report_timestamp = null;
        $this->action = null;
        $this->clicks = null;
       
    }
    
    // Constructor
    public function initWith($report_id, $report_timestamp, $action, $clicks) {
        $this->report_id = $report_id;
        $this->report_timestamp = $report_timestamp;
        $this->action = $action;
        $this->clicks = $clicks;
    }
    
    // Getters
    public function getReportId() {
        return $this->report_id;
    }
    
    public function getReportTimestamp() {
        return $this->report_timestamp;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getClicks() {
        return $this->clicks;
    }
    
    // Setters
    public function setReportId($report_id) {
        $this->report_id = $report_id;
    }
    
    public function setReportTimestamp($report_timestamp) {
        $this->report_timestamp = $report_timestamp;
    }
    
    public function setAction($action) {
        $this->action = $action;
    }
    
    public function setClicks($clicks) {
        $this->clicks = $clicks;
    }

    public static function getTodaysAccess($action) {
         $db = Database::getInstance();
   $query = "SELECT SUM(clicks) AS click_count FROM bot_reports "
           . "WHERE action = '" . $action . "' AND DATE(report_date) = CURDATE()";
            $data = $db->singleFetch($query);
    return $data;
    }

}

?>
