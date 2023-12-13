<?php 

    class BotBank {
    
    private $report_id;
    private $report_timestamp;
    private $action;
    private $clicks;
    
    // Constructor
    public function __construct($report_id, $report_timestamp, $action, $clicks) {
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
   

//    public function generateHourlyReport()
//    {
//        $db = Database::getInstance();
//
//        // Query to generate the hourly report
//        $query = "
//            INSERT INTO bot_reports (report_timestamp, action, clicks)
//            SELECT
//                CURRENT_TIMESTAMP AS report_timestamp,
//                action,
//                COUNT(*) AS clicks
//            FROM
//                bot_history
//            WHERE
//                timestamp >= DATE_SUB(NOW(), INTERVAL 1 HOUR) AND timestamp < NOW()
//            GROUP BY
//                action
//        ";
//
//        $db->singleFetch($query);
//    }
}

?>
