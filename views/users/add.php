<?php

require_once '../../core/includes.php';

// CHECK IF USER FILLED ALL FIELDS PROPERLY
if( !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['city']) && !empty($_POST['province']) && !empty($_POST['password']) ){

    $e = new User;

    // CHECK IF EMAIL ALREADY EXISTS
    $exists = $e->exists();

    if( empty($exists) ){ // User does not exist

        $new_user_id = $e->add();
        $_SESSION['user_logged_in'] = $new_user_id;

        // Redirect to homepage
        header("Location: /");
        exit();

    }else{ // User exists

        $_SESSION['create_acc_msg'] = '<p class="text-danger">* Sorry, that email already exists *</p>';
        header("Location: /join.php?signup_error=email-exists");
        exit();
    }
}

// Redirect to homepage
header("Location: /");
exit();
