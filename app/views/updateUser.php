<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');

    $user = getUserByID($_SESSION['id']);

    $bdd = getBdd();

    $id = intval($_POST['id']);

    $name = htmlspecialchars($_POST['name']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($name)) {
        $bdd->users->$id->name = $name;
    }

    if (!empty($lastname)) {
        $bdd->users->$id->lastname = $lastname;
    }

    if (!empty($mail)) {
        $bdd->users->$id->mail = $mail;
    }

    if (!empty($password)) {
        $bdd->users->$id->password = $password;
    }

    $file = '../utils/bdd.json';
    $bdd = json_encode($bdd);
    file_put_contents($file, $bdd);

    echo 202;
?>