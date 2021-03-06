<?php
include_once ('php/validate.php');
$adminUsername = "";
if(isset($_SESSION['adminUsername'])){
    $adminUsername = $_SESSION['adminUsername'];
}else{
    header('location:adminLogin.php');
}
$type = $desc = $price = $available = $ShoeType = $title = "";
$adminPostArray = array();
if(isset($_POST['admin_post'])){
    $title = $_POST['title'];
    $type = $_POST['type'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $ShoeType = $_POST['ShoeType'];
    $adminPostArray = $myvalidate->AdminPost($title,$type, $desc, $price, $available, $ShoeType);
}
$admin_user = $admin_pass = $option = "";
if(!empty($_POST['editAdmin']) && isset($_POST['editAdmin'])){
    $option = $_POST['adminOption'];
    $admin_user = $_POST['admin_user'];
    $admin_pass = $_POST['admin_pass'];
    $adminPostArray = $myvalidate->editAdmin($option, $admin_user, $admin_pass);
}
$adminLinks = array();
$blogLink = "Blog";
$usersLink = "Users";
$ordersLink = "Orders";
$adminLink = "Admin";
$shoeLink = "Shoes";
$contact = "Contact Us";
$address = "Addresses";
$adminLinks = array("5"=>$blogLink, "6"=>$usersLink, "7"=>$ordersLink, "8"=>$adminLink, "9"=>$shoeLink, "10"=>$contact, "11"=>$address);
$getTable = "";
if(isset($_GET['pyeuf?_sdyu'])){
    $getTable = $_GET['pyeuf?_sdyu'];
}
$tableheader = array();
$tableheader = $myvalidate->getColumnNames($getTable);
$display = array();
$display = $myvalidate->getDisplay($getTable);
function tableName($table){
    $table = explode("_", $table);
    $tableCount = count($table);
    if($tableCount > 1){
        $table = $table[0]." ".$table[1];
    }else{
        $table = $table[0];
    }
    return strtoupper($table);
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/linking.js"></script>
    <script>
        function adminPost() {
            var dem = "<?php echo $getTable;?>";
            if(dem == "blog"){
                document.getElementById('blog').style.display = "block";
                document.getElementById('myform1').style.display = "block";
            }else if(dem == "shoe"){
                document.getElementById('shoe').style.display = "block";
                document.getElementById('myform1').style.display = "block";
            }else if(dem == "admin"){
                document.getElementById('admin').style.display = "block";
            }
        }
    </script>
</head>

<body style=" background-color: #f4f4f4" onload="adminPost();">
<div class="top_bg" style="height: 70px;position: fixed;width: 100%;z-index: 1">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="admin.php"><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
            </div>
            <div class="log_reg">
                 <ul>
                    <li><a href='admin.php' style='color: #57C5A0'><?php echo $adminUsername;?></a> </li>
                     <span class='log'>  </span>
                    <li><a href='php/adminLogout.php' style='color: #57C5A0'>Logout</a> </li>
                    <div class='clear'></div>
                 </ul>
            </div>
        </div>
    </div>
</div><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
        <div class="sidebar  navbar-collapse navbar-main-collapse">
            <div class="container-fluid">
               <ul class=" nav nav-stacked nav-pills">
                   <?php
                   foreach($adminLinks as $x => $x_value){
                       $key = $x;
                       echo "<li><a href='#' onclick='getAdminLink($key);'>".$x_value."</a></li>";
                   }
                   ?>
               </ul>

            </div>
        </div>
    </div>
        <div class="col-md-10">
        <div class="row">
            <div class="col-md-9"style="margin-top: 80px">
                <span>
                <?php
                    echo "<label style='font-size: 30px'>".tableName($getTable)."</label>";
                for($i=0; $i<count($adminPostArray); $i++){
                    echo $adminPostArray[$i];
                }
                ?>
            </span>
                <!-- form for admin to post blog news -->
                <form method="post" action="admin.php?pyeuf?_sdyu=<?php echo $getTable;?>" enctype="multipart/form-data" id="blog" style="display: none">
                    <select class="pull-right btn " name="type">
                        <option>Blog</option>
                    </select><br><br><br>
                    <input type="text" class="form-control" name="title" placeholder="Blog Title"><br>
                <textarea class="form-control" rows="7"  name="desc">
                </textarea><br>
                    <input type="file" onchange="readURL(this)" name="image"><br>
                    <input type="submit" name="admin_post" class="btn btn-default btn-primary  pull-right" value="Post"><br>
                </form>

                <!-- Form for admin to upload shoe -->
            <form method="post" action="admin.php?pyeuf?_sdyu=<?php echo $getTable;?>" enctype="multipart/form-data" id="shoe" style="display: none">
                <select class="pull-right btn " name="type">
                    <option>Shoe</option>
                </select><br><br><br>
                <select class="pull-right btn" name="ShoeType">
                    <option>Heels</option>
                    <option>Flats</option>
                    <option>Sandals</option>
                    <option>Bags and African Fabrics</option>
                </select><br><br><br>
                <input type="text" class="form-control" name="title" placeholder="Shoe Name"><br>
                <input type="file" onchange="readURL(this)" name="image"><br>
                <input type="text" placeholder="Price" name="price">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" placeholder="Available" name="available"><br>
                <input type="submit" name="admin_post" class="btn btn-default btn-primary  pull-right" value="Post"><br>
            </form>

                <!-- Form to add an admin -->
                <form method="post" action="admin.php?pyeuf?_sdyu=<?php echo $getTable;?>" enctype="multipart/form-data" id="admin" style="display: none">
                    <select class="pull-right btn " name="adminOption">
                        <option>Add</option>
                        <option>Reset Password</option>
                        <option>Delete</option>
                    </select><br><br><br>
                    <input type="text" class="form-control" name="admin_user" placeholder="Admin Username"><br>
                    <input type="text" class="form-control" name="admin_pass" placeholder="Admin Password"><br>
                    <input type="submit" name="editAdmin" class="btn btn-default btn-primary  pull-right" value="Submit"><br>
                </form>
             </div>
            <div class="col-md-3" style="margin-top: 190px; display: none" id="myform1">
            <img id="blah" src="#" alt="your image"/>
            </div>
        </div><br><br>
            <div class="row content-container">
                <div class="col-md-12 table-responsive tab1">
                            <span>
                            <?php
                            $count = count($display);
                            if($count > 0) {
                                echo count($display) . " " . $getTable;
                            }
                             ?>
                            </span>
                    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
                        <thead class='primary' >
                        <tr>
                            <?php
                                for($i=0; $i<count($tableheader); $i++){
                                    echo "<th>".$tableheader[$i]."</th>";
                                }
                            ?>
                            <!--<th>Shoe Description</th>
                            <th>Shoe Price</th>
                            <th>Shoe Available Number</th>
                            <th>Photo</th>
                            <th>Shoe Type</th>
                            <th>Date Posted</th>
                            <th>Option</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                      for($i=0; $i<count($display); $i++){
                            echo "<tr>".$display[$i]."</tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div><br><br>
           <!-- <div class="row content-container">
                        <div class="col-md-12 table-responsive tab1">
                            <span>
                             <?php
/*                                echo count($AllShoes)." Available Shoes";
                             */?>
                            </span>
                        <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
                            <thead class='primary' >
                                <tr>
                                    <th>Shoe Description</th>
                                    <th>Shoe Price</th>
                                    <th>Shoe Available Number</th>
                                    <th>Photo</th>
                                    <th>Shoe Type</th>
                                    <th>Date Posted</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
/*                                    for($i=0; $i<count($AllShoes); $i++){
                                    echo "<tr>".$AllShoes[$i]."</tr>";
            }

                                */?>
                            </tbody>
                        </table>
              </div><br><br>-->
             <!-- <div class="col-md-12 table-responsive">
                    <span>
                        <?php
/*                        echo count($blogPost)." blog Posts";
                        */?>
                    </span>
                  <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
                        <thead class='primary' >
                                <tr>
                                    <th>Blog News Title</th>
                                    <th>Blog News</th>
                                    <th>Blog Picture</th>
                                    <th>Date Posted</th>
                                    <th>Option</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
/*                            for($i=0; $i<count($blogPost); $i++){
                                echo "<tr>".$blogPost[$i]."</tr>";
                            }

                            */?>
                        </tbody>
                  </table>

            </div>
                <div class=" col-md-12 table-responsive">

                            <span>
                               <?php
/*                               echo count($AllUsers)." Users";
                               */?>
                            </span>
                    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
                        <thead class='primary' >
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Telephone</th>
                            <th>Gender</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
/*                        for($i=0; $i<count($AllUsers); $i++){
                            echo "<tr>".$AllUsers[$i]."</tr>";
                        }

                        */?>
                        </tbody>
                    </table>
        </div>
                <div class=" col-md-12 table-responsive">

                            <span>
                               <?php
/*                               echo count($AllAdmin)." Admin";
                               */?>
                            </span>
                    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
                        <thead class='primary' >
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Telephone</th>
                            <th>Gender</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
/*                        for($i=0; $i<count($AllUsers); $i++){
                            echo "<tr>".$AllUsers[$i]."</tr>";
                        }

                        */?>
                        </tbody>
                    </table>
        </div>
                <div class=" col-md-12 table-responsive">

                            <span>
                               <?php
/*                               echo count($AllContactUs)." ContactUs";
                               */?>
                            </span>
                    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
                        <thead class='primary' >
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Telephone</th>
                            <th>Gender</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
/*                        for($i=0; $i<count($AllUsers); $i++){
                            echo "<tr>".$AllUsers[$i]."</tr>";
                        }

                        */?>
                        </tbody>
                    </table>
        </div>-->
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
//    $(".link").click(function(e) {
//        e.preventDefault();
//        $('.content-container div').fadeOut('slow');
//        $('#' + $(this).data('rel')).fadeIn('slow');
//    });
</script>
<script src="css/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script src="css/bootstrap-3.3.5-dist/js/jquery.js"></script>
<script src="js/jQuery.dataTables.js"></script>
</body>
</html>