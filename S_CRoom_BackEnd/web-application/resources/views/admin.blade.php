<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">

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
  <button onclick="open_cam()" class="btn btn-primary" type="btn">Register a student</button>
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
      function open_cam() {
        ws.send(JSON.stringify({
                              "action": "open_cam_for_admin",
                              "to": "student",
                              "from": "adminstrator",
                              "execute": {
                                  "student_name": "hossam",
                                  "student_ID": 43,
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
                                }));
                  ws.onmessage = function (event) {
                let received_ms = JSON.parse(event.data);
                if (received_ms.action==="response" && received_ms.execute.status === "OK") {
                  alert("Train model completed.");
                  location.replace('/admin');
                }}

                }
              }
      }

    </script>
</body>
</html>
