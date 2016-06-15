<?php
include_once ('php/validate.php');
$getUser = $myvalidate->userSession();
$getUserArray = array();
$getUserArray = $myvalidate->getUserProfile($getUser);
$updateArray = array();
$address1 = $address2 = $city = $country = $state = $lga = "";
if(!empty($_POST['save_changes']) && isset($_POST['save_changes'])){
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$country = $_POST['country'];
$state = $_POST['state'];
$lga = $_POST['lga'];
$updateArray = $myvalidate->updateaddress($getUser,$address1, $address2, $city, $country, $state, $lga);
}
$user_id = $myvalidate->getUserId($getUser);
$profileArray = array();
<<<<<<< HEAD
$fname = $lname = $phone = "";
=======
$fname = $lname = $phone = $oldpass = $newpass = $newpass1 = "";
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
if(!empty($_POST['save_profile']) && isset($_POST['save_profile'])){
    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $phone = $_POST['Phone_Number'];
<<<<<<< HEAD
    $profileArray = $myvalidate->updateProfile($user_id, $fname, $lname, $phone);
=======
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $newpass2 = $_POST['newpass1'];
    $profileArray = $myvalidate->updateProfile($user_id, $fname, $lname, $phone, $oldpass, $newpass, $newpass2);
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
}
?>