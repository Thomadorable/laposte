<?php

function getUserByMail($login) {
    $bdd = getBdd();
    $users = $bdd->users;
    $currentUser = null;
    foreach ($users as $user) {
        if ($user->mail === $login) {
            $currentUser = $user;
            break;
        }
    }

    return $currentUser;
}

function getUserByID($id) {
    $bdd = getBdd();
    
    $users = $bdd->users;
    if (property_exists($users, $id)) $currentUser = $users->$id;
    else $currentUser = null;

    return $currentUser;
}

function getGiftTypes() {
    return getBdd()->giftTypes;
}

function getRecurrences(){
    return getBdd()->recurrences;
}