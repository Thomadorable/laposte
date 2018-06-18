<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $team = getTeamByUserID($_SESSION['id']);
    $members = getMemberByTeam($team->id);
    
    leaveTeam($_SESSION['id']);
?>

<h1 class="page-title">Team <?= $team->name ?></h1>

<div class="relative">
    <div class="swiper-container swiper-container-team">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="">+</a>
            </div>
            <?php
                foreach($members as $member) {
                    ?>
                        <div class="swiper-slide">
                            <a href=""><?=$member->name?></a>
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