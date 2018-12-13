<?php  require_once("../../core/includes.php");

if( empty($_SESSION['user_logged_in']) ){ // User is not logged in

    // Bring user to login form
    header("Location: /login.php");
    exit();

}

    // unique html head vars
    $title = 'Dogs Posts';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
?>

        <div class="container-fluid px-0">


            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-6">
                            <h1 class="header">Our Dogs</h1>
                        </div><!-- .col-lg-6 -->

                    </div><!-- .row -->

                </div><!-- .container -->
            </div><!-- .header -->





            <!-- INFORMATION -->
            <div id="dog-page-container" class="container">

                <div id="new-search-wrapper" class="position-relative row">

                    <span class="add-dog-btn-wrapper">
                        <a id="add-dog-btn" data-toggle="collapse" class="red" href="#collapseAdd" role="button" aria-expanded="false" aria-controls="collapseAdd"><i class="fas fa-plus"></i> ADD NEW DOG</a>
                    </span>

                    <!-- SEARCH BAR -->
                    <span class="search-container">
                        <form action="/dogs/index.php" method="get">
                            <div class="form-group">
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </span>
                </div><!-- .row -->

                <div class="collapse" id="collapseAdd">
                    <div class="my-5 card">
                        <h4 class="card-header">Add New Dog</h4>

                        <div  id="dog-post-card" class="card-body">
                            <form action="/dogs/add.php" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text-center">
                                            <div class="d-flex">
                                                <div id="dog-img-preview-wrapper">
                                                    <img id="dog-img-preview" src="/assets/files/<?=!empty(trim($dog['dog_pic'])) ? $dog['dog_pic'] : 'dog-profile2.png' ?>" alt="Uploaded Image of Dog">
                                                </div><!-- #dog-img-wrapper -->
                                            </div><!-- .d-flex -->

                                            <input id="file-with-preview" class="inputfile" type="file" name="dogImgUpload" onchange="previewFile()" required>
                                            <label for="file-with-preview">Upload Image</label>

                                        </div><!-- #form-group -->
                                    </div><!-- .col-lg-6 -->

                                    <div class="col-lg-6">

                                        <div class="row">
                                            <div class="col-lg-12 px-1">
                                                <input class="form-control" type="text" name="dogname" placeholder="Dog Name" required>
                                            </div><!-- .col-lg-12 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Location:</label>
                                            </div><!-- .col-sm-4 -->
                                            <div class="col-sm-4 px-1">
                                                <input class="form-control mt-575" type="text" name="dog-city" placeholder="City" required>
                                            </div><!-- .col-sm-4 -->
                                            <div class="col-sm-3 px-1 mt-575">
                                                <select class="form-control" name="dog-province" required>
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
                                            </div><!-- .col-sm-4 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Age:</label>
                                            </div><!-- col-sm-3 -->
                                            <div class="col-sm-4 px-1">
                                                <input class="form-control" type="number" name="dog-age" placeholder="0" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                            </div><!-- .col-sm-4 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Sex:</label>
                                            </div><!-- .col-sm-3 -->
                                            <div class="col-sm-4 px-1">
                                                <select class="form-control" name="dog-sex" required>
                                                    <option selected="true" disabled="disable">--</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div><!-- .col-sm-4 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Breed:</label>
                                            </div><!-- .col-sm-3 -->
                                            <div class="col-sm-4 px-1">
                                                <input class="form-control" type="text" name="dog-breed" required>
                                            </div><!-- .col-sm-4 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Pedigree:</label>
                                            </div><!-- .col-sm-3 -->
                                            <div class="col-sm-4 px-1">
                                                <select class="form-control" name="dog-pedigree" required>
                                                    <option selected="true" disabled="disable">--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div><!-- .col-sm-4 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Mate Fee:</label>
                                            </div><!-- .col-sm-3 -->
                                            <div class="col-sm-4 px-1">
                                                $ <input id="form-mate-fee" class="form-control" type="number" name="dog-fee" placeholder="0" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> CAD
                                            </div><!-- .col-sm-4 -->
                                        </div><!-- .row -->

                                        <div class="row my-3">
                                            <div class="col-sm-3">
                                                <label class="form-label">Date of Birth:</label>
                                            </div><!-- .col-sm-3 -->
                                            <div class="col-sm-2 px-1 mt-575">
                                                <select class="form-control" name="dog-bday-day" required>
                                                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div><!-- .col-sm-2 -->
                                            <div class="col-sm-3 px-1 mt-575">
                                                <select class="form-control" name="dog-bday-month" required>
                                                    <option>Jan</option>
                                                    <option>Feb</option>
                                                    <option>Mar</option>
                                                    <option>Apr</option>
                                                    <option>May</option>
                                                    <option>Jun</option>
                                                    <option>Jul</option>
                                                    <option>Aug</option>
                                                    <option>Sept</option>
                                                    <option>Oct</option>
                                                    <option>Nov</option>
                                                    <option>Dec</option>
                                                </select>
                                            </div><!-- .col-sm-3 -->
                                            <div class="col-sm-3 px-1 mt-575">
                                                <?php $currentYear = time(); ?>
                                                <input class="form-control" type="number" name="dog-bday-year" placeholder="<?= date('o', $currentYear); ?>" min="1985" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                            </div><!-- .col-sm-3 -->
                                        </div><!-- .row -->

                                    </div><!-- .col-lg-6 -->
                                </div><!-- .row -->


                                <div class="row">
                                    <div class="col-lg-12 px-1">
                                        <div class="form-group">
                                            <label class="form-label">Details:</label>
                                            <textarea class="form-control" name="dog-description" placeholder="Tell us about your dog." onkeyup="countChar(this)" required></textarea>
                                            <div class="text-right mt-3">
                                                <small><span id="charNum">500</span> characters remaining</small>
                                            </div>
                                        </div><!-- .form-group -->
                                    </div><!-- .col-lg-12 -->
                                </div><!-- .row -->





                                <input id="dog-post-btn" class="btn red-btn" type="submit" value="Post">

                            </form>
                        </div><!-- .card-body -->
                    </div><!-- .card -->
                </div><!-- #collapseAdd -->

                <?php
                $d = new Dog;
                $dogs = $d->get_all();


                foreach($dogs as $dog){
                ?>

                <div id="posted-card" class="card card-body my-3">
                    <div class="row">

                        <!-- DOG IMAGE -->
                        <div class="col-md-6 d-flex">
                            <div id="dog-img-wrapper">
                                <img id="dog-img-preview" src="/assets/files/<?=$dog['filename']?>">
                            </div><!-- #dog-img-wrapper -->
                        </div><!-- .col-lg-6 -->

                        <!-- DOG INFO -->
                        <div class="col-md-6">


                            <?php
                            if( $dog['user_id'] == $_SESSION['user_logged_in'] ){ ?>

                                <div class="profile-link float-right">
                                    <a class="red red-link" href="/dogs/edit.php?id=<?=$dog['id']?>" aria-hidden="true">Edit</a> /
                                    <a class="delete-btn red red-link" href="/dogs/delete.php?id=<?=$dog['id']?>" aria-hidden="true">Delete</a>
                                </div><!-- .float-right -->

                            <?php }else{ ?>

                                <div class="profile-link float-right">
                                    <a id="contact-breeder-btn" class="btn small-red-btn red-btn" href="/users/contact-breeder.php?user_id=<?=$dog['user_id']?>">Contact Breeder <i class="far fa-envelope"></i></a>
                                </div><!-- .float-right -->
                            <?php } ?>

                            <h3 id="dog-name" class="my-3"><?=$dog['dogname']?></h3>

                            <table id="dog-view-table" class="table-style">
                                <tr>
                                    <td>Location:</td>
                                    <td><?=$dog['dogcity']?>, <?=$dog['dogprovince']?></td>
                                </tr>

                                <tr>
                                    <td>Age:</td>
                                    <td><?=$dog['age']?></td>
                                </tr>

                                <tr>
                                    <td>Sex:</td>
                                    <td><?=$dog['sex']?></td>
                                </tr>

                                <tr>
                                    <td>Breed:</td>
                                    <td><?=$dog['breed']?></td>
                                </tr>

                                <tr>
                                    <td>Pedigree:</td>
                                    <td><?=$dog['pedigree']?></td>
                                </tr>

                                <tr>
                                    <td>Mate Fee:</td>
                                    <td>$<?=$dog['matefee']?> CAD</td>
                                </tr>
                            </table>

                            <div id="dog-desc-posted" class="my-3">
                                <p>
                                    <span class="bold">Details:</span><br>
                                    <?=$dog['details']?>
                                </p>
                            </div><!-- #dog-desc-posted -->

                            <small class="italic">Posted on <?= date('M. d, Y h:i a', $dog['posted_time'])?> by <a href="../users/breeder-profile.php?user_id=<?=$dog['user_id']?>"><?= $dog['fname'] . ' ' . $dog['lname']?></a></small>

                        </div><!-- .col-lg-6 -->
                    </div><!-- .row -->
                </div><!-- .card -->


            <?php


        } ?>

            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php

        require_once("../../elements/footer.php");
