<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre</title>
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/swiper.css">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    </head>
    <body>
        <section class="page-content">
            <?php
                if(!empty($_GET['page'])) {
                    include ('assets/' . $_GET['page'] . '.php');
                } else {
                    include ('assets/box.php');
                }
            ?>
        </section>

        <nav class="menu">
                <ul>
                    <li class="item-menu js-get-page" data-page="home" data-tab="1"><a href=""><i class="fab fa-apple"></i> Home</a></li>
                    <li class="item-menu js-get-page"  data-page="gift" data-tab="2"><a href=""><i class="fab fa-apple"></i> Gift</a></li>
                    <li class="item-menu js-get-page box-menu active" data-page="box" data-tab="3"><a href=""><i class="fas fa-box"></i> BOX</a></li>
                    <li class="item-menu js-get-page" data-page="team" data-tab="4"><a href=""><i class="fab fa-apple"></i> team</a></li>
                    <li class="item-menu js-get-page" data-page="profile" data-tab="5"><a href=""><i class="fab fa-apple"></i> profile</a></li>
                </ul>
            </nav>

        <div class="grid">
            <?php
                for ($i=0; $i < 24; $i++) { 
                    echo '<div class="gridline"></div>';
                }
        ?>
        </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/main.js"></script>

    </body>
</html>