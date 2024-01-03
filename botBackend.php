<?php

include 'debugging.php';

// Include the necessary files and setup database connection onclick="ContConvo(\'showAnswer\',' . $result[$i]->MajorId . ')">'

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'faq') {
        // Echo user message
            echo '<div class="user-message">I want to see the Most Frequently Asked Questions</div>';
            
        // Handle show FAQ action
        $result = FaqBank::getAllFaqs();
        if (!empty($result)) {
            
             
            echo '<div class="bot-message">
                Select a question you would like to know the answer to.
                <div class="option-buttons">';

            for ($i = 0; $i < count($result); $i++) {
                echo '<button class="option-button" onclick="ContConvoCallBack(\'showAnswer\', ' . $result[$i]->FaqId . ', function() { sendMessage(\'help\'); })">' . $result[$i]->FQuestion . '</button>';
            }

            echo '</div> 
            </div>';
        } echo '<div class="bot-message">
            Oppp, No question are available.<br>
            For any complains or suggestions click on the contact button below.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                </div>
            
            </div>';
    } elseif ($action === 'showAnswer') {
          
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $quesId = $_GET['Id'];
            $result = FaqBank::getAns($quesId);
            
            // Echo user message
            echo '<div class="user-message">'.  $result->FQuestion .'</div>';
          
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
                // Make an HTTP request to trigger the sendMessage function on the client-side
            echo '<script>sendMessage(\'help\');</script>';
            
            } else {
                echo '<div class="bot-message">
            Oppp, I do not know the answer to that.<br>
            For any complains or suggestions click on the contact button below.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                </div>
            
            </div>';
            }
        }
            
    } elseif ($action === 'majors') {
        // Echo user message
            echo '<div class="user-message">I have a question about a specific course</div>';
         
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
        echo '<div class="bot-message">
            Oppp, There are not any majors yet.<br>
            For any complains or suggestions click on the contact button below.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                </div>
            
            </div>';
    }
    }  elseif ($action === 'showYear') {
        
        
        // Handle show courses action
        if (isset($_GET['Id'])) {
            $majorId = $_GET['Id'];
            $result = MajorBank::getName($majorId);

            
            // Echo user message
            echo '<div class="user-message">'.  $result->MajorName .'</div>';
            
            
//            if (!empty($result)) {
                echo '<div class="bot-message">
                    In which year?
                    <div class="option-buttons">';

                for ($i = 1; $i <= 4; $i++) {
                    echo '<button class="option-button" onclick="showCourseCol(\'showSem\',' . $majorId . ',' . $i . ')"> Year ' . $i . '</button>';
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

            // Echo user message
            echo '<div class="user-message"> Year '.  $year .'</div>';
            
//            if (!empty($result)) {
                echo '<div class="bot-message">
                    In which semester?
                    <div class="option-buttons">';

                    echo '<button class="option-button" onclick="showCoursesOnSem(\'showCourses\',' . $majorId . ', ' . $year .' ,\'A\')"> Semester A </button>';
                    echo '<button class="option-button" onclick="showCoursesOnSem(\'showCourses\',' . $majorId . ', ' . $year .' ,\'B\')"> Semester B </button>';
                    
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
                $year = $_GET['year'];
                $result = CourseBank::getCoursesByYear($majorId, $year);
                
                if (isset($_GET['sem']))
                {
                    $sem = $_GET['sem'];
                    $result = CourseBank::getCoursesBySem($majorId, $year, $sem);
                    
                    // Echo user message
            echo '<div class="user-message"> Semester '.  $sem .'</div>';
            
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

            } else { echo '<div class="bot-message">
            Oppp, there are not any courses here.<br>
            For any complains or suggestions click on the contact button below.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                </div>
            
            </div>';
        }
    } }elseif ($action === 'showeCol') {
    // Handle show courses action
    if (isset($_GET['Id'])) {
        $courseId = $_GET['Id'];
        $result = CourseBank::getCourseCol();
        $name = CourseBank::getCourseName($courseId);
        $displayColumns = CourseBank::getAllColumns(); // Replace YourClassName with the actual class name
        
        // Echo user message
        echo '<div class="user-message">'. $name->CourseTitle .'</div>';
        
        if (!empty($result)) {
            echo '<div class="bot-message">
                What would you like to know about this course?
                <div class="option-buttons">';
                
            foreach ($result as $row) {
                $columnName = $row->COLUMN_NAME;

                if (isset($displayColumns[$columnName])) {
                    $displayColumnName = $displayColumns[$columnName];
                    echo '<button class="option-button" onclick="showCourseCol(\'colAns\',' . $courseId . ',\'' . $columnName . '\', function() { sendMessage(\'help\'); })">' . $displayColumnName . '</button>';
                }
            }
            
            echo '</div>
            </div>';

            echo '<div id="response-container"></div>';
            
            
            
             echo '<div class="bot-message">
                Or if you would like, you can access this coures realted page using the buttuon below
            <div class="option-buttons">';
                    echo '<a href="inquiry.php?courseId= ' . $courseId . '"> <button class="option-button" > Ask Away </button>';
                    echo '<a href="singleCourse.php?cid= ' . $courseId . '"> <button class="option-button" >'.$name->CourseTitle.' page</button>';
            
            echo '</div>
            </div>';

            echo '<div id="response-container"></div>';
        } else {
            echo '<div class="bot-message">
            Oppp, I do not have any information about this course.<br>
            For any complains or suggestions click on the contact button below.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                </div>
            
            </div>';
        }
    }
} elseif ($action === 'colAns') {
    // Handle show courses action
    if (isset($_GET['Id'])) {
        $courseId = $_GET['Id'];
        $colName = $_GET['column'];
        $result = CourseBank::getColAns($courseId, $colName);

        // Echo user message
            echo '<div class="user-message">'.  $colName .'</div>';
            
        if (!empty($result)) {
            echo '<div class="bot-message">
                This is the answer:
                <div class="option-buttons">';
            
            echo '<button class="option-button">' . $result->$colName . '</button>';

            echo '</div> 
            </div>';

            echo '<div id="response-container"></div>';

        } else {
           echo '<div class="bot-message">
            Oppp, I do not know the answer to that.<br>
            For any complains or suggestions click on the contact button below.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                </div>
            
            </div>';
        }
    }
} elseif ($action === 'help') {
    // Handle show courses action
            echo '<div class="bot-message">
                Would you like me to help you with anything else?
                <div class="option-buttons">';
            
            echo '<button class="option-button" onclick="sendMessage(\'restart\')"> Yes </button>';
            echo '<button class="option-button" onclick="sendMessage(\'rate\')"> No </button>';

            echo '</div> 
            </div>';

            echo '<div id="response-container"></div>';


} elseif($action === 'restart') {
    
            // Echo user message
            echo '<div class="user-message"> Yes </div>';
            
    
     echo '<div class="bot-message">
                How can I help you today?
                <div class="option-buttons">
                    <button class="option-button" onclick="sendMessage(\'faq\')">I want to see the Most Frequently Asked Questions</button>
                    <button class="option-button" onclick="sendMessage(\'majors\')">I have a question about a specific course</button>
                </div>
            </div>';
     echo '<div id="response-container"></div>';
     
} elseif($action === 'rate') {
    
     // Echo user message
            echo '<div class="user-message"> No </div>';
            
     echo '<div class="bot-message">
                Very glad I was able to help you today. Do not forget to rate your experience.
                <div class="option-buttons">
                    <button class="option-button" onclick="sendMessage(\'helpful\')">Very helpful</button>
                    <button class="option-button" onclick="sendMessage(\'nothelp\')">Not helpful</button>
                </div>
            </div>';
     echo '<div id="response-container"></div>';
} elseif($action === 'helpful') {
    
     // Echo user message
            echo '<div class="user-message"> Very helpful </div>';
            
     echo '<div class="bot-message">
                Very glad I was able to help you today. <br> Ready to rescue you whenever you want! 😎✨
            </div>';
     echo '<div id="response-container"></div>';
} elseif($action === 'nothelp') {
    
     // Echo user message
            echo '<div class="user-message"> Not helpful </div>';
            
     echo '<div class="bot-message">
                I am very sorry to hear that. <br>
                Hope I can guid you next time.
                
            </div><br>';
     
     echo '<div class="bot-message">
                For any complains or suggestions click on the contact button below or you can access the ask away page to publish your question.<br>
                <div class="option-buttons">
                    <button class="option-button"><a href="contact.php">Contact us</a></button>
                    <button class="option-button"><a href="inquiry.php">Ask Away</a></button>
                </div>
            </div>';
     echo '<div id="response-container"></div>';
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
