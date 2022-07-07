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
<div id="stream"><iframe src="https://docs.google.com/presentation/d/17aFAYmf8ZUHc5y45znfZBh4o3tqJcc3K/edit?usp=sharing&ouid=101575391344746801298&rtpof=true&sd=true"></iframe></div>

<div class="chat-popup" id="myForm">
    <form  class="form-container">
        <h2>Questions from students</h2>
        <div id="student1" >
            <P><h5>Question from (Get the name from the database) :</h5>
            [The question from the database] <button type="button" class="img-center" onclick="endq1()"><img src="checked.png" class="img-center" width="25" height="25" title="Allow"></button>
            </P>
        </div>
        <div class="line-5"></div>
        <div id="student2">
            <P><h5>Question from (Get the name from the database) :</h5>
            [The question from the database] <button type="button" class="img-center" onclick="endq2()"><img src="checked.png" class="img-center" width="25" height="25" title="Allow"></button>
            </P>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<div class="chat-popup" id="quiz">
    <form  class="form-container">
        <h2>The QUESTION: ....?</h2>
        <textarea placeholder="Type here.." class="use-keyboard-input"  name="msg" required></textarea>
        <h2>The grade: ....?</h2>
        <textarea placeholder="Type here.." class="use-keyboard-input" name="msg" required></textarea>
        <button type="button" class="btn" onclick="sent_quiz()">Send the quiz</button>
        <button type="button" class="btn cancel" onclick="closeForm1()">Close</button>
    </form>
</div>
<div class="chat-popup" id="attend">
    <form  class="form-container">
        <h2>Check who is attending ...</h2>
        <h3>Attendees</h3>
        <p>Get the names from the database ....</p>
        <p>
            Ahmed
            <button class="img-rounded" type="button"><img src="plus.png" width="10" height="10" title="Bonus"></button>
            <button class="img-rounded" type="button"><img src="remove.png" width="10" height="10" title="Minus"></button>
        </p>
        <h3>Absentees</h3>
        <p>Get the names from the database ....</p>
        <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
    </form>
</div>
<div class="chat-popup" id="voice">
    <form  class="form-container">

        <h2>Allow students to speek</h2><button class="img-rounded" type="button"><img src="clipboard.png" width="20" height="20" title="Allow all"></button>
        <p>Get the names from the database ....</p>
        <!-- As a example -->
        <h4>Mohamed Ahmed <button id="btn" type="button"><img src="checked.png" class="img-center" width="25" height="25" title="Allow"></button></h4>
        <button type="button" class="btn cancel" onclick="closeForm3()">Close</button>
    </form>
</div>
<div class="chat-popup" id="quiz_answer">
    <form  class="form-container">
        <h2>Answers to the quiz</h2>
        <!-- As example -->
        <p>Ahmed [name from the database]</p>
        <p>
            The answer is : [The answer from the database]
            <button id="bonus" type="button"><img src="true.png" class="img-center" width="25" height="25" title="Allow"></button>
            <button id="zero" type="button"><img src="false.png" class="img-center" width="25" height="25" title="Allow"></button>
        </p>
        <div class="line-5"></div>
        <p>Mohamed [name from the database]</p>
        <p>The answer is : [The answer from the database]
            <button id="bonus" type="button"><img src="true.png" class="img-center" width="25" height="25" title="Allow"></button>
            <button id="zero" type="button"><img src="false.png" class="img-center" width="25" height="25" title="Allow"></button>
        </p>


        <button type="button" class="btn cancel" onclick="closequiz()">Close</button>
    </form>
</div>
<div class="popup-vote" id="popup-vote">
    <div >
        <p class="h6">Question</p>
        <input class="form-control" type="text" placeholder="Enter the question"><br>
        <ul class="list-group" id="the_q">
            <li>
                <p>Answer</p>
                <input type="text">
            </li>
            <li>
                <p>Answer</p>
                <input type="text">
            </li>
        </ul>
    </div>
    <div>
        <button type="button" onclick="add_answer()">Add</button>
        <button type="button" onclick="del_answer()">Delete</button>
        <button type="button" onclick="closepopup()">Send</button>
        <button type="button" onclick="canclepop()">Cancle</button>
    </div>
</div>
<footer>

    <ul>
        <li > <button class="btn btn-dark"><img src="attendant-list.png" class="img-rounded" width="25" height="25" title="Who is attending" onclick="attend()"></button></li>
        <li > <button onclick="voice()" class="btn btn-dark"><img src="voice-recorder.png" class="img-rounded" width="25" height="25" title="PRESS WHEN ALOWED TO TALK"></button></li>
        <li><button onclick="chat()" class="btn btn-dark"><img src="question.png" class="img-rounded" width="25" height="25" title="QUESTIONS"></button></li>
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

<script>
    function voice() {
        document.getElementById("voice").style.display = "block";
        document.getElementById("myForm").style.display = "none";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("attend").style.display = "none";
    }
    const btn = document.getElementById('btn');
    btn.addEventListener('click', function onclick() {
        if(btn.style.color = "white")
            document.getElementById("btn").style.color = "red";
        else
            document.getElementById("btn").style.color = "green";
    });

</script>

<script>
    function chat() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("voice").style.display = "none";
        document.getElementById("attend").style.display = "none";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    function quiz() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("quiz").style.display = "block";
        document.getElementById("voice").style.display = "none";
        document.getElementById("attend").style.display = "none";

    }
    function attend() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("voice").style.display = "none";
        document.getElementById("attend").style.display = "block";
    }
    function closequiz() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("voice").style.display = "none";
        document.getElementById("attend").style.display = "none";
        document.getElementById("quiz_answer").style.display = "none";
    }
    function closeForm1() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("voice").style.display = "none";
        document.getElementById("attend").style.display = "none";

    }
    function sent_quiz() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("voice").style.display = "none";
        document.getElementById("attend").style.display = "none";
        document.getElementById("quiz_answer").style.display = "block";
    }
    function closeForm2() {
        document.getElementById("attend").style.display = "none";
    }
    function closeForm3() {
        document.getElementById("voice").style.display = "none";
    }
    function endq1() {
        document.getElementById("student1").style.display = "none";
    }
    function endq2() {
        document.getElementById("student2").style.display = "none";
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
    function canclepop()
    {
        mypop.classList.remove("open-popup");
    }
    function add_answer() {
        var ul = document.getElementById("the_q");
        var li = document.createElement("li");
        li.innerHTML = '<p class="h6">Answer</p><input type="text"><br>';
        ul.appendChild(li);

    }
    function del_answer() {
        var listItems = document.getElementById("the_q");
        listItems.removeChild(listItems.lastElementChild);

    }
</script>
<script src="keyboard.js"></script>
</body>
</html>
