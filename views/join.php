<?php  require_once("../core/includes.php");

if( !empty($_SESSION['user_logged_in']) ){ // User is not logged in

    // Bring user to login form
    header("Location: /dogs/index.php");
    exit();

}


    // unique html head vars
    $title = 'Join Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");
?>

        <div class="container-fluid px-0">


            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">
                    <h1 class="header">Join</h1>
                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container">
                <div class="form-wrapper">

                    <!-- Display error message is entered email already exists -->
                    <?= !empty($_GET['signup_error']) ? !empty($_SESSION['create_acc_msg']) ? $_SESSION['create_acc_msg'] : '' : '' ?>

                    <form action="/users/add.php" method="post">
                        <legend class="mb-5">Become a Member</legend>
                        <div class="form-group">
                            <label>Name*</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="firstname" required>
                                    <small class="light-grey">First Name</small>
                                </div><!-- .col-lg-6 -->
                                <div class="col-lg-6">
                                    <input id="form-topspacing" class="form-control" type="text" name="lastname" required>
                                    <small class="light-grey">Last Name</small>
                                </div><!-- .col-lg-6 -->
                            </div><!-- .row -->

                        </div><!-- .form-group -->

                        <div class="form-group">
                            <label>Email*</label>
                            <input class="form-control" type="email" name="email" required>
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <label>Phone*</label>
                            <input class="form-control" type="tel" name="tel" required>
                            <small class="light-grey">No spaces or special characters.</small>
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>City*</label>
                                    <input class="form-control" type="text" name="city" required>
                                </div><!-- .col-lg-6 -->
                                <div class="col-lg-6 form-topspacing">
                                    <label>Province*</label>
                                    <select class="form-control" name="province" required>
                                        <option selected="true" disabled="disable">--</option>
                                        <option>AB</option>
                                        <option>BC</option>
                                        <option>MB</option>
                                        <option>NB</option>
                                        <option>NL</option>
                                        <option>NT</option>
                                        <option>NS</option>
                                        <option>NU</option>
                                        <option>ON</option>
                                        <option>PE</option>
                                        <option>QC</option>
                                        <option>SK</option>
                                        <option>YT</option>
                                    </select>
                                </div><!-- .col-lg-6 -->
                            </div><!-- .row -->
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <label>Password*</label>
                            <input class="form-control" type="password" name="password" required>
                            <small class="light-grey">Must be less than 16 characters. No spaces.</small>
                        </div><!-- .form-group -->

                        <div class="form-group text-center">
                            <input type="submit" class="btn red-outline-btn form-btn" value="REGISTER">
                        </div><!-- .form-group -->

                    </form>

                    <div class="small-text text-center">
                        <small>
                            Already a member?
                            <a href="login.php">Click here to login</a>
                        </small>
                    </div><!-- .small-text -->

                </div><!-- .form-container -->

            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php require_once("../elements/footer.php");
