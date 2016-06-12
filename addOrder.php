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
    -->    <!--- start-mmmenu-script---->
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
</head>
<body style="overflow-x: hidden">
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
                    <span class="log"> </span>
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
<div class="top_bg">
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
            <li><a href="#"><span class="fa fa-credit-card-alt"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Wallet</a></li>
        </ul>
    </div>
    <div class="col-md-8 sideyB">
        <h3>Add New Address</h3>
        <p>Contact Information<p><br>
        <div class="col-md-8">
            <?php
            for($i=0; $i<count($updateArray); $i++){
                echo $updateArray[$i];
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <?php
                foreach ($getUserArray as $x=>$x_value){
                    $fieldName = $myvalidate->getField($x);
                    echo "<label>$fieldName</label><input type='text' value='$x_value' class='form-control' disabled><br>";
                }
                ?>
                <label>Address</label><br><br>
                <label>Street Address</label>
                <input type="text" class="form-control" name="address1" value="<?php echo $address1;?>" required=""><br>
                <label>Work or School address</label>
                <input type="text" name="address2" value="<?php echo $address2;?>" class="form-control"><br>
                <label>City</label>
                <input type="text" name="city" value="<?php echo $city;?>" class="form-control"><br>

                <label>Select Country</label>
                <select class="form-control" id="country" value="<?php echo $country;?>" name ="country"></select><br>
                <label>Select State</label>
                <select class="form-control" name ="state" id ="state" value="<?php echo $state;?>"></select><br>
                <script language="javascript">
                    populateCountries("country", "state");
                </script>
                <label>Local Govt. Area</label>
                <select class="form-control" name="lga">
                    <option>Choose Area</option>
                </select>
        </div><br><br>

        <div class="col-md-offset-8 col-md-3">
            <input type="submit" value="Save Changes" name="save_changes" class="btnMain"><br><br>
        </div>
    </form>
</div>
</div>
<script src="js/country.js" type="text/javascript"></script>
</body>
</html>

