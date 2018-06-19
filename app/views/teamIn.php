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
                    <a href="">
                        <img src="images/mailbox.svg" alt="Ajouter un membre">    
                    </a>
                </div>
                <?php
                    foreach($members as $member) {
                        ?>
                            <div class="swiper-slide">
                                <a href="">
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

    <div class="progress"></div>
</header>

<a href="?page=team&team=0" class="button1">Quitter la team</a>
