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
    <form id="login_form" class="form_class" action="login.php" method="post">
        <div class="form_div">
            <p id="no1">Student ID:</p>
            <input class="field_class , use-keyboard-input"type="number" placeholder="Enter your ID" id="std_id">
            <p id="no1">Prof ID:</p>
            <input class="field_class , use-keyboard-input"type="number" placeholder="Enter Prof ID" id="prof_id">
            <button class="submit_class" type="submit" form="login_form" onclick="submit()">Submit</button>
        </div>

    </form>
</main>
<script src="keyboard.js"></script>
<script>
    let ws = new WebSocket("wss://127.0.0.1:8880");
    function submit() {
        std_id  = document.getElementById("std_id").value;
        prof_id = document.getElementById("prof_id").value;
        ws.send(JSON.strigify({
            "action": "connect",
            "to": "server",
            "from": "student",
            "execute": {
                "name": std_id,
                "professor_id": prof_id
            }
        }));
        websocket.onmessage = function (event) {
            var received_msg = JSON.parse(event.data);
            if (received_msg.execute.status == "OK") {
                location.href = "//Live Page for student";
            }

        }

    }



</script>
</body>
