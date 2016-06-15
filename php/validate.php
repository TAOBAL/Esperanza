<?php
include_once ('databaseConnection.php');
class validate{
    public $link;
    public $responseArray = array();
    public $session_email;

    function __construct(){
        $mydatabase = new database();
        $this->link = $mydatabase->connectDB();
        return $this->link;
    }
    
<<<<<<< HEAD
    function registerUsers($fname, $lname, $email, $password, $gender, $cpassword){
        if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($gender) || empty($cpassword)){
            $error = "All fields are required";
            $this->responseArray = array($error);
            return $this->responseArray;
        }elseif($password != $cpassword) {
            $error = "Password does not match";
            $this->responseArray = array($error);
            return $this->responseArray;
=======
    function registerUsers($fname, $lname, $email, $password, $gender, $cpassword, $phone){
        if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($gender) || empty($cpassword) || empty($phone)){
            $error = "All fields are required";
            $this->responseArray = array($error);
        }elseif($password != $cpassword) {
            $error = "Password does not match";
            $this->responseArray = array($error);
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
        }else{
            $queryEmail = $this->link->prepare("SELECT * FROM users WHERE email='$email'");
            $queryEmail->execute();
            $resultEmail = $queryEmail->fetchAll();
            if ($resultEmail) {
                $error = "Email already exist";
                $this->responseArray = array($error);
<<<<<<< HEAD
                return $this->responseArray;
            } else {
                $query = $this->link->prepare("INSERT INTO users(fname, lname, email, password, gender) VALUES (?,?,?,?,?)");
                $values = array($fname, $lname, $email, $password, $gender);
                $result = $query->execute($values);
                if ($result) {
=======
            } else {
                $query = $this->link->prepare("INSERT INTO users(fname, lname, email, password, gender, telephone) VALUES (?,?,?,?,?,?)");
                $values = array($fname, $lname, $email, $password, $gender, $phone);
                $result = $query->execute($values);
                if ($result) {
                    $this->responseArray = array("Account created successfully");
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
                    session_start();
                    $_SESSION['email'] = $email;
                    header("location:profile.php");
                }
            }
        }
<<<<<<< HEAD
    }

=======
        return $this->responseArray;
    }
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
    function loginUsers($email, $password)
    {
        if (empty($email) || empty($password)) {
            $error = "All fields are required";
            $this->responseArray = array($error);
            return $this->responseArray;
        } else {
            $query = $this->link->prepare("SELECT * FROM users WHERE email='$email' AND password='$password'");
            $query->execute();
            $result = $query->fetchAll();
            if ($result) {
                session_start();
                $_SESSION['email'] = $email;
                header("location:profile.php");
            } else {
                $error = "Invalid login credentials";
                $this->responseArray = array($error);
                return $this->responseArray;
            }
        }
    }

