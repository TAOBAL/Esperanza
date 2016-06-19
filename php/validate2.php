<?php
include_once ('php/validate.php');
$getUser = $myvalidate->userSession();
$user_id = $myvalidate->getUserId($getUser);
$getUserArray = array();
$getUserArray = $myvalidate->getUserProfile($getUser);


$profileArray = array();
$fname = $lname = $phone = $oldpass = $newpass = $newpass1 = "";
if(!empty($_POST['save_profile']) && isset($_POST['save_profile'])){
    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $phone = $_POST['Phone_Number'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $newpass2 = $_POST['newpass1'];
    $profileArray = $myvalidate->updateProfile($user_id, $fname, $lname, $phone, $oldpass, $newpass, $newpass2);
}
?>