<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");
?>

        <div class="container-fluid px-0">

            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">
                    <h1 class="header">Login</h1>
                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container">
                <div class="form-wrapper">

                    <?= !empty($_SESSION['login_attempt_msg']) ? $_SESSION['login_attempt_msg'] : '' ?>

                    <form action="/users/login.php" method="post">
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" type="email" name="email">
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label>Password:</label>
                            <input class="form-control" type="password" name="password">
                        </div><!-- .form-group -->

                        <div class="form-group text-center">
                            <input type="submit" class="btn red-outline-btn form-btn" value="LOGIN">

                            <small>
                                Don't have an account?
                                <a href="join.php">Click here to register</a><br>
                            </small>
                        </div><!-- .form-group -->

                    </form>

                </div><!-- .form-container -->

            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php require_once("../elements/footer.php");
