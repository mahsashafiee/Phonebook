<?php
session_start();
//get user inputs
$email = "";
$password_1 = "";
$confirm_password = "";
$sql = "";
$errors = [];
$name = "";
$title = "";
$size = "";
$type = "";
$temp_name = "";
$permenentDestination = "";
$content = "";
$phoneType = "";
$user_id = "";
$fileError = "";
$allowedFormat = array("png"=>"image/png", "jpg"=>"image/jpeg");


//error messages
$missingUsername = '<p><strong>Please enter your name!</strong></p>';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Email already exist!Please enter another email address.</strong></p>';
$missingPassword = '<p><strong>Please enter a password!</strong></p>';
$missingConfirm_password = '<p><strong>Please confirm your password!</strong></p>';
$missingName = "<p><strong>Please enter a name!</strong></p>";
$missingPhonenumber = "<p><strong>Please enter a phone number for the contact!</strong></p>";
$psswordsNotmatched = '<p><strong>The passwords are not mached!</strong></p>';
$invalidPhonenumber = '<p><strong>Phone number already exist! Please enter another phone number.</strong></p>';
$invalidName = '<p><strong>Name already exist! Please enter another name.</strong></p>';
$loggedinMsg = "<p><strong>You are Logged in!</strong></p>";
$wrongData = "<p><strong>Incorrect email or password! Please try again.</strong></p>";
$noFiletoUpload = "<p><strong>Please choose a image!</strong></p>";
$fileAlreadyExist = "<p><strong>This file already exists!</strong></p>";
$wrongFormat = "<p><strong>Sorry! You can only upload image files.</strong></p>";
$fileTooLarge = "<p><strong>Sorry! You can only upload files smaller than 3MB.</strong></p>";
$thanksforupload = '<div class="alert alert-success"><srtong>Your post uploaded successfully.</srtong></div>';
$unabletoupload = "<p><strong>Unable to upload your image! Please try again later</strong></p>";
$unabletoCreate = "<p><strong>Unable to create the contact! Please try again later.</strong></p>";


//connect to database
$db = new mysqli("localhost", "root", "", "phonebook");

if($db){
    if(isset($_POST["register"])){
        //get user inputs
        $email = mysqli_real_escape_string($db,$_POST["email"]);
        $password_1 = mysqli_real_escape_string($db,$_POST["password_1"]);
        $confirm_password = mysqli_real_escape_string($db,$_POST["confirm_password"]);
        if(empty($email)){
            array_push($errors, $missingEmail);
        }
        if(empty($password_1)){
            array_push($errors, $missingPassword);
        }
        if(empty($confirm_password)){
            array_push($errors, $missingConfirm_password);
        }
        if($password_1 != $confirm_password){
            array_push($errors, $psswordsNotmatched);
        }
        $set_user_query = "select * from users where email='$email' limit 1";
        $result = $db->query($set_user_query);
        if($result->num_rows > 0){
            while($user = $result->fetch_assoc()){
                if($email == $user["email"]){
                    array_push($errors, $invalidEmail);
                }
            }
        }
        
        if(count($errors) == 0){
            $password = md5($password_1);
            $query = "INSERT INTO `users`(`email`, `password`) VALUES ('$email','$password')";
            if($db->query($query) == true){
 //               $_SESSION["username"] = $username;
                $_SESSION["msg_login"] = $loggedinMsg;
                header('location: login.php');
            } else {
                echo "Error: " .$sql. "<br>" .$db->error;
                exit();
            }
            
        }
    }
    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);
        if(empty($email)){
            array_push($errors, $missingEmail);
        }
        if(empty($password)){
            array_push($errors, $missingPassword);
        }
        $password = md5($password);
        $login_query = "SELECT * FROM `users` WHERE email='$email' and password='$password' limit 1";
        $result = $db->query($login_query);
        if($result->num_rows == 1){
            $_SESSION["username"] = $email;
            header('location: index.php');
        }else{
            array_push($errors, $wrongData);
        }
    }
    if(isset($_POST["create"])){
//        var_dump($_POST);
//        exit();
        $imgName = $_FILES["file"]["name"];
        $type = $_FILES["file"]["type"];          
        $size = $_FILES["file"]["size"];
        $fileError = $_FILES["file"]["error"];
        $tmp_name = $_FILES["file"]["tmp_name"];          
        $permenentDestination = "uploads/". basename($_FILES["file"]["name"]);
        $name = mysqli_real_escape_string($db, $_POST["name"]);
        $lastname = mysqli_real_escape_string($db, $_POST["lastname"]);
        $phoneType = mysqli_real_escape_string($db, $_POST["type"]);
        $postcode = mysqli_real_escape_string($db, $_POST["postcode"]);
        $coemail = mysqli_real_escape_string($db, $_POST["coemail"]);
        $phonenumber = mysqli_real_escape_string($db, $_POST["phonenumber"]);
        
        if(empty($name)){
            array_push($errors, $missingName);
        }
        if(empty($phonenumber)){
            array_push($errors, $missingPhonenumber);
        }
        
        if($fileError == 4){ 
        } else {
            if($size > 3145728){
            array_push($errors, $fileTooLarge);
            }
            if(!in_array($type, $allowedFormat)){
                array_push($errors, $wrongFormat);
            }
            if(move_uploaded_file($tmp_name, $permenentDestination)){
                    
            }else{ 
                array_push($errors, $unabletoupload);
            }
        }
        $set_contact_query = "select * from contact where name='$name' or phonenumber='$phonenumber' limit 1";
        $result = $db->query($set_contact_query);
        if($result->num_rows > 0){
            while($user = $result->fetch_assoc()){
                if($name == $user["name"]){
                    array_push($errors, $invalidName);
                }
                if($phonenumber == $user["phonenumber"]){
                    array_push($errors, $invalidPhonenumber);
                }
            }
        }
        $email = $_SESSION["username"];
//        $time = time();
        $sql_query_id = "SELECT `ID` FROM `users` WHERE email='".$email."' limit 1";
        $result = $db->query($sql_query_id);
        if($result->num_rows>0){
            while($rows = $result->fetch_assoc()){
                $user_id = $rows["ID"];
            }
        }
        
        $query = "INSERT INTO `contact`(`name`, `lastname`, `phonenumber`, `type`, `postcode`, `email`, `image_name`, `user_id`) VALUES ('".$name."','".$lastname."','".$phonenumber."', '".$phoneType."', '".$postcode."','".$coemail."', '".$imgName."', '".$user_id."')";
//        var_dump($query);
//        exit();
        if(count($errors) == 0){
            if($db->query($query) == true){
                header('location: index.php');
            }else{
                array_push($errors,$unabletoCreate);
            }
            
        }
        
    }
    
