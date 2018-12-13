<?php  require_once("../../core/includes.php");

if( empty($_SESSION['user_logged_in']) ){ // User is not logged in

    // Bring user to login form
    header("Location: /login.php");
    exit();

}

$u = new User;

if( !empty($_POST) ){ // Form was submitted
    $u->edit();
    header('Location: /users/index.php');
    exit();
}

$user = $u->get_by_id($_SESSION['user_logged_in']);

// unique html head vars
$title = 'Edit Profile';
require_once("../../elements/html_head.php");
require_once("../../elements/nav.php");

?>

        <div class="container-fluid px-0">


            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-6">
                            <h1 class="header">Edit Profile</h1>
                        </div><!-- .col-lg-6 -->

                    </div><!-- .row -->

                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container">
                <form class="my-5 py-3" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="profile-left-wrapper">

                                <h6 class="edit-headers my-5">PROFILE PICTURE</h6>

                                <div class="form-group">

                                    <div id="breeder-img-wrapper" class="mb-3">
                                        <img id="breeder-img" src="/assets/files/<?=!empty(trim($user['profilepic'])) ? $user['profilepic'] : 'placeholder-user3.png' ?>" alt="Profile Pic">
                                    </div><!-- #breeder-img-wrapper -->

                                    <div class="text-center">
                                        <input id="file-with-preview" class="inputfile" type="file" name="fileToUpload" onchange="previewProfileFile()">
                                        <label for="file-with-preview">Change Picture</label>
                                    </div>

                                </div><!-- .form-group -->
                            </div><!-- .profile-left-wrapper -->
                        </div><!-- .col-lg-4 -->



                        <div class="col-lg-8">
                            <div class="myprofile-right-wrapper">

                                <h6 class="edit-headers my-5">PROFILE INFO</h6>

                                <h5 class="font-weight-bold">Name of Breeder:</h5>
                                <h2 class="font-weight-bold"><?=$user['fname']?> <?=$user['lname']?></h2>

                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold mt-5">City:</label>
                                            <input class="form-control" type="text" name="city" value="<?=$user['city']?>" required>
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-5 -->

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold mt-5">Province:</label>
                                            <select class="form-control" name="province" required>

                                                <option>--</option>
                                                <?php
                                                $provinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT');

                                                foreach ($provinces as $province) {
                                                    echo '<option '. ($user['province'] == $province ? 'selected' : '') .'>'.$province.'</option>';
                                                }

                                                ?>

                                            </select>
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-7 -->

                                </div><!-- .row -->

                                <div class="form-group">
                                    <label class="font-weight-bold mt-5">About:</label>
                                    <textarea id="edit-profile-bio" name="profileBio" class="form-control"><?= $user['bio']?></textarea>
                                </div><!-- .form-group -->

                                <h6 class="edit-headers my-5">CONTACT INFO</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Phone:</label>
                                            <input class="form-control" type="tel" name="tel" value="<?=$user['phone']?>" required>
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Email:</label>
                                            <input class="form-control" type="email" name="email" value="<?=$user['email']?>">
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-6 -->
                                </div><!-- .row -->

                                <div class="password-reset-wrapper mt-5">
                                    <button id="password-reset-btn" class="bold btn" type="button" data-toggle="collapse" data-target="#password-reset" role="button" aria-expanded="false" aria-controls="password-reset">
                                        CHANGE PASSWORD
                                        <span class="plus-minus">
                                            <i class="fa fa-plus"></i>
                                            <i class="fa fa-minus" style="display: none"></i>
                                        </span>
                                    </button>
                                    <hr>
                                    <div id="password-reset" class="collapse my-5">
                                        <label class="font-weight-bold">Change Password:</label>
                                        <input class="form-control" type="password" name="password" value="" placeholder="Type New Password Here">
                                    </div>
                                </div><!-- .password-reset-wrapper -->

                            </div><!-- .profile-right-wrapper -->

                            <input class="btn red-outline-btn my-4 float-right" type="submit" value="SAVE CHANGES">

                        </div><!-- .col-lg-8 -->
                    </div><!-- .row -->
                </form>


            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php

        require_once("../../elements/footer.php");
