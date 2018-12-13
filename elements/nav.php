<?php

    function is_current_page($slug){

        if( $_SERVER['REQUEST_URI'] === '/' && $slug === '/' ){ //Checking to see if on home page
            echo 'nav-item-active';
        }else if( substr($_SERVER['REQUEST_URI'], 0, strlen($slug)) === $slug && $slug !== '/' ){
            echo 'nav-item-active';
        }
    }

?>


<div class="wrapper">

    <!-- SIDEBAR -->
    <nav id="sidebar">
        <a id="dismiss" class="btn">
            <i class="fas fa-times-circle"></i>
        </a>

        <div class="sidebar-header">
            <h2>Menu</h2>
        </div><!-- .sidebar-header -->

        <ul class="list-unstyled components">
            <li class="<?php is_current_page('/index.php'); ?>">
                <a href="/index.php">Home</a>
            </li>
            <li>
                <a href="/index.php#about">About Us</a>
            </li>
            <li>
                <a href="/index.php#timeline-list-elem-wrapper">How It Works</a>
            </li>
            <li class="<?php is_current_page('/dogs/index.php'); ?>">
                <a href="/dogs/index.php">Dogs</a>
            </li>
            <li class="<?php is_current_page('/join.php'); ?>">
                <a href="/join.php">Join</a>
            </li>
            <li class="<?php is_current_page('/contact.php'); ?>">
                <a href="/contact.php">Contact Us</a>
            </li>
        </ul>
    </nav><!-- #sidebar -->

    <!-- PAGE CONTENT -->
    <div id="content">

        <div class="overlay"></div>

        <!-- MAIN NAVIGATION -->
        <nav id="red-nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="nav-icons">
                    <a class="white-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="white-link" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="white-link" href="#"><i class="fab fa-twitter"></i></a>

                    <?php

                    // CHECK IF USER IS LOGGED IN
                    if ( $_SESSION['user_logged_in'] ){

                        $e = new User;
                        $user = $e->get_by_id($_SESSION['user_logged_in']);

                    ?>

                    <span class="dropdown inline-block ml-3">

                        <a class="white-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, <?=$user['fname']?> <i class="fas fa-user-circle"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/users/">My Profile</a>
                            <a class="dropdown-item" href="/users/logout.php">Logout</a>
                        </div><!-- dropdown-menu -->
                    </span><!-- .dropdown -->

                    <?php }else{ ?>

                    <a class="white-link" href="login.php">Log in</a>

                    <?php } ?>

                </div><!-- .nav-icons -->

            </div><!-- .container-fluid -->
        </nav><!-- #red-nav -->


        <!-- MAIN NAVIGATION -->
        <div id="main-nav-wrapper" class="container-fluid text-center">

            <div id="logo-wrapper">
                <a href="index.php">
                    <img id="logo" src="/assets/files/doggiedate_logo.png" alt="Doggie Date Logo">
                </a>
            </div>


            <nav id="main-nav" class="navbar navbar-expand-lg">

                <div id="main-nav-links">
                    <ul class="list-unstyled">
                        <li class="<?php is_current_page('/'); ?>">
                            <a href="/">Home</a>
                        </li>
                        <li >
                            <a href="/index.php#about">About Us</a>
                        </li>
                        <li>
                            <a href="/index.php#timeline-list-elem-wrapper">How It Works</a>
                        </li>
                        <li class="<?php is_current_page('/dogs/index.php'); ?>">
                            <a href="/dogs/index.php">Dogs</a>
                        </li>
                        <li class="<?php is_current_page('/join.php'); ?>">
                            <a href="/join.php">Join</a>
                        </li>
                        <li class="<?php is_current_page('/contact.php'); ?>">
                            <a href="/contact.php">Contact Us</a>
                        </li>

                    </ul>

                </div><!-- #main-nav-links -->

            </nav><!-- #main-nav -->

        </div><!-- .container-fluid -->
