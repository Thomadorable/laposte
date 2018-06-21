<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['id'])) {
        echo '<p class="error">Vous êtes déjà connecté.</p>';
        exit();
    }
?>

<header class="topbar topbar2 sticky no-desktop" style="transform: none">
    <div class="boxed-wrapper flex padding-20">
        <h1><a href="" class="logo"><img src="images/logo-paaper.svg" alt="Logo Paaper"></a></h1>
    </div>
</header>

<form action="" method="POST" class="form-login">
    <h1 class="typo1">Connexion</h1>

    <?php
        echoMessage();
    ?>

    <label class="options-label typo2 margin-top-20" for=""><strong class="required">*</strong> Mail</label>
    <input class="options-input" type="text" name="login" value="">

    <label class="options-label typo2" for=""><strong class="required">*</strong> Mot de passe</label>
    <input class="options-input" type="password" name="password">

    <button type="submit" class="button1">Se connecter</button>
    <a href="?page=register" class="button1">S'inscrire</a>

    <p class="typo2 margin-top-20">
        <a href="" >Mot de passe oublié ?</a>
    </p>
</form>