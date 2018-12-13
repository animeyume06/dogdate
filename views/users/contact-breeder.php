<?php  require_once("../../core/includes.php");

if( empty($_SESSION['user_logged_in']) ){ // User is not logged in

    // Bring user to login form
    header("Location: /login.php");
    exit();

}

    // unique html head vars
    $title = 'Contact Breeder Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");

    $b = new User;
    $breeder = $b->get_by_id($_GET['user_id']);



?>

        <div class="container-fluid px-0">


            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-6">
                            <h1 class="header">Contact Breeder</h1>
                        </div><!-- .col-lg-6 -->

                    </div><!-- .row -->

                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div id="breeder-view-info" class="my-5 px-3 text-center">
                            <div id="breeder-img-wrapper">
                                <img id="breeder-img" src="/assets/files/<?=!empty(trim($breeder['profilepic'])) ? $breeder['profilepic'] : 'placeholder-user3.png' ?>" alt="Profile Pic">
                            </div><!-- #breeder-img-wrapper -->

                            <h6 class="mt-5 mb-0 font-weight-bold">Name of Breeder:</h6>
                            <h2 class="font-weight-bold"><?=$breeder['fname']?> <?=$breeder['lname']?></h2>

                            <br>

                            <h6 class="mb-0 font-weight-bold">Location:</h6>
                            <p><?=$breeder['city']?>, <?=$breeder['province']?></p>

                            <br>

                            <h6 class="mb-0 font-weight-bold">Member Since:</h6>
                            <p><?= date('M. d, Y', $breeder['joinedtime'])?></p>

                        </div>
                    </div><!-- .col-lg-6 -->

                    <div class="col-md-6">
                        <div id="contact-breeder-form-wrapper" class="my-5 py-3">
                            <form action="/dogs/index.php" method="post">

                                <legend class="font-weight-bold">Contacting  <a class="red red-link" href="../users/breeder-profile.php?user_id=<?=$breeder['id']?>"><?=$breeder['fname']?> <?=$breeder['lname']?></a> ?</legend>

                                <p class="my-4 italic">Complete the form below to send <?=$breeder['fname']?> <?=$breeder['lname']?> a message.</p>

                                <div class="form-group mt-4 mb-3">
                                    <label>Full Name*</label>
                                    <div class="row">
                                        <div class="col-sm-6 mt-575">
                                            <input class="form-control" type="text" name="userFirstName" placeholder="First Name" required>
                                        </div><!-- .col-lg-6 -->
                                        <div class="col-sm-6 mt-575">
                                            <input class="form-control" type="text" name="userLastName" placeholder="Last Name" required>
                                        </div><!-- .col-lg-6 -->
                                    </div><!-- .row -->
                                </div><!-- .form-group -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group my-3">
                                            <label>Phone*</label>
                                            <input class="form-control" type="text" name="userTel" placeholder="123 456 7890" required>
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group my-3">
                                            <label>Email*</label>
                                            <input class="form-control" type="text" name="userEmail" placeholder="123@email.com" required>
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-6 -->
                                </div><!-- .row -->

                                <div class="form-group my-4">
                                    <label>Message*</label>
                                    <textarea class="form-control" id="userMessage" name="userMessage" placeholder="Write message here." required></textarea>
                                </div><!-- .form-group -->

                                <div class="form-group">
                                    <label>How do you preferred to be contacted?</label>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" checked> By Email</label>
                                    </div><!-- .radio -->
                                    <div class="radio">
                                        <label><input type="radio" name="optradio"> By Phone</label>
                                    </div><!-- .radio -->

                                </div><!-- .form-group -->

                                <input class="red-outline-btn" type="submit" name="sendBreederMessage" value="SEND MESSAGE">

                            </form>
                        </div><!-- #contact-breeder-form-wrapper -->
                    </div><!-- .col-lg-6 -->

                </div><!-- .row -->


            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php

        require_once("../../elements/footer.php");
