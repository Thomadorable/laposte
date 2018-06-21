<?php

function getTeams () {
    return getBdd()->teams;
}

function getTeamByUserID () {
    $idUser = $_SESSION['id'];
    $teams = getTeams();
    $idTeam = getUserByID($idUser)->idTeam;

    if (is_numeric($idTeam) && property_exists($teams, $idTeam))$team = $teams->$idTeam;
    else $team = null;

    return $team;
}

function getMemberByTeam ($idTeam) {
    $users = getBdd()->users;


    $members = [];
    foreach($users as $user){
        if($user->idTeam == $idTeam) $members[] = $user;
    }

    return $members;
}

function updateTeam($idTeam = 0){
    $idUser = $_SESSION['id'];
    $bdd = getBdd();
    $teams = getTeams();

    if (is_numeric($idTeam)) {
        if ($idTeam == 0) {
            $bdd->users->$idUser->idTeam = (integer) $idTeam;
        } else if ($bdd->users->$idUser->idTeam == 0 && $idTeam > 0 && property_exists($teams, $idTeam)){
            $bdd->users->$idUser->idTeam = (integer) $idTeam;
        } else return false;
        
        setBdd($bdd);
        return true;
    }

    return false;
}