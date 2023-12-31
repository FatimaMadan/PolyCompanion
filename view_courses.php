<?php
ob_start();
include 'debugging.php';
include 'header.php';


 if (empty($_SESSION['uid'])) {
     // User is not logged in, redirect to login page
     echo $_SESSION['username'];
     header("Location: Login.php");
     exit();
 }
?>            

<script>
        // Get the current page URL
        var url = window.location.href;

        // Check each menu item's URL against the current page URL
        var menuItems = document.querySelectorAll('.nav-item.nav-link');
        menuItems.forEach(function(item) {
            if (item.href === url) {
                item.classList.add('active'); // Add the 'active' class to the matching menu item
            }
        });
</script><!-- comment -->

<style>
    .course-title {
        height: 3.6em;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        margin-bottom: 0;
    }
    
</style><!-- comment -->

<script>
    
   function searchCourse(str) {
       
    //create the AJAX request object
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           document.getElementById("searchResult").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "search.php?title=" + str, true);
    xmlhttp.send();
}

function getSelectedOption() {
    var selectedOption = document.querySelector('.dropdown-item.active');
    if (selectedOption) {
        return selectedOption.innerText;
    }
    return "All Majors"; // Default option if none is selected
}
</script>

<script>
    function selectOption(option) {
        // Remove active class from all dropdown items
        var dropdownItems = document.getElementsByClassName("dropdown-item");
        for (var i = 0; i < dropdownItems.length; i++) {
            dropdownItems[i].classList.remove("active");
        }

        // Add active class to the selected option
        var selectedOption = document.querySelector('a[href="#"][onclick="selectOption(\'' + option + '\')"]');
        selectedOption.classList.add("active");
    }
</script>


<script>
    var selectedFilter = "All Majors"; // Variable to store selected filter option

    function selectOption(option) {
        selectedFilter = option; // Update the selected filter option

        // Remove active class from all dropdown items
        var dropdownItems = document.getElementsByClassName("dropdown-item");
        for (var i = 0; i < dropdownItems.length; i++) {
            dropdownItems[i].classList.remove("active");
        }

        // Add active class to the selected option
        var selectedOption = document.querySelector('a[href="#"][onclick="selectOption(\'' + option + '\')"]');
        selectedOption.classList.add("active");

        // Perform the search with the updated filter option
        searchCourse(document.getElementById("searchText").value);
    }

    // Rest of your JavaScript code...
</script>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                    <nav aria-label="breadcrumb">
                        <p class="breadcrumb-item text-white">Welcome! Dive into a world of knowledge with our diverse range of captivating courses this semester. <br> <b>Explore, learn, and thrive!</b></p>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Courses Start -->
        <div class="container">
				<div class="row"> <!--search part-->
							
                                                <div class="row g-4 justify-content-center">
                                                   <form class="search" autocomplete="off" action="search.php">
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="searchText" oninput="searchCourse(this.value)" class="form-control" placeholder="Type something here">
            <div class="input-group-btn">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
            <div class="input-group-btn" style="margin-left: 10px;">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="filterDropdown">
                        <!-- Add your filter options here -->
                        <a class="dropdown-item active" href="#" onclick="selectOption('All Majors')">All Majors</a>
                        <?php
                        $AllMajors = MajorBank::getAllMaj();
                        if (!empty($AllMajors)) {
                            for ($i = 0; $i < count($AllMajors); $i++) {
                                echo '<a class="dropdown-item" href="#" onclick="selectOption(\''.$AllMajors[$i]->MajorName.'\')">'.$AllMajors[$i]->MajorName.'</a>';
                            }
                        } else {
                            echo '<a class="dropdown-item" href="#">opppps</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="input-group-btn" style="margin-left: 10px;">
                <button class="btn btn-primary"><i class="fas fa-sort"></i></button>
            </div>
            <div class="input-group-btn" style="margin-left: 10px;">
                <a href="AddCourse.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
</form>
                                                    
                                                    
                                                </div>
				</div> <!--end search part-->
						<div class="row">
                                                    
<div class="row g-4 justify-content-center" id="searchResult">
    <?php
    $list = CourseBank::getCourses();

    // Check if the result is not empty
    if (!empty($list)) {
        for ($i = 0; $i < count($list); $i++) {
            // Rest of your code...

            echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light position-relative">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute top-0 start-0 mt-3">
                            <a href="editCourse.php?cid='.$list[$i]->CourseId.'"
                                class="flex-shrink-0 btn btn-sm btn-primary px-2"
                                style="border-radius: 50%;"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="confirmDelete('.$list[$i]->CourseId.')"
                                class="flex-shrink-0 btn btn-sm btn-danger px-2 me-1"
                                style="border-radius: 50%;"><i class="fas fa-trash"></i></a>
                        </div>
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="singleCourse.php?cid='.$list[$i]->CourseId.'"
                                class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">' . $shortTitle . '</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h5 class="mb-2 course-title">' . $list[$i]->CourseTitle . '</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-user-tie text-primary me-2"></i>' . $list[$i]->ProgramManager . '</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-clock text-primary me-2"></i>' . $list[$i]->Credits . ' Credits</small>
                        <small class="flex-fill text-center py-2"><i
                                class="fa fa-level-up-alt text-primary me-2"></i>' . $list[$i]->CourseLevel . ' Level</small>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '<h6>Oops, no courses yet.</h6>';
    }
    ?>
</div>

<script>
    function confirmDelete(courseId) {
        if (confirm("Are you sure you want to delete this course?")) {
            // Redirect to deleteCourse.php with the courseId parameter
            window.location.href = "deleteCourse.php?cid=" + courseId;
        }
        alert ('edited successfully');
    }
</script>

</div>
    </div>

<!-- Courses End -->


<?php
include 'footer.php';
?>
