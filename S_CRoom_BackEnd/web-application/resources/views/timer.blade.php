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
<a href="Profile page/SP.html" style="display: none;"id="profile"><p  class="h6"  > Go to personal page </p></a>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("July 21, 2022 15:04:40").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + " Day : " + hours + " h : "
            + minutes + " m : " + seconds + " s ";
        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "The next event will be uploaded soon";
            document.getElementById("current_course").style.display = "none";
            document.getElementById("current_action").style.display = "none";
            document.getElementById("profile").style.display = "block";
        }
    }, 1000);
</script>

</body>
</html>
