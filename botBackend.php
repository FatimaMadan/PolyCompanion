<?php

include 'debugging.php';

// Include the necessary files and setup database connection onclick="ContConvo(\'showAnswer\',' . $result[$i]->MajorId . ')">'

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'faq') {
        // Handle show FAQ action
        $result = FaqBank::getAllFaqs();
        if (!empty($result)) {
            echo '<div class="bot-message">
                Please choose one of the questions below:
                <div class="option-buttons">';

            for ($i = 0; $i < count($result); $i++) {
                echo '<button class="option-button" onclick="ContConvo(\'showAnswer\',' . $result[$i]->FaqId . ')"> ' . $result[$i]->FQuestion . '</button>';
                
            }

            echo '</div> 
            </div>';
        } else {
            echo '<button class="option-button">OPPPs</button>';
        }
    } elseif ($action === 'majors') {
    // Handle show majors action
    $result = MajorBank::getAllMaj();
    if (!empty($result)) {
        echo '<div class="bot-message">
            Please choose one of the majors below:
            <div class="option-buttons">';

        for ($i = 0; $i < count($result); $i++) {
            echo '<button class="option-button" onclick="ContConvo(\'showCourses\',' . $result[$i]->MajorId . ')">' . $result[$i]->MajorName . '</button>';
        }

        echo '</div> 
        </div>';

        echo '<div id="response-container"></div>';

    } else {
        echo '<button class="option-button">OPPPs</button>';
    }
    } elseif ($action === 'showCourses') {
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $majorId = $_GET['Id'];
            $result = CourseBank::getCoursesByMajor($majorId);

            if (!empty($result)) {
                echo '<div class="bot-message">
                    Please choose one of the courses below:
                    <div class="option-buttons">';

                for ($i = 0; $i < count($result); $i++) {
                    echo '<button class="option-button" onclick="sendMessage(\'show\')">' . $result[$i]->CourseTitle . '</button>';
                }

                echo '</div> 
                </div>';

                echo '<div id="response-container"></div>';

            } else {
                echo '<button class="option-button">OPPPs</button>';
            }
        }
    } elseif ($action === 'showAnswer') {
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $quesId = $_GET['Id'];
            $result = FaqBank::getAns($quesId);

            if (!empty($result)) {
                echo '<div class="bot-message">
                    This is the answer:
                    <div class="option-buttons">';

//                for ($i = 0; $i < count($result); $i++) {
                    echo '<button class="option-button">' . $result->FAnswer . '</button>';
//                }

                echo '</div> 
                </div>';

                echo '<div id="response-container"></div>';

            } else {
                echo '<button class="option-button">OPPPs</button>';
            }
        }
    }
    else {
        // Invalid action
        echo 'Invalid action.';
    } 
} 
else {
    // No action specified
    echo 'No action specified.';
}




    
    
?>
