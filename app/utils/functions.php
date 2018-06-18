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

    function setBdd($bdd){
        $file = 'app/utils/bdd.json';
        $bdd = json_encode($bdd);
        file_put_contents($file, $bdd);

        return true;
    }

    $models = ['security', 'teams', 'users', 'messages'];
    foreach ($models as $model ) {
        require_once('./app/utils/models/'.$model.'Model.php');
    }

?>