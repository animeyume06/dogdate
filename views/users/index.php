<?php  require_once("../../core/includes.php");

if( empty($_SESSION['user_logged_in']) ){ // User is not logged in

    // Bring user to login form
    header("Location: /login.php");
    exit();

}

$u = new User;
$user = $u->get_by_id($_SESSION['user_logged_in']);

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
                            <h1 class="header">My Profile</h1>
                        </div><!-- .col-lg-6 -->

                    </div><!-- .row -->

                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div id="profile1" class="container position-relative">
                <a id="edit-profile-btn" class="btn small-red-btn red-btn position-absolute" href="/users/edit.php">Edit Profile <i class="far fa-edit"></i></a>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="profile-left-wrapper my-5 py-3 mx-auto">
                            <h6 class="font-weight-bold edit-headers my-5">PROFILE PICTURE</h6>
                            <div id="breeder-img-wrapper" class="my-5">
                                <img id="breeder-img" src="/assets/files/<?=!empty(trim($user['profilepic'])) ? $user['profilepic'] : 'placeholder-user3.png' ?>" alt="Profile Pic">
                            </div><!-- #breeder-img-wrapper -->

                            <h6 class="font-weight-bold text-center">Member Since:</h6>
                            <p class="text-center"><?= date('M. d, Y', $user['joinedtime'])?></p>
                        </div><!-- .profile-left-wrapper -->
                    </div><!-- .col-lg-4 -->

                    <div class="col-lg-8">

                        <div class="myprofile-right-wrapper my-5 py-3">

                            <h6 class="font-weight-bold edit-headers my-5">
                                PROFILE INFO
                            </h6>


                            <h5 class="font-weight-bold">Name of Breeder:</h5>
                            <h2 class="font-weight-bold"><?=$user['fname']?> <?=$user['lname']?></h2>

                            <div class="row">
                                <div class="col-lg-5">
                                    <h6 class="font-weight-bold mt-5">City:</h6>
                                    <p><?=$user['city']?></p>
                                </div><!-- .col-lg-5 -->

                                <div class="col-lg-7">
                                    <h6 class="font-weight-bold mt-5">Province:</h6>
                                    <p><?=$user['province']?></p>
                                </div><!-- .col-lg-7 -->
                            </div><!-- .row -->

                            <h6 class="font-weight-bold mt-5">About:</h6>
                            <p><?=$user['bio']?></p>

                            <h6 class="edit-headers my-5">CONTACT INFO</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Phone:</label>
                                        <p><?=$user['phone']?></p>
                                    </div><!-- .form-group -->
                                </div><!-- .col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email:</label>
                                        <p><?=$user['email']?></p>
                                    </div><!-- .form-group -->
                                </div><!-- .col-lg-6 -->
                            </div><!-- .row -->

                        </div><!-- .profile-right-wrapper -->

                    </div><!-- .col-lg-8 -->





                </div><!-- .row -->


            </div><!-- .container -->





            <!-- DISPLAYED AT LESS THAN 1000px -->
            <div id="profile2" class="container position-relative">
                <a id="edit-profile-btn" class="btn small-red-btn red-btn position-absolute" href="/users/edit.php">Edit Profile <i class="far fa-edit"></i></a>

                <div class="profile-left-wrapper my-5 pt-3 mx-auto">
                    <h6 class="font-weight-bold edit-headers my-5">PROFILE PICTURE</h6>
                    <div id="breeder-img-wrapper" class="my-5">
                        <img id="breeder-img" src="/assets/files/<?=!empty(trim($user['profilepic'])) ? $user['profilepic'] : 'placeholder-user3.png' ?>" alt="Profile Pic">
                    </div><!-- #breeder-img-wrapper -->

                    <h6 class="font-weight-bold text-center">Member Since:</h6>
                    <p class="text-center"><?= date('M. d, Y', $user['joinedtime'])?></p>
                </div><!-- .profile-left-wrapper -->



                <div class="myprofile-right-wrapper my-5 pb-3">
                    <h6 class="font-weight-bold edit-headers my-5">
                        PROFILE INFO
                    </h6>

                    <h5 class="font-weight-bold">Name of Breeder:</h5>
                    <h2 class="font-weight-bold"><?=$user['fname']?> <?=$user['lname']?></h2>

                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="font-weight-bold mt-5">City:</h6>
                            <p><?=$user['city']?></p>
                        </div><!-- .col-lg-5 -->

                        <div class="col-sm-7">
                            <h6 class="font-weight-bold mt-5">Province:</h6>
                            <p><?=$user['province']?></p>
                        </div><!-- .col-lg-7 -->
                    </div><!-- .row -->

                    <h6 class="font-weight-bold mt-5">About:</h6>
                    <p><?=$user['bio']?></p>

                    <h6 class="edit-headers my-5">CONTACT INFO</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Phone:</label>
                                <p><?=$user['phone']?></p>
                            </div><!-- .form-group -->
                        </div><!-- .col-lg-6 -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Email:</label>
                                <p><?=$user['email']?></p>
                            </div><!-- .form-group -->
                        </div><!-- .col-lg-6 -->
                    </div><!-- .row -->

                </div><!-- .profile-right-wrapper -->

            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php

        require_once("../../elements/footer.php");
