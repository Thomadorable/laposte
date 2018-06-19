<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');

    if ($team) include($path . 'app/views/teamIn.php');
    else include($path . 'app/views/teamOut.php');
?>