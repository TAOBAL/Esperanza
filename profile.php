<?php
include_once ('php/validate2.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Esperanza | Home :: Taobal</title>
    <link rel="icon" href="images/col1.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/home.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <!--- start-mmmenu-script---->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="js/jquery.mmenu.js"></script>
    <script type="text/javascript">
        //	The menu on the left
        $(function() {
            $('nav#menu-left').mmenu();
        });
    </script>
    <!-- start slider -->
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery.eislideshow.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#ei-slider').eislideshow({
                animation			: 'center',
                autoplay			: true,
                slideshow_interval	: 3000,
                titlesFactor		: 0
            });
        });
    </script>
    <!-- start top_js_button -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <script>
        function check(){
            document.getElementById('E-mail').disabled= true;
        }
    </script>
</head>
<body style="overflow-x: hidden" onload="check();">
<!-- start header -->
<div class="top_bg" style="height: 70px">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
            </div>
            <div class="log_reg">
                <ul>
                    <li><a href="profile.php" style="color: #57C5A0;text-decoration: none"><?php echo $getUser;?></a> </li>
                    <span class="log"> </span
                    <li><a href="php/logout.php" style="color: #57C5A0;text-decoration: none">Logout</a> </li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="web_search">
                <form>
                    <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                    <input type="submit" value=" " />
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start header_btm -->
<div class="wrap">
    <div class="header_btm">
        <div class="menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="collection.php">products</a>
                    <ul class="dropdown-content">
                        <li><a href="#">flat</a></li>
                        <li><a href="#">heels</a></li>
                        <li><a href="#">sandals</a></li>
                        <li><a href="#">bags &amp African fabrics</a></li>
                    </ul>
                </li>

                <li><a href="blog.php">blog</a></li>
                <li><a href="HowitWorks.php">How it Works</a></li>
                <li><a href="contact.php">Contact</a></li>

                <div class="clear"></div>
            </ul>
        </div>
        <div id="smart_nav">
            <a class="navicon" href="#menu-left"> </a>
        </div>
        <nav id="menu-left">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="collection.php">products</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <div class="clear"></div>
            </ul>
        </nav>
        <div class="header_right">
            <ul>
                <li><a href="#"><i  class="art"></i><span class="color1">30</span></a></li>
                <li><a href="#"><i  class="cart"></i><span>0</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="top_bg" style="  margin-top: -10px;height: 50px;">
    <div class="wrap">
        <div class="main_top">
            <h2 class="style" style="margin-top: -15px;color: #ffffff">My Account</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 sidey">
        <ul>
            <li><a href="profile.php"><span class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Profile</a></li>
            <li><a href="order.php"><span class="fa fa-list-alt"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Order</a></li>
            <li><a href="wallet.php"><span class="fa fa-credit-card-alt"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Wallet</a></li>
        </ul>
    </div>
    <div class="col-md-8 sideyB">
<!--        <div class="regSucc">Welcome  /*echo $fname*/ you have successfully registered!</div>
-->        <h2>My Profile</h2>
        <div class="accDet">ACCOUNT INFORMATION</div><br>
        <div class="col-md-2"><span style="font-size: 70px" class="fa fa-user"></span></div>
        <div class="col-md-5">
            <?php
            for($i=0; $i<count($profileArray); $i++){
                echo $profileArray[$i];
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <?php
                foreach ($getUserArray as $x=>$x_value){
                        $fieldName = $myvalidate->getField($x);
                    echo "<label>$fieldName</label><input type='text' id='$x' name='$x' value='$x_value' class='form-control'><br>";
                }
                ?>
                <br>
               <label style="font-size: 18px">Change Password</label><br><br>
                   <label>Enter old Password</label>
                    <input type="password" class="form-control" onfocus="">
                    <label>Enter new Password</label>
                    <input type="password" class="form-control">
                    <label>Confirm new Password</label>
                    <input type="password" class="form-control">
                </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
    <div class="accDet">DELIVERY ADDRESS</div><br>
        <div class="row">
            <div class="col-md-2">
             <span class="fa fa-bus"style="font-size: 50px"></span>
            </div>
            <div class="col-md-6  plus">
                <a href = "addOrder.php" class="btnMain2" style="text-decoration: none"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Delivery Address</a>
            </div>
        </div>
    </div><br><br>
        <div class="col-md-offset-8 col-md-3">
            <input type="submit" value="Save Changes" name="save_profile" class="btnMain"><br><br>
        </div>
    </form>
</div>
</div>

</body>
</html>