    function userSession(){
        if(!isset($_SESSION['email'])){
            header('location:index.php');
        }else{
            $this->session_email = $_SESSION['email'];
        }
        return $this->session_email;
    }
    function blogDisplay(){
        session_start();
        if(isset($_SESSION['email'])){
            $myemail = $_SESSION['email'];
            $display = " <ul>
                    <li><a href='profile.php' style='color: #57C5A0'>$myemail</a> </li>
                    <span class='log'>  </span>
                    <li><a href='php/logout.php' style='color: #57C5A0'>Logout</a> </li>
                    <div class='clear'></div>
                </ul>";
        }else{
            $display = " <ul>
                    <li><a href='login.php' style='color: #57C5A0'>Login</a> </li>
                    <span class='log'> or </span>
                    <li><a href='register.php' style='color: #57C5A0'>Register</a> </li>
                    <div class='clear'></div>
                </ul>";
        }
        return $display;
    }
    function getUserProfile($userEmail){
        $query = $this->link->prepare("SELECT * FROM users WHERE email='$userEmail'");
        $query->execute();
        $result = $query->fetchAll();
        if($result){
            $fname = $result[0]['fname'];
            $lname = $result[0]['lname'];
            $email = $result[0]['email'];
            $telephone = $result[0]['telephone'];
            $this->responseArray = array('First_Name'=>$fname, 'Last_Name'=>$lname, 'E-mail'=>$email, 'Phone_Number'=>$telephone);
        }
        return $this->responseArray;
    }
    function getUserId($useremail){
        $query = $this->link->prepare("SELECT * FROM users WHERE email='$useremail'");
        $query->execute();
        $result = $query->fetchAll();
        if($result){
            $userId = $result[0]['user_id'];
        }
        return $userId;
    }
    function updateaddress($useremail, $strAdd, $wkAdd, $city, $country, $state, $lga){
        if(empty($strAdd) || empty($wkAdd) || empty($city) || empty($country) || empty($state) || empty($lga)){
            $this->responseArray = array("All address fields are required");
        }else{
            $query = $this->link->prepare("UPDATE users SET street_address='$strAdd', work_sch_address='$wkAdd', city='$city', country='$country', state='$state', local_govt='$lga' WHERE email='$useremail'");
            $query->execute();
            $rowCount = $query->rowCount()? true : false;
            if($rowCount == true){
                $this->responseArray = array("Contact successfully updated");
            }else{
                $this->responseArray = array("Contact update failed");
            }
        }
        return $this->responseArray;
    }
<<<<<<< HEAD
    function updateProfile($user_id, $fname, $lname, $phone){
        if(empty($fname) || empty($lname)){
            $this->responseArray = array("First name and last name are required");
=======
    function updateProfile($user_id, $fname, $lname, $phone, $oldpass, $newpass, $newpass1){
        if(empty($fname) || empty($lname)){
            $this->responseArray = array("First name and last name are required");
        }else if(!empty($oldpass) && !empty($newpass) && !empty($newpass1)){
                if($newpass == $newpass1){
                    $query = $this->link->prepare("UPDATE users SET fname='$fname', lname='$lname', telephone='$phone', password='$newpass' WHERE user_id='$user_id' AND password='$oldpass'");
                    $query->execute();
                    $rowCount = $query->rowCount()? true : false;
                    if($rowCount == true){
                        $this->responseArray = array("Profile successfully updated");
                    }else{
                        $this->responseArray = array("Profile update unsuccessful, password wrong or same as old password");
                    }
                }else{
                    $this->responseArray = array("Password mismatched");
                }
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
        }else{
            $query = $this->link->prepare("UPDATE users SET fname='$fname', lname='$lname', telephone='$phone' WHERE user_id='$user_id'");
            $query->execute();
            $rowCount = $query->rowCount()? true : false;
            if($rowCount == true){
                $this->responseArray = array("Profile successfully updated");
<<<<<<< HEAD
                header('location:profile.php');
=======
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
            }else{
                $this->responseArray = array("No changes made");
            }
        }
        return $this->responseArray;
    }
    function getField($name){
        if($name != "E-mail") {
            $name = explode("_", $name);
            $name = $name[0] . " " . $name[1];
        }else{
            $name = $name;
        }
        return $name;
    }
    function contact_us($name, $email, $mobile, $subject){
        if(empty($name) || empty($email) || empty($mobile) || empty($subject)){
            $this->responseArray = array("All fields are required");
        }else {
            $query = $this->link->prepare("INSERT INTO contact_us(fullname, email, phone, subject) VALUES (?,?,?,?)");
            $values = array($name, $email, $mobile, $subject);
            $result = $query->execute($values);
            if ($result) {
                $this->responseArray = array("Submitted successfully, reply will be send to your email");
            } else {
                $this->responseArray = array("Submission unsuccessful");
            }
        }
        return $this->responseArray;
    }
<<<<<<< HEAD
}

$myvalidate = new validate();
$rfname = $rlname = $remail = $rgender = $rpassword = $cpassword =  "";
=======
    function loginAdmin($username, $password){
        if(empty($username) || empty($password)){
            $this->responseArray = array("All fields are required");
        }else{
            $query = $this->link->prepare("SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
            $query->execute();
            $result = $query->fetchAll();
            if($result){
                /*session_start();
                $_SESSION['email'] = $username;*/
                header('location:admin.php');
            }else{
                $this->responseArray = array("Invalid login username and password");
            }
        }
        return $this->responseArray;
    }
    function uploadPhoto($type){
        $target_dir = "adminpost_images/";
        $uploadOK = 0;
        if (!empty($_FILES["image"]["name"])) {
            $target_file_temp = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = pathinfo($target_file_temp, PATHINFO_EXTENSION);
            $currentTime = strtotime(date("Y-m-d")) . "_" . strtotime(date("H:i:s")) . "_" . "$type".".";
            $name = $currentTime;
            $target_file = $target_dir . $name . $imageFileType;
            $folderIsWritable = is_writable($target_dir);
            if ($folderIsWritable) {
                if ($_FILES["image"]["error"] == 1) {
                    $this->responseArray= array(" Your file size execeed the maximum file size on the localhost only images with minimum size of 20kb and max size of 500kb are allowed");
                } else if ($_FILES["image"]["error"] == 6) {
                    $this->responseArray = array(" Sorry temporary folder is missing on our server ");
                } else {
                   /* $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
                        //$uploadErr = "File is an image " . $check["mime"];
                        if (($_FILES["image"]["size"] < (20480))) {
                            $this->responseArray = array("Only images with minimum size of 20kb and max size of 2MB are allowed");
                        } else {*/
                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                $photoName = $name . $imageFileType;
                                $this->responseArray = array("Photo name," . $photoName);
                                /*$sql8 = "UPDATE contestants SET picture_name='$contestant_newpicture_name' WHERE user_id='$user_id' AND election_id='$election_id_here'";
                                $connection1->exec($sql8);*/
                            }
                            /*} else {
                                $this->responseArray = array("The file was not successfully uploaded");
                            }*/
                        }
                  /*  } else {
                        $uploadOK = 0;
                        $this->responseArray = array("File is not an image");
                    }
                }*/
            } else {
                $this->responseArray = array("Sorry cannot currently write to folder images");
                /*$success = "false";*/
            }
        }else {
           /* $this->responseArray = array("No photo choosen");*/
        }
        return $this->responseArray;
    }
    function getPhotoName($name){
        $name = explode(",",$name);
        if(empty($name[1])){
            $name = $name[0];
        }else {
            $name = $name[1];
        }
        return $name;
    }
    function AdminPost($type, $desc, $price, $available, $ShoeType){
        if(empty($desc)) {
            $this->responseArray = array("A description or news is required");
        }else{
                $result = "";
                $myPhotoArray = array();
                $myPhotoArray = $this->uploadPhoto($type);
                if(empty($myPhotoArray)){
                    $uploadName = "Nil";
                }else {
                    for ($i = 0; $i < count($myPhotoArray); $i++) {
                        $uploadName = $this->getPhotoName($myPhotoArray[$i]);
                    }
                }
                if($type == "Blog") {
                    $query = $this->link->prepare("INSERT INTO blog(blog_news, blog_picture) VALUES (?,?)");
                    $values = array($desc, $uploadName);
                    $result = $query->execute($values);
                }elseif($type == "Shoe"){
                    $query = $this->link->prepare("INSERT INTO shoe(shoe_desc, shoe_type, shoe_picture, shoe_price, available_no) VALUES(?,?,?,?,?)");
                    $values = array($desc,$ShoeType, $uploadName, $price, $available);
                    $result = $query->execute($values);
                }else{
                    $this->responseArray = array("Selected type not found");
                }
                if($result){
                    $this->responseArray = array($type."Post was successfully uploaded");
                }else{
                    $this->responseArray = array("Selected type not or Post uploaded unsuccessfully");
                }
            }
        return $this->responseArray;
    }
    function getShoes(){
        $shoeDetailsArray = array();
        $image_dir = "adminpost_images/";
        $query = $this->link->prepare("SELECT * FROM shoe ORDER BY date_created ASC");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $shoe_desc = $result[$rowCount]['shoe_desc'];
            $shoe_picture = $image_dir.$result[$rowCount]['shoe_picture'];
            if($shoe_picture == "adminpost_images/Nil"){
                $shoe_picture = "";
            }else{
                $shoe_picture = "<img src='$shoe_picture' width='200px' height='80px'>";
            }
            $shoe_price =$result[$rowCount]['shoe_price'];
            $available_no = $result[$rowCount]['available_no'];
            $shoe_type = $result[$rowCount]['shoe_type'];
            $date_created  = $result[$rowCount]['date_created'];
            $shoe_details = "<td>$shoe_desc</td><td>$shoe_price</td><td>$available_no</td><td>$shoe_picture</td><td>$shoe_type</td><td>$date_created</td><td>Option</td>";
            array_push($shoeDetailsArray, $shoe_details);
        }
        return $shoeDetailsArray;
    }
    function getBlogPost(){
        $blogDetailsArray = array();
        $image_dir = "adminpost_images/";
        $query = $this->link->prepare("SELECT * FROM blog ORDER BY date_created ASC");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $blog_news = $result[$rowCount]['blog_news'];
            $blog_picture = $image_dir.$result[$rowCount]['blog_picture'];
            if($blog_picture == "adminpost_images/Nil"){
                $blog_picture = "";
            }else{
                $blog_picture = "<img src='$blog_picture' width='200px' height='80px'>";
            }
            $date_created  = $result[$rowCount]['date_created'];
            $blogPost_details = "<td>$blog_news</td><td>$blog_picture</td><td>$date_created</td><td>Option</td>";
            array_push($blogDetailsArray, $blogPost_details);
        }
        return $blogDetailsArray;
    }
    function getAllUsers(){
        $usersDetailsArray = array();
        $query = $this->link->prepare("SELECT * FROM users ORDER BY date_created ASC");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $fname = $result[$rowCount]['fname'];
            $lname = $result[$rowCount]['lname'];
            $email = $result[$rowCount]['email'];
            $telephone = $result[$rowCount]['telephone'];
            $gender = $result[$rowCount]['gender'];
            $date_created  = $result[$rowCount]['date_created'];
            $users_details = "<td>$fname</td><td>$lname</td><td>$email</td><td>$telephone</td><td>$gender</td><td>$date_created";
            array_push($usersDetailsArray, $users_details);
        }
        return $usersDetailsArray;
    }
}

