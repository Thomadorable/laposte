<section class="block01 h100%">
    <div class="maxWidth">
        <div class="txtArea">
            <h2 class="typo1">
            Vous recyclez ?<br>
            Soyez récompensé ! 
            </h2>
            <p class="typo2">
            Paaper, c'est la boîte mensuelle qui s'en va remplie de papier recyclé et qui revient pleine de surprises et de bons plans partenaires.
            </p>
            <a href="#block02" class="button2">Découvrir</a>
        </div>
    </div>
    <img src="images/headerimage.png" alt="">
    <?php include('images/arrowmask.svg'); ?>
</section>
<section id="block02" class="block02 landing-padding">
    <div class="maxWidth">
        <h2 class="typo1 color-green">
            C'est super simple.
        </h2>
        <p class="typo2 color-green">(promis 😉)</p>

        <div class="col3 typo2">
            <img src="<?= base ?>images/step1.png" alt="">
            <p>Je reçois ma <span class="bold">boîte personnelle</span>, identifiable grâce à son flashcode unique. Elle fera la <span class="bold">navette</span> entre Paaper, et moi pendant toute la durée de mon abonnement.
A vos marques, prêts… recyclez ! </p>
        </div><div class="col3 typo2">
            <img src="<?= base ?>images/step2.png" alt="">
            <p>Je me rends sur mon espace Paaper.fr et je me laisse guider. Une fois ma boîte remplie de <span class="bold">papier recyclé</span>, je la dépose directement en boîte aux lettres pour que le facteur vienne la chercher.</p>
        </div><div class="col3 typo2">
            <img src="<?= base ?>images/step3.png" alt="">
            <p>Ça y est, la boîte est partie ! Elle reviendra à la fin du mois pleine de <span class="bold">surprises</span> et de <span class="bold">bons plans</span> offerts par le <span class="bold">partenaire</span> du mois — le tout certifié zéro déchets et fidèle à nos valeurs bien sûr 😎</p>
        </div>
        <p class="typo2 typo5">
            Envie d’en savoir plus sur l’aventure Paaper ?
        </p>
        <a href="?page=login" class="button1">j’en meurs d’envie</a>
    </div>
</section>
<section class="block03 landing-padding">
    <video src="<?= base ?>images/videoiphone.mp4" autoPlay="true" loop="true"></video>
    <div class="maxWidth right">
        <div class="half left">
            <h2 class="typo1 color-green">
                Comment rendre le recyclage moins barbant ?
            </h2>
            <p class="typo2">
                <span class="bold">Paaper</span>, c'est l'histoire de cinq étudiants qui souhaitaient plus que tout avoir leur diplôme.  Un matin, ils s'assirent ensemble à une table et réfléchirent très très fort.  <br><br>

                Après de nombreux brainstormings, débriefings et autres benchmarks, ils en vinrent à la conclusion que tout le monde aime les <span class="bold">cadeaux</span>. De cette vérité révolutionnaire qui nécessitait bien trois jours de travail est né(e) <span class="bold">Paaper</span>, la box mensuelle qui s'en va et qui revient.
            </p>
        </div>
    </div>
</section>
<section class="block04 landing-padding pattern-landing">
    <img src="<?= base ?>images/confettis.png" alt="" class="confetti">
    <div class="maxWidth center">
        <h2 class="typo1 color-green ">
            Ce mois-ci
        </h2>
        <div class="actu">
            <img src="<?= base ?>images/loom.png" alt="Loom">
            <p class="typo2">
                Notre partenaire ce mois-ci, c&apos;est <a href="https://www.loom.fr">Loom</a>. Comme nous, ils évitent de considérer la planète comme une poubelle et ça c&apos;est cool 👍
                <br><br>
                En plus de ça ils fabriquent en France des <a href="https://www.loom.fr/collections/tous-les-produits">vêtements stylés</a> et faits pour durer. Et c&apos;est pour ça que ce mois-ci, Paaper, à décidé de s&apos;associer avec Loom pour vous.
            </p>
            <a href="https://www.loom.fr" class="button1">En savoir plus</a>
        </div>
        
    </div>
</section>
<section class="block04 landing-padding-bottom">
    <div class="maxWidth center">
        <h2 class="typo1 ">
            Ils nous ont fait confiance
        </h2>
        <?php
        $tab = [
            [
                "name" => "Kipluzet",
                "logo" => "kipluzet.png",
                "site" => "https://www.kipluzet.fr/fr",
            ],
            [
                "name" => "Komodo",
                "logo" => "komodo.png",
                "site" => "https://komodo.online",
            ],
            [
                "name" => "Panafrica",
                "logo" => "Capture d’écran 2018-06-21 à 10.57.06.png",
                "site" => "https://www.panafrica-store.com/fr",
            ],
            [
                "name" => "Jan n June",
                "logo" => "jannjune.png",
                "site" => "https://jannjune.com",
            ],
            [
                "name" => "Poeple Tree",
                "logo" => "peopletree.png",
                "site" => "http://www.peopletree.co.uk",
            ],
            [
                "name" => "Grain de Brune",
                "logo" => "graindebrune.png",
                "site" => "http://www.graindebrune.com",
            ],
            [
                "name" => "My Philo",
                "logo" => "myphilosophy.png",
                "site" => "https://www.myphilo.com",
            ],
            [
                "name" => "Ethletic",
                "logo" => "ethletic.png",
                "site" => "https://ethletic.com",
            ],
        ];
        foreach ($tab as $partenaire) { ?><div class="col4">
            <a href="<?= $partenaire['site'] ?>" target="_blank"><img src="<?= base . 'images/' . $partenaire['logo'] ?>" alt="<?= $partenaire['name'] ?>"></a>
        </div><?php } ?>

    </div>
</section>

<footer class="center">
    <p class="typo2">
    Tous droits réservés Paaper, 2018 ©
    </p>
</footer>