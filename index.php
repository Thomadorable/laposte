<?php
    session_start();

    require_once('app/utils/functions.php');

    if (!empty($_POST['login']) && !empty($_POST['password'])) login($_POST['login'], $_POST['password']);

    register();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Paaper</title>
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/fakelist.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/swiper.css">
        <meta name="viewport" content="width=device-width, user-scalable=no">

        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <?php
            if (isset($_SESSION['name'])) {

                function isMenuActive($page) {
                    if (isset($_GET['page']) && $_GET['page'] === $page) {
                        echo 'active';
                    }
                }

                if(!isset($_GET['page']) || $_GET['page'] === 'home') {
                    echo '<div class="pattern no-mobile"></div>';
                }
                ?>
                    <header class="topbar sticky">
                    <div class="boxed-wrapper flex padding-20">
                            <h1><a href="index.php" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
                            <ul class="header-menu">
                                <li><a class="typo3 <?php isMenuActive('gift')?>" href="?page=gift">Le partenaire du mois</a></li>
                                <li><a class="typo3 <?php isMenuActive('box')?>" href="?page=box">Mon calendrier</a></li>
                                <li><a class="typo3 <?php isMenuActive('team')?>" href="?page=team">Mon équipe</a></li>
                            </ul>

                            <ul class="header-menu">
                                <li><a class="typo3" href="?page=profile">Bonjour, <strong><?= $_SESSION['name']?></strong><span class="round-btn"><?php include('./images/chevron-down.svg') ?></span></a></li>
                            </ul>
                        </div>
                    </header>
                    <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

                        $ishome = ($page === 'home') ? 'no-padding-bottom' : '';
                    ?>
                    <div class="loader visible" id="loader"></div>
                    <section class="boxed-wrapper application" >
                        <div class="swiper-slide content-page <?=$page?> <?=$ishome?>">
                            <?php
                                include ('app/views/' . $page . '.php');
                            ?>
                        </div>
                    </section>

                    <?php if (getTeamByUserID()) include('./app/views/chaat.php'); ?>

                    <nav class="menu">
                            <ul>
                                <li class="item-menu js-get-page active" data-page="home" data-tab="1">
                                    <a href=""><?php include('images/home.svg'); ?> Accueil</a>
                                </li>
                                <li class="item-menu js-get-page"  data-page="gift" data-tab="2">
                                    <a href=""><?php include('images/package.svg'); ?> Partenaire</a>
                                </li>
                                <li class="item-menu js-get-page box-menu" data-page="box" data-tab="3"><span>
                                    <a href="">
                                        <img src="images/mailbox.gif" class="box-icon box-icon-inactive" alt="">
                                    </a></span>
                                </li>
                                <li class="item-menu js-get-page" data-page="team" data-tab="4">
                                    <a href=""><?php include('images/award.svg'); ?> Équipe</a>
                                </li>
                                <li class="item-menu js-get-page" data-page="profile" data-tab="5">
                                    <a href=""><?php include('images/profile.svg'); ?> Profil</a>
                                </li>
                            </ul>
                        </nav>

                    <div class="grid">
                        <?php
                            if (isset($_GET['debug'])) {
                                for ($i=0; $i < 24; $i++) { 
                                    echo '<div class="gridline"></div>';
                                }
                            }
                        ?>
                    </div>
                <?php
            } else {
                ?>
                    <header class="topbar sticky">
                        <div class="boxed-wrapper flex padding-20">
                            <h1><a href="" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
                            <ul class="header-menu">
                                <li><a class="typo3" href="?page=home">Le partenaire du mois</a></li>
                                <li><a class="typo3" href="?page=login">Mon calendrier</a></li>
                                <li><a class="typo3" href="?page=login">Mon équipe</a></li>
                            </ul>

                            <ul class="header-menu">
                                <li><a class="typo3" href="?page=login">Bo</a></li>
                            </ul>
                        </div>
                    </header>
                    <section class="boxed-wrapper visitor">
                        <?php
                            $allowedPages = ['landing', 'login', 'register'];
                            $page = (isset($_GET['page']) && in_array($_GET['page'], $allowedPages)) ? $_GET['page'] : 'landing';
                            if ($page === 'home') {
                                $page = 'landing';
                            }
                            include ('app/views/' . $page . '.php');
                        ?>
                    </section>
                <?php
                
            }
        ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/fakelist.js"></script>
    <script src="js/main.js"></script>

    </body>
</html>