<<<<<<< HEAD
=======
<?php
include_once ('php/validate.php');
$ausername = $apassword = "";
$adminArray = array();
if(!empty($_POST['admin_login']) && isset($_POST['admin_login'])){
    $ausername = $_POST['ausername'];
    $apassword = $_POST['apassword'];
    $adminArray = $myvalidate->loginAdmin($ausername, $apassword);
}
?>
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
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
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    .container textarea{
        font-size: 15px;
    }
</style>
<body style=" background-color: #f4f4f4">
<div class="top_bg" style="height: 70px">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
            </div>
        </div>
    </div>
</div><br><br>
<div class="container">
<<<<<<< HEAD
<form>
    <div class="col-md-offset-4 col-md-4 logd" style="background-color: white;border: solid 3px white" >

            <input type="text" placeholder="Username" class="form-control" name="aname" >
       <br><br>
            <input type="text" placeholder="Password" class="form-control" name="apassword"><br>
        <input type="button" value="Login" class="btn btn-success" style="margin-left: 120px">
=======
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <div class="col-md-offset-4 col-md-4 logd" style="background-color: white;border: solid 3px white" >
<span>
        <?php
        for($i=0; $i<count($adminArray); $i++){
            echo $adminArray[$i];
        }
        ?>
    </span><br><br>
            <input type="text" placeholder="Username" class="form-control" name="ausername" value="<?php echo $ausername;?>" >
       <br><br>
            <input type="text" placeholder="Password" class="form-control" name="apassword" value="<?php echo $apassword;?>"><br>
        <input type="submit" value="Login" class="btn btn-success" style="margin-left: 120px" name="admin_login">
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
    </div>
</form>
</div>
    </script>
    <script src="css/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
    <script src="css/bootstrap-3.3.5-dist/js/jquery.js"></script>
    <script src="js/jQuery.dataTables.js"></script>
</body>
</html>