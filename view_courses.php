<?php
ob_start();
session_start();
include 'debugging.php';
include 'header.php';

if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($error_message)) {
    echo $error_message;
}

if (empty($_SESSION['uid'])) {
// User is not logged in, redirect to login page
    echo $_SESSION['username'];
    header("Location: Login.php");
    exit();
}
?>            

<script>
    
            window.onload = function() {
    searchCourse(); // Call the searchCourse function when the page loads
}
    
// Get the current page URL
    var url = window.location.href;

// Check each menu item's URL against the current page URL
    var menuItems = document.querySelectorAll('.nav-item.nav-link');
    menuItems.forEach(function (item) {
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

    .rotate {
    transform: rotate(180deg);
}
</style><!-- comment -->

<script>
    

    
    function searchCourse() {
        var str = document.getElementsByName("searchText")[0].value; // Get the value from the input field
        var filter = selectedFilter;
        //var selectedFilter = console.log(selectedFilter);
        var sort;

    if (sortIcon.classList.contains('rotate')) {
        sort = "Desc";
    } else {
        sort = "Asc";
    }
//create the AJAX request object
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("searchResult").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "search.php?title=" + str + "&filter=" + filter + "&sort=" + sort, true);
        xmlhttp.send();
    }
</script>


<script>
    var selectedFilter = "All Majors"; // Variable to store selected filter option

function toggleSort() {
    var sortIcon = document.getElementById('sortIcon');

    if (sortIcon.classList.contains('rotate')) {
        sortIcon.classList.remove('rotate');
        // Add your sorting logic here for ascending order
    } else {
        sortIcon.classList.add('rotate');
        // Add your sorting logic here for descending order
    }
}

    var selectedFilter = "All Majors"; // Variable to store selected filter option

        function selectOption(option) {
            selectedFilter = option;
        // Remove active class from all dropdown items
        var dropdownItems = document.getElementsByClassName("dropdown-item");
        for (var i = 0; i < dropdownItems.length; i++) {
            dropdownItems[i].classList.remove("active");
        }

        // Add active class to the selected option
        var selectedOption = document.querySelector('a[href="#"][onclick="selectOption(\'' + option + '\')"]');
        selectedOption.classList.add("active");
        searchCourse();
    }
    
</script>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header" style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('img/courses.png') !important;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                <nav aria-label="breadcrumb">
                    <p class="breadcrumb-item text-white">Welcome! Dive into a world of knowledge with
                        our diverse range of captivating courses this semester.
                        <br> <b>Explore, learn, and thrive!</b></p>
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
<!--            <form class="search" autocomplete="off" >  action="search.php"-->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="searchText" oninput="searchCourse()" class="form-control" placeholder="Type the course title or code here..">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
<div class="input-group-btn" style="margin-left: 10px;">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-filter"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="filterDropdown">
            <a class="dropdown-item active" href="#" onclick="selectOption('All Majors')">All Majors</a>
            <?php
            $AllMajors = MajorBank::getAllMaj();
            if (!empty($AllMajors)) {
                foreach ($AllMajors as $major) {
                    echo '<a class="dropdown-item" href="#" onclick="selectOption(\'' . $major->MajorId . '\')">' . $major->MajorName . '</a>';
                }
            }
            ?>
        </div>
    </div>
</div>
                        <div class="input-group-btn" style="margin-left: 10px;">
    <button class="btn btn-primary" id="sortButton" onclick="toggleSort(), searchCourse()">
        <i id="sortIcon" class="fas fa-arrow-up"></i>
    </button>
</div>
                        <?php
                        if ($_SESSION['roleId'] == 1) {
                            echo' <div class="input-group-btn" style="margin-left: 10px;">
                                <a href="AddCourse.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
<!--            </form>-->


        </div>
    </div> <!--end search part-->
    <div class="row">

        <div class="row g-4 justify-content-center" id="searchResult">

        </div>

        <script>
            function confirmDelete(cid, action) {
                if (confirm("Are you sure you want to delete this course?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "courseBackend.php?cid=" + cid + "&action=" + action, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                alert('Deleted successfully');
                                searchCourse();
                            } else {
                                alert('An error occurred while deleting the course.');
                            }
                        }
                    };
                    xhr.send();
                }
//                searchCourse();
            }

        </script>

    </div>
</div>

<!-- Courses End -->


<?php
include 'footer.php';
?>
