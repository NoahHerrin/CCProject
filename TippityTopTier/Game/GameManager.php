<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <title>Game Manager</title>
    <script type="text/javascript">
        <!--

        function updateClock ( )
        {
            var currentTime = new Date ( );

            var currentHours = currentTime.getHours ( );
            var currentMinutes = currentTime.getMinutes ( );
            var currentSeconds = currentTime.getSeconds ( );

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

            // Update the time display
            document.getElementById("clock").firstChild.nodeValue = currentTimeString;

        }

        // -->
    </script>
    <style>
        body {
            text-align:center;
        }
    </style>
</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">

<span id="clock">&nbsp;</span>

    <p id="title">User not Selected</p>
    <div id="select_user">
    <input type="button" value="Red" onclick="red();">
    <input type="button" value="Blue" onclick="blue();">
    </div>
    <p id="cin_status">0/2 Players Checked in</p>
    <div id="check_in">
    <input id="checkin_btn" type = "button" value="Checkin" onclick="checkin();">
    </div>
    <p id="G1_title">Game One:</p>
    <div id="GameOne">
        <p id="TeamOne">Team 1: 0</p>
        <input id="team1_add" type = "button" value="+" onclick="addOne();">
        <input id="team1_minus" type = "button" value="-" onclick="subtractOne();">
        </br>
        <p id="TeamTwo">Team 2 0</p>
        <input id="team2_add" type = "button" value="+" onclick="addTwo();">
        <input id="team2_minus" type = "button" value="-" onclick="subtractTwo();">
        </br>
        <input id="submit_game_one_scores" type="button" value="Submit Scores" onclick="g1_submit();">
    </div>

    <script>
        var current_user = "None";
        var checkin_red = false;
        var checkin_blue = false;
        var checkin_status = false;

        var game_one_result = "Game in Progress";
        var team_one_score = 0;
        var team_two_score = 0;

        function red() {
            current_user = "Red";
            update();
        }
        function blue() {
            current_user = "Blue";
            update();
        }
        function update() {
            document.getElementById("title").innerHTML = "Current User: " + current_user;


        }
        function checkin() {
            if(current_user == "Red") {
                checkin_red = true;
            } else if (current_user != "Blue") {

            } else {
                checkin_blue = true;
            }
            if (!(checkin_blue == true && checkin_red == true)) {
            } else {
                document.getElementById("cin_status").innerHTML = "Checkin Successful: 2/2 Players Checked in";
                document.getElementById("check_in").style.display = "none";
                checkin_status = true;
                console.log("Check in Successful");
            }
            if(checkin_blue == true && checkin_red == false) {
                document.getElementById("cin_status").innerHTML = "1/2 Players Checked in";
            }
            if(checkin_blue == false && checkin_red == true) {
                document.getElementById("cin_status").innerHTML = "1/2 Players Checked in";
            }
            if(checkin_blue == false && checkin_red == false) {
                document.getElementById("cin_status").innerHTML = "0/2 Players Checked in";
            }

        }
        function addOne() {
            if(checkin_status == true && game_one_result == "Game in Progress") {
                team_one_score += 1;
                document.getElementById("TeamOne").innerHTML = "Team 1: " + team_one_score;
            }

        }
        function subtractOne() {
            if(checkin_status == true && game_one_result == "Game in Progress") {
                team_one_score -= 1;
                document.getElementById("TeamOne").innerHTML = "Team 1: " + team_one_score;
            }

        }
        function addTwo() {
            if(checkin_status == true && game_one_result == "Game in Progress") {
                team_two_score += 1;
                document.getElementById("TeamTwo").innerHTML = "Team 2: " + team_two_score;
            }

        }
        function subtractTwo() {
            if(checkin_status == true && game_one_result == "Game in Progress") {
                team_two_score -= 1;
                document.getElementById("TeamTwo").innerHTML = "Team 2: " + team_two_score;
            }

        }

        function g1_submit() {
            if(team_one_score > team_two_score) {
                game_one_result = "Team One";
                document.getElementById("G1_title").innerHTML = "Game One: Team One Won!"
            } else if(team_one_score == team_two_score) {
                game_one_result = "Team Two";
                document.getElementById("G1_title").innerHTML = "Game One: Team Two Won!"
            } else {
                game_one_result = "Tie"
                document.getElementById("G1_title").innerHTML = "Game One: Tie!"
            }
            document.getElementById("GameOne").style.display = "none";
        }

    </script>

</body>
</html>