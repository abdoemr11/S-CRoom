<head>
    <title>Prof Live</title>
    <link rel="stylesheet" type="text/css" href="proftry.css">
    <link rel="stylesheet" href="..\bootstrap.min.css">
    @php
    $professor = Auth::guard('professors')->user()
    @endphp
</head>
<body>
<header>
    <h1 id="header">Here Professor can control the lecture</h1>
    <button onclick="conncet()" class="btn btn-success">Connect</button>
    <button onclick="end()" class="btn btn-danger">End</button>
    <hr>
</header>
<main id="element" style="display: flex;">
    <div>

    </div>
    <div id="main-box" style="padding-top: 10px;border-width: thick;border-style: double;border-color: black;width: 50%;">
        <div>
            <button onclick="get_all()" class="btn btn-primary" >Get all</button>
            <button onclick="verify()" class="btn btn-primary" >Verify</button>

        </div>
        <div id="stud-names">
            <h2 style="background-color:skyblue;">Names of the students</h2><hr>
            <div style="background-color: salmon; width: 100%;" id="names" >
                <ul id="std_names"></ul>
            </div>
        </div>

    </div>
    <div style="padding-top: 10px;border-width: thick;border-style: double;border-color: black;width: 50%;">
        <div>
            <button onclick="std_q()" class="btn btn-primary">Questions</button>
            <button onclick="Vote()" class="btn btn-primary">Vote</button>
            <button onclick="Quiz()" class="btn btn-primary">Quiz</button><br>
            <button onclick="MuteAll()" class="btn btn-warning" id="mute">Mute All</button>
            <button onclick="UnMuteAll()" class="btn btn-warning" style="display:none;" id="unmute">UnMute All</button>

        </div>
        <div style="display: none;background-color: salmon; width: 100%;" id="quest"><ul id="question"></ul></div>
        <div id="vote-form" style="display: none;">
            <div id="vote_choices">

                <p class="h5">Question</p>
                <input class="form-control" type="text" placeholder="Enter the question" id="vote_q"><br>
                Choice 1 : <input type="text" id="ch1"></li><br>
                Choice 2 : <input type="text" id="ch2"></li><br>
                Choice 3 : <input type="text" id="ch3"></li><br>
                Choice 4 : <input type="text" id="ch4"></li><br>
                <button onclick="send_vote()" class="btn btn-primary" >send</button>
            </div>
            <button style="display: none" id="result_vote" class="btn btn-secondary" onclick="show_vote()">Show result</button>
            <div id="vote_result" style="display: none;"></div>

        </div>
        <div id="quiz" style="display: none;">
            <div id="quiz_choices">
                <hr><p>Write "-" in the beginning of the right choice</p><hr>
                <p class="h5">Question</p>
                <input class="form-control" type="text" placeholder="Enter the question" id="quiz_q"><br>
                Choice 1 : <input type="text" id="an1"></li><br>
                Choice 2 : <input type="text" id="an2"></li><br>
                Choice 3 : <input type="text" id="an3"></li><br>
                Choice 4 : <input type="text" id="an4"></li><br>
                <button onclick="send_quiz()" class="btn btn-primary" >send</button>

            </div>
            <div id="vore_result">

            </div>
        </div>
    </div>
    <div style="padding-top: 10px;border-width: thick;border-style: double;border-color: black;width: 50%;">
    	<p class="h4" style="background-color: skyblue;">Who raised his hand?</p>
    	<ul id="raised_hand_std"></ul>
    </div>

