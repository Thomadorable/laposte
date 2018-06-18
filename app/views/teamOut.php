<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $teams = getTeams();
?>

<header class="topbar sticky topbar2">
    <div class="boxed-wrapper flex padding-20">
        <h1><a href="" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
    </div>
</header>

<h1 class="page-title">Rejoignez une team</h1>
<?php foreach ($teams as $team) { ?>
    <div class="team">
        <h2><?= $team->name ?></h2>
        <a href="?page=team&team=<?= $team->id ?>">Rejoignez-nous</a>
    </div>
<?php } ?>