<?php
include 'debugging.php';
include 'botBank.php';

if (isset($_GET['messageHistory']) && isset($_GET['uid'])) {
    $mess = $_GET['messageHistory'];
    $user_id = $_GET['uid'];
    
    if ($mess != ""){
         BotBank::insertHistory($user_id, $mess);
    } 
} elseif (isset($_GET['action']) == 'delHis') {
    $user_id = $_GET['uid'];
    BotBank::deleteHistory($user_id);
}

$uid = $_GET['uid'];

// Retrieve the user history
$userHistory = BotBank::getUserHistory($uid);

// Group history items by date
$groupedHistory = [];
foreach ($userHistory as $historyItem) {
    $timestamp = $historyItem->timestamp;
    $date = date('Y-m-d', strtotime($timestamp)); // Extract date from timestamp

    if (!isset($groupedHistory[$date])) {
        $groupedHistory[$date] = [];
    }

    $groupedHistory[$date][] = $historyItem;
}

// Pagination
$itemsPerPage = 10;
$totalItems = count($userHistory);
$totalPages = ceil($totalItems / $itemsPerPage);
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $itemsPerPage;

// Display history items for the current page
$paginatedHistory = array_slice($userHistory, $offset, $itemsPerPage, true);

// Generate the HTML content for the paginated history
if (!empty($paginatedHistory)) {
    $prevDate = null;
    foreach ($paginatedHistory as $historyItem) {
        $timestamp = $historyItem->timestamp;
        $date = date('Y-m-d', strtotime($timestamp)); // Extract date from timestamp
        $time = date('h:i A', strtotime($timestamp)); // Extract time from timestamp

        if ($date !== $prevDate) {
            echo '<div class="history-date">' . $date . '</div>';
            $prevDate = $date;
        }

        echo '<div class="history-item">
                <p class="time-column">' . $time . '</p>
                <p class="action-column">' . $historyItem->action . '</p>
              </div>';
    }

    // Pagination links in the response header
    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="javascript:void(0);" onclick="loadHistory(' . $i . ')">' . $i . '</a>';
    }
    echo '</div>';
} else {
    echo '<p class="no-data-message">No data available</p>';
}