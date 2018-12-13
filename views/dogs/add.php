<?php require_once '../../core/includes.php';

if( !empty($_POST['dogname']) && !empty($_POST['dog-city']) && !empty($_POST['dog-province'])  && !empty($_POST['dog-age']) && !empty($_POST['dog-sex']) && !empty($_POST['dog-breed']) && !empty($_POST['dog-pedigree']) && !empty($_POST['dog-fee']) && !empty($_POST['dog-bday-day']) && !empty($_POST['dog-bday-month']) && !empty($_POST['dog-bday-year']) && !empty($_POST['dog-description']) ){

    // Add new dog to db
    $d = new Dog;
    $d->add();

    header("Location: /dogs/index.php");
    exit();

}

header("Location: /");
exit();
