<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin page</title>

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

  <!-- ***** Main Banner Area Start ***** -->
  <h2>Register a student</h2><hr>
  <button onclick="open_cam()" class="btn btn-primary" type="btn">Recognize student</button><hr>
  <form action="/admin" method="post">
      @csrf

      <p class="h6">First name</p>
      <input class="form-control" type="text" placeholder="First name ?" required id="first_name" name="first_name">
      <p class="h6">Second name</p>
      <input class="form-control" type="text" placeholder="Second name ?" required id="second_name" name="second_name">
      <p class="h6">Third name</p>
      <input class="form-control" type="text" placeholder="Third name ?" required id="third_name" name="third_name">
      <p class="h6">Forth name</p>
      <input class="form-control" type="text" placeholder="Forth name ?" required id="forth_name" name="fourth_name">
      <p class="h6">National id</p>
      <input class="form-control" type="number" placeholder="National id" id="national_id" name="national_id">
      <p class="h6">City</p>
      <input class="form-control" type="text" placeholder="City ?" required id="city" name="city">
      <p class="h6">Governorate</p>
      <input class="form-control" type="text" placeholder="Governorate ?" required id="Governorate" name="Governorate">
      <p class="h6">Department</p>
      <input class="form-control" type="text" placeholder="Department ?" required id="Department" name="Department">
      <p class="h6">Phone</p>
      <input class="form-control" type="number" placeholder="Student Phone number" id="Phone" name="Phone">
      <p class="h6">student id</p>
      <input class="form-control" type="number" placeholder="Student id" id="student_id" name="id">
      <p class="h6">Current year</p>
      <input class="form-control" type="number" placeholder="Student year" id="student_year" name="current_year">
      <p class="h6">email</p>
      <input class="form-control" type="email" placeholder="Student email" id="student_email" name="email"><hr>
      <button  class="btn btn-primary" type="btn"  style="display: none;" id="submit_button">Submit</button>

  </form>


  <div class="footer">
      <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
    </div>
    <script>
      let ws = new WebSocket("ws://192.168.47.252:8080");
      function open_cam() {
        ws.send(JSON.stringify({
                              "action": "open_cam_for_admin",
                              "to": "student",
                              "from": "adminstrator",
                              "execute": {
                                  "student_name": document.getElementById("student_name").value,
                                  "student_ID": document.getElementById("student_id").value,
                                  "n.o pictures": 15 //this number is default
                              }}));
        ws.onmessage = function (event) {
                let received_msg = JSON.parse(event.data);
                if (received_msg.action==="done registering") {
                  alert("Registeration completed.");
                  ws.send(JSON.strigify({
                                    "action": "train",
                                    "to": "student",
                                    "from": "adminstrator",
                                    "execute": {}
                                }));}
                else if (received_msg.action==="response" && received_msg.execute.status === "OK")
                {
                  alert("Train model completed.");
                  document.getElementById("submit_button").style.display = "block";
                }}

                }

    </script>
</body>
</html>
