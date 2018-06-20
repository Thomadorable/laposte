<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('../utils/functions.php');

    $user = getUserByID($_SESSION['id']);
    $giftTypes = getGiftTypes();
    $recurrences = getRecurrences();
?>
<form action="" method="POST" class="profile-form">

    <header class="team-header profile">
        <img class="avatar" src="images/avatars/<?= $loggedUser->avatar?>" alt=""><div class="text">
            <h1 class="typo4"><?= $loggedUser->name?></h1>
            <p class="typo3">
                31 ans, Paris
                </p>
            <p class="opac50 min typo3">
                Pas encore de team
            </p>
        </div>
        <button class="edit-profile" type="submit">
            <?php include($path . 'images/check.svg') ?>
        </button>
    </header>
    <input type="hidden" value="<?= $user->id?>" name="id">
    <div class="light">
        <label class="options-label typo2" for="name">Prénom</label>
        <input class="options-input" type="text" placeholder="Prénom" value="<?= $user->name?>" name="name" id="name">

        <label class="options-label typo2" for="lastname">Nom</label>
        <input class="options-input no-margin" type="text" placeholder="Nom" value="<?= $user->lastname?>" name="lastname" id="lastname">
    </div>
    <div class="dark">
        <label class="options-label typo2" for="mail">E-mail</label>
        <input class="options-input" type="email" placeholder="Adresse email" value="<?= $user->mail?>" name="mail" id="mail">

        <label class="options-label typo2" for="mobile">Mobile</label>
        <input class="options-input" type="text" placeholder="Mobile" value="<?= $user->mobile ?>" name="mobile" id="mobile">
        
        <label class="options-label typo2" for="password">Mot de passe</label>
        <input class="options-input no-margin" type="password" placeholder="Mot de passe" value="" name="password">
    </div>
    <div class="light">
        <label class="options-label typo2" for="adress">Adresse</label>
        <input class="options-input  no-margin" type="text" placeholder="Adresse" value="<?= $user->adress?>" name="adress" id="adress">
        
        <div class="half">
            <label class="options-label typo2" for="zipCode">Code postal</label>
            <input class="options-input" type="text" placeholder="Code postal" value="<?= $user->zipCode?>" name="zipcode" id="zipCode">
        </div><div class="half">
            <label class="options-label typo2" for="city">Ville</label>
            <input class="options-input" type="text" placeholder="Ville" value="<?= $user->city ?>" name="city" id="city">
        </div>

        <label class="options-label typo2" for="adressDetails">Précisions (digicode, appartement...)</label>
        <input class="options-input no-margin" type="text" placeholder="Précision" value="<?= $user->adressDetails ?>" name="adressDetails" id="adressDetails">
    </div>
    <div class="dark">
        <p class="options-label typo2">Je reçois ma boite...</p>
        <input class="options-input no-margin" type="radio" name="atHome" id="atHomeTrue" value="true"><label for="atHomeTrue">chez moi</label>
        <input class="options-input no-margin" type="radio" name="atHome" id="atHomeFalse"><label for="atHomeFalse" value="false">dans un bureau de poste</label>

        <label class="options-label typo2" for="recurrence">Date de renvoi de ma boîte</label>
        <select name="recurrence" id="recurrence">
        <?php foreach ($recurrences as $date ) { ?>
            <option value="<?= $date->id ?>"><?= $date->details ?></option>
        <?php } ?>
            <option value=""></option>
        </select>

        <p class="options-label typo2">Je souhaite recevoir...</p>

        <?php foreach ($giftTypes as $type ) { ?>
            <input class="options-input no-margin" type="checkbox" name="giftType" id="gift<?= $type->id ?>" value="true"><label for="gift<?= $type->id ?>">des surprises "<?= $type->name ?>"</label>
        <?php } ?>
    </div>
</form>