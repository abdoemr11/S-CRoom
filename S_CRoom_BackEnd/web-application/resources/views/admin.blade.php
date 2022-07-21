<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Admin page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/buttons.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
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
                      <a href="admin_login.html" class="logo">
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
              <h2>Welcome <?php echo $rows['username'];?></h2>
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

        <table class="mytable1">
          <thead>
            <tr class="success">
              <th>ID</th>
              <th>Name</th>
              <th>Year</th>
              <th>Department</th>
              <th>Email</th>
              <th>Photo</th>
              <th>Controls</th>
            </tr>
          </thead>
          <tbody>
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {<tr class="info">
                  <td><?php echo $rows['std_id'];?></td>
                  <td><?php echo $rows['std_name'];?></td>
                  <td><?php echo $rows['std_year'];?></td>
                  <td><?php echo $rows['std_department'];?></td>
                  <td><?php echo $rows['std_email'];?></td>
                  <td><?php echo $rows['std_photo'];?></td>
                  <td>
                  <button class="img-rounded" onclick="edit1()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
                  <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
                  </td>
                </tr>  
                }
            ?>
               
          </tbody>
        </table>
                
      </div>
      </div>
      <div class="prof" id="prof">
      <div class="container">
        <br><br><br><br><br>
        <button class="btn btn-secondary" id="add_button" onclick="add_button2()">Add</button>
        <table class="mytable2">
          <thead>
            <tr class="success">
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>About</th>
              <th>Department</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Photo</th>
              <th>Controls</th>
            </tr>
          </thead>
          <tbody>
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            
            <tr class="info">
              <td><?php echo $rows['prof_id'];?></td>
              <td><?php echo $rows['prof_name'];?></td>
              <td><?php echo $rows['prof_age'];?></td>
              <td><?php echo $rows['prof_info'];?></td>
              <td><?php echo $rows['prof_dep'];?></td>
              <td><?php echo $rows['prof_email'];?></td>
              <td><?php echo $rows['prof_num'];?></td>
              <td><?php echo $rows['prof_photo'];?></td>
              <td>
              <button class="img-rounded" onclick="edit2()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
              <button type="button" class="img-rounded" onclick="deleteRow2(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
              </td>
            </tr> 
             }
             ?>    
          </tbody>
        </table>
      </div>
      </div>
      <div class="course" id="course">
      <div class="container">
        <br><br><br><br><br>
        <button class="btn btn-secondary" id="add_button" onclick="add_button3()">Add</button>
        <table class="mytable3">
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
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            
            <tr class="info">
              <td><?php echo $rows['course_name'];?></td>
              <td><?php echo $rows['course_year'];?></td>
              <td><?php echo $rows['course_dep'];?></td>
              <td><?php echo $rows['course_about'];?></td>
              <td>
              <button class="img-rounded" onclick="edit3()"> <img src="edit.png" width="20" height="10" title="Edit"></button>
              <button type="button" class="img-rounded" onclick="deleteRow1(this)"> <img src="delete.png" width="20" height="10" title="Delete"></button>
              </td>
            </tr>  
            }
            ?>    
          </tbody>
        </table>
      </div>
      </div>
    </div>
      <div>
            <form id="student_form" action="admin.php">
                <div class="form-group">
                  <label>ID</label>
                  <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id" name="stud_id">
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter the name" name="stud_name">
                </div>
                <div class="form-group">
                  <label>Year</label>
                  <input type="number" class="form-control"  placeholder="Enter the year" name="stud_year">
                </div>
                <div class="form-group">
                  <label>Department</label>
                  <input class="form-control" list="list3" placeholder="Who are you?" name="stud_dep">
                      <datalist id="list3">
                          <option value="Communication"></option>
                          <option value="Computer science"></option>
                          <option value="Control"></option>
                          <option value="Power"></option>
                      </datalist>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter the email" name="stud_email">
                </div>
                <div class="form-group">
                  <label>Taking Photos</label>
                  <button onclick="open_cam()" class="btn btn-primary" type="btn">Open Camera</button>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
  </div>
   <div>
            <form id="prof_form" action="admin.php">
                <div class="form-group">
                  <label>ID</label>
                  <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id" name="proff_id">
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter the name" name="proff_name">
                </div>
                <div class="form-group">
                  <label>Age</label>
                  <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter the id" name="proff_age">
                </div>
                <div class="form-group">
                  <label>About</label>
                  <input type="text" class="form-control"  placeholder="Enter the year" name="proff_info">
                </div>
                <div class="form-group">
                  <label>Department</label>
                  <input class="form-control" list="list3" placeholder="Who are you?" name="proff_dep">
                      <datalist id="list3">
                          <option value="Communication"></option>
                          <option value="Computer science"></option>
                          <option value="Control"></option>
                          <option value="Power"></option>
                      </datalist>
                </div>
                
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter the email" name="proff_email">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="tel" class="form-control" aria-describedby="emailHelp" placeholder="Enter the number" name="proff_phone">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
  </div>
   <div>
            <form id="course_form" action="admin.php">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter the name" name="courss_name">
                </div>
                <div class="form-group">
                  <label>Year</label>
                  <input type="number" class="form-control"  placeholder="Enter the year" name="courss_year">
                </div>
                <div class="form-group">
                  <label>Department</label>
                  <input class="form-control" list="list3" placeholder="Who are you?" name="courss_dep">
                      <datalist id="list3">
                          <option value="Communication"></option>
                          <option value="Computer science"></option>
                          <option value="Control"></option>
                          <option value="Power"></option>
                      </datalist>
                </div>
                <div class="form-group">
                  <label>About</label>
                  <input type="text" class="form-control" placeholder="Enter the email" name="courss_info">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
  </div>
   <div class="footer">
      <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved. 
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
    </script>
    <script>
      x = document.getElementById("students");
      y = document.getElementById("prof");
      z = document.getElementById("course");
      bt = document.getElementById("student_form");
      form2 = document.getElementById("prof_form");
      form3 = document.getElementById("course_form");
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
         document.getElementById("mytable1").deleteRow(i);
      }
      function deleteRow2(r) {
         var i = r.parentNode.parentNode.rowIndex;
         document.getElementById("mytable2").deleteRow(i);
      }
      function deleteRow3(r) {
         var i = r.parentNode.parentNode.rowIndex;
         document.getElementById("mytable3").deleteRow(i);
      }
      let ws = new WebSocket("wss://127.0.0.1:8880");
      function open_cam() {
        ws.send(JSON.strigify({
                              "action": "open_cam_for_admin",
                              "to": "student",
                              "from": "adminstrator",
                              "execute": {
                                  "student_name": "hossam",
                                  "student_ID": 43,
                                  "n.o pictures": 15 //this number is default 
                              }}));
        ws.onmessage = function (event) {
                var received_msg = JSON.parse(event.data);
                if (received_msg.action=="done registering") {
                  alert("Registeration completed.");
                  ws.send(JSON.strigify({
                                    "action": "train",
                                    "to": "student",
                                    "from": "adminstrator",
                                    "execute": {}
                                }));
                  ws.onmessage = function (event) {
                var received_ms = JSON.parse(event.data);
                if (received_ms.action=="response" && received_ms.execute.status == "OK") { 
                  alert("Train model completed.");

                }}

                }
              }
      }
      
    </script>
</body>

</body>
</html>
