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

<div class="center">
    <img src="images/box.svg" alt="Icone de la team" class="no-team-img">
    <h1 class="typo1">Pas de team ?</h1>

    <p class="typo2 margin-top-10">Paaper, c’est encore mieux avec tes amis ! Débloque de nouveaux objectifs avec l’aide de ta team et gagnez ensemble des surprises inédites.</p>
</div>

<a href="" class="button1">Créer une team</a>
<a href="" class="button1">Rejoindre une team</a>



<?php foreach ($teams as $team) { ?>
    <div class="team">
        <h2><?= $team->name ?></h2>
        <a href="?page=team&team=<?= $team->id ?>">Rejoignez-nous</a>
    </div>
<?php } ?>