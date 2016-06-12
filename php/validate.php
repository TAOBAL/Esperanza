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
    
    function registerUsers($fname, $lname, $email, $password, $gender, $cpassword){
        if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($gender) || empty($cpassword)){
            $error = "All fields are required";
            $this->responseArray = array($error);
            return $this->responseArray;
        }elseif($password != $cpassword) {
            $error = "Password does not match";
            $this->responseArray = array($error);
            return $this->responseArray;
        }else{
            $queryEmail = $this->link->prepare("SELECT * FROM users WHERE email='$email'");
            $queryEmail->execute();
            $resultEmail = $queryEmail->fetchAll();
            if ($resultEmail) {
                $error = "Email already exist";
                $this->responseArray = array($error);
                return $this->responseArray;
            } else {
                $query = $this->link->prepare("INSERT INTO users(fname, lname, email, password, gender) VALUES (?,?,?,?,?)");
                $values = array($fname, $lname, $email, $password, $gender);
                $result = $query->execute($values);
                if ($result) {
                    header("location:profile.php");
                }
            }
        }
    }

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
        session_start();
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
            $this->responseArray = array("Address field is required");
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
    function updateProfile($user_id, $fname, $lname, $phone){
        if(empty($fname) || empty($lname)){
            $this->responseArray = array("First name and last name are required");
        }else{
            $query = $this->link->prepare("UPDATE users SET fname='$fname', lname='$lname', telephone='$phone' WHERE user_id='$user_id'");
            $query->execute();
            $rowCount = $query->rowCount()? true : false;
            if($rowCount == true){
                $this->responseArray = array("Profile successfully updated");
                header('location:profile.php');
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
            $query = $this->link->prepare("INSERT INTO contact_us(name, email, phone, subject) VALUES (?,?,?,?)");
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
}

$myvalidate = new validate();
$rfname = $rlname = $remail = $rgender = $rpassword = $cpassword =  "";
$regarray = array();
if(!empty($_POST['register']) && isset($_POST['register'])){
    $rfname = $_POST['rfname'];
    $rlname = $_POST['rlname'];
    $remail = $_POST['remail'];
    $rpassword = $_POST['rpassword'];
    $rgender = $_POST['rgender'];
    $cpassword = $_POST['cpassword'];

    $regarray = $myvalidate->registerUsers($rfname, $rlname, $remail, $rpassword, $rgender, $cpassword);
}
$lemail = $lpassword = "";
$logarray = array();
if(!empty($_POST['login']) && isset($_POST['login'])){
    $lemail = $_POST['lemail'];
    $lpassword = $_POST['lpassword'];
    
    $logarray = $myvalidate->loginUsers($lemail, $lpassword);
}
?>