<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<!-- Sub Header -->
<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <div class="left-content">
                    <p>Welcome to <em>Benha University</em></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <br> <br>
                    <a href="/studentLog" class="logo">
                        Benha Faculty of Engineering
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="#about"><img src="online-course.png" width="30" height="30" title="Lecture"></a></li>
                        <li class="scroll-to-section"><a href="/sp"><img src="profile.png" width="30" height="30" title="Personal page"></a></li>
                    </ul>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<!-- ***** Main Banner Area Start ***** -->
<section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/vv.mp4" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="caption">
                        <h6>Hello {{ Auth::guard('students')->user()->first_name }}</h6>
                        <h2>Welcome to Benha Faculty Of Engineering</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br> <br> <br> <br>
</section>
<!-- ***** Main Banner Area End ***** -->

<section class="services" id="about">

    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-14">
                <div class="section-heading">
                    <h2>Enter the lecture</h2>
                </div>
                <div style="border-color: white;">
                    <p class="h2">Current lecture:
                    <ul class="list-group">
                        <li class="h6"><p> Course         :  [Get information from the database]</p></li>
                        <li class="h6"><p> Lecture number : [Get information from the database]</p></li>
                    </ul>
                    </p>
                </div>
            </div>
            <form id="login_form" action="" method="post">
                <br><br>
                <p class="h5">Name</p>
                <input class="form-control , use-keyboard-input" type="text" placeholder="Enter your name"><br>
                <button class="btn btn-success" type="submit" action="">Go</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
            <br>Design: <a href="https://www.linkedin.com/in/mahmoud-gouda-409382172/" target="_blank" title="Linkedin page">Mahmoud Gouda</a></p>
    </div>
</section>
<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>
<script src="keyboard.js"></script>
<script>
    //according to loftblog tut
    function lecture() {
        // body...
    }
</script>
</body>

</body>
</html>
