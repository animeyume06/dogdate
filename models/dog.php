<?php

class Dog extends Db {


    function get_all(){

        if( !empty($_GET['search']) ){ // Searching something

            $search = $this->params['search'];



            $sql = "SELECT dogs.*, users.fname, users.lname FROM dogs LEFT JOIN users ON dogs.user_id = users.id
                WHERE dogs.dogname LIKE '%$search%'
                OR dogs.age LIKE '%$search%'
                OR dogs.sex LIKE '%$search%'
                OR dogs.breed LIKE '%$search%'
                OR dogs.details LIKE '%$search%'
                OR CONCAT(dogs.dogcity,' ', dogs.dogprovince) LIKE '%$search%'
                OR CONCAT(dogs.dogbday,' ', dogs.dogbmonth, ' ', dogs.dogbyear) LIKE '%$search%'
                OR CONCAT(users.fname, ' ', users.lname) LIKE '%$search%'

                ORDER BY dogs.posted_time DESC";

        }else{ // Not searching something

            $sql = "SELECT dogs.*, users.fname, users.lname FROM dogs LEFT JOIN users ON dogs.user_id = users.id ORDER BY dogs.posted_time DESC";
        }

        $dogs = $this->select($sql);

        return $dogs;
    }

    function get_by_id($id){
        $id = (int)$id;

        $sql = "SELECT * FROM dogs WHERE id = '$id'";

        $dog = $this->select($sql)[0];

        return $dog;
    }


    // ADD DOG
    function add(){

        $user_id = (int)$_SESSION['user_logged_in'];
        $dogname = trim($this->data['dogname']);
        $dogcity = trim($this->data['dog-city']);
        $dogprovince = trim($this->data['dog-province']);
        $dogage = trim($this->data['dog-age']);
        $dogsex = trim($this->data['dog-sex']);
        $dogbreed = trim($this->data['dog-breed']);
        $dogpedigree = trim($this->data['dog-pedigree']);
        $dogfee = trim($this->data['dog-fee']);
        $dogbday = trim($this->data['dog-bday-day']);
        $dogbmonth = trim($this->data['dog-bday-month']);
        $dogbyear = trim($this->data['dog-bday-year']);
        $dogdesc = trim($this->data['dog-description']);



        // Upload the file
        $util = new Util;
        $dog_pic = $util->file_upload(APP_ROOT."/views/assets/files/", "dogImgUpload");

        $current_time = time();

        $sql = "INSERT INTO dogs (user_id, dogname, dogcity, dogprovince, age, sex, breed, pedigree, matefee, dogbday, dogbmonth, dogbyear, details, filename, posted_time) VALUES ('$user_id', '$dogname', '$dogcity', '$dogprovince', '$dogage', '$dogsex', '$dogbreed', '$dogpedigree', '$dogfee', '$dogbday', '$dogbmonth', '$dogbyear', '$dogdesc', '$dog_pic', '$current_time')";

        $this->execute($sql);

    }



    // CHECK USER'S OWNERSHIP OF POST
    function check_ownership($id){

        $id = (int)$id;

        $sql = "SELECT * FROM dogs WHERE id = '$id'";

        $dog = $this->select($sql)[0];

        if ($dog['user_id'] == $_SESSION['user_logged_in']){
            return true;
        }else{
            header("Location: /");
            exit();
        }

    }

    // DELETE DOG POST
    function delete(){
        $current_user_id = (int)$_SESSION['user_logged_in'];
        $id = (int)$_GET['id'];
        $this->check_ownership($id);

        // Delete old project image file
        $project_image = trim($this->get_by_id($id)['filename']);
        if( !empty($project_image) ){
            if( file_exists(APP_ROOT.'/views/assets/files/'.$project_image )){
                unlink( APP_ROOT.'/views/assets/files/'.$project_image ); //it is the function that will delete a file or folder in php
            }
        }

        $sql = "DELETE FROM dogs WHERE id='$id' AND user_id='$current_user_id'";
        $this->execute($sql);
    }

    // EDIT DOG POST
    function edit($id){

        $id = (int)$id;
        $this->check_ownership($id); // Make sure user owns post that's being edited

        $current_user_id = (int)$_SESSION['user_logged_in'];
        $dogname = trim($this->data['dogname']);
        $dogcity = trim($this->data['dog-city']);
        $dogprovince = trim($this->data['dog-province']);
        $dogage = trim($this->data['dog-age']);
        $dogsex = trim($this->data['dog-sex']);
        $dogbreed = trim($this->data['dog-breed']);
        $dogpedigree = trim($this->data['dog-pedigree']);
        $dogfee = trim($this->data['dog-fee']);
        $dogbday = trim($this->data['dog-bday-day']);
        $dogbmonth = trim($this->data['dog-bday-month']);
        $dogbyear = trim($this->data['dog-bday-year']);
        $dogdesc = trim($this->data['dog-description']);

        if( !empty($_FILES['fileToUpload']['name']) ){ // Check if new file submitted

            // Delete old project image file
            $old_project_image = trim($this->get_by_id($id)['filename']);
            if( !empty($old_project_image) ){
                if( file_exists(APP_ROOT.'/views/assets/files/'.$old_project_image )){
                    unlink( APP_ROOT.'/views/assets/files/'.$old_project_image ); //it is the function that will delete a file or folder in php
                }
            }

            $util = new Util;
            $filename = $util->file_upload(); // file_upload will upload the file to the array $_FILES

            $sql = "UPDATE dogs SET dogname='$dogname', dogcity='$dogcity', dogprovince='$dogprovince', age='$dogage', sex='$dogsex', breed='$dogbreed', pedigree='$dogpedigree', matefee='$dogfee', dogbday='$dogbday', dogbmonth='$dogbmonth', dogbyear='$dogbyear', details='$dogdesc', filename='$filename' WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);

            }else{ // if no new file was submitted
                $sql = "UPDATE dogs SET dogname='$dogname', dogcity='$dogcity', dogprovince='$dogprovince', age='$dogage', sex='$dogsex', breed='$dogbreed', pedigree='$dogpedigree', matefee='$dogfee', dogbday='$dogbday', dogbmonth='$dogbmonth', dogbyear='$dogbyear', details='$dogdesc' WHERE id='$id' AND user_id='$current_user_id'";

                $this->execute($sql);
            }

        }




}
