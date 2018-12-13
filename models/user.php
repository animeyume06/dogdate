<?php
class User extends Db {

    // QUICK SQL INJECTION (Force value to an integer)
    function get_by_id($id){
        $id = (int)$id;

        $sql = "SELECT * FROM users WHERE id = '$id'";

        $user = $this->select($sql)[0];

        return $user;
    }

    // ADD NEW USER
    function add(){
        $firstname = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);
        $email = trim($this->data['email']);
        $tel = trim($this->data['tel']);
        $city = trim($this->data['city']);
        $province = trim($this->data['province']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $joined_time = time();

        $sql = "INSERT INTO users (fname, lname, email, phone, city, province, password, joinedtime) VALUES ('$firstname', '$lastname', '$email', '$tel', '$city', '$province','$password', '$joined_time')";

        $new_user_id = $this->execute_return_id($sql);

        return $new_user_id;

    }

    // CHECK IF USER'S EMAIL EXISTS IN DATABASE
    function exists(){
        $email = $this->data['email'];

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $user = $this->select($sql);

        return $user;

    }


    // USER LOGS IN
    function login(){

        $_SESSION = array(); //Empty session to start fresh

        // Get the user's details from the db and store it in a variable
        $email = $this->data['email'];
        $sql = "SELECT * FROM users WHERE email = '$email'";

        $user = $this->select($sql)[0];

        // Check if the password from the form matches password from db
        if( password_verify($_POST['password'], $user['password']) ){

            // User is logged in
            $_SESSION['user_logged_in'] = $user['id'];

        }else{ //Login attempt failed

            $_SESSION['login_attempt_msg'] = '<p class="text-danger">*Incorrect email and/or password*</p>';
            header("Location: /login.php");
            exit();
        }

    }


    // USER EDITS PROFILE
    function edit(){

        $id = (int)$_SESSION['user_logged_in'];
        $city = (trim($this->data['city']));
        $password = password_hash(trim($this->data['password']), PASSWORD_DEFAULT);
        $province = (trim($this->data['province']));
        $bio = (trim($this->data['profileBio']));
        $tel = (trim($this->data['tel']));
        $email = (trim($this->data['email']));

        $profilepic = '';

        if( !empty($_FILES['fileToUpload']['name']) ){

            // Delete user's old profile image
            $old_project_image = trim($this->get_by_id($id)['profilepic']);
            if( !empty($old_project_image) ){
                if( file_exists(APP_ROOT.'/views/assets/files/'.$old_project_image )){
                    unlink( APP_ROOT.'/views/assets/files/'.$old_project_image ); //it is the function that will delete a file or folder in php
                }
            }

            $util = new Util;
            $profilepic = $util->file_upload(); // file_upload will upload the file to the array $_FILES
            $profilepic = ", profilepic='$profilepic'";
        }


        if( !empty(trim($_POST['password'])) ){ // New password entered


            $sql = "UPDATE users SET city='$city', password='$password', province='$province', bio='$bio', phone='$tel', email='$email' $profilepic WHERE id='$id'";

            $this->execute($sql);

        }else{ //No new password entered
            $sql = "UPDATE users SET city='$city', province='$province', bio='$bio', phone='$tel', email='$email' $profilepic WHERE id='$id'";

            $this->execute($sql);

        }


    }


}
