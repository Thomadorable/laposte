<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $members = getMemberByTeam($team->id);
?>

<header class="team-header">
    <h1 class="page-title typo4"><span>@</span><?= strtolower($team->name) ?></h1>

    <div class="relative">
        <div class="swiper-container swiper-container-team">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="javascript:void(0);">
                        <img src="images/add-friend.svg" alt="Ajouter un membre">    
                    </a>
                </div>
                <?php
                    foreach($members as $member) {
                        ?>
                            <div class="swiper-slide">
                                <a href="javascript:void(0);">
                                    <img src="images/avatars/<?=$member->avatar?>" alt="Profil de <?=$member->name?>">    
                                </a>
                            </div>
                        <?php
                    }
                ?>
                
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div data-level="80" class="progress margin-top-20">
        <p class="typo2 relative niveau-text progress-legend">Niveau « Aathlète »</p>
        <img src="images/star.svg" alt="" class="team-star">
    </div>
</header>

<h2 class="typo3 title-progress flex flex-row">
    <span>Boîtes renvoyées au total</span>
    <span><span class="puce active"></span><span class="puce active"></span><span class="puce half-puce"></span><span class="puce"></span></span>
</h2>
<div data-level="60" class="progress margin-top-20 orange">
    <p class="typo2 relative defi-text progress-legend">61/100</p>
</div>
<p class="margin-top-20 typo2 text-progress">Plus que <span class="underlink">39 boîtes</span> à envoyer avant d’atteindre le prochain palier ! </p>

<div class="separator"></div>

<h2 class="typo3 title-progress flex flex-row">
    <span>Poids recyclé au total</span>
    <span><span class="puce active"></span><span class="puce half-puce"></span><span class="puce"></span><span class="puce"></span></span>
</h2>
<div data-level="80" class="progress margin-top-20 orange">
    <p class="typo2 relative defi-text progress-legend">405/500 kg</p>
</div>
<p class="margin-top-20 typo2 text-progress">Ça en fait des kilos portés jusqu’aux boîtes aux lettres, bande d’athlètes 💪</p>


<a href="?page=team&team=0" class="button1">Quitter l'équipe</a>
