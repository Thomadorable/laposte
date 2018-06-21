<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');

    $bdd = getBdd();

    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $user = $bdd->users->$id;
    
        $user->bars[0] = $user->bars[0] + 1;
    
        $bdd->users->$id = $user;
        $file = '../utils/bdd.json';
        $bdd = json_encode($bdd);
        file_put_contents($file, $bdd);
    
        echo $user->bars[0];
    }
?>