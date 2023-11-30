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
                Select a question you would like to know the answer to.
                <div class="option-buttons">';

            for ($i = 0; $i < count($result); $i++) {
                echo '<button class="option-button" onclick="ContConvo(\'showAnswer\',' . $result[$i]->FaqId . ')"> ' . $result[$i]->FQuestion . '</button>';
                
            }

            echo '</div> 
            </div>';
        } else {
            echo '<button class="option-button">OPPPs</button>';
        }
    } elseif ($action === 'showAnswer') {
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $quesId = $_GET['Id'];
            $result = FaqBank::getAns($quesId);

            if (!empty($result)) {
                echo '<div class="bot-message">
                    Answering your question:
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
    } elseif ($action === 'majors') {
    // Handle show majors action
    $result = MajorBank::getAllMaj();
    if (!empty($result)) {
        echo '<div class="bot-message">
            In which major is that course?
            <div class="option-buttons">';

        for ($i = 0; $i < count($result); $i++) {
//            echo '<button class="option-button" onclick="ContConvo(\'showCourses\',' . $result[$i]->MajorId . ')">' . $result[$i]->MajorName . '</button>';
            echo '<button class="option-button" onclick="ContConvo(\'showYear\',' . $result[$i]->MajorId . ')">' . $result[$i]->MajorName . '</button>';
            
        }

        echo '</div> 
        </div>';

        echo '<div id="response-container"></div>';

    } else {
        echo '<button class="option-button">OPPPs</button>';
    }
    }  elseif ($action === 'showYear') {
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $majorId = $_GET['Id'];
            //$result = CourseBank::getCoursesByMajor($majorId);

//            if (!empty($result)) {
                echo '<div class="bot-message">
                    In which year?
                    <div class="option-buttons">';

                for ($i = 1; $i <= 4; $i++) {
                    echo '<button class="option-button" onclick="ContConvo(\'showSem\',' . $majorId . ',' . $i . ')"> Year ' . $i . '</button>';
                }

                echo '</div> 
                </div>';

                echo '<div id="response-container"></div>';

//            } else {
//                echo '<button class="option-button">OPPPs</button>';
//            }
        }
    } elseif ($action === 'showSem') {
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $majorId = $_GET['Id'];
            $year = $_GET['column'];
            //$result = CourseBank::getCoursesByMajor($majorId);

//            if (!empty($result)) {
                echo '<div class="bot-message">
                    In which semester?
                    <div class="option-buttons">';

                    echo '<button class="option-button" onclick="showCoursesOnSem(\'showCourses\',' . $majorId . ', ' . $year .' \'A\')"> Semester A </button>';
                    echo '<button class="option-button"> Semester B </button>';
                    
                echo '</div> 
                </div>';

                echo '<div id="response-container"></div>';

//            } else {
//                echo '<button class="option-button">OPPPs</button>';
//            }
        }
    } elseif ($action === 'showCourses') {
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $majorId = $_GET['Id'];
            $result = CourseBank::getCoursesByMajor($majorId);

            if (isset($_GET['year']))
            {
                $year = $GET['year'];
                $result = CourseBank::getCoursesByYear($majorId, $year);
                
                if (isset($_GET['sem']))
                {
                    $sem = $GET['sem'];
                    $result = CourseBank::getCoursesBySem($majorId, $year, $sem);
                }
            }
            
            
            
            if (!empty($result)) {
                echo '<div class="bot-message">
                    Please choose one of the courses below:
                    <div class="option-buttons">';

                for ($i = 0; $i < count($result); $i++) {
                    echo '<button class="option-button" onclick="ContConvo(\'showeCol\',' . $result[$i]->CourseId . ')">' . $result[$i]->CourseTitle . '</button>';
                }

                echo '</div> 
                </div>';

                echo '<div id="response-container"></div>';

            } else {
                echo '<button class="option-button">OPPPs</button>';
            }
        }
    } elseif ($action === 'showeCol') {
    // Handle show courses action
    if (isset($_GET['Id'])) {
        $courseId = $_GET['Id'];
        $result = CourseBank::getCourseCol();

        if (!empty($result)) {
            echo '<div class="bot-message">
                What would you like to know about this course?:
                <div class="option-buttons">';

            for ($i = 0; $i < count($result); $i++) {
                echo '<button class="option-button" onclick="showCourseCol(\'colAns\',' . $courseId . ',\'' . $result[$i]->COLUMN_NAME . '\')">' . $result[$i]->COLUMN_NAME . '</button>';
            }

            echo '</div> 
            </div>';

            echo '<div id="response-container"></div>';

        } else {
            echo '<button class="option-button">OPPPs</button>';
        }
    }
}elseif ($action === 'colAns') {
    // Handle show courses action
    if (isset($_GET['Id'])) {
        $courseId = $_GET['Id'];
        $colName = $_GET['column'];
        $result = CourseBank::getColAns($courseId, $colName);

        if (!empty($result)) {
            echo '<div class="bot-message">
                This is the answer:
                <div class="option-buttons">';
            
            echo '<button class="option-button">' . $result->$colName . '</button>';

            echo '</div> 
            </div>';

            echo '<div id="response-container"></div>';

        } else {
            echo '<button class="option-button">OPPPs, no answer</button>';
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
