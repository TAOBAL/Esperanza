<?php
include_once ('php/validate.php');
$myemail = "";
if(isset($_SESSION['email'])){
    unset($_SESSION['all_shoe']);
    $myemail = $_SESSION['email'];
}elseif(!isset($_SESSION['all_shoe'])){
    header('location:index.php');
}
$myid = $myvalidate->getUserId($myemail);
$getIds = array();
$getIds = $myvalidate->orderSession();
$myShoe_id = $shoequantity = "";
$myfirst = $myfirst1 = $getDem =  array();
foreach($getIds as $x => $x_value){
    $myShoe_id = $x_value;
    $shoequantity = $x;
   $myfirst = $myvalidate->orderedShoe($myShoe_id, $shoequantity, $myid);
}
$myfirst1 = $myvalidate->getOrderById($myid);
if(!empty($_POST['checkOut']) && isset($_POST['checkOut'])){
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }else{
        if(count($myfirst1) == 0){
            header('location:order.php');
        }else {
            $getemail = $_SESSION['email'];
            $_SESSION['order'] = $getemail;
            header('location:addOrder.php');
        }
    }
}
$number = count($myfirst);
$number1 = count($myfirst1);
$shippingAddress = array();
$shippingAddress = $myvalidate->getShippingAddress($myid);
$getAddress = count($shippingAddress);
$myOrder = array();
if(!empty($_POST['placeOrder']) && isset($_POST['placeOrder'])){
    $myOrder = $myvalidate->placeOrder($myid);
}
$number2 = count($myOrder);
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
    <link href="css/admin.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
       <!--- start-mmmenu-script---->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="js/jquery.mmenu.js"></script>
    <script type="text/javascript" src="js/linking.js"></script>
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
    <script>
        function order() {
            var me = '<?php echo $number;?>';
            var me1 = '<?php echo $number1;?>';
            var me2 = '<?php echo $getAddress;?>';
            var me3 = '<?php echo $number2;?>';
            if (me1 == 0 && me == 0) {
                document.getElementById('order').style.display = 'none';
                document.getElementById('grandTotal').style.display = 'none';
            }
           if(me2 > 0){
               document.getElementById('checkout').style.display = 'none';
               document.getElementById('placeorder').style.display = 'block';
           }
            if(me3 > 0){
                document.getElementById('placeorder').style.display = 'none';
                document.getElementById('checkout').style.display = 'none';
                document.getElementById('remove').style.display = 'none';
                document.getElementById('edit').style.display = 'none';
            }
            document.getElementById('grandTotal').innerHTML = "Grand Total #40000.00";
        }
        function edit(id){
            document.getElementById('edit').style.display = 'none';
            document.getElementById('save').style.display = 'block';
        }
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
<body style="overflow-x: hidden" onload="order();">
<!-- start header -->
<div class="top_bg" style="  height: 70px">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
            </div>
            <div class="log_reg">
               <?php echo $getDisplay;?>
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
                <li></li>
                <li><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="product.php">products</a>
                    <ul class="dropdown-content">
                        <?php
                        foreach($shoeLinks as $x => $x_value){
                            $key = $x;
                            echo "<li><a href='#' onclick='getKey($key);'>".$x_value."</a></li>";
                        }
                        ?>
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
            <h2 class="style" style="margin-top: -15px;color: #ffffff">My Order</h2>
        </div>
    </div>
</div>
<div class="container-fluid"style="background-color: #EBE7DF">
<div class="row">
    <div class="col-md-3 sidey">
        <ul>
            <li><a href="profile.php"><span class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Profile</a></li>
            <li><a href="order.php"><span class="fa fa-list-alt"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Order</a></li>
            <li><a href="#"><span class="fa fa-credit-card-alt"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Wallet</a></li>
        </ul>
    </div>
    <div class="col-md-8 main4">
        <div class=" row headOrder">
              <h2>Review your Order</h2><br>

<!--        <div class="regSucc"> you currently have no order yet!</div>-->
        </div>
    <div class="row headorder2">
        <?php
        if($number == 0 && $number1 == 0){
            echo "You have no order in place";
        }
        for($i=0; $i<count($myOrder); $i++){
            echo $myOrder[$i];
        }
        ?>
        <form method="post" id="order">
    <table class="table12">

        <thead>
           <tr>
            <th>ITEM</th>
            <th style="text-indent: 400px">PRICE</th>
            <th style="text-indent: 10px">QUANTITY</th>
            <th style="text-indent: 100px">SUBTOTAL</th>
           </tr>
        </thead>
        <tbody style="border: solid 1px #efefef">
            <tr style="background-color: #ededed"><td>Sold by Esperanza</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <?php
                for($i=0; $i<count($myfirst); $i++){
                    echo "<tr>".$myfirst[$i]."</tr>";
                }
            for($i=0; $i<count($myfirst1); $i++){
                echo "<tr>".$myfirst1[$i]."</tr>";
            }

            ?>
        </tbody>
    </table>
            <p id="grandTotal" style="padding-left: 650px"></p>
            <?php
            foreach($shippingAddress as $x => $x_value) {
                echo $x . " " . $x_value . "<br>";
            }

            ?>
        <input type="submit" name="checkOut" value="Add Shipping Address" id="checkout" style="display: block">
            <input type="submit" name="placeOrder" value="Place Order" id="placeorder" style="display: none">
            </form>

    </div>

    </div>
    </div>

    </div>
</body>
</body>
</html>