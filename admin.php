<<<<<<< HEAD
=======
<?php
include_once ('php/validate.php');
$type = $desc = $price = $available = $ShoeType = "";
$adminPostArray = array();
if(isset($_POST['admin_post'])){
    $type = $_POST['type'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $ShoeType = $_POST['ShoeType'];
    $adminPostArray = $myvalidate->AdminPost($type, $desc, $price, $available, $ShoeType);
}
$AllShoes = $blogPost = $AllUsers = array();
$AllShoes = $myvalidate->getShoes();
$blogPost = $myvalidate->getBlogPost();
$AllUsers = $myvalidate->getAllUsers();
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
<div class="row">
    <div class=" col-md-offset-1 col-md-6">
<<<<<<< HEAD
        <form>
            <select class="pull-right btn-lg">
                <option>Blog</option>
                <option>Shoe</option>
            </select><br><br><br>
            <textarea class="form-control" rows="7">
            </textarea><br>
            <input type="file" onchange="readURL(this)"><br>
            <input type="text" placeholder="Price">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" placeholder="Available"><br>
            <input type="button" class="btn btn-default btn-lg pull-right" value="Post"><br>
=======
        <span>
            <?php
                for($i=0; $i<count($adminPostArray); $i++){
                    echo $adminPostArray[$i];
                }
            ?>
        </span>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <select class="pull-right btn-lg" name="type">
                <option>Blog</option>
                <option>Shoe</option>
            </select><br><br><br>
            <select class="pull-right btn-lg" name="ShoeType">
                <option>Heels</option>
                <option>Flats</option>
                <option>Sandals</option>
                <option>Bags and African Fabrics</option>
            </select><br><br><br>
            <textarea class="form-control" rows="7"  name="desc">
            </textarea><br>
            <input type="file" onchange="readURL(this)" name="image"><br>
            <input type="text" placeholder="Price" name="price">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" placeholder="Available" name="available"><br>
            <input type="submit" name="admin_post" class="btn btn-default btn-lg pull-right" value="Post"><br>
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
        </form>
    </div>
    <div class="col-md-5" style="margin-top: 60px;">

        <img id="blah" src="#" alt="your image"/>
    </div>

</div>
</div><br><br>
<div class="table-responsive">
<<<<<<< HEAD
    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
        <thead class='primary' >
        <tr>
            <th>id</th>
            <th>User</th>
            <th>Date Joined</th>
            <th>Status</th>
            <th>Email Address</th>
            <th>Order</th>
            <th style="display: <?php echo $display_cell; ?>"></th>
        </tr>
        </thead>
<tbody>
<td>1</td>
<td>Taofeeqah Balogun</td>
<td></td>
<td>member</td>
<td>taofeeqah.balogun@gmail.com</td>
<td></td>
<td></td>
</tbody>
       </table>
=======
    <span>
        <?php
            echo count($AllUsers)." Users";
        ?>
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
        for($i=0; $i<count($AllUsers); $i++){
            echo "<tr>".$AllUsers[$i]."</tr>";
        }

        ?>
        </tbody>
    </table>
</div><br><br>
<div class="table-responsive">
     <span>
        <?php
        echo count($AllShoes)." Available Shoes";
        ?>
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
        for($i=0; $i<count($AllShoes); $i++){
            echo "<tr>".$AllShoes[$i]."</tr>";
        }

        ?>
        </tbody>
       </table>
</div><br><br>
<div class="table-responsive">
     <span>
        <?php
        echo count($blogPost)." blog Posts";
        ?>
    </span>
    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
        <thead class='primary' >
        <tr>
            <th>Blog News</th>
            <th>Blog Picture</th>
            <th>Date Posted</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($i=0; $i<count($blogPost); $i++){
            echo "<tr>".$blogPost[$i]."</tr>";
        }

        ?>
        </tbody>
    </table>
</div>
>>>>>>> d60e9d9185ea8bd85385a3f4f1e412d69e743bed
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

</script>
<script src="css/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script src="css/bootstrap-3.3.5-dist/js/jquery.js"></script>
<script src="js/jQuery.dataTables.js"></script>
</body>
</html>