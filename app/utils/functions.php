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
        $bdd = file_get_contents(base . 'app/utils/bdd.json');
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
        if (property_exists($users, $id)) $currentUser = $users->$id;
        else $currentUser = null;

        return $currentUser;
    }

    function getTeams () {
        return getBdd()->teams;
    }

    function getTeamByUserID () {
        $idUser = $_SESSION['id'];
        $teams = getTeams();
        $idTeam = getUserByID($idUser)->idTeam;

        if (is_numeric($idTeam) && property_exists($teams, $idTeam))$team = $teams->$idTeam;
        else $team = null;

        return $team;
    }

    function getMemberByTeam ($idTeam) {
        $users = getBdd()->users;

        $members = [];
        foreach($users as $user){
            if($user->idTeam == $idTeam) $members[] = $user;
        }

        return $members;
    }

    function updateTeam($idTeam = 0){
        $idUser = $_SESSION['id'];
        $bdd = getBdd();
        $teams = getTeams();

        if (is_numeric($idTeam)) {
            if ($idTeam == 0) {
                $bdd->users->$idUser->idTeam = (integer) $idTeam;
            } else if ($bdd->users->$idUser->idTeam == 0 && $idTeam > 0 && property_exists($teams, $idTeam)){
                $bdd->users->$idUser->idTeam = (integer) $idTeam;
            } else return false;
            
            $file = 'app/utils/bdd.json';
            $bdd = json_encode($bdd);
            file_put_contents($file, $bdd);
            return true;
        }

        return false;
    }


    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        
        $login = htmlspecialchars(trim($_POST['login']));
        $password = htmlspecialchars($_POST['password']);
        $currentUser = getUserByMail($login);

        $hash = hash('sha256', $password);

        $_SESSION['flash'] = [];

        if ($currentUser && hash_equals($hash, $currentUser->password))  {
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