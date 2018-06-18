<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($team) include('./app/views/teamIn.php');
    else include('./app/views/teamOut.php');
?>