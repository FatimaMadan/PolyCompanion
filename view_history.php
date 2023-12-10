<?php
ob_start();
include 'debugging.php';
include 'botBank.php';
include 'header.php';


 if (empty($_SESSION['uid'])) {
     // User is not logged in, redirect to login page
     echo $_SESSION['username'];
     header("Location: Login.php");
     exit();
 }
?>


<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="width: 100%;">
      <h6 class="section-title bg-white text-start text-primary pe-3">About you</h6>
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Polybot History</h1>
        <button class="btn btn-link">
          <p class="delete_btn"><i class="fas fa-trash-alt"></i> Clear My History</p>
        </button>
      </div>
      <div class="history-div">
      <?php
      $userHistory = BotBank::getUserHistory($_SESSION['uid']);
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
                        ?>
      </div>
    </div>
  </div>
</div>
<!-- About End -->

<style>
    .delete_btn {
     margin-bottom: 0; 
     margin-top: revert;
}

.history-div {
  border: 1px solid #ddd;
  padding: 20px;
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
}

.history-date {
  font-size: 24px;
  margin-bottom: auto;
}

.date-separator {
  border-top: 1px dashed #ddd;
  margin-bottom: 10px;
}

.time-column {
  color: #999;
}

.action-column {
  text-align: left;
  padding-right: 20px;
}

.table {
  border-collapse: separate;
  border-spacing: 0;
}

.table td {
  text-align: left;
  border-top: none;
  width: 20%
}

.table td:first-child {
  padding-left: 0;
}

.table td:last-child {
  padding-right: 0;
}
</style>


<?php
include 'footer.php';
?>