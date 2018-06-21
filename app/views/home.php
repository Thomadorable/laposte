<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');
?>

<header class="topbar topbar2 sticky no-desktop">
    <div class="boxed-wrapper flex padding-20">
        <h1><a href="" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
    </div>
</header>

<div class="pattern no-desktop remove-padding"></div>

<article class="flex full-height padding-top-menu">
    <div class="half home-half home-left">
        <div class="v-center-home">
        <img src="images/avatars/<?=$loggedUser->avatar?>" alt="Avatar" class="home-avatar">
        <p class="typo1">Re-bonjour <?= $loggedUser->name ?> ! 👋</p>

        <?php
            if ($loggedUser->name === 'Vanessa') {
                ?>
                 <p class="typo2">
                    Depuis que vous nous avez rejoints, <br>c’est <strong class="underlink"><span class="animate-number nb-box">13653</span>&nbsp;boîtes</strong> qui ont
                    été envoyées par la communauté Paaper, dont <strong class="underlink animate-number">16</strong> juste grâce
                    à vous !
                </p>
                <p class="typo2">
                    Après <strong class="underlink"><span class="animate-number">9</span> mois</strong> sans manquer un seul de nos rendez-vous, vous faites aussi partie de notre élite Paaperienne puisque c’est mieux que <strong class="underlink"><span class="animate-number">67</span>%</strong> de nos membres. Merci pour votre fidélité ! ✉️
                </p>
                <?php
            }
            else {
                ?>
                <p class="typo2">Depuis que vous nous avez rejoints, c’est <strong class="underlink"><span class="animate-number">23</span>&nbsp;boîtes</strong> qui ont
                    été envoyées par la communauté Paaper !</p>
                <p class="typo2">Votre boîte arrivera très rapidement pour que vous puissiez commencer l'aventure !</p>
                <?php
            }
        ?>

       

        

        <a href="?page=box" class="js-get-page button1" data-page="box" data-tab="3"><span class="middle"> Ma boîte aux lettres</span> <?php include($path . 'images/arrow.svg') ?></a>
        </div>
    </div>

    <div class="half home-half home-pattern">
        <div class="scrolling fadeOut">
            <?php 

            $names = ['Estelle Burnichon', 'Amandine Didier', 'Pierre Pineau', 'Violaine Bodolec', 'Thomas Deroua'];
            $dates = ['Il y a 10 minutes', 'Il y a 2 heures', 'Aujourd\'hui à 8h54', 'Il y a une semaine', 'Il y a une semaine'];
            
            for ($i=0; $i < 5; $i++) { 
                 if ($i === 2 || $i === 4) { ?>
                    <div class="actu green">
                        <header>
                            <p class="actu-title"><?php include($path . 'images/package.svg') ?> <span class="middle">NOUVEAU PARTENAIRE</span></p>
                            <p class="actu-date"><?=$dates[$i]?> <a href="" class="round-btn close-actu"><?php include($path . 'images/x.svg') ?></a></p>
                        </header>
                        <div class="actu-content">
                            <?php
                                if($i === 2) {
                                    ?>
                                        <p class="typo2 z-index-2">L’été approche à grand pas et pour l’occasion, notre partenaire du mois a plein de bons plans à vous offrir…</p>
                                    <?php
                                } else {
                                    ?>
                                        <p class="typo2 z-index-2">Paaper a atteint les 50.000 utilisateurs ! Merci à tous pour votre contribution, continuez comme ça 😉</p>
                                    <?php
                                }
                            ?>

                            <div class="flex z-index-2">
                                <a href="" class="button2" data-page="box" data-tab="1">Découvrir</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="actu">
                        <header>
                            <p class="actu-title"><?php include($path . 'images/user-plus.svg') ?> <span class="middle">Nouvel ami Facebook</span></p>
                            <p class="actu-date"><?=$dates[$i]?> <a href="" class="round-btn close-actu"><?php include($path . 'images/x.svg') ?></a> </p>
                        </header>
                        <div class="actu-content">
                            <p class="typo2 z-index-2">Votre ami(e) Facebook <strong><?=$names[$i]?></strong> vient de s’inscrire, souhaitez-vous l’inviter à rejoindre votre team ?</p>

                            <div class="flex z-index-2">
                                <a href="" class="button2">Inviter</a>
                                <a href="" class="button2 close-actu">Non, merci</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</article>