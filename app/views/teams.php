<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');
    $teams = getTeams();
?>

<header class="topbar topbar2 sticky no-desktop">
    <div class="boxed-wrapper flex padding-20">
        <h1><a href="" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
    </div>
</header>

<div class="center padding-top-menu">
    <img src="images/box.svg" alt="Icone de la team" class="no-team-img">
    <h1 class="typo1">Qui voulez-vous rejoindre ?</h1>
</div>

<div class="list-teams home-pattern">
    <?php foreach ($teams as $team) { ?>
        <div class="actu green">
            <div class="actu-content">
                
                <p class="typo1 z-index-2 center"><?= $team->name ?></p>

                <div class="flex z-index-2">
                    <a href="?page=team&team=<?= $team->id ?>" class="button2" data-page="box" data-tab="1">C'est parti !</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>