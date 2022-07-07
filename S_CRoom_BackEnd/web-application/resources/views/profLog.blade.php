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
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>

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
                    <a href="/profLog" class="logo">
                        Benha Faculty of Engineering
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="#about"><img src="online-course.png" width="30" height="30" title="Begin a lecture or create an exam"></a></li>
                        <li class="scroll-to-section"><a href="/pp"><img src="profile.png" width="30" height="30" title="Personal page"></a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<!-- Model -->

<!-- Model -->
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
                        <h6>Hello Prof. [get the name from database]</h6>
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
                    <button class="btn btn-primary" onclick="lec()">Lecture</button>
                    <button class="btn btn-primary" onclick="exam()">Exam</button>
                    <h2></h2>
                </div>
            </div>
            <div class="footer">
                <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
                    <br>Design: <a href="https://www.linkedin.com/in/mahmoud-gouda-409382172/" target="_parent" title="Linkedin page">Mahmoud Gouda</a></p>
            </div>
</section>
<section class="services" id="lecs">

    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-14">
                <div class="section-heading">
                    <button class="btn btn-primary" onclick="lec()">Lecture</button>
                    <button class="btn btn-primary" onclick="exam()">Exam</button>
                    <h2></h2>
                </div>
            </div>
            <datalist id="list1">
                <option value="One"></option>
                <option value="Two"></option>
                <option value="Three"></option>
                <option value="Four"></option>
                <option value="Five"></option>
            </datalist>
            <form id="login_form" action="" method="post">
                <p class="h6">Year</p>
                <fieldset >
                    <input class="form-control"   placeholder="The Year ?" list="list1"> <br>
                </fieldset>
                <p class="h6">Course of the exam</p>
                <input class="form-control"type="text" placeholder="The course ?">
                <br>
                <p class="h6">Lecture number:</p>
                <input class="form-control" type="number" placeholder="The lecture number ?" maxlength="2"> <br>
                <button class="btn btn-success" type="submit" action="">Go</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
            <br>Design: <a href="https://www.linkedin.com/in/mahmoud-gouda-409382172/" target="_parent" title="Linkedin page">Mahmoud Gouda</a></p>
    </div>
</section>
<section class="services" id="exams">

    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-14">
                <div class="section-heading">
                    <button class="btn btn-primary" onclick="lec()" title="Begin a lecture">Lecture</button>
                    <button class="btn btn-primary" onclick="exam()" title="Create an exam">Exam</button>
                    <h2></h2>
                </div>
            </div>
            <datalist id="list2">
                <option value="One"></option>
                <option value="Two"></option>
                <option value="Three"></option>
                <option value="Four"></option>
                <option value="Five"></option>
            </datalist>
            <form id="login_form" action="" method="post">
                <p class="h6">Year</p>
                <fieldset >
                    <input class="form-control"   placeholder="The Year ?" list="list2"> <br>
                </fieldset>
                <p class="h6">The name of the course of the exam</p>
                <input class="form-control"type="text" placeholder="The course ?">
                <br>
                <p class="h6">Exam time</p>
                <input class="form-control"type="number" placeholder="The Time ?"><br>
                <p class="h6">Exam number:</p>
                <input class="form-control" type="number" placeholder="The exam number ?" maxlength="2"> <br>
                <p class="h6">Questions and answers :</p>
                <div class="container4">
                    <ul id="demo">
                        <li>
                            <div class="box-2">
                                <hr color="red" width="70%" size="20" align="center">
                                <p class="h6">Question</p>
                                <input class="form-control"type="text" placeholder="Enter the question"><br>
                                <p class="h6">Answer 1</p>
                                <input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button>
                                <p class="h6">Answer 2</p>
                                <input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button>
                                <p class="h6">Answer 3</p>
                                <input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button>
                                <p class="h6">Answer 4</p>
                                <input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button><br>
                            </div>
                        </li>
                    </ul>
                    <hr color="red" width="70%" size="20" align="center">
                    <button type="button" class="btn btn-primary" title="Add question" onclick="addq()"><img src="add.png" width="20" height="25" class="img-rounded"></button>
                    <button type="button" class="btn btn-primary" title="Delete question" onclick="delq()"><img src="delete.png" width="20" height="25" class="img-rounded"></button>
                    <br>
                </div><br>
                <button class="btn btn-success" type="submit" action="">Submit</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
            <br>Design: <a href="https://www.linkedin.com/in/mahmoud-gouda-409382172/" target="_parent" title="Linkedin page">Mahmoud Gouda</a></p>
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
<script>
    //according to loftblog tut
    function lecture() {
        // body...
    }
</script>
<script>
    lecs = document.getElementById("lecs");
    exams = document.getElementById("exams");
    quest = document.getElementById("quest");
    var c=0;
    function lec() {
        lecs.style.display="none";
        exams.style.display="none";
        if (lecs.style.display=="none")
        {lecs.style.display = "block";}
        else
        {lecs.style.display = "none";}
    }
    function exam() {
        lecs.style.display="none";
        exams.style.display="none";
        if (exams.style.display=="none")
        {exams.style.display = "block";}
        else
        {exams.style.display = "none";}

    }

    function addq() {
        var ul = document.getElementById("demo");
        var li = document.createElement("li");
        li.innerHTML = '<hr color="red" width="70%" size="20" align="center"><div class="box-2"><p class="h6">Question</p><input class="form-control"type="text" placeholder="Enter the question"><br><p class="h6">Answer 1</p><input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button><p class="h6">Answer 2</p><input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button><p class="h6">Answer 3</p><input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button><p class="h6">Answer 4</p><input type="text"><button type="button" class="btn btn-dark"><img src="checked.png" width="20" height="25" class="img-rounded"></button><br>';
        ul.appendChild(li);

    }
    function delq() {
        var listItems = document.getElementById("demo");
        listItems.removeChild(listItems.lastElementChild);

    }
</script>
</body>

</body>
</html>
