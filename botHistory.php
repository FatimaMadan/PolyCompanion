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
$itemsPerPage = 20;
$totalItems = count($userHistory);
$totalPages = ceil($totalItems / $itemsPerPage);
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $itemsPerPage;

// Display history items for the current page
$paginatedHistory = array_slice($userHistory, $offset, $itemsPerPage, true);

// Generate the HTML content for the paginated history
if (!empty($paginatedHistory)) {
    
    // Pagination links at the bottom
echo '<div class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
    $activeClass = ($i === $page) ? 'active' : '';
    $linkStyle = ($activeClass) ? 'background-color: #06BBCC; color: #FFFFFF;' : '';

    echo '<a href="javascript:void(0);" onclick="loadHistory(' . $i . ')" class="btn btn-sm-square" style="' . $linkStyle . '">' . $i . '</a>';
}
echo '</div>'
. '<hr class="date-separator">';


    $prevDate = null;
    foreach ($paginatedHistory as $historyItem) {
        $timestamp = $historyItem->timestamp;
        $date = date('Y-m-d', strtotime($timestamp)); // Extract date from timestamp
        $time = date('h:i A', strtotime($timestamp)); // Extract time from timestamp

        if ($date !== $prevDate) {
            echo '<h4 class="history-date">' . $date . '</h4>
                  <hr class="date-separator">';
            $prevDate = $date;
        }

        echo '<table class="table">
                <tbody>
                    <tr>
                        <td class="time-column">' . $time . '</td>
                        <td class="action-column">' . $historyItem->action . '</td>
                    </tr>
                </tbody>
              </table>';
    }

} else {
    echo '<h4 class="history-date">No data available</h4>
          <hr class="date-separator">
          <table class="table">
              <tbody>
                  <tr>
                      <td class="time-column">No data available</td>
                      <td class="action-column">No data available</td>
                  </tr>
                  <tr>
                      <td class="time-column">No data available</td>
                      <td class="action-column">No data available</td>
                  </tr>
              </tbody>
          </table>';
}


?>