$myvalidate = new validate();
$rfname = $rlname = $remail = $rgender = $rpassword = $cpassword = $phone =  "";
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
$regarray = array();
if(!empty($_POST['register']) && isset($_POST['register'])){
    $rfname = $_POST['rfname'];
    $rlname = $_POST['rlname'];
    $remail = $_POST['remail'];
    $rpassword = $_POST['rpassword'];
    $rgender = $_POST['rgender'];
    $cpassword = $_POST['cpassword'];
<<<<<<< HEAD

    $regarray = $myvalidate->registerUsers($rfname, $rlname, $remail, $rpassword, $rgender, $cpassword);
=======
    $phone = $_POST['phone'];
    $regarray = $myvalidate->registerUsers($rfname, $rlname, $remail, $rpassword, $rgender, $cpassword, $phone);
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
}
$lemail = $lpassword = "";
$logarray = array();
if(!empty($_POST['login']) && isset($_POST['login'])){
    $lemail = $_POST['lemail'];
    $lpassword = $_POST['lpassword'];
    
    $logarray = $myvalidate->loginUsers($lemail, $lpassword);
}
$getUserArray = array();
$getDisplay = $myvalidate->blogDisplay();
$conatctArray = array();
$userName = $userEmail = $userPhone = $userMsg = "";
if(!empty($_POST['contact']) && isset($_POST['contact'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $userMsg = $_POST['userMsg'];
    $conatctArray = $myvalidate->contact_us($userName, $userEmail, $userPhone, $userMsg);
}

?>