<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");
?>

        <div class="container-fluid px-0">

            <!-- HEADER -->
            <div class="header-wrapper mb-5">
                <div class="container">
                    <h1 class="header">Contact Us</h1>
                </div><!-- .container -->
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">

                        <form id="contact-form" action="#" method="post">

                            <div class="form-group my-5">
                                <label>Full Name*</label>
                                <div class="row">
                                    <div class="col-sm-6 mt-575">
                                        <input class="form-control" type="text" name="firstname" value="First Name">
                                    </div><!-- .col-lg-6 -->
                                    <div class="col-sm-6 mt-575">
                                        <input id="form-lastname" class="form-control" type="text" name="lastname" value="Last Name">
                                    </div><!-- .col-lg-6 -->
                                </div><!-- .row -->
                            </div><!-- .form-group -->

                            <div class="form-group my-5">
                                <label>Email*</label>
                                <input class="form-control" type="email" name="email" value="123@email.com">
                            </div><!-- .form-group -->

                            <div class="form-group my-5">
                                <label>Message*</label>
                                <textarea class="form-control" name="message" rows="8" cols="80" placeholder="Type message here."></textarea>
                            </div><!-- .form-group -->

                            <input type="submit" class="red-outline-btn mx-auto d-block my-5" value="SUBMIT">

                        </form>

                    </div><!-- .col-lg-6 -->

                    <div class="col-lg-6">
                        <img id="contact-corgi-img" src="/assets/files/corgi.png" alt="Corgi wearing a bowtie">
                    </div><!-- .col-lg-6 -->
                </div><!-- .row -->

            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php require_once("../elements/footer.php");
