<?php
include 'debugging.php';
include 'botBank.php';

if (isset($_GET['messageHistory']) && isset($_GET['uid'])) {
    $mess = $_GET['messageHistory'];
    $user_id = $_GET['uid'];
    
    if ($mess != ""){
        echo 'i am here';
         BotBank::insertHistory($user_id, $mess);
    } 
} elseif (isset($_GET['action']) == 'delHis') {
    $user_id = $_GET['uid'];
    BotBank::deleteHistory($user_id);
}




$uid = $_GET['uid'];

// Retrieve the user history
$userHistory = BotBank::getUserHistory($uid);

// Generate the HTML content for the history
if (!empty($userHistory)) {
  for ($i = 0; $i < count($userHistory); $i++) {
    echo '<h4 class="history-date">'.$userHistory[$i]->timestamp.'</h4>
      <hr class="date-separator">
      <table class="table">
        <tbody>
          <tr>
            <td class="time-column">10:00 AM</td>
            <td class="action-column">'.$userHistory[$i]->action.'</td>
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
