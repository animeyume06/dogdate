<?php require_once '../../core/includes.php';


if( !empty($_POST['email']) && !empty($_POST['password']) ){

    $e = new User;
    $e->login();

}

header("Location: /");
exit();
