<?php

function login ($login, $password) {
    $login = htmlspecialchars(trim($login));
    $password = htmlspecialchars($password);
    $currentUser = getUserByMail($login);


    $hash = getHash($password);


    $_SESSION['flash'] = [];

    if ($currentUser && $hash === $currentUser->password)  {
        $_SESSION['name'] = $currentUser->name;
        $_SESSION['id'] = $currentUser->id;

        header('Location: index.php');
        exit();
    } else {
        $_SESSION['flash']['message'] = 'Les identifiants sont incorrects.';
        $_SESSION['flash']['type'] = 'error';
    }
}

function randId(){
    $rand = rand(0, 999999999);
    if (getUserByID($rand)) randId();
    else return $rand;
}

function getHash($str) {
    return hash('sha256', $str);
}

function register () {
    if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['lastname']) && !empty($_POST['name'])) {
        $_SESSION['flash'] = [];
        
        $login = htmlspecialchars(trim($_POST['login']));
        $currentUser = getUserByMail($login);
    
        if($currentUser) {
            $_SESSION['flash']['message'] = "Cet email est déjà utilisé";
            return false;
        }

        $bdd = getBdd();
        $user = [
            "id" => randId(),
            "name" => htmlspecialchars(trim($_POST['name'])),
            "lastname" => htmlspecialchars(trim($_POST['lastname'])),
            "mail" => htmlspecialchars(trim($_POST['login'])),
            "password" => getHash(htmlspecialchars($_POST['password'])),
            "avatar" => "",
            "idTeam" => 0
        ];

        $bdd->users->{$user['id']} = $user;

        setBdd($bdd);
        login($user['mail'], $_POST['password']);
    } 
}