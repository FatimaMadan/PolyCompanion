<?php

include 'debugging.php';
// Include the necessary files and setup database connection


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'faq') {
        // Handle show FAQ action
        echo 'faq';
        
    } elseif ($action === 'majors') {
        // Handle show majors action
        $result = MajorBank::getAllMaj();
        if (!empty($result)) {
             echo '<div class="bot-message">
                 <div class="option-buttons">
        Please choose one of the courses below:';
        
                        for ($i = 0; $i < count($result); $i++) {
                           
        echo '<button class="option-button">'.$result[$i]->MajorName.'</button>';
        }
        echo '</div> 
        </div>';
                        } else {
                        echo '<button class="option-button"> OPPPs </button>';
                    }
            

        
    } else {
        // Invalid action
        echo 'Invalid action.';
    }
    
} else {
    // No action specified
    echo 'No action specified.';
}



?>
                        
