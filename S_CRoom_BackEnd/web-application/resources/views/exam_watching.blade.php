<head>
    <title>Exam watching</title>
    <link rel="stylesheet" type="text/css" href="proftry.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<header>
    <h1 id="header">Here Professor can control the exam</h1>
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
