<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_GET['team']) && is_numeric($_GET['team'])) {
        updateTeam($_GET['team']);
    }

    $team = getTeamByUserID();

    if ($team) include('./app/views/teamIn.php');
    else include('./app/views/teamOut.php');
?>