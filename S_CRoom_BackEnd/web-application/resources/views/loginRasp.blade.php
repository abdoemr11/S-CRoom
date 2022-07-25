<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="loginRasp.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<header>
    <h1>LOG IN</h1>
</header>
<main>
    <form id="login_form" class="form_class" action="/stdlive" method="get">
        <div class="form_div" style="display: flex">
            <div><p id="no1">Student ID:</p>
                <input class="field_class , use-keyboard-input"type="number" placeholder="Enter your ID" id="std_id"></div>
            <div><p id="no1">Prof ID:</p>
                <input class="field_class , use-keyboard-input"type="number" placeholder="Enter Prof ID" id="prof_id"></div>

            <button class="submit_class" type="submit" form="login_form" onclick="submit()">Submit</button>
        </div>
    </form>
    <img src="wait.png" style="display: none; height: 200px; width: 200px" id="waiting_img">
</main>
<script src="keyboard.js"></script>
<script>
    let ws = new WebSocket("ws://127.0.0.1:8080");
    function submit() {
        let std_id  = document.getElementById("std_id").value;
        let prof_id = document.getElementById("prof_id").value;
        ws.send(JSON.stringify({
            "action": "connect",
            "to": "server",
            "from": "student",
            "execute": {
                "student_id": std_id,
                "professor_id": prof_id,
                "device_id": "123",
                "origin" : "javascript"
            }
        }));
        document.getElementById("login_form").style.display="none";
        document.getElementById("waiting_img").style.display="block";
        ws.onmessage = function (event) {
            let received_msg = JSON.parse(event.data);
            if (received_msg.execute.type ==="verify" && received_msg.execute.status === "OK") {
                location.href = "/stdlive";
            }
            else {

            }

        }

    }



</script>
</body>
