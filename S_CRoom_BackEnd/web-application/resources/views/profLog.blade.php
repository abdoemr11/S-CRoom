<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
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

    <script src="bootstrap.min.css"></script>

  </head>

<body>
@php
 $professor = \Auth::guard('professors')->user();
@endphp
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
                      <a href="/proflog" class="logo">
                          Benha Faculty of Engineering
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#about"><img src="online-course.png" width="30" height="30" title="Lecture or Exam"></a></li>
                          <li><a href="/pp"><img src="profile.png" width="30" height="30" title="Personal page"></a></li>
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
              <h3>Hello Prof.  {{"  ".Auth::guard('professors')->user()->first_name}}</h3>
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
        <form id="login_form" action="/proflive" method="post">
@csrf

            <p class="h6">Year</p>
            <fieldset >
              <input class="form-control" placeholder="The Year ?" list="list1" required name="course_year"> <br>
            </fieldset>
            <p class="h6">Course of the lecture</p>
            <select id="course_lec" class="form-control" name="course_id" required>
                @foreach(Auth::guard('professors')->user()->subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                @endforeach

            </select>
            <p class="h6">Lecture name</p>
            <input class="form-control"type="text" placeholder="lecture name" name="lec_name" required>
          <br>
                <p class="h6">Lecture number</p>
                <input class="form-control" type="number" placeholder="The lecture number ?" maxlength="2" required name="lec_num"> <br>
                <button class="btn btn-success" type="submit">Go</button>
        </form>
      </div>
    </div>
   <div class="footer">
      <p>Copyright © 2022 Benha Faculty Of Engineering All Rights Reserved.
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
        <form id="login_form" action="/proflive" method="post">
                <p class="h6">Year</p>
                <fieldset >
                <input class="form-control"   placeholder="The Year ?" list="list2" name="exam_year"> <br>
                </fieldset>
                <select id="course_lec" class="form-control" name="course_id" required>
                    @foreach(Auth::guard('professors')->user()->subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                    @endforeach

                </select>
                <br>
                <p class="h6">Exam date</p>
                <input class="form-control"type="date" placeholder="The Time ?" name="exam_date"><br>
                <p class="h6">Exam time start</p>
                <input class="form-control"type="time" placeholder="The start Time ?" name="exam_start"><br>
                <p class="h6">Exam time end</p>
                <input class="form-control"type="time" placeholder="The end Time ?" name="exam_end"><br>
                <p class="h6">Questions and answers</p>
                <p class="h6">Write the symbol '-' before the right answer.</p>
                <div class="container4">
                  <ul id="demo"></ul>
                  <hr color="white" width="70%" size="20" align="center">
                  <button type="button" class="btn btn-primary" title="Add question" onclick="addq()"><img src="add.png" width="20" height="25" class="img-rounded"></button>
                  <button type="button" class="btn btn-primary" title="Delete question" onclick="delq()"><img src="delete.png" width="20" height="25" class="img-rounded"></button>
                <br>
                </div><br>
                <button class="btn btn-success" type="submit">Submit</button>
        </form>
      </div>
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
      lecs = document.getElementById("lecs");
      exams = document.getElementById("exams");
      quest = document.getElementById("quest");
      let question_num = 0;
      let answer_num = 0;
      let c=0;
      function lec() {
        lecs.style.display="none";
        exams.style.display="none";
        if (lecs.style.display==="none")
          {lecs.style.display = "block";}
        else
          {lecs.style.display = "none";}
      }
      function exam() {
        lecs.style.display="none";
        exams.style.display="none";
        if (exams.style.display==="none")
          {exams.style.display = "block";}
        else
          {exams.style.display = "none";}

      }

      function addq() {

         let ul = document.getElementById("demo");
         let li = document.createElement("li");
         li.innerHTML = '<hr color="red" width="70%" size="20" align="center"><div class="box-2"><p class="h6">Question</p><input class="form-control"type="text" placeholder="Enter the question" name = "question'+question_num+'"><br><p class="h6">Answer 1</p><input type="text" name = "answer_num1'+answer_num+'"><p class="h6">Answer 2</p><input type="text" name = "answer_num2'+answer_num+'"><p class="h6">Answer 3</p><input type="text" name = "answer_num3'+answer_num+'"><p class="h6">Answer 4</p><input type="text" name = "answer_num4'+answer_num+'+"><br>';
         ul.appendChild(li);
         question_num +=1;
         answer_num +=1;
    }
    function delq() {
        let listItems = document.getElementById("demo");
        listItems.removeChild(listItems.lastElementChild);
        question_num -=1;
         answer_num -=1;

    }
      let arr_q = document.getElementById("demo");
      let an1 = document.getElementById("answer_num1"+answer_num).value;
      let an2 = document.getElementById("answer_num2"+answer_num).value;
      let an3 = document.getElementById("answer_num3"+answer_num).value;
      let an4 = document.getElementById("answer_num4"+answer_num).value;
      let right_ans,wrong_ans;
    for (let i = 0; i < arr_q.length; i++) {
      for (let j = 0; j < 4; j++) {

          if(an1[0]==='-')
          {an1.substring(1);right_ans = an1;
              wrong_ans = [an2,an3,an4];}
          else if (an2[0]==='-')
          {an2.substring(1);right_ans = an2;
              wrong_ans = [an1,an3,an4];}
          else if (an3[0]==='-')
          {an3.substring(1);right_ans = an3;
              wrong_ans = [an2,an1,an4];}
          else if (an4[0]==='-')
          {an4.substring(1);right_ans = an4;
              wrong_ans = [an2,an3,an1];}
      }
    }
    for (let i = 0; i < arr_q.length; i++) {
        let questions;
        questions[i] = { //All questions created will be in this array to send it to database.
        "question":document.getElementById("question1").value,
        "correct_answer" : right_ans,
        "incorrect_answers" : wrong_ans
      }

    }
    </script>

</body>
</html>