</main>
<script>
    let name_v,ch1,ch2,ch3,ch4,x=0;
    let student_ids = [{
        "studentss" : "123",
        "isAttending" : false,
        "bonuss" : 0
    }];
    let students = [{
        student_name: "goda",
        student_id: "123",
        isVerified: false,
        bonus: 0
    }];

    let quiz_degrees = {
        "student_id": "1234",
        "professor_id" : "456" ,
        "subject_id" : "789",
        "exam_type": "quiz",
        "exam-mark": 5,
    };
    let lecture_msg = [{
    	"professor_id" : "1234",
    	"subject_id" : "5698",
    	"lecture_week" : "4",
    	"students_data" : students,
       	"exam" : {
       		"min_degree" : 2.5,
       		"max_degree" : 5,
       		"info" : quiz_degrees
       	}
    }];
    let ws = new WebSocket("ws://127.0.0.1:8080");
    function conncet()
    {
        ws.send(JSON.stringify({"action" : "connect" ,
            "to" : "server" ,
            "from" : "professor",
            "execute" : {
                "token"   : "{{$token}}",
                "name"    : "{{$professor->first_name ." ". $professor->second_name}}"}}));
    }
    function get_all() {
        let ul = document.getElementById("std_names");
        ul.innerHTML = '';
        ws.send(JSON.stringify({
            "action": "getStudents",
            "to": "server",
            "from": "professor",
            "execute": {
                "token": "{{$token}}"
            }
        }));
    }
    function verify() {
        ws.send(JSON.stringify({"action" : "verifyStudents" ,
            "to" : "server" ,
            "from" : "professor" ,
            "execute" : {
                "token" : "{{$token}}"
            }}));
    }
    function std_q() {
        document.getElementById("vote-form").style.display = "none";
        document.getElementById("quiz").style.display = "none";
        document.getElementById("quest").style.display = "block";
    }
    function Vote() {
        document.getElementById("quest").style.display = "none";
        document.getElementById("vote-form").style.display = "block";
        document.getElementById("quiz").style.display = "none";
    }
    function send_vote() {
        let vote_q = document.getElementById("vote_q").value;
        ch1 = document.getElementById("ch1").value;
        ch2 = document.getElementById("ch2").value;
        ch3 = document.getElementById("ch3").value;
        ch4 = document.getElementById("ch4").value;
        let vote = {"action" : "vote",
            "to" : "student",
            "from" : "professor",
            "execute" :
                {
                    "token" : "{{$token}}",
                    "student_id" : "00000",
                    "qeustion" : vote_q,
                    "first" : ch1,
                    "second" : ch2,
                    "third" : ch3,
                    "fourth" : ch4}};
        ws.send(JSON.stringify(vote));
        document.getElementById("vote_choices").style.display ="none";
        document.getElementById("result_vote").style.display ="block";
    }
    function Quiz() {
        document.getElementById("quest").style.display = "none";
        document.getElementById("vote-form").style.display = "none";
        document.getElementById("quiz").style.display = "block";
    }
    function send_quiz() {
        let quiz_q = document.getElementById("quiz_q").value;
        let an1 = document.getElementById("an1").value;
        let an2 = document.getElementById("an2").value;
        let an3 = document.getElementById("an3").value;
        let an4 = document.getElementById("an4").value;
        let right_ans,wrong_ans;
        if(an1[0]==='-')
        {an1.shift();right_ans = an1;
            wrong_ans = [an2,an3,an4];}
        else if (an2[0]==='-')
        {an2.shift();right_ans = an2;
            wrong_ans = [an1,an3,an4];}
        else if (an3[0]==='-')
        {an3.shift();right_ans = an3;
            wrong_ans = [an2,an1,an4];}
        else if (an4[0]==='-')
        {an4.shift();right_ans = an4;
            wrong_ans = [an2,an3,an1];}
        let quiz_form = {
            "action" : "quiz",
            "to" : "student",
            "from" : "professor",
            "execute" : {
                "token" : "{{$token}}",
                'qustion' : quiz_q,'correct_answer' : right_ans,
                'incorrect_answers':wrong_ans}};
        ws.send(JSON.stringify(quiz_form));
        document.getElementById("quiz").style.display = "none";
    }
    function bonus(clicked_id) {
        students.forEach( student=> {
            if(student.student_id ===clicked_id)
            student.bonus +=1;
        })
    }
    function minus(clicked_id) {
        students.forEach( student=> {
            if(student.student_id ===clicked_id)
                student.bonus -=1;
        })
    }
    function MuteAll() {
        document.getElementById("unmute").style.display="block";
        document.getElementById("mute").style.display="none";
        let muteAll_form = {
            "action": "mute_all",
            "to": "student",
            "from": "professor",
            "execute": {
                "token" : "{{$token}}"
            }
        };
        ws.send(JSON.stringify(muteAll_form));
    }
    function UnMuteAll() {
        document.getElementById("unmute").style.display="none";
        document.getElementById("mute").style.display="block";
        let unmuteAll_form = {
            "action": "unmute_all",
            "to": "student",
            "from": "professor",
            "execute": {
                "token" : "{{$token}}"
            }
        };
        ws.send(JSON.stringify(unmuteAll_form));
    }
    function end() {
        let recv_msg = {
            "action": "end_session",
            "to": "student",
            "from": "professor",
            "execute" :
                {
                    "token" : "{{$token}}",
                    "student_id": "00000"
                }
        }
        ws.send(JSON.stringify(recv_msg));
        ws.send(JSON.stringify(lecture_msg));
        location.replace("/proflog");
    }
    function show_vote()
    {
        document.getElementById("vote_result").style.display="block";
    }
    ws.onmessage = function (event) {
        let i;
        console.log(JSON.parse(event.data))
        let received_msg = JSON.parse(event.data);
        let vote_result;
        if (received_msg.action === "response" && received_msg.execute.type === "connectProfessor") {
            if (received_msg.execute.status === "OK") {
                alert("Connection succeeded");
            }
        } else if (received_msg.action === "response" && received_msg.execute.type === "getStudents") {
            let studentObjects = received_msg.execute.students;
            console.log(studentObjects)
            studentObjects.forEach(student => {
                students = students.concat({
                    student_name: student.student_name,
                    student_id: student.student_id,
                    isVerified: false
                })
            })
            console.log(students)
            let ul = document.getElementById("std_names");
            students.forEach(student => {
                let li = document.createElement("li");
                li.innerHTML = '<p>  ' + student.student_name + '</p>';
                ul.appendChild(li);
            })
        } else if (received_msg.action === "response" && received_msg.execute.status === "OK" && received_msg.execute.type === "verify") {
            let ul = document.getElementById("std_names");
            ul.innerHTML = '';
            let x = -1;
            x += 1;
            students.forEach(student => {
                    if (student.student_id === received_msg.execute.student_id)
                        student.isVerified = true;
                }
            )
            students.forEach(student => {
                if (student.isVerified === true) {
                    let ul = document.getElementById("std_names");
                    let li = document.createElement("li");
                    li.innerHTML = student.student_name + '<button class="img-rounded" type="button onclick="bonus(this.id)" "id" ="' + student.student_id + '">Bonus</button><button class="img-rounded" type="button" onclick="minus(this.id) id="' + student.student_id + '"">Minus</button>';
                    ul.appendChild(li);
                }
            })
        } else if (received_msg.action === "std_msg") {
            let student = students.find(st => st.student_id === received_msg.execute.student_id)
            let question = received_msg.execute.questions;
            let ul = document.getElementById("question");
            let li = document.createElement("li");
            li.innerHTML = '# Student Name : ' + student.student_name + '<br>>' + 'Qustion : ' + question + '<hr>';
            ul.appendChild(li);
        } else if (received_msg.execute.status === "OK" && received_msg.execute.type === "result_vote") {
            document.getElementById("vote_choices").style.display = "none";
            vote_result = document.getElementById("vote_result");
            vote_result.innerHTML = ch1 + ' : ' + received_msg.answer[0] + '<br>' + ch2 + ' : ' + received_msg.answer[1] + '/n' + ch3 + ' : ' + received_msg.answer[2] + '/n' + ch4 + ' : ' + received_msg.answer[3] + '/n';
        } else if (received_msg.action === "response" && received_msg.execute.type === "mute_all") {
            alert("All students are muted");
        } else if (received_msg.action === "response" && received_msg.execute.type === "unmute_all") {
            alert("All students are unmuted");
        } else if (received_msg.action === "response" && received_msg.execute.type === "quiz") {
            quiz_degrees[x] = {
                "student_id": received_msg.execute.student_id,
                //"professor_id" : ,
                //"subject_id" : ,
                "exam_type": received_msg.execute.type,
                "exam-mark": received_msg.execute.exam_mark,
            };
            x += 1;
        } else if (received_msg.execute.type === "endSession") {
            location.replace("/proflog");
        } else if (received_msg.action === "response_Self_end") {
            alert("A student left the session");
        } else if (received_msg.action === "response_mute") {
            alert("A student Muted himself");
        } else if (received_msg.action === "raise_hand") {
        	students.forEach( student=> {
            if(student.student_id ===received_msg.execute.student_id)
	            {
	            	let ul = document.getElementById("raised_hand_std");
		            let li = document.createElement("li");
		            li.innerHTML ="<p>A student raised his hand with name : </p>" + student.student_name;
		            ul.appendChild(li);
	            }
        	})

        }
    }
</script>
</body>
