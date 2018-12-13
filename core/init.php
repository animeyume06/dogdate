<?php
// For functionality like checking if a user is an admin before page is loaded


date_default_timezone_set('America/Vancouver'); //hard coded the timezone


if( empty($_SESSION['user_logged_in']) ){ //if not logged in

    // Allowed logged out functionality
    $allowed_urls = array(
        '/',
        '/index.php',
        '/login.php',
        '/join.php',
        '/contact.php'

    );

    $allowed = false;

    foreach($allowed_urls as $allowed_url){
        if( $_SERVER['REQUEST_URI'] == $allowed_url ){
            $allowed = true;
            break;
        }
    }

    if( $allowed === false ){
        header("Location: /");
    }

}else{ //user is logged in

    //set user's timezone
    $u = new User;
    $user = $u->get_by_id($_SESSION['user_logged_in']);

    date_default_timezone_set($user['timezone']); // the timezone will adjust to the user's timezone when logged in

}
