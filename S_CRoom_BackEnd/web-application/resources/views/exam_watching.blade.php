<head>
    <title>Exam watching</title>
    <link rel="stylesheet" type="text/css" href="proftry.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<header>
    <h1 id="header">Here Professor can control the exam</h1>
    <button onclick="conncet()" class="btn btn-success">Start Exam
    <button onclick="End()" class="btn btn-success">End</button>
    <hr>
</header>
<h2>Remaining Time : <p id="demo"></p></h2>
<hr>
<h2>Who is cheating ?</h2><hr>
<div id="cheat-name"></div>
<script>
    let cheat_id,x=0;
    let ws = new WebSocket("wss://127.0.0.1:8080");
    let end_timer = //Get end time from database;
    let start_timer = //Get start time from database;
    let timer = end_timer - start_timer;
    function conncet() {
        //Get questions from database and put them in the questions array and then put it instead of the questions array in the json file.
        ws.send(JSON.stringify({
            "action": "start_exam",
            "to": "student",
            "from": "professor",
            "execute": {
                "token": "123124",
                "student_id": "00000",
                "timer": timer,
                "questions": [
                    {
                        'question': 'what is your name?',
                        'correct_answer': 'Tantawy',
                        'incorrect_answers': ['Hossam', 'Gad', 'Saber'
                        ]
                    },
                    {
                        "question": 'How old are you?', 'correct_answer': '22', 'incorrect_answers': ['20', '21', '19'
                        ]
                    },
                    {
                        'question': 'where are you from?',
                        'correct_answer': 'benha',
                        'incorrect_answers': ['giza', 'aswan', 'cairo'
                        ]
                    },
                    {
                        'question': 'what is your job?',
                        'correct_answer': 'still student',
                        'incorrect_answers': ['engineer', 'doctor', 'teacher'
                        ]
                    },
                    {
                        'question': 'predicted graduated year?',
                        'correct_answer': '2022',
                        'incorrect_answers': ['2021', '2023', '2024'
                        ]
                    },
                    {
                        'question': 'your best friend?',
                        'correct_answer': 'Tantawy',
                        'incorrect_answers': ['sayed', 'saber', 'goda'
                        ]
                    }
                ]

            }
        }));
    }
    let e=-1;
    let std_id,std_grade,wrong,correct;
    let exam_degree = [{
        "student_id" : "1230",
        "degree" : 26
    }]
    let all_exam_info = [{
        "type" : "final",
        "exam_min_degree" : 25,
        "exam_max_degree" : 50,
        "professor_id" : "prof_id",
        "subject_id" : "subject_id",
        "execute" : {
            exam_degree
        }
    }];

    ws.onmessage = function (event) {
        e+=1;
        let received_msg = JSON.parse(event.data);
        if (received_msg.execute.status === "OK") {
            exam_degree[e].student_id = received_msg.execute.student_id;
            exam_degree[e].degree = received_msg.execute.grade;
        }
    }
    function End() {
        ws.send(JSON.stringify(all_exam_info));
        location.replace("/proflog")
    }

</script>
</body>
