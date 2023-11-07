<?php
include 'header.php';
include 'debugging.php';

$id = $_GET['cid'];

//get article details
$course = new CourseBank();
$course->initWithId($id);


?>

<body>
<div class="row">
<!--					<div class="col-md-9">-->
<!--						<div class="nav-tabs-group">-->
							
							<!--          search part-->
                                                <div class="col-md-6 col-sm-12">
                                                    <form class="search" autocomplete="off" action="search.php">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="searchText" class="form-control" placeholder="Type something here">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
						</div>

<p><?php echo $course->getCourseTitle() ?></p>


</body><!-- comment -->

<?php
include 'footer.php';
?>