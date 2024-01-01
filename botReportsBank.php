<?php

class BotReports {

    private $report_id;
    private $action;
    private $clicks;
    private $report_hour;
    private $report_date;

    public function __construct() {
        $this->report_id = null;
        $this->report_hour = null;
        $this->report_date = null;
        $this->action = null;
        $this->clicks = null;
    }

    // Constructor
    public function initWith($report_id, $report_hour, $report_date, $action, $clicks) {
        $this->report_id = $report_id;
        $this->report_hour = $report_hour;
        $this->report_date = $report_date;
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
                . "WHERE action = '" . $action . "' "
                . "AND DATE(report_date) = CURDATE()";
        $data = $db->singleFetch($query);
        return $data;
    }

    public static function getWeekAccess($action) {
        $db = Database::getInstance();
        $query = "SELECT SUM(clicks) AS click_count FROM bot_reports "
                . "WHERE action = '" . $action . "' "
                . "AND YEARWEEK(report_date) = YEARWEEK(CURDATE())";
        $data = $db->singleFetch($query);
        return $data;
    }

    public static function getMonthAccess($action) {
        $db = Database::getInstance();
        $query = "SELECT SUM(clicks) AS click_count FROM bot_reports "
                . "WHERE action = '" . $action . "' "
                . "AND report_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
        $data = $db->singleFetch($query);
        return $data;
    }

    public static function getAllWeekAccess() {
        $db = Database::getInstance();
        $query = "SELECT SUM(clicks) AS click_count FROM bot_reports "
                . "WHERE YEARWEEK(report_date) = YEARWEEK(CURDATE())";
        $data = $db->singleFetch($query);
        return $data;
    }

    public static function getHourAccess($sort) {
        $db = Database::getInstance();
        $query = "SELECT report_hour FROM bot_reports "
                . "GROUP BY report_hour "
                . "ORDER BY SUM(clicks) " . $sort . " LIMIT 1";
        $data = $db->singleFetch($query);

        return $data;
    }

    public static function getHighDayAccess() {
        $db = Database::getInstance();
        $query = "SELECT report_date FROM bot_reports "
                . "GROUP BY report_date "
                . "ORDER BY SUM(clicks) DESC LIMIT 1";
        $data = $db->singleFetch($query);
        return $data;
    }

}

?>
