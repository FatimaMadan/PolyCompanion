<?php
include 'header.php';
include 'debugging.php';

?>                

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
    
    .form-group {
    margin-bottom: 20px;
}
    .blue-div {
        padding: 20px;
    }

    .aside-title {
        color: #fff;
        padding: 10px;
        margin: 0;
    }

    .aside-body {
        padding: 20px;
    }

/*    .group-title {
        font-weight: bold;
        margin-bottom: 10px;
    }*/

    .form-group {
        margin-bottom: 15px;
    }


 /* Adjusted spacing */
    .search {
        padding: 20px 0; /* Decreased top and bottom padding */
    }

    .container-xxl {
        padding-top: 20px; /* Decreased top padding */
    }

    .container {
        margin-bottom: 20px; /* Decreased bottom margin */
    }

.search .container {
  margin-bottom: 30px;
}

.search .aside-title {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 15px;
}

.search .form-control {
  border-radius: 0;
}

.search .btn-primary {
  border-radius: 0;
}

.search .aside-body {
  margin-top: 30px;
}

.search .group-title {
  font-weight: bold;
  margin-bottom: 10px;
}

.search .nav-tabs-group {
  margin-bottom: 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.search .nav-tabs-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.search .nav-tabs-list li {
  margin-right: 10px;
}

.search .nav-tabs-list li a {
  text-decoration: none;
  color: #333;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.search .nav-tabs-list li.active a {
  background-color: #333;
  color: #fff;
}

.search .nav-tabs-right {
  flex: 1;
  text-align: right;
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
    xmlhttp.open("GET", "search.php?title="+ str, true);
    xmlhttp.send();
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Check or uncheck all checkboxes when "All Majors" checkbox changes
        $('#allMajorsCheckbox').change(function() {
            var isChecked = $(this).is(':checked');
            $('input[name="category"]').prop('checked', isChecked);
        });

        // Update "All Majors" checkbox based on the state of other checkboxes
        $('input[name="category"]').change(function() {
            var allChecked = $('input[name="category"]:not(#allMajorsCheckbox):checked').length === $('input[name="category"]:not(#allMajorsCheckbox)').length;
            $('#allMajorsCheckbox').prop('checked', allChecked);
        });
    });
</script>


<div class="blue-div">

<aside>
    <section class="search">
  <h2 class="aside-title">Filter</h2>
  <div class="aside-body">
    <form class="checkbox-group">
<!--      <div class="group-title">Majors</div>-->
      <?php
//      $AllMajors = MajorBank::getAllMaj();
//      
//      if (!empty($AllMajors)) {
//    for ($i = 0; $i < count($AllMajors); $i++) {
//        // Rest of your code...
//        echo '<div class="form-group">
//        <label><input type="radio" name="date" checked>'. $AllMajors[$i]->MajorName  .'</label>
//      </div>';
//    }
//} else {
//    echo '<div class="form-group">
//        <label><input type="radio" name="date" checked>opppps</label>
//      </div>';
//}
//      
      ?>
      
      <br>
<div class="group-title">Majors</div>
<div class="form-group">
    <label><input type="checkbox" name="category" id="allMajorsCheckbox" checked> All Majors</label>
</div>

<?php
$AllMajors = MajorBank::getAllMaj();

if (!empty($AllMajors)) {
    for ($i = 0; $i < count($AllMajors); $i++) {
        echo '<div class="form-group">
            <label><input type="checkbox" name="category" checked>'. $AllMajors[$i]->MajorName .'</label>
        </div>';
    }
} else {
    echo '<div class="form-group">
        <label><input type="radio" name="date" checked>opppps</label>
    </div>';
}
?>
    </form>
  </div>
  </section>
</aside>
</div><!-- comment -->

    <!-- Courses Start -->

        <div class="container">
<!--            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            </div>-->
				<div class="row">
<!--					<div class="col-md-9">-->
<!--						<div class="nav-tabs-group">-->
							
							<!--          search part-->
                                                <div class="col-md-6 col-sm-12">
                                                    <form class="search" autocomplete="off" action="search.php">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="searchText" oninput="searchCourse(this.value)" class="form-control" placeholder="Type something here">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
						</div>
						<div class="row">
                                                    
            <div class="row g-4 justify-content-center" id="searchResult">
                
                
                <?php
$list = CourseBank::getCourses();

// Check if the result is not empty
if (!empty($list)) {
    for ($i = 0; $i < count($list); $i++) {
        // Rest of your code...

        // Truncate the title if it exceeds a certain number of characters
        $shortTitle = $list[$i]->ShortTitle;
        if (strlen($shortTitle) > 20) {
            $shortTitle = substr($shortTitle, 0, 20) . '...';
        }

        echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="course-item bg-light">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid" src="img/course-1.jpg" alt="">
                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                        <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                        <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
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
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>' . $list[$i]->ProgramManager . '</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>' . $list[$i]->Credits . ' Credits</small>
                    <small class="flex-fill text-center py-2"><i class="fa fa-level-up-alt text-primary me-2"></i>' . $list[$i]->CourseLevel . ' Level</small>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<h6>Oops, no courses yet.</h6>';
}
?>
                
<!--                </div>-->
    </div>
</div>
<!--                                     </div>-->
    </div>

<!-- Courses End -->


<?php
include 'footer.html';
?>
