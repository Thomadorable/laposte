<?php

function getUserByMail($login) {
    $bdd = getBdd();
    $users = $bdd->users;
    $currentUser = null;
    foreach ($users as $user) {
        if (strtolower($user->mail) === strtolower($login)) {
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

    $userGifts = getUserGiftByUserID($id);

    $userJoin = [];
    $userJoin['reccurence'] = $recurrence;
    $userJoin['giftTypes'] = $userGifts;

    return $userJoin;
}

function getUserGiftByUserID($id){
    $giftTypes = getGiftTypes();
    $usersGifts = getBdd()->usersGifts;
    $userGifts = [];
    foreach($usersGifts as $assoc) {
        if( $assoc->idUser === $id)
            $userGifts[$giftTypes->{$assoc->idGift}->id] = $giftTypes->{$assoc->idGift};
    }
    return $userGifts;
}

function getGiftTypes() {
    return getBdd()->giftTypes;
}

function getRecurrences(){
    return getBdd()->recurrences;
}