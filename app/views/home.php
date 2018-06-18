<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<article class="flex full-height">
    <div class="half home-half home-left">
        <div class="v-center">
        <img src="images/avatars/<?=$loggedUser->avatar?>" alt="Avatar" class="home-avatar">
        <p class="typo1">Re-bonjour Vanessa ! 👋</p>

        <p class="typo2">
            Depuis que tu nous as rejoints, c’est <strong class="underlink">13&nbsp;653 boîtes</strong> qui ont
            été envoyées par la communauté Paaper, dont <strong class="underlink">16</strong> juste grâce
            à toi !
        </p>
        <p class="typo2">
            Après <strong class="underlink">9 mois</strong> sans manquer un seul de nos rendez-vous, tu fais aussi partie de notre élite Paaperienne puisque c’est mieux que <strong class="underlink">85%</strong> de nos membres. Merci pour ta fidélité ! ✉️
        </p>

        <a href="?page=box" class="js-get-page button1" data-page="box" data-tab="1">Voir mon calendrier</a>
        </div>
    </div>

    <div class="half home-half home-pattern">
        <div class="scrolling fadeOut">
            <div class="actu">
                <header>
                    <p class="actu-title">© Nouvel ami Facebook</p>
                    <p class="actu-date">aujourd'hui, à 16h54 <a href="" class="round-btn close-actu">x</a> </p>
                </header>
                <div class="actu-content">
                    <p class="typo2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit impedit laboriosam expedita ullam, minima placeat cumque perferendis quia aut natus veniam at culpa fugit suscipit repellendus voluptate adipisci quibusdam explicabo?</p>

                    <div class="flex">
                        <a href="" class="button2">Inviter</a>
                        <a href="" class="button2 close-actu">Non, merci</a>
                    </div>
                </div>
            </div>

            <div class="actu green">
                <header>
                    <p class="actu-title">© Nouvel ami Facebook</p>
                    <p class="actu-date">aujourd'hui, à 16h54 <a href="" class="round-btn close-actu">x</a></p>
                </header>
                <div class="actu-content">
                    <p class="typo2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit impedit laboriosam expedita ullam, minima placeat cumque perferendis quia aut natus veniam at culpa fugit suscipit repellendus voluptate adipisci quibusdam explicabo?</p>

                    <div class="flex">
                        <a href="" class="button2" data-page="box" data-tab="1">Découvrir</a>
                    </div>
                </div>
            </div>

            <div class="actu">
                <header>
                    <p class="actu-title">© Nouvel ami Facebook</p>
                    <p class="actu-date">aujourd'hui, à 16h54 <a href="" class="round-btn close-actu">x</a></p>
                </header>
                <div class="actu-content">
                    <p class="typo2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit impedit laboriosam expedita ullam, minima placeat cumque perferendis quia aut natus veniam at culpa fugit suscipit repellendus voluptate adipisci quibusdam explicabo?</p>

                    <div class="flex">
                        <a href="" class="button2">Inviter</a>
                        <a href="" class="button2 close-actu">Non, merci</a>
                    </div>
                </div>
            </div>

            <div class="actu">
                <header>
                    <p class="actu-title">© Nouvel ami Facebook</p>
                    <p class="actu-date">aujourd'hui, à 16h54 <a href="" class="round-btn close-actu">x</a></p>
                </header>
                <div class="actu-content">
                    <p class="typo2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit impedit laboriosam expedita ullam, minima placeat cumque perferendis quia aut natus veniam at culpa fugit suscipit repellendus voluptate adipisci quibusdam explicabo?</p>

                    <div class="flex">
                        <a href="" class="button2">Inviter</a>
                        <a href="" class="button2 close-actu">Non, merci</a>
                    </div>
                </div>
            </div>

            <div class="actu">
                <header>
                    <p class="actu-title">© Nouvel ami Facebook</p>
                    <p class="actu-date">aujourd'hui, à 16h54 <a href="" class="round-btn close-actu">x</a></p>
                </header>
                <div class="actu-content">
                    <p class="typo2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit impedit laboriosam expedita ullam, minima placeat cumque perferendis quia aut natus veniam at culpa fugit suscipit repellendus voluptate adipisci quibusdam explicabo?</p>

                    <div class="flex">
                        <a href="" class="button2">Inviter</a>
                        <a href="" class="button2 close-actu">Non, merci</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>