//    Update contact
    
//    if(isset($_POST["update"])){
////        $imgName = $_FILES["file"]["name"];
////        $type = $_FILES["file"]["type"];          
////        $size = $_FILES["file"]["size"];
////        $fileError = $_FILES["file"]["error"];
////        $tmp_name = $_FILES["file"]["tmp_name"];          
////        $permenentDestination = "uploads/". basename($_FILES["file"]["name"]);
if(isset($_POST["update"])){
    
        $img_query ="SELECT `image_name` FROM `contact` WHERE ID=".$_GET["id"];
        $result = $db->query($img_query);
        if($result->num_rows>0){
            while($rows = $result->fetch_assoc()){
                $imgName = $rows["image_name"];
            }
        }

        
        $name = mysqli_real_escape_string($db, $_POST["name"]);
        $lastname = mysqli_real_escape_string($db, $_POST["lastname"]);
        $phoneType = mysqli_real_escape_string($db, $_POST["type"]);
        $postcode = mysqli_real_escape_string($db, $_POST["postcode"]);
        $coemail = mysqli_real_escape_string($db, $_POST["coemail"]);
        $phonenumber = mysqli_real_escape_string($db, $_POST["phonenumber"]);
//        var_dump($_GET["id"]);
//        exit();
        
        if(empty($name)){
            array_push($errors, $missingName);
        }
        if(empty($phonenumber)){
            array_push($errors, $missingPhonenumber);
        }
//        $set_contact_query = "select * from contact where name='$name' or phonenumber='$phonenumber' limit 1";
//        $result = $db->query($set_contact_query);
//        if($result->num_rows > 0){
//            while($user = $result->fetch_assoc()){
//                if($name == $user["name"]){
//                    array_push($errors, $invalidName);
//                }
//                if($phonenumber == $user["phonenumber"]){
//                    array_push($errors, $invalidPhonenumber);
//                }
//            }
//        }
        
        $email = $_SESSION["username"];
        $sql_query_id = "SELECT `ID` FROM `users` WHERE email='".$email."' limit 1";
        $result = $db->query($sql_query_id);
        if($result->num_rows>0){
            while($rows = $result->fetch_assoc()){
                $user_id = $rows["ID"];
            }
        }
        
        $query_update="UPDATE `contact` SET `name`='".$name."',`lastname`='".$lastname."',`phonenumber`='".$phonenumber."',`type`='".$phoneType."',`postcode`='".$postcode."',`email`='".$coemail."',`image_name`='".$imgName."',`user_id`='".$user_id."' WHERE ID=".$_GET["id"];
//        var_dump($query_update);
//        exit();
        if(count($errors) == 0){
            if($db->query($query_update) == true){
                header('location: index.php');
            }else{
                array_push($errors,$unabletoCreate);
            }
            
        }
    }
    
} else {
    echo "connection false";
    exit();
}



?>