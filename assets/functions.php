<?php
   // define('base', 'http://localhost/laposte/');
    define('base', 'http://localhost/GIT/laposte/');

    if (empty($_SERVER['HTTPS']) && $_SERVER['REMOTE_ADDR'] !== '::1') {
        header('Location: https://paaper.fr/index.php');
        exit();
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    function echoMessage() {
        if (!empty($_SESSION['flash']) && !empty($_SESSION['flash']['message'])) {
            $type = !empty($_SESSION['flash']['type']) ? $_SESSION['flash']['type'] : 'success';
            echo '<p class="' . $type . '">' . $_SESSION['flash']['message'] . '</p>';
            $_SESSION['flash'] = [];
        }
    }

    function getBdd() {
        $bdd = file_get_contents(base . 'data/bdd.json');
        return json_decode($bdd);
    }

    function getUserByMail($login) {
        $bdd = getBdd();
        $users = $bdd->users;
        $currentUser = null;

        foreach ($users as $user) {
            if ($user->mail === $login) {
                $currentUser = $user;
                break;
            }
        }

        return $currentUser;
    }

    function getUserByID($id) {
        $bdd = getBdd();
        $users = $bdd->users;
        $currentUser = $users->$id;

        return $currentUser;
    }

    function getUserTeam($idUser) {
        $bdd = getBdd();
        $team = null;

        $user = getUserByID($idUser);
        return $user;
    }

    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        
        $login = htmlspecialchars(trim($_POST['login']));
        $currentUser = getUserByMail($login);
       

        $hashed_password = '$1$dZO84ftm$vQ7GNGnn.gmYy36YyfuF/1';
        $_SESSION['flash'] = [];

        if ($currentUser && hash_equals($hashed_password, crypt($_POST['password'], $hashed_password)))  {
            $_SESSION['flash']['message'] = "Mot de passe correct !";
            $_SESSION['name'] = $currentUser->name;
            $_SESSION['id'] = $currentUser->id;

            header('Location: index.php');
            exit();
        } else {
            $_SESSION['flash']['message'] = 'Les identifiants sont incorrects.';
            $_SESSION['flash']['type'] = 'error';
        }
    } 
?>