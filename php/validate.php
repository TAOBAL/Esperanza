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
    
    function registerUsers($fname, $lname, $email, $password, $gender, $cpassword, $phone){
        if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($gender) || empty($cpassword) || empty($phone)) {
            $error = "All fields are required";
            $this->responseArray = array($error);
        }elseif(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
            $error = "Invalid first or last name";
            $this->responseArray = array($error);
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Invalid Email";
            $this->responseArray = array($error);
        }elseif($password != $cpassword) {
            $error = "Password does not match";
            $this->responseArray = array($error);
        }else{
            $queryEmail = $this->link->prepare("SELECT * FROM users WHERE email='$email'");
            $queryEmail->execute();
            $resultEmail = $queryEmail->fetchAll();
            if ($resultEmail) {
                $error = "Email already exist";
                $this->responseArray = array($error);
            } else {
                $query = $this->link->prepare("INSERT INTO users(fname, lname, email, password, gender, telephone) VALUES (?,?,?,?,?,?)");
                $values = array($fname, $lname, $email, $password, $gender, $phone);
                $result = $query->execute($values);
                if ($result) {
                    $this->responseArray = array("Account created successfully");
                    session_start();
                    $_SESSION['email'] = $email;
                    header("location:profile.php");
                }
            }
        }
        return $this->responseArray;
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
                if(isset($_SESSION['all_shoe'])) {
                    $myarray = array();
                    $myShoe_id = $shoequantity = "";
                    $myarray = $_SESSION['all_shoe'];
                    foreach($myarray as $x => $x_value) {
                        $myShoe_id = $x_value;
                        $shoequantity = $x;
                    }
                    $myemail = $_SESSION['email'];
                    $myid = $this->getUserId($myemail);
                    $order_status = "Nil";
                    $query = $this->link->prepare("INSERT INTO orders (shoe_id, user_id, quantity_ordered, order_status) VALUES (?,?,?,?)");
                    $values = array($myShoe_id, $myid, $shoequantity, $order_status);
                    $result = $query->execute($values);
                }
                if(isset($_SESSION['all_shoe'])){
                    header('location:order.php');
                }else {
                    header("location:profile.php");
                }
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
        $userId = "";
        $query = $this->link->prepare("SELECT * FROM users WHERE email='$useremail'");
        $query->execute();
        $result = $query->fetchAll();
        if($result){
            $userId = $result[0]['user_id'];
        }
        return $userId;
    }
    function orderDetails($user_id, $ofname, $olname, $oemail, $ophone,$strAdd, $wkAdd, $city, $country, $state, $lga){
        if(empty($ofname) || empty($olname) || empty($oemail)|| empty($ophone) || empty($strAdd) || empty($wkAdd) || empty($city) || empty($country) || empty($state) || empty($lga)){
            $this->responseArray = array("All fields are required");
        }elseif(!preg_match("/^[a-zA-Z]*$/", $ofname) || !preg_match("/^[a-zA-Z]*$/", $olname)) {
            $error = "Invalid first or last name";
            $this->responseArray = array($error);
        }elseif(!filter_var($oemail, FILTER_VALIDATE_EMAIL)){
            $error = "Invalid Email";
            $this->responseArray = array($error);
        }else {
            $query = $this->link->prepare("INSERT INTO ordering_details(user_id, fname, lname, email, phone, str_address, wrk_address, city, country, state, lga)VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $values = array($user_id, $ofname, $olname, $oemail, $ophone, $strAdd, $wkAdd, $city, $country, $state, $lga);
            $result = $query->execute($values);
            if($result){
                $order = 0;
                $query = $this->link->prepare("SELECT * FROM ordering_details WHERE user_id='$user_id' ORDER BY date_created DESC");
                $query->execute();
                $result = $query->fetchAll();
                $rowCount = $query->rowCount();
                $ordering_details_id = $result[0]['ordering_details_id'];
                $query = $this->link->prepare("UPDATE orders SET ordering_details_id='$ordering_details_id' WHERE user_id='$user_id' AND ordering_details_id='$order'");
                $query->execute();
                $rowCount = $query->rowCount()? true : false;
                if($result == true) {
                    header('location:order.php');
                }
            }else{
                $error = "Submission was not successful";
                $this->responseArray = array($error);
            }
        }
        return $this->responseArray;
    }
    function updateProfile($user_id, $fname, $lname, $phone, $oldpass, $newpass, $newpass1){
        if(empty($fname) || empty($lname)){
            $this->responseArray = array("First name and last name are required");
        }elseif(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
            $error = "Invalid first or last name";
            $this->responseArray = array($error);
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
        }else{
            $query = $this->link->prepare("UPDATE users SET fname='$fname', lname='$lname', telephone='$phone' WHERE user_id='$user_id'");
            $query->execute();
            $rowCount = $query->rowCount()? true : false;
            if($rowCount == true){
                $this->responseArray = array("Profile successfully updated");
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
        }elseif(!preg_match("/^[a-zA-Z]*$/", $name)) {
            $error = "Invalid Name";
            $this->responseArray = array($error);
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Invalid Email";
            $this->responseArray = array($error);
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
    function AdminPost($title,$type, $desc, $price, $available, $ShoeType){
        if(empty($title)) {
            $this->responseArray = array("Shoe name or blog news title is required");
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
                    $query = $this->link->prepare("INSERT INTO blog(blog_news_title, blog_news, blog_picture) VALUES (?,?,?)");
                    $values = array($title,$desc, $uploadName);
                    $result = $query->execute($values);
                }elseif($type == "Shoe"){
                    $query = $this->link->prepare("INSERT INTO shoe(shoe_desc, shoe_type, shoe_picture, shoe_price, available_no) VALUES(?,?,?,?,?)");
                    $values = array($title,$ShoeType, $uploadName, $price, $available);
                    $result = $query->execute($values);
                }else{
                    $this->responseArray = array("Selected type not found");
                }
                if($result){
                    header('location:admin.php');
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
            $shoe_details = "<td>$shoe_desc</td><td>#$shoe_price</td><td>$available_no</td><td>$shoe_picture</td><td>$shoe_type</td><td>$date_created</td><td>Option</td>";
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
            $blog_title = $result[$rowCount]['blog_news_title'];
            $blog_news = $result[$rowCount]['blog_news'];
            $blog_picture = $image_dir.$result[$rowCount]['blog_picture'];
            if($blog_picture == "adminpost_images/Nil"){
                $blog_picture = "";
            }else{
                $blog_picture = "<img src='$blog_picture' width='200px' height='80px'>";
            }
            $date_created  = $result[$rowCount]['date_created'];
            $blogPost_details = "<td>$blog_title</td><td>$blog_news</td><td>$blog_picture</td><td>$date_created</td><td>Option</td>";
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
    function getShoeByType($shoetype){
        $shoeTypeArrays = array();
        $image_dir = "adminpost_images/";
        if($shoetype == "All") {
            $type = "";
        }else{
            $type = "WHERE shoe_type = '$shoetype'";
        }
        $query = $this->link->prepare("SELECT * FROM shoe $type ORDER BY date_created ASC");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $key = $result[$rowCount]['shoe_id'];
            $shoe_image = $image_dir.$result[$rowCount]['shoe_picture'];
            $shoe_name = $result[$rowCount]['shoe_desc'];
            $shoe_price = $result[$rowCount]['shoe_price'];
            $shoe_details = "<a href='#' onclick='whereTo($key);'><img src='$shoe_image' alt=''><h3>$shoe_name</h3><span class='price'>#$shoe_price</span></a>";
            array_push($shoeTypeArrays, $shoe_details);
        }
        return $shoeTypeArrays;
    }
    function dateString($date){
        $date = explode(" ", $date);
        $date = $date[0];
        $year=explode("-",$date)[0];
        $month= explode("-",$date)[1];
        $day= explode("-",$date)[2];
        if(substr($month,0,1)===0){
            $month= substr($month,1,1);
        }
        //decide month
        $string= array('January','February','March','April','May','June','July','August','September','October','November','December');
        $month_string=$string[$month-1];
        return $month_string.' '.$day.', '.$year;
    }
    function getAllBlogPost(){
        $blogPost = array();
        $query = $this->link->prepare("SELECT * FROM blog ORDER BY date_created ASC");
        $image_dir = "adminpost_images/";
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $blog_image = $result[$rowCount]['blog_picture'];
            if($blog_image == "Nil"){
                $blog_images="";
            }else{
                $blog_image = $image_dir.$blog_image;
                $blog_images = "<img src='$blog_image' width='700px' height='300px'>";
            }
            $blog_title = $result[$rowCount]['blog_news_title'];
            $blog_news = $result[$rowCount]['blog_news'];
            $blog_date = $this->dateString($result[$rowCount]['date_created']);
            $blog_details = "<div class='about-left'>".
                        "<h3><a href='#' style='font-weight: bolder'>$blog_title</a></h3>".
                    "</div>".
                "<div class='blog-img'><a href='project.html'>$blog_images</a></div>".
            "<div class='blog'>".
                        "<div class='blogsidebar span_1_of_blog'>".
                            "<ul class='blog-list'>".
                                "<li>Posted on<br><a href='#'>$blog_date</a></li>".
                                "<li>Comments<br><a href='#'>8</a></li>".
                            "</ul>".
                        "</div>".
                        "<div class='cont span_2_of_blog'>".
                            "<p class='para'>$blog_news</p>".
                             "</div>".
                        "<div class='clear'></div>".
                    "</div>";
            array_push($blogPost, $blog_details);
        }
        return $blogPost;
    }
    function RecentNews($where){
        $RecentArray = array();
        $query = $this->link->prepare("SELECT * FROM blog ORDER BY date_created ASC");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $blog_title = $result[$rowCount]['blog_news_title'];
            $blog_news = $result[$rowCount]['blog_news'];
            if($where == "blog") {
                $newBlog_news = substr($blog_news, 0, 92);
            }else{
                $newBlog_news = substr($blog_news, 0, 150);
            }
            $blog_date = $this->dateString($result[$rowCount]['date_created']);
            $date = explode(" ", $blog_date);
            $day = $date[1];
            $day = explode(",", $day);
            $dDate = $day[0];
            $month = $date[0];
            if($where == "blog") {
                $recent_news = "<div class='date'>$dDate <br>$month</div>" .
                    " <div class='desc'><h4><a href='#'>$blog_title</a></h4><p class='para'>$newBlog_news</p></div>" .
                    "<div class='clear'></div>";
            }else{
                $recent_news = "<div class='date1'><h4>$month $dDate</h4></div>".
                "<div class='date_text'><h4><a href='#'>$blog_title</a></h4><p>$blog_news</p></div>";
            }
            array_push($RecentArray, $recent_news);
        }
        return $RecentArray;
    }
    function shoeById($id){
        $myshoeArray = array();
        $opt = "";
        $image_dir = "adminpost_images/";
        $query = $this->link->prepare("SELECT * FROM shoe WHERE shoe_id='$id'");
        $query->execute();
        $result = $query->fetchAll();
        if($result){
            $key = $result[0]['shoe_id'];
            $shoe_name = $result[0]['shoe_desc'];
            $shoe_type = $result[0]['shoe_type'];
            $shoe_price = $result[0]['shoe_price'];
            $shoe_photo = $image_dir.$result[0]['shoe_picture'];
            $available_no = $result[0]['available_no'];
            for($i=1; $i<=$available_no; $i++){
                $opt .='<option>'.$i.'</option>';
            }
            $mygoods = "<h3>$shoe_name $shoe_type</h3><h5>#$shoe_price<!--<span>#4000</span>--><a href='#'>click for offer</a></h5>".
                "<div class='available'>".
                "<div class='btn_form'><form method='post'>Quantity <select name='option'>$opt</select><br><input type='hidden' name='id' value='$key'><br><input type='submit' name='proceed' value='Add Order' title='' /></form></div>";
            $myshoeArray = array($shoe_photo, $mygoods);
        }
        return $myshoeArray;
    }
    function relatedProduct($id){
        $relatedProduct = array();
        $image_dir = "adminpost_images/";
        $query = $this->link->prepare("SELECT * FROM shoe WHERE shoe_id='$id'");
        $query->execute();
        $result = $query->fetchAll();
        if($result){
            $getType = $result[0]['shoe_type'];
        }
        $query = $this->link->prepare("SELECT * FROM shoe WHERE shoe_type='$getType'");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $key = $result[$rowCount]['shoe_id'];
            $shoe_name = $result[$rowCount]['shoe_desc'];
            $shoe_price = $result[$rowCount]['shoe_price'];
            $shoe_photo = $image_dir.$result[$rowCount]['shoe_picture'];
            $related = "<div class='left_img'><img src='$shoe_photo' alt=''></div>".
                    "<div class='left_text'><p><a href='#' onclick='whereTo($key)'>$shoe_name</a></p><span class='line'>#40,000.00</span><span>$shoe_price</span></div>";
            array_push($relatedProduct, $related);
        }
        return $relatedProduct;
    }
    function addOrder($shoe_id, $quantity){
        $ordering_details_id = "0";
        $myemail = $_SESSION['email'];
        $myid = $this->getUserId($myemail);
        if(!isset($_SESSION['email'])) {
            session_start();
            $_SESSION['shoe_id'] = $shoe_id;
            $_SESSION['all_shoe'][$quantity] = $_SESSION['shoe_id'];
            header('location:order.php');
        }else{
            $query1 = $this->link->prepare("SELECT * FROM ordering_details WHERE user_id='$myid' AND address_used='$ordering_details_id'");
            $query1->execute();
            $result1 = $query1->fetchAll();
            if($result1){
                $ordering_details_id = $result1[0]['ordering_details_id'];
            }else{
                $ordering_details_id = "0";
            }
            $orderStatus = "Nil";
            $query = $this->link->prepare("INSERT INTO orders(user_id, shoe_id, ordering_details_id, quantity_ordered, order_status) VALUES(?,?,?,?,?)");
            $values = array($myid, $shoe_id, $ordering_details_id, $quantity, $orderStatus);
            $result = $query->execute($values);
            if($result){
                header('location:order.php');
            }
        }
    }
    function orderSession(){
        $myids = array();
       if(isset($_SESSION['all_shoe'])){
           $myids = $_SESSION['all_shoe'];
       }
        return $myids;
    }
    function orderedShoe($id, $quantity){
        $firstOrdered = array();
        /*$remove = "";*/
        $order_status = "";
        $image_dir = "adminpost_images/";
            $query = $this->link->prepare("SELECT * FROM shoe WHERE shoe_id='$id'");
            $query->execute();
            $result = $query->fetchAll();
            if ($result) {
                $shoeName = $result[0]['shoe_desc'];
                $shoePrice = $result[0]['shoe_price'];
                $shoePhoto = $image_dir . $result[0]['shoe_picture'];
                $totalPrice = $shoePrice * $quantity;
                $myShoeDetails = "<td><img src='$shoePhoto'><br>$shoeName</b></td><td style='text-indent: 400px'>#$shoePrice</td>" .
                    "<td style='text-indent: 10px'><select><option>$quantity</option></select></td><td style='text-indent: 100px'>#$totalPrice</td>";
                array_push($firstOrdered, $myShoeDetails);
            }
        return $firstOrdered;
    }
    function getOrderById($id){
        $userorders = $userorders1 = array();
        $image_dir = "adminpost_images/";
        $query = $this->link->prepare("SELECT * FROM orders WHERE user_id='$id' AND remove='0'");
        $query->execute();
        $result = $query->fetchAll();
        $rowCount = $query->rowCount();
        while($rowCount > 0){
            $rowCount--;
            $shoe_id = $result[$rowCount]['shoe_id'];
            $quantity = $result[$rowCount]['quantity_ordered'];
            $order_status = $result[$rowCount]['order_status'];
            if($order_status == "Nil") {
                $userorders = $this->orderedShoe($shoe_id, $quantity);
                for ($i = 0; $i < count($userorders); $i++) {
                    array_push($userorders1, $userorders[$i]);
                }
            }
        }
        return $userorders1;
    }
    function getShippingAddress($user_id){
        $address = array();
        $address_used = 0;
        $query = $this->link->prepare("SELECT * FROM ordering_details WHERE user_id='$user_id' AND address_used='$address_used'");
        $query->execute();
        $result = $query->fetchAll();
        if($result){
            $fullname = $result[0]['lname'].$result[0]['fname'];
            $email = $result[0]['email'];
            $phone = $result[0]['phone'];
            $street = $result[0]['str_address'];
            $work = $result[0]['wrk_address'];
            $others = $result[0]['lga'].", ".$result[0]['city'].", ".$result[0]['state'].", ".$result[0]['country'];
            $address = array("Shipping"=>"Information","Name"=>$fullname, "E-mail"=>$email, "Telephone"=>$phone, "Street Address"=>$street, "Work Address"=>$work, "Location"=>$others);
        }
        return $address;
    }
    function placeOrder($user_id){
        $placeorderArray = array();
        $refNo = mt_rand(1000,1000000);
        $order_status = "Order Placed";
        $address_used = "1";
        $add = "0";
        $status = "Nil";
        $query1 = $this->link->prepare("UPDATE ordering_details SET address_used='$address_used' WHERE user_id='$user_id' AND address_used='$add'");
        $query = $this->link->prepare("UPDATE orders SET order_status='$order_status', order_ref_no='$refNo' WHERE user_id='$user_id' AND order_status='$status'");
        $result = $query->execute()? true : false;
        $result1 = $query1->execute()?true : false;
        if($result == true && $result1 == true){
            $placeorderArray = array("Order was placed successfully"."<br>Reference Number:".$refNo);
        }else{
            
        }
        return $placeorderArray;
    }
}

$myvalidate = new validate();
$rfname = $rlname = $remail = $rgender = $rpassword = $cpassword = $phone =  "";
$regarray = array();
if(!empty($_POST['register']) && isset($_POST['register'])){
    $rfname = $_POST['rfname'];
    $rlname = $_POST['rlname'];
    $remail = $_POST['remail'];
    $rpassword = $_POST['rpassword'];
    $rgender = $_POST['rgender'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];
    $regarray = $myvalidate->registerUsers($rfname, $rlname, $remail, $rpassword, $rgender, $cpassword, $phone);
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
$getAllShoes = array();
$AllShoes = "All";
$getAllShoes = $myvalidate->getShoeByType($AllShoes);
$getHeels = array();
$heels = "Heels";
$getHeels = $myvalidate->getShoeByType($heels);
$flats = "Flats";
$getFlats = array();
$getFlats = $myvalidate->getShoeByType($flats);
$Sandals = "Sandals";
$getSandals = array();
$getSandals = $myvalidate->getShoeByType($Sandals);
$Bags = "Bags and African Fabrics";
$getBags = array();
$getBags = $myvalidate->getShoeByType($Bags);
$shoeLinks = array();
$shoeLinks = array("1"=>$heels, "2"=>$flats, "3"=>$Sandals, "4"=>$Bags);
$myBlogPost = $recentPostArray = $blogIndex= array();
$myBlogPost = $myvalidate->getAllBlogPost();
$blogIndex = $myvalidate->RecentNews("index");
$recentPostArray = $myvalidate->RecentNews("blog");

?>