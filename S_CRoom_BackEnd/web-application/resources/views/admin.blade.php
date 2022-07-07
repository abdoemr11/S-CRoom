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
    <link rel="stylesheet" type="text/css" href="assets/css/buttons.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <a href="/admin" class="logo">
                        Benha Faculty of Engineering
                    </a>
                    <!-- ***** Logo End ***** -->
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
                        <br> <br> <br> <br> <br> <br> <br> <br>
                        <br> <br> <br> <br> <br> <br> <br> <br>
                        <h2>Welcome [Name from database]</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br> <br> <br> <br>
</section>
<!-- ***** Main Banner Area End ***** -->

<section class="services" id="about">
    <!-- Here the sections of the buttons -->


    <!-- End of buttons' sections -->
    <br> <br>
    <div class="container" id="buttons">
        <button class="btn btn-primary" onclick="student()">Students</button>
        <button class="btn btn-primary" onclick="prof()">Professors</button>
        <button class="btn btn-primary" onclick="course()">Courses</button>
        <div class="students" id="students">
            <div class="container">
                <br><br><br><br><br>
                <button class="btn btn-secondary" id="add_button" onclick="add_button1()">Add</button>

                <table class="table">
                    <thead>
                    <tr class="success">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="info">
                        <td>1</td>
                        <td>Ahmed</td>
                        <td>1</td>
                        <td>Communication</td>
                        <td>def@somemail.com</td>
                        <td>
                            <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>2</td>
                        <td>Mohamed</td>
                        <td>5</td>
                        <td>Computer science</td>
                        <td>john@example.com</td>
                        <td>
                            <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="danger">
                        <td>3</td>
                        <td>Mahmoud</td>
                        <td>2</td>
                        <td>Power</td>
                        <td>mary@example.com</td>
                        <td>
                            <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="info">
                        <td>4</td>
                        <td>Hisham</td>
                        <td>2</td>
                        <td>Control</td>
                        <td>july@example.com</td>
                        <td>
                            <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button  type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="warning">
                        <td>5</td>
                        <td>Hosam</td>
                        <td>3</td>
                        <td>Commnication</td>
                        <td>bo@example.com</td>
                        <td>
                            <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="active">
                        <td>6</td>
                        <td>Mostafa</td>
                        <td>4</td>
                        <td>Computer science</td>
                        <td>act@example.com</td>
                        <td>
                            <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="prof" id="prof">
            <div class="container">
                <br><br><br><br><br>
                <button class="btn btn-secondary" id="add_button" onclick="add_button2()">Add</button>
                <table class="table">
                    <thead>
                    <tr class="success">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>About</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="info">
                        <td>1</td>
                        <td>Ahmed</td>
                        <td>50</td>
                        <td>Information about the doctor</td>
                        <td>Communication</td>
                        <td>def@somemail.com</td>
                        <td>01234567890</td>
                        <td>
                            <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>2</td>
                        <td>Mohamed</td>
                        <td>40</td>
                        <td>Information about the doctor</td>
                        <td>Computer science</td>
                        <td>john@example.com</td>
                        <td>01234567890</td>
                        <td>
                            <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="danger">
                        <td>3</td>
                        <td>Mahmoud</td>
                        <td>35</td>
                        <td>Information about the doctor</td>
                        <td>Power</td>
                        <td>mary@example.com</td>
                        <td>01234567890</td>
                        <td>
                            <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="info">
                        <td>4</td>
                        <td>Hisham</td>
                        <td>37</td>
                        <td>Information about the doctor</td>
                        <td>Control</td>
                        <td>july@example.com</td>
                        <td>01234567890</td>
                        <td>
                            <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="warning">
                        <td>5</td>
                        <td>Hosam</td>
                        <td>30</td>
                        <td>Information about the doctor</td>
                        <td>Commnication</td>
                        <td>bo@example.com</td>
                        <td>01234567890</td>
                        <td>
                            <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="active">
                        <td>6</td>
                        <td>Mostafa</td>
                        <td>45</td>
                        <td>Information about the doctor</td>
                        <td>Computer science</td>
                        <td>act@example.com</td>
                        <td>01234567890</td>
                        <td>
                            <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="course" id="course">
            <div class="container">
                <br><br><br><br><br>
                <button class="btn btn-secondary" id="add_button" onclick="add_button3()">Add</button>
                <table class="table">
                    <thead>
                    <tr class="success">
                        <th>Name</th>
                        <th>Year</th>
                        <th>Department</th>
                        <th>About</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="info">
                        <td>Digital signal processing</td>
                        <td>2</td>
                        <td>Communication</td>
                        <td>[Information about the course]</td>
                        <td>
                            <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="success">
                        <td>C++</td>
                        <td>5</td>
                        <td>Computer science</td>
                        <td>[Information about the course]</td>
                        <td>
                            <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="danger">
                        <td>Detection and Estimation</td>
                        <td>2</td>
                        <td>communication</td>
                        <td>[Information about the course]</td>
                        <td>
                            <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="info">
                        <td>Robotics</td>
                        <td>2</td>
                        <td>Control</td>
                        <td>[Information about the course]</td>
                        <td>
                            <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="warning">
                        <td>Information theory</td>
                        <td>3</td>
                        <td>Commnication</td>
                        <td>[Information about the course]</td>
                        <td>
                            <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    <tr class="active">
                        <td>Advanced network</td>
                        <td>4</td>
                        <td>Computer science</td>
                        <td>[Information about the course]</td>
                        <td>
                            <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                            <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <form id="add_form1">
            <div class="form-group">
                <label>ID</label>
                <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter the name">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="number" class="form-control"  placeholder="Enter the year">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input class="field_class" list="list3" placeholder="Who are you?">
                <datalist id="list3">
                    <option value="Communication"></option>
                    <option value="Computer science"></option>
                    <option value="Control"></option>
                    <option value="Power"></option>
                </datalist>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter the email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div>
        <form id="add_form2">
            <div class="form-group">
                <label>ID</label>
                <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter the name">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id">
            </div>
            <div class="form-group">
                <label>About</label>
                <input type="text" class="form-control"  placeholder="Enter the year">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input class="field_class" list="list3" placeholder="Who are you?">
                <datalist id="list3">
                    <option value="Communication"></option>
                    <option value="Computer science"></option>
                    <option value="Control"></option>
                    <option value="Power"></option>
                </datalist>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter the email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div>
        <form id="add_form3">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter the name">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="number" class="form-control"  placeholder="Enter the year">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input class="field_class" list="list3" placeholder="Who are you?">
                <datalist id="list3">
                    <option value="Communication"></option>
                    <option value="Computer science"></option>
                    <option value="Control"></option>
                    <option value="Power"></option>
                </datalist>
            </div>
            <div class="form-group">
                <label>About</label>
                <input type="text" class="form-control" placeholder="Enter the email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
    x = document.getElementById("students");
    y = document.getElementById("prof");
    z = document.getElementById("course");
    bt = document.getElementById("add_form1");
    form2 = document.getElementById("add_form2");
    form3 = document.getElementById("add_form3");
    buttons = document.getElementById("buttons");
    function student() {
        y.style.display="none";
        z.style.display="none";
        if (x.style.display=="none")
        {x.style.display = "block";}
        else
        {x.style.display = "none";}
    }
    function prof() {
        x.style.display="none";
        z.style.display="none";
        if (y.style.display=="none")
        {y.style.display = "block";}
        else
        {y.style.display = "none";}

    }
    function course() {
        x.style.display="none";
        y.style.display="none";
        if (z.style.display=="none")
        {z.style.display = "block";}
        else
        {z.style.display = "none";}

    }
    function add_button1() {
        buttons.style.display="none";
        bt.style.display = "block";
    }
    function add_button2() {
        buttons.style.display="none";
        form2.style.display = "block";
    }
    function add_button3() {
        buttons.style.display="none";
        form3.style.display = "block";
    }
    function edit1() {
        buttons.style.display="none";
        bt.style.display = "block";
    }
    function edit2() {
        buttons.style.display="none";
        form2.style.display = "block";
    }
    function edit3() {
        buttons.style.display="none";
        form3.style.display = "block";
    }
    function deleteRow1(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
    }
</script>
</body>

</body>
</html>
