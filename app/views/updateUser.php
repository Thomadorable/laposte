<?php
    $path = './';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $path = '../../';
    }

    require_once($path . 'app/utils/functions.php');

    //var_dump($_POST);
    $bdd = getBdd();

    $id = intval($_POST['id']);
    $user = $bdd->users->$id;

    // type text
    $tab = ['name', 'lastname', 'mail', 'mobile', 'adress', 'zipCode', 'city', 'adressDetails', ];
    foreach ($tab as $t) {
        $data = htmlspecialchars($_POST[$t]);
        if (!empty($data)) {
            $user->$t = $data;
        }
    }
    
    // type bool
    $tab = ['atHome'];
    foreach ($tab as $t) {
        $data = (bool) htmlspecialchars($_POST[$t]);
        if ($data) {
            $user->$t = $data;
        }
    }

    // type password
    $password = htmlspecialchars($_POST['password']);
    if(!empty($password))
        $user->password = getHash($password);

    // giftType
    // $giftBdd = $bdd->giftTypes;
    // $giftUserBdd = getUserGiftByUserID($_SESSION['id']);
    // foreach($giftBdd as $type) {
    //     // si idType && !isset(liaison) -> créee
    //     if (isset($_POST['giftType']) && isset($_POST['giftType'][$type->id]) && $_POST['giftType'][$type->id]){
    //         foreach ($giftUserBdd as $gub){
    //             $bool = false;
    //             if ($gub->idUser === $id){
    //                 $bool = true;
    //                 break;
    //             }
    //         }
    //         if (!$bool)

    //     }
    //     var_dump($type->id);
    //     // si !idType && isset(liaison) -> supprime
    // }

    /**
        'giftType' => 
            array (size=2)
            1 => string 'true' (length=4)
            3 => string 'true' (length=4)
     */

   // var_dump($user);

    die();

    $bdd->users->$id = $user;
    $file = '../utils/bdd.json';
    $bdd = json_encode($bdd);
    file_put_contents($file, $bdd);

    echo 202;
?>