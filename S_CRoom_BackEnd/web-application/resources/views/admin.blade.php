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
  <p class="h6">student name</p>
  <input class="form-control" type="text" placeholder="Student name ?" required id="student_name">
  <p class="h6">student id</p>
  <input class="form-control" type="number" placeholder="Student id" id="student_id">
  <button onclick="open_cam()" class="btn btn-primary" type="btn">Register a student</button>
   <div class="footer">
      <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
    </div>
    <script>
      let ws = new WebSocket("ws://127.0.0.1:8080");
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
                  location.replace('/admin');
                }}

                }

    </script>
</body>
</html>
