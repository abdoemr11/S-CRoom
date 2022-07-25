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
<p id="current_course" class="h6"  > Course :             </p>
<p id="current_action" class="h6"  > (Lecture name +num) or (test num) </p>
<script>
    // Set the date we're counting down to
    //July 21, 2022 15:04:40
    let countDownDate = new Date("{{Auth::guard('exams')->exam_date}} {{Auth::guard('exams')->exam_start}} ").getTime();

    // Update the countdown every 1 second
    let x = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();

        // Find the distance between now and the countdown date
        let distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + " Day : " + hours + " h : "
            + minutes + " m : " + seconds + " s ";
        // If the countdown is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Please wait the exam will start soon";
            document.getElementById("current_course").style.display = "none";
            document.getElementById("current_action").style.display = "none";
        }
    }, 1000);
</script>

</body>
</html>
