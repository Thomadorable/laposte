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


function getJoinUserByID($id){
    $user = getUserByID($id);
    $recurrence = getRecurrences()->{$user->idRecurrence};
    $usersGifts = getBdd()->usersGifts;
    $giftTypes = getGiftTypes();

    $userGifts = [];
    foreach($usersGifts as $assoc) {
        if( $assoc->idUser === $id)
            $userGifts[$giftTypes->{$assoc->idGift}->id] = $giftTypes->{$assoc->idGift};

    }

    $userJoin = [];
    $userJoin['reccurence'] = $recurrence;
    $userJoin['giftTypes'] = $userGifts;

    return $userJoin;
}

function getGiftTypes() {
    return getBdd()->giftTypes;
}

function getRecurrences(){
    return getBdd()->recurrences;
}