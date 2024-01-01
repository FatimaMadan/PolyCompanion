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
 
 $uid = $_SESSION['uid'];
?>

<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="width: 100%;">
      <h6 class="section-title bg-white text-start text-primary pe-3">About you</h6>
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Polybot History</h1>
        <button class="btn btn-link" onclick="deleteHis(<?php echo $uid; ?>, 'delHis')">
          <p class="delete_btn"><i class="fas fa-trash-alt"></i> Clear My History</p>
        </button>
      </div>
      <div class="history-div" id="history-results">
      </div>
      <div class="pagination" id="pagination-container">
      </div>
    </div>
  </div>
</div>
<!-- About End -->

<script>
    // Initial page load
    loadHistory(1);

    function loadHistory(page) {
        // Create an AJAX request
        var xhttp = new XMLHttpRequest();

        // Define the callback function to handle the response
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content of the history-results container
                document.getElementById("history-results").innerHTML = this.responseText;
                // Update the pagination container
                document.getElementById("pagination-container").innerHTML = this.getResponseHeader("pagination");
            }
        };

        // Specify the AJAX request details
        xhttp.open("GET", "botHistory.php?uid=<?php echo $uid; ?>&page=" + page, true);
        xhttp.send();
    }


function deleteHis(uid, action) {
  // Display a confirmation message to the user
  var confirmed = confirm("Are you sure you want to clear your history? This action cannot be undone.");

  // Proceed with deletion if the user confirms
  if (confirmed) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response from the server if needed
        console.log(xhr.responseText);

        loadHistory();
      }
    };

    var url = "botHistory.php?uid=" + uid + "&action=" + action;
    xhr.open("GET", url, true);
    xhr.send();
  }
}

</script>
    
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