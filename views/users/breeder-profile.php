<?php  require_once("../../core/includes.php");

if( empty($_SESSION['user_logged_in']) ){ // User is not logged in

    // Bring user to login form
    header("Location: /login.php");
    exit();

}

$u = new User;
$user = $u->get_by_id($_SESSION['user_logged_in']);

$b = new User;
$breeder = $b->get_by_id($_GET['user_id']);

// unique html head vars
$title = 'Profile Page';
require_once("../../elements/html_head.php");
require_once("../../elements/nav.php");
?>

        <div class="container-fluid px-0">


            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-6">
                            <h1 class="header">Breeder Profile</h1>
                        </div><!-- .col-lg-6 -->

                    </div><!-- .row -->

                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container position-relative">

                <a id="contact-profile-btn" class="btn small-red-btn red-btn position-absolute" href="../users/contact-breeder.php?user_id=<?=$breeder['id']?>">Contact Breeder <i class="fas fa-phone"></i></a>

                <div class="my-5 py-3">

                    <h6 class="font-weight-bold edit-headers my-5">
                        PROFILE INFO
                    </h6>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="profile-left-wrapper my-4 py-3 mx-auto">
                            <div id="breeder-img-wrapper">
                                <img id="breeder-img" src="/assets/files/<?=!empty(trim($breeder['profilepic'])) ? $breeder['profilepic'] : 'placeholder-user3.png' ?>" alt="Profile Pic">
                            </div><!-- #breeder-img-wrapper -->

                            <div id="member-since-left" class="mt-5">
                                <h6 class="font-weight-bold text-center">Member Since:</h6>
                                <p class="text-center"><?= date('M. d, Y', $breeder['joinedtime'])?></p>
                            </div><!-- .mt-5 -->
                        </div><!-- .profile-left-wrapper -->
                    </div><!-- .col-lg-4 -->

                    <div class="col-sm-7">
                        <div class="profile-right-wrapper breeder-margin-top py-3">
                            <h5 class="font-weight-bold">Name of Breeder:</h5>
                            <h2 class="font-weight-bold"><?=$breeder['fname']?> <?=$breeder['lname']?></h2>

                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="font-weight-bold breeder-margin-top">City:</h6>
                                    <p><?=$breeder['city']?></p>
                                </div><!-- .col-lg-5 -->

                                <div class="col-sm-7">
                                    <h6 class="font-weight-bold breeder-margin-top">Province:</h6>
                                    <p><?=$breeder['province']?></p>
                                </div><!-- .col-lg-7 -->
                            </div><!-- .row -->

                            <h6 class="font-weight-bold breeder-margin-top">About:</h6>
                            <p><?=$breeder['bio']?></p>

                            <div id="member-since-right" class="breeder-margin-top">
                                <h6 class="font-weight-bold text-center">Member Since:</h6>
                                <p class="text-center"><?= date('M. d, Y', $breeder['joinedtime'])?></p>
                            </div><!-- .breeder-margin-top -->

                        </div><!-- .profile-right-wrapper -->
                    </div><!-- .col-sm-6 -->
                </div><!-- .row -->


                </div><!-- .position-relative -->




                <div class="row">







                </div><!-- .row -->


            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php

        require_once("../../elements/footer.php");
