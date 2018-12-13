<?php  require_once("../../core/includes.php");

    if( empty($_SESSION['user_logged_in']) ){ // User is not logged in

        // Bring user to login form
        header("Location: /login.php");
        exit();

    }


    if( !empty($_GET) ){ //Check url has id in it

        $d = new Dog;
        $dog = $d->get_by_id($_GET['id']);

        if( !empty($_POST) ){ //Check if form was submitted
            $d->edit($_GET['id']);
            header("Location: /dogs/");
            exit();
        }

    }else{ //if they don't have something in the url, we redirect them
        header("Location: /dogs/");
        exit();
    }

    // unique html head vars
    $title = 'Edit Dog Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
?>

        <div class="container-fluid px-0">


            <!-- HEADER -->
            <div class="header-wrapper">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-6">
                            <h1 class="header">Edit</h1>
                        </div><!-- .col-lg-6 -->

                    </div><!-- .row -->

                </div><!-- .container -->
            </div><!-- .header -->





            <!-- INFORMATION -->
            <div id="dog-page-container" class="container">

                <div class="my-5 card">
                    <h4 class="card-header">Edit Doggie Info</h4>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group text-center">
                                        <div class="d-flex">
                                            <div id="dog-img-preview-wrapper">
                                                <img id="dog-img-preview" src="/assets/files/<?=$dog['filename']?>" alt="Uploaded Image of Dog">
                                            </div><!-- #dog-img-wrapper -->
                                        </div><!-- .d-flex -->

                                        <input id="file-with-preview" class="inputfile" type="file" name="fileToUpload" onchange="previewFile()">
                                        <label for="file-with-preview">Upload Image</label>

                                    </div><!-- #form-group -->
                                </div><!-- .col-lg-6 -->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dogname" value="<?=$dog['dogname']?>" required>
                                    </div><!--. form-group -->

                                    <table id="dog-post-table" class="table-style">
                                        <tr>
                                            <td>Location:</td>
                                            <td>
                                                <input class="form-control" type="text" name="dog-city" value="<?=$dog['dogcity']?>" required>
                                            </td>
                                            <td>
                                                <select class="form-control" name="dog-province" required>
                                                    <option disabled="disable">--</option>
                                                    <?php
                                                    $provinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT');

                                                    foreach ($provinces as $province) {
                                                        echo '<option '. ($dog['dogprovince'] == $province ? 'selected' : '') .'>'.$province.'</option>';
                                                    }

                                                    ?>

                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Age:</td>
                                            <td>
                                                <input class="form-control" type="number" name="dog-age" value="<?=$dog['age']?>" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Sex</td>
                                            <td>
                                                <select class="form-control" name="dog-sex" required>
                                                    <option disabled="disable">--</option>
                                                    <?php
                                                    $sex = array('Male', 'Female');

                                                    foreach ($sex as $s) {
                                                        echo '<option '. ($dog['sex'] == $s ? 'selected' : '') .'>'.$s.'</option>';
                                                    }

                                                    ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Breed</td>
                                            <td>
                                                <input class="form-control" type="text" name="dog-breed" value="<?= $dog['breed']?>" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Pedigree:</td>
                                            <td>
                                                <select class="form-control" name="dog-pedigree" required>
                                                    <option disabled="disable">--</option>
                                                    <?php
                                                    $pedigrees = array('Yes', 'No');

                                                    foreach ($pedigrees as $pedigree) {
                                                        echo '<option '. ($dog['pedigree'] == $pedigree ? 'selected' : '') .'>'.$pedigree.'</option>';
                                                    }

                                                    ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Mate Fee:</td>
                                            <td>
                                                $ <input id="form-mate-fee" class="form-control" type="number" name="dog-fee" value="<?=$dog['matefee']?>" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required> CAD
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td>
                                                <select class="form-control" name="dog-bday-day" required>
                                                    <?php

                                                        foreach (range(1, 31) as $date) {
                                                            echo '<option '. ($dog['dogbday'] == $date ? 'selected' : '') .'>'.$date.'</option>';
                                                        }

                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="dog-bday-month" required>
                                                    <?php
                                                    $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');

                                                    foreach ($months as $month) {
                                                        echo '<option '. ($dog['dogbmonth'] == $month ? 'selected' : '') .'>'.$month.'</option>';
                                                    }

                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <?php $currentYear = time(); ?>
                                                <input class="form-control" type="number" name="dog-bday-year" value="<?= $dog['dogbyear'] ?>" min="1985" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                            </td>
                                        </tr>


                                    </table>

                                </div><!-- .col-lg-6 -->
                            </div><!-- .row -->

                            <div class="form-group">
                                <label class="bold">Details:</label>
                                <textarea class="form-control" name="dog-description" onkeyup="countChar(this)" required><?=$dog['details']?></textarea>
                                <div class="text-right mt-3">
                                    <small><span id="charNum">500</span> characters remaining</small>
                                </div>
                            </div><!--. form-group -->



                            <input id="dog-post-btn" class="btn red-btn" type="submit" value="Save Changes">

                        </form>
                    </div><!-- .card-body -->
                </div><!-- .card -->



            </div><!-- .container -->

        </div><!-- .container-fluid -->

        <?php

        require_once("../../elements/footer.php");
