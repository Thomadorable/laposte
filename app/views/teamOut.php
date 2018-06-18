<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $teams = getTeams();
?>

<h1 class="page-title">Rejoignez une team</h1>
<?php foreach ($teams as $team) { ?>
    <div class="team">
        <h2><?= $team->name ?></h2>
        <a href="?page=team&team=<?= $team->id ?>">Rejoignez-nous</a>
    </div>
<?php } ?>