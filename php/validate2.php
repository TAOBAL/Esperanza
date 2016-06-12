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
$fname = $lname = $phone = "";
if(!empty($_POST['save_profile']) && isset($_POST['save_profile'])){
    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $phone = $_POST['Phone_Number'];
    $profileArray = $myvalidate->updateProfile($user_id, $fname, $lname, $phone);
}
?>