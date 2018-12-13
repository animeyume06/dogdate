<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");
?>

        <div class="container-fluid px-0">

            <!-- BANNER -->
            <div class="banner">
                <div class="container">
                    <div class="banner-text">
                        <h2>"I enjoy going on long car rides."</h2>

                        <h6>- Kingsley from Kelowna, BC</h6>
                    </div><!-- .banner-text -->
                </div><!-- .container -->
            </div><!-- .banner -->

            <!-- HEADER -->
            <div class="header-wrapper text-center">
                <h1 id="header-title">
                    Want to <span class="bold">find a date</span> for your dog?
                    <a href="join.php" id="join-header-btn" class="btn white-outline-btn lg-text-btn mx-5">JOIN NOW</a>
                </h1>
            </div><!-- .header -->

            <!-- INFORMATION -->
            <div class="container">
                <section class="my-5">
                    <h1 id="about">About Us</h1>
                    <p class="my-3">
                        Want to give your dog a chance to pass on their lineage? Think you can give your dog a more fulfilling life? Register your dog on <span class="font-weight-bold">doggie date</span> and to give him or her a chance to meet that special someone!
                        <br><br>
                        Doggie Date is a community website made by dog lovers for dogs. Our goal here is to become the ultimate go-to website for those who want to breed their dogs. We want to offer dog owners and breeders a safe and convenient way to contact each other.
                    </p>
                </section>

                <section id="timeline-list-elem-wrapper" class="mt-5 block-content l-block-spacing">
                    <h1>How It Works</h1>

                    <div class="l-contained mt-5 mb-3">
                        <ul id="timeline-list-elem">
                            <li>
                                <div class="timeline-content">
                                    <h5 class="red">STEP 1:</h5>
                                    <h4 class="red">Create An Account</h4>

                                    <p>Join our community and create your own personal account.</p>
                                </div><!-- .timeline-content -->
                            </li>
                            <li>
                                <div class="timeline-content">
                                    <h5 class="brown">STEP 2:</h5>
                                    <h4 class="brown">Set Up Your Dog's Profile</h4>

                                    <p>Once your account is created, it is time to start setting up your dog's (or dogs' if you have more than one) profile for other members to view.</p>
                                </div><!-- .timeline-content -->
                            </li>
                            <li>
                                <div class="timeline-content">
                                    <h5 class="red">STEP 3:</h5>
                                    <h4 class="red">Search Our Mates</h4>

                                    <p>Start searching our website for potential mates for your dog(s).</p>
                                </div><!-- .timeline-content -->
                            </li>
                            <li>
                                <div class="timeline-content">
                                    <h5 class="brown">STEP 4:</h5>
                                    <h4 class="brown">Set The Date!</h4>

                                    <p>Found someone you like? Contact the breeder by sending him or her a message through our website.</p>

                                </div><!-- .timeline-content -->
                            </li>
                        </ul>

                    </div><!-- .l-contained -->
                </section>

                <section class="text-center">
                    <h3>What do you think?</h3>
                    <a href="join.php" class="btn red-outline-btn lg-text-btn my-3">SIGN ME UP</a><br>
                    <img id="dog-tie-img" class="my-3" src="/assets/files/dogs.gif" alt="Dogs Wearing Bow Ties">
                </section>

                </div><!-- .container -->

            </div><!-- .container-fluid -->

            <?php require_once("../elements/footer.php");
