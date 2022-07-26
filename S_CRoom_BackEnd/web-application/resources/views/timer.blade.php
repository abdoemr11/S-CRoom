<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiting</title>
    <style>
        body {
            background: black;
        }
        p {
            text-align: center;
            font-size: 40px;
            margin-top: 40px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<p id="demo"></p>
<h2>Please wait</h2>
<script>
    let ws = new WebSocket("wss://127.0.0.1:8080");
    ws.onmessage = function (event) {
        let received_msg = JSON.parse(event.data);
        if (received_msg.action=== "start_exam") {
        location.replace("/loginr");
        }
    }
</script>

</body>
</html>
