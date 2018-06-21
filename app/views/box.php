<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');
?>
<div class="timeline <?=$loggedUser->step?>" >
    <img src="images/illu.gif" alt="" class="remove-padding">

    <div class="pattern no-desktop remove-padding"></div>

    <div class="timeline-month">
    <p class="typo2">« Voilà l’été, voilà l’été » </p>
    <p class="typo1">Juin 2018</p>

    <p class="typo2 first-box">Vous allez recevoir votre boîte dans moins de 5 jours pour commencer l'aventure 🏆</p>

    <a href="" class="button1 this-month">Je participe ce mois-ci</a>
    </div>

    <div class="event flex flex-row event-1">
        <div class="event-icon">
            <img src="images/calendrier.svg" alt="" class="timeline-icon">
            <img src="images/check2.svg" alt="" class="timeline-validate">
        </div>
        <div class="flex-1">
            <p class="typo2"><strong>Ma participation</strong> <span class="italic">(du 1er au 4 juin)</span></p>
            <p class="typo2">Je confirme ma participation à la boîte <a href="" class="js-get-page"  data-page="gift" data-tab="2">Loom</a> du mois de juin.</p>
        </div>
    </div>

    <div class="event flex flex-row event-2">
        <div class="event-icon">
            <img src="images/boite.svg" alt="" class="timeline-icon">
            <img src="images/check2.svg" alt="" class="timeline-validate">
        </div>
        <div class="flex-1">
            <p class="typo2"><strong>Ma boîte</strong> <span class="italic">(du 5 au 20 juin)</span></p>
            <p class="typo2">Vous avez choisi de renvoyer votre boîte <a href="" class="js-get-page" data-page="options" data-tab="5">le 15 de chaque mois</a>. Elle est prête en avance ? Prévenez-nous !</p>

            <div class="maboite">
                <img src="images/maboite.png" alt="" >
                <a href="" class="button2 boxready" data-id="<?=$loggedUser->id?>">Ma boîte est prête !</a>
            </div>
        </div>
    </div>

    <div class="event flex flex-row event-3">
        <div class="event-icon">
            <img src="images/message.svg" alt="" class="timeline-icon">
            <img src="images/check2.svg" alt="" class="timeline-validate">
        </div>
        <div class="flex-1">
            <p class="typo2"><strong>Le meilleur pour la fin</strong> <span class="italic">(suspense...)</span></p>
            <p class="typo2">C’est le meilleur moment ! Il ne vous reste plus qu’à attendre que votre boîte revienne, remplie des surprises et bons plans de notre partenaire du mois <a href="" class="js-get-page"  data-page="gift" data-tab="2">Loom</a> !</p>
        </div>
    </div>

    <div class="flex flex-row center timing">
        <div class="time-wrapper">
            <p class="typo1 jours">04</p>
            <p class="typo2 time-legend">Jours</p>
        </div>
        <div class="time-wrapper">
            <p class="typo1 heures">20</p>
            <p class="typo2 time-legend">Heures</p>
        </div>
        <div class="time-wrapper">
            <p class="typo1 minutes">15</p>
            <p class="typo2 time-legend">Minutes</p>
        </div>
        <div class="time-wrapper">
            <p class="typo1 secondes">9</p>
            <p class="typo2 time-legend">Secondes</p>
        </div>
    </div>

    <a href="" class="button1 event-4">J’ai bien reçu ma boîte</a>
    <a href="" class="button1 event-4">Je n’ai rien reçu…</a>
</div>