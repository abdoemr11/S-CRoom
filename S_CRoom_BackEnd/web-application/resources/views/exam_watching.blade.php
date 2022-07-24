<head>
    <title>Exam watching</title>
    <link rel="stylesheet" type="text/css" href="proftry.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<header>
    <h1 id="header">Here Professor can control the exam</h1>
    <button onclick="conncet()" class="btn btn-success">Start Exam</button>
    <hr>
</header>
<h2>Remaining Time : <p id="demo"></p></h2>
<hr>
<h2>Who is cheating ?</h2><hr>
<div id="cheat-name"></div>
<script>
    var cheat_id,x=0;
    let ws = new WebSocket("wss://127.0.0.1:8880");
    function conncet()
    {
        //Get questions from database and put them in the questions array and then put it instead of the questions array in the json file.
        ws.send(JSON.strigify({
            "action": "start_exam",
            "to": "student",
            "from": "professor",
            "execute": {
                "token": "123124",
                "student_id": "00000",
                "questions": [
                    { 'question': 'what is your name?', 'correct_answer': 'Tantawy', 'incorrect_answers': ['Hossam', 'Gad', 'Saber'
                        ]
                    },
                    { "question": 'How old are you?', 'correct_answer': '22', 'incorrect_answers': ['20', '21', '19'
                        ]
                    },
                    { 'question': 'where are you from?', 'correct_answer': 'benha', 'incorrect_answers': ['giza', 'aswan', 'cairo'
                        ]
                    },
                    { 'question': 'what is your job?', 'correct_answer': 'still student', 'incorrect_answers': ['engineer', 'doctor', 'teacher'
                        ]
                    },
                    { 'question': 'predicted graduated year?', 'correct_answer': '2022', 'incorrect_answers': ['2021', '2023', '2024'
                        ]
                    },
                    { 'question': 'your best friend?', 'correct_answer': 'Tantawy', 'incorrect_answers': ['sayed', 'saber', 'goda'
                        ]
                    }
                ]

            }
        }));
        var e=-1;
        var std_id,std_grade,wrong,correct;
        websocket.onmessage = function (event) {
            e+=1;
            var received_msg = JSON.parse(event.data);
            if (received_msg.action == "response") {
                std_id[e] = received_msg.execute.student_id;
                std_grade[e] = received_msg.execute.grade;
                correct[e] = received_msg.execute.correct;
                wrong[e] = received_msg.execute.wrong;
                //send data to database.
            }
            else if (received_msg.action == "cheat")
            {
                cheat_id[x] = received_msg.execute.device_id;
                document.getElementById("cheat-name").innerHTML += '<p> ' + cheat_id[x] + 'is cheating </p>' + '<button onclick="end_for_std()">End Exam</button><br>';

            }
        }
        var countDownDate = new Date("Get the time from database").getTime();
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("demo").innerHTML = hours + " h : "+ minutes + " m : " + seconds + " s ";
        if (distance < 0) {
            var end_session = {"action" : "endExam",
                "to" : "student",
                "from" : "professor",
                "execute" :{
                    "student_name" : "00000",
                    "type" : "timeout"
                }};
            ws.send(JSON.strigify(end_session));
            websocket.onmessage = function (event) {
                var received_name = JSON.parse(event.data);
                if (received_name.msg == "Ended the Exam for timout") {
                    alert("End Exam for timout succeeded");
                }
            }
        }
    }
    function end_for_std() {
        var end_session = {"action" : "end_session",
            "to" : "student",
            "from" : "professor",

            "execute" :{
                "device_id" : num.toString(cheat_id[this]),
                "type" : "cheating"
            }};
        ws.send(JSON.strigify(end_session));
        websocket.onmessage = function (event) {
            var received_name = JSON.parse(event.data);
            if (received_name.msg == "Ended the Exam for cheating") {
                alert("End Exam for cheating succeeded");
            }
        }
    }
</script>
</body>
