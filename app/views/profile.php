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
            <?php
                if ($team) {
                    echo 'Équipe : ' . $team->name;
                } else {
                    echo 'Pas encore d\'équipe';
                }
            ?>
        </p>
    </div>
    <button class="edit-profile js-ajax-page" data-page="options">
        <?php include($path . 'images/edit-profil.svg') ?>
    </button>
</header>

<h2 class="typo3 title-progress flex flex-row">
    <span>Boîtes renvoyées au total</span>
    <span class="green">
        <?php
            for ($i=0; $i < 4; $i++) { 
                $active = ($loggedUser->levels[0] > $i) ? 'active' : '';
                echo '<span class="puce ' . $active . '"></span>';
            }
        ?>
    </span>
</h2>
<div data-level="<?=$loggedUser->progress[0]?>" class="progress margin-top-20 green orange">
    <p class="typo2 relative defi-text progress-legend"><?=$loggedUser->bars[0]?>/50</p>
</div>
<p class="margin-top-20 typo2 text-progress">Plus que <span class="underlink"><?=(50 - $loggedUser->bars[0])?> boîtes</span> à envoyer avant d’atteindre le prochain palier ! </p>

<div class="separator"></div>

<h2 class="typo3 title-progress flex flex-row">
    <span>Poids recyclé au total</span>
    <span class="green">
        <?php
            for ($i=0; $i < 4; $i++) { 
                $active = ($loggedUser->levels[1] > $i) ? 'active' : '';
                echo '<span class="puce ' . $active . '"></span>';
            }
        ?>
    </span>
</h2>
<div data-level="<?=$loggedUser->progress[1]?>" class="progress margin-top-20 green orange">
    <p class="typo2 relative defi-text progress-legend"><?=$loggedUser->bars[1]?>/100 kg</p>
</div>
<p class="margin-top-20 typo2 text-progress">Ça en fait des kilos portés jusqu’à votre  boîte aux lettres, vous pouvez être fière 💪</p>

<div class="separator"></div>

<h2 class="typo3 title-progress flex flex-row">
    <span>Nombre de défis complétés</span>
    <span class="green">
        <?php
            for ($i=0; $i < 4; $i++) { 
                $active = ($loggedUser->levels[2] > $i) ? 'active' : '';
                echo '<span class="puce ' . $active . '"></span>';
            }
        ?>
    </span>
</h2>
<div data-level="<?=$loggedUser->progress[2]?>" class="progress margin-top-20 green orange">
    <p class="typo2 relative defi-text progress-legend">0</p>
</div>
<p class="margin-top-20 typo2 text-progress">
    <?php
        if ($team) {
            echo 'Complétez les <a href="" class="js-get-page" data-page="team" data-tab="4">défis d\'équipe</a> pour gagner des bonus !';
        } else {
            echo 'Vous n’avez pas encore d\'équipe, rejoignez-en une pour compléter des défis et gagner des bonus.';
        }
    ?>
</p>


<h2><a href="?logout" class="button1">Déconnexion</a></h2>