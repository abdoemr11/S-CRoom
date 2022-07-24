<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.conm/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="try.css">
    <link rel="stylesheet" type="text/css" href="try.js">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Lecture Page</title>
</head>
<body>
<h2 style="background:#302ea3; color:white; padding:10px 20px;">
    Lecture one : Antenna Analysis and design
</h2>
<div id="stream"><img src="learn.jpg" width="100%" height="300"></div>

<div class="popup-vote" id="myForm">
    <form  class="form-container">
        <h2>Type your question</h2>
        <textarea placeholder="Type here.." class="use-keyboard-input" id="quest" required></textarea>
        <button class="btn" onclick="send_question()">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<div class="popup-vote" id="quiz">
    <p id="note" class="h2">No quiz Avaliable</p>
    <button onclick="close_no_quiz()" id="note_btn">close</button>

</div>
<footer>

    <ul>
        <li > <button class="btn btn-dark" id="btn" onclick="raisehand()"><img src="stand-out.png" class="img-rounded" width="25" height="25" title="RAISE HAND" ></button></li>
        <li >
            <button class="btn btn-dark" onclick="mute()" title="Mute" id="mutt">
                <img src="mute.png" class="img-rounded" width="25" height="25" title="Mute">
            </button>
        </li>
        <li > <button onclick="getLocalStream()" class="btn btn-dark"><img src="voice-recorder.png" class="img-rounded" width="25" height="25" title="PRESS WHEN ALOWED TO TALK"></button></li>
        <li><button onclick="chat()" class="btn btn-dark"><img src="question.png" class="img-rounded" width="25" height="25" title="ASK A QUESTION"></button></li>

        <li>
            <button onclick="quiz()" class="btn btn-dark" title="Quiz"><img src="quiz.png" class="img-rounded" width="25" height="25" title="Quiz"></button>
        </li>
        <li >
            <button class="btn btn-dark" onclick="leave()" title="Leave lecture">
                <img src="logout.png" class="img-rounded" width="25" height="25" title="Leave lecture">
            </button>
        </li>
    </ul>
</footer>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function () {});
</script>

<script >
    let ws = new WebSocket("wss://127.0.0.1:8880");
    function getLocalStream() {
        navigator.mediaDevices.getUserMedia({video: false, audio: true}).then( stream => {
            window.localStream = stream; // A
            window.localAudio.srcObject = stream; // B
            window.localAudio.autoplay = true; // C
        }).catch( err => {
            console.log("u got an error:" + err)
        });
    }
    function raisehand() {
        btn.classList.toggle("onclick_style");
        raise_msg={"action" : "raise_hand",
            "to": "professor",
            "from" : "student",
            "student_id": "//student_id",
            "device_id" : "//student_id",
            "execute" : {"token" : "{{$token}}"}};
        ws.send(JSON.stringify(raise_msg));
    }
    function send_question() {
        qustion = document.getElementById("quest").value;
        question_msg={"action" : "raise_hand",
            "to": "professor",
            "from" : "student",
            "student_id": "//student_id",
            "studentName": "//Student_name",
            "device_id" : "//student_id",
            "execute" : {"token" : "{{$token}}","questions" : qustion}};
        ws.send(JSON.stringify(question_msg));
    }
    let myForm = document.getElementById("myForm")
    let quizz = document.getElementById("quiz")
    let mypop = document.getElementById("popup-vote")
    function chat() {
        myForm.classList.add("open-popup");

    }

    function closeForm() {
        myForm.classList.remove("open-popup");
    }
    function quiz() {
        quizz.classList.add("open-popup");
        ws.onmessage = function (event) {
            var received_quiz = JSON.parse(event.data);
            if (received_quiz.action=="quiz") {
                var qustion = received_quiz.execute.question;
                var correct = received_quiz.execute.correct_answer;
                var wrong = received_quiz.execute.incorrect_answers;
            }
        }
        var answers = [correct, wrong[0],wrong[1],wrong[2]];
        answers.sort();
        document.getElementById("note").style.display = "none";
        document.getElementById("note_btn").style.display = "none";
        var quiz_form = document.getElementById("quiz");
        quiz_form.innerHTML = '<p class="h6" id="quiz_question">Question'+qustion+'</p><input type="radio" name="theSame"><p id="choice1">'+answers[2]+'</p><input type="radio" name="theSame"><p id="choice2">'+answers[0]+'</p><input type="radio" name="theSame"><p id="choice3">'+answers[1]+'</p><input type="radio" name="theSame"><p id="choice4">'+answers[3]+'</p><button class="btn" onclick="closeForm1()">SUMBIT THE ANSWER</button>'
        var std_answer = document.getElementById("theSame");
        for(i = 0; i < std_answer.length; i++) {
            if(std_answer[i].checked)
            {
                if (std_answer[i].value==correct) {grade = 5;}
                else {grade = 0;}
            }
        }

        grade_msg={"action" : "raise_hand",
            "to": "server",
            "from" : "student",
            "student_id": "//student_id",
            "studentName": "//Student_name",
            "device_id" : "//student_id",
            "execute" : {"token" : "{{$token}}","grade":grade}};
        ws.send(JSON.stringify(grade_msg));
    }
    function close_no_quiz() {
        quizz.classList.remove("open-popup");

    }
    function closeForm1() {

        quizz.classList.remove("open-popup");


    }
    function leave() {
        leave_msg={
            "action": "endSession",
            "to": "student",
            "from": "student",
            "execute": {
                "token" : "{{$token}}",
                "device_id": "xxxxxx"
            }
        };
        ws.send(JSON.stringify(leave_msg));
        location.href = "//Home Page for student";
    }
    function mute() {
        mutt.classList.toggle("onclick_style");
        mute_msg={
            "action": "mute",
            "to": "student",
            "from": "student",
            "execute": {
                "token" : "{{$token}}",
                "student_name": "hosam",
                "device_id": "xxxxxxxxxx"
            }
        };
        ws.send(JSON.stringify(mute_msg));
    }
</script>
<script src="keyboard.js"></script>

</body>
</html>
