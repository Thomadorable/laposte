<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');
?>

<header class="team-header profile">
    <img class="avatar" src="images/avatars/<?=$loggedUser->avatar?>" alt=""><div class="text">
        <h1 class="typo4"><?=$loggedUser->name?></h1>
        <p class="typo3">
            31 ans, Paris
            </p>
        <p class="opac50 min typo3">
            Pas encore de team
        </p>
    </div>
    <button class="edit-profile js-ajax-page" data-page="options">
        <?php include($path . 'images/edit-profil.svg') ?>
    </button>
</header>

<h2 class="typo3 title-progress flex flex-row">
    <span>Boîtes renvoyées au total</span>
    <span class="green"><span class="puce active"></span><span class="puce half-puce"></span><span class="puce"></span><span class="puce"></span></span>
</h2>
<div data-level="30" class="progress margin-top-20 green orange">
    <p class="typo2 relative defi-text progress-legend">16/50</p>
</div>
<p class="margin-top-20 typo2 text-progress">Plus que <span class="underlink">34 boîtes</span> à envoyer avant d’atteindre le prochain palier ! </p>

<div class="separator"></div>

<h2 class="typo3 title-progress flex flex-row">
    <span>Poids recyclé au total</span>
    <span class="green"><span class="puce half-puce"></span><span class="puce"></span><span class="puce"></span><span class="puce"></span></span>
</h2>
<div data-level="80" class="progress margin-top-20 green orange">
    <p class="typo2 relative defi-text progress-legend">80/100 kg</p>
</div>
<p class="margin-top-20 typo2 text-progress">Ça en fait des kilos portés jusqu’à ta boîte aux lettres, tu peux être fière 💪</p>

<div class="separator"></div>

<h2 class="typo3 title-progress flex flex-row">
    <span>Nombre de défis complétés</span>
    <span class="green"><span class="puce"></span><span class="puce"></span><span class="puce"></span><span class="puce"></span></span>
</h2>
<div data-level="0" class="progress margin-top-20 green orange">
    <p class="typo2 relative defi-text progress-legend">0</p>
</div>
<p class="margin-top-20 typo2 text-progress">Tu n’as pas encore de team, rejoins-en une pour compléter des défis et gagner des bonus. </p>


<h2><a href="?logout" class="button1">Logout</a></h2>