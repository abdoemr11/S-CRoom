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

        <div class="form_class" id="login_form" style="display: flex">
            <div><p id="no1">Student ID:</p>
                <input class="field_class , use-keyboard-input"type="number" placeholder="Enter your ID" id="std_id"></div>
            <div><p id="no1">Prof ID:</p>
                <input class="field_class , use-keyboard-input"type="number" placeholder="Enter Prof ID" id="prof_id"></div>

            <button class="submit_class" form="login_form" onclick="sub()">Submit</button>
        </div>
    <img src="wait.png" style="display: none; height: 200px; width: 200px" id="waiting_img">
    <h2 style="display: none;" id="msg_for_no_std"></h2>
</main>
<script src="keyboard.js"></script>
<script>
    let ws = new WebSocket("ws://192.168.1.8:8080");
    console.log("here");
    let std_id  = document.getElementById("std_id").value;
    let prof_id = document.getElementById("prof_id").value;
    function sub() {

        ws.send(JSON.stringify({
            "action": "connect",
            "to": "server",
            "from": "student",
            "execute": {
                "student_id": "std_id",
                "professor_id": "prof_id",
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
            else if (received_msg.execute.type ==="verify" && received_msg.execute.status === "FAILED") {
                alert("You are not recognized");
                document.getElementById("login_form").style.display="none";
                document.getElementById("msg_for_no_std").innerHTML = "Ask the admin to register yourself.";
                document.getElementById("msg_for_no_std").style.display = "block";
            }

        }

    }



</script>
</body>
