<?php
include 'header.php'

?><!DOCTYPE html>
<html lang="en">

<head>
       <!-- JavaScript code -->
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
        
        
         function toggleAnswer(event) {
    const question = event.currentTarget.parentElement;
    const answer = question.nextElementSibling;
    const btn = question.querySelector(".faq-toggle-btn");

    if (answer.style.display === "block") {
        answer.style.display = "none";
        btn.textContent = "+";
        question.classList.remove("expanded");
    } else {
        answer.style.display = "block";
        btn.textContent = "-";
        question.classList.add("expanded");
    }
}

function toggleAll() {
    const questionElements = document.querySelectorAll(".faq-question");
    const answerElements = document.querySelectorAll(".faq-answer");
    const toggleBtns = document.querySelectorAll(".faq-toggle-btn");
    const expandAllBtn = document.getElementById("expand-all-btn");

    if (expandAllBtn.textContent === "Expand All") {
        answerElements.forEach((answer) => {
            answer.style.display = "block";
        });

        toggleBtns.forEach((btn) => {
            btn.textContent = "-";
        });

        questionElements.forEach((question) => {
            question.classList.add("expanded");
        });

        expandAllBtn.textContent = "Collapse All";
    } else {
        answerElements.forEach((answer) => {
            answer.style.display = "none";
        });

        toggleBtns.forEach((btn) => {
            btn.textContent = "+";
        });

        questionElements.forEach((question) => {
            question.classList.remove("expanded");
        });

        expandAllBtn.textContent = "Expand All";
    }
}
    </script>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/Faq.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

<!--     Carousel Start 
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/bp.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Make Your Journey Easy</h5>
                                <h1 class="display-3 text-white animated slideInDown">Connecting Students Together</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     Carousel End 
    
    -->
    
<div class ="space-div">
</div>
    
<div class ="faq-container"> 
    
    
<div class="white-div"></div>


<div class="full-div">
        <h1>FAQ</h1>
        <div>
    <button id="expand-all-btn" onclick="toggleAll()">Expand All</button>
</div>
        <div class ="space-div">
</div>
        <div class="faq-row">
            <div class="faq-question">Question 1
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
            
        </div>
        <div class="faq-row">
            <div class="faq-question">Question 2
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
             </div>
            <div class="faq-answer">Answer 2</div>
        </div>
        <div class="faq-row">
            <div class="faq-question">Question 3
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
             </div>
            <div class="faq-answer">Answer 3</div>
        </div>
        <div class="faq-row">
            <div class="faq-question">Question 4
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 4</div>
        </div>
        <div class="faq-row">
            <div class="faq-question">Question 5
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 5</div>
        </div>
         <div class="faq-row">
            <div class="faq-question">Question 1
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
         </div><!-- comment -->
           <div class="faq-row">
            <div class="faq-question">Question 1
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
           </div><!-- comment -->
            <div class="faq-row">
            <div class="faq-question">Question 1
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 1
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 1
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 10000
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 10000
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 10000
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 10000
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
            <div class="faq-row">
            <div class="faq-question">Question 104324
            <button class="faq-toggle-btn" onclick="toggleAnswer(event)">+</button>
            </div>
            <div class="faq-answer">Answer 1</div>
        </div>
           
           
    </div>


<div class="white-div"></div>

</div>

    <div class ="space-div">
</div>
    

     <!--Footer Start-->  
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        /*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--
     Footer End -->


     <!--Back to Top--> 
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


     <!--JavaScript Libraries--> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

     <!--Template Javascript--> 
    <script src="js/main.js"></script>
</body>

</html>