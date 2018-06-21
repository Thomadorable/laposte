<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<header class="topbar topbar2 sticky">
    <div class="boxed-wrapper flex padding-20">
        <h1><a href="" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
    </div>
</header>

<div class="center padding-top-menu">
    <img src="images/box.svg" alt="Icone de la team" class="no-team-img">
    <h1 class="typo1">Pas de team ?</h1>

    <p class="typo2 margin-top-10">Paaper, c’est encore mieux entre amis ! Débloquez de nouveaux objectifs avec l’aide de votre team et gagnez ensemble des surprises inédites.</p>
</div>

<a href="" class="button1">Créer une team</a>
<a href="" class="button1 js-get-page" data-page="teams" data-tab="4">Rejoindre une team</a>