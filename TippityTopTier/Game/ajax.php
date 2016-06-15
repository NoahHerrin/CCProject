<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'red':
         
            break;
        case 'blue':

            break;
    }
}

?>

function g1_submit() {
if(team_one_score > team_two_score) {
game_one_result = "Team One";
} else if(team_one_score == team_two_score) {
game_one_result = "Team Two";
} else {
game_one_result = "Tie"
}
document.getElementById("GameOne").style.display = "none";
}
