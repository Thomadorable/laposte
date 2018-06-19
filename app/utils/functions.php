<?php
    $base = 'http://localhost/GIT/laposte/';
    $baseInclude = '';

    if ($_SERVER['REMOTE_ADDR'] !== '::1') {
        if (empty($_SERVER['HTTPS'])) {
            header('Location: https://paaper.fr/index.php');
            exit();
        }

        $base = 'http://paaper.fr/';
    }

    define('base', $base);

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

    function setBdd($bdd){
        $file = 'app/utils/bdd.json';
        $bdd = json_encode($bdd);
        file_put_contents($file, $bdd);

        return true;
    }

    $path = '';
    $pattern = '/views/';
    if (preg_match($pattern, $_SERVER['PHP_SELF'])) {
        $path = '../../';
    }

    $models = ['security', 'teams', 'users', 'messages'];
    foreach ($models as $model) {
        require_once($path . 'app/utils/models/'.$model.'Model.php');
    }

    if(isset($_GET['team']) && is_numeric($_GET['team'])) {
        updateTeam($_GET['team']);
        header('Location: index.php?page=team');
        exit();
    }

    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        $loggedUser = getUserByID($_SESSION['id']);

        $team = getTeamByUserID();
    }
?>