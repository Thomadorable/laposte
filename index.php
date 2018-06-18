<?php
    session_start();

    require_once('app/utils/functions.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre</title>
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/swiper.css">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    </head>
    <body>
        <?php
            if (isset($_SESSION['name'])) {

                if(!isset($_GET['page']) || $_GET['page'] === 'home') {
                    echo '<div class="pattern"></div>';
                }
                ?>
                    <header class="topbar sticky">
                    <div class="boxed-wrapper flex padding-20">
                            <h1><a href="index.php" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
                            <ul class="header-menu">
                                <li><a class="typo3" href="?page=gift">Le partenaire du mois</a></li>
                                <li><a class="typo3" href="?page=box">Mon calendrier</a></li>
                                <li><a class="typo3" href="?page=team">Mon équipe</a></li>
                            </ul>

                            <ul class="header-menu">
                                <li><a class="typo3" href="?page=profile">Bonjour, <strong><?php echo $_SESSION['name']?></strong></a></li>
                            </ul>
                        </div>
                    </header>
                    <?php
                        $pages = [0 => 'home', 1 => 'gift', 2 => 'box', 3 => 'team', 4 => 'profile'];

                        $currentSlide = (isset($_GET['page'])) ? array_search($_GET['page'], $pages) : 'false';

                        if ($currentSlide === false) {
                            $currentSlide = 'false';
                        }
                    ?>
                    <section class="page-content boxed-wrapper swiper-container-tabs full-height" data-current="<?=$currentSlide?>">
                        <div class="swiper-wrapper">
                            <?php
                                $loggedUser = getUserByID($_SESSION['id']);
                                foreach ($pages as $page) {
                                    $active = 'swiper-desktop-hide';
                                    if(isset($_GET['page']) && in_array($_GET['page'], $pages)) {
                                        if ($_GET['page'] === $page) {
                                            $active = 'swiper-tabs-active';
                                        }
                                    } else if($page === 'home') {
                                        $active = 'swiper-tabs-active';
                                    }
                                ?>
                                    <div class="swiper-slide <?=$active?> <?=$page?>">
                                        <?php
                                            include ('app/views/' . $page . '.php');
                                        ?>
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                    </section>

                    <?php
                        include('app/views/chaat.php');
                    ?>

                    <nav class="menu">
                            <ul>
                                <li class="item-menu js-get-page active" data-page="home" data-tab="1">
                                    <a href=""><?php include('images/home.svg'); ?> Accueil</a>
                                </li>
                                <li class="item-menu js-get-page"  data-page="gift" data-tab="2">
                                    <a href=""><?php include('images/package.svg'); ?> Partenaire</a>
                                </li>
                                <li class="item-menu js-get-page box-menu" data-page="box" data-tab="3"><span>
                                    <a href=""><img src="images/mailbox.svg" class="fas" alt=""></a></span>
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
                    <section class="page-content boxed-wrapper visitor">
                        <?php
                            $allowedPages = ['landing', 'login'];
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
    <script src="js/main.js"></script>

    </body>
</html>