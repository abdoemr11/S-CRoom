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
    <title>Home Page</title>
</head>
<body>
<h2 style="background:#302ea3; color:white; padding:10px 20px;">
    Lecture one : Antenna Analysis and design
</h2>
<div id="stream"><iframe src="https://www.youtube.com/embed/wu8pF5B-rY8" width="888" height="499" llow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>

<div class="chat-popup" id="myForm">
    <form  class="form-container">
        <h2>Type your question</h2>
        <textarea placeholder="Type here.." class="use-keyboard-input" name="msg" required></textarea>
        <button type="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<div class="chat-popup" id="quiz">
    <form  class="form-container">
        <h2>The QUESTION: ....?</h2>
        <textarea placeholder="Type here.." class="use-keyboard-input" name="msg" required></textarea>
        <button type="submit" class="btn" onclick="closeForm1()">SUMBIT THE ANSWER</button>
    </form>
</div>
<div class="popup-vote" id="popup-vote">
    <p class="h6">Question : [Get from database]</p>
    <input type="radio" name="theSame"><p>choice1</p>
    <input type="radio" name="theSame"><p>choice2</p>
    <input type="radio" name="theSame"><p>choice3</p>
    <input type="radio" name="theSame"><p>choice4</p>
    <button type="button" onclick="closepopup()">Send</button>
</div>
<footer>

    <ul>
        <li > <button class="btn btn-dark" id="btn"><img src="stand-out.png" class="img-rounded" width="25" height="25" title="RAISE HAND" onclick="raisehand()"></button></li>
        <li > <button onclick="getLocalStream()" class="btn btn-dark"><img src="voice-recorder.png" class="img-rounded" width="25" height="25" title="PRESS WHEN ALOWED TO TALK"></button></li>
        <li><button onclick="chat()" class="btn btn-dark"><img src="question.png" class="img-rounded" width="25" height="25" title="ASK A QUESTION"></button></li>
        <li >
            <button class="btn btn-dark" onclick="openpopup()" title="Vote">
                <img src="vote.png" class="img-rounded" width="25" height="25" title="Make a new test">
            </button>
        </li>
        <li>
            <button onclick="quiz()" class="btn btn-dark"><img src="quiz.png" class="img-rounded" width="25" height="25" title="QUIZ"></button>
        </li>
    </ul>
</footer>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function () {});
</script>

<script >
    function getLocalStream() {
        navigator.mediaDevices.getUserMedia({video: false, audio: true}).then( stream => {
            window.localStream = stream; // A
            window.localAudio.srcObject = stream; // B
            window.localAudio.autoplay = true; // C
        }).catch( err => {
            console.log("u got an error:" + err)
        });
    }
    const btn = document.getElementById('btn');
    btn.addEventListener('click', function onclick() {
        btn.classList.toggle("onclick_style")
    });


</script>

<script>
    function chat() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("quiz").style.display = "none";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    function quiz() {
        document.getElementById("quiz").style.display = "block";
        document.getElementById("myForm").style.display = "none";
    }
    function closeForm1() {
        document.getElementById("quiz").style.display = "none";
    }
    let mypop = document.getElementById("popup-vote")
    function openpopup()
    {
        mypop.classList.add("open-popup");
    }
    function closepopup()
    {
        mypop.classList.remove("open-popup");
    }

</script>
<script src="keyboard.js"></script>

</body>
</html>
