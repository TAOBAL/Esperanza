<?php
include_once ('php/validate.php');
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
    <link href="css/home.css" rel="stylesheet" type="text/css" media="all" />
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
    <!-- start top_js_button -->
    <script type="text/javascript" src="js/easing.js"></script>
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
<body>
<!-- start header -->
<div class="top_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
            </div>
            <div class="log_reg">
                <ul>
                    <li><a href="login.php" style="color: #57C5A0">Login</a> </li>
                    <span class="log"> or </span>
                    <li><a href="register.php" style="color: #57C5A0">Register</a> </li>
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
                <li><a href="index.php"></a></li>
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
        
        <div class="header_right">
            <ul>
                <li><a href="#"><i  class="art"></i><span class="color1">30</span></a></li>
                <li><a href="#"><i  class="cart"></i><span>0</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- start top_bg -->
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h4 class="style" style="color: #57C5A0">create an account or login</h4>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="login_left">
                <h3>new customers</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping address, view and track your orders in your accoung and more.</p>
                <div class="btn">
                    <form>
                        <input type="button"  onclick="location.href='register.php';" style="background-color: #57C5A0;border: 1px solid #57C5A0" value="create an account" />
                    </form>
                </div>
            </div>
            <div class="login_left">
                <h3>registered customers</h3>
                <p>if you have any account with us, please log in.</p>
                <!-- start registration -->
                <div class="registration">
                    <!-- [if IE]
                        < link rel='stylesheet' type='text/css' href='ie.css'/>
                     [endif] -->

                    <!-- [if lt IE 7]>
                        < link rel='stylesheet' type='text/css' href='ie6.css'/>
                    <! [endif] -->
                    <script>
                        (function() {

                            // Create input element for testing
                            var inputs = document.createElement('input');

                            // Create the supports object
                            var supports = {};

                            supports.autofocus   = 'autofocus' in inputs;
                            supports.required    = 'required' in inputs;
                            supports.placeholder = 'placeholder' in inputs;

                            // Fallback for autofocus attribute
                            if(!supports.autofocus) {

                            }

                            // Fallback for required attribute
                            if(!supports.required) {

                            }

                            // Fallback for placeholder attribute
                            if(!supports.placeholder) {

                            }

                            // Change text inside send button on submit
                            var send = document.getElementById('register-submit');
                            if(send) {
                                send.onclick = function () {
                                    this.innerHTML = '...Sending';
                                }
                            }

                        })();
                    </script>
                    <div class="registration_left">
                        <div class="registration_form">
                            <span>
                                <?php
                                for($i=0; $i<count($logarray); $i++){
                                    echo $logarray[$i];
                                }
                                ?>
                            </span>
                            <!-- Form -->
                            <form id="registration_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div>
                                    <label>
                                        <input placeholder="email:" type="email" name="lemail" value="<?php echo $lemail;?>" tabindex="3" required="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input placeholder="password" type="password" name="lpassword" value="<?php echo $lpassword;?>" tabindex="4" required="">
                                    </label>
                                </div>
                                <div>
                                    <input type="submit" name="login" value="sign in" style="background-color: #57C5A0;border: 1px solid #57C5A0" id="register-submit">
                                </div>
                                <div class="forget">
                                    <a href="#" style="text-decoration: none">forgot your password</a>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
                <!-- end registration -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<!-- start footer -->
<div class="footer_mid">
    <div class="wrap">
        <div class="footer">
            <div class="f_search">
                <form>
                    <input type="text" value="" placeholder="Enter email for newsletter" />
                    <input type="submit" value=""/>
                </form>
            </div>
            <div class="soc_icons">
                <ul>
                    <li><a class="icon1" href="https://www.facebook.com/taofeeqah.balogun"></a></li>
                    <li><a class="icon2" href="https://twitter.com/TawfeeqahDamsel/following"></a></li>
                    <li><a class="icon3" href="https://plus.google.com/u/0/"></a></li>
                    <li><a class="icon4" href="#"></a></li>
                    <li><a class="icon5" href="#"></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start footer -->
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
            <!-- scroll_top_btn -->
            <script type="text/javascript">
                $(document).ready(function() {

                    var defaults = {
                        containerID: 'toTop', // fading element id
                        containerHoverID: 'toTopHover', // fading element hover id
                        scrollSpeed: 1200,
                        easingType: 'linear'
                    };


                    $().UItoTop({ easingType: 'easeOutQuart' });

                });
            </script>
            <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
            <!--end scroll_top_btn -->
            <div class="f_nav1">
                <ul>
                    <li><a href="#">home /</a></li>
                    <li><a href="#">blog /</a></li>
                    <li><a href="#">Terms and conditions /</a></li>
                    <li><a href="#">faq /</a></li>
                    <li><a href="#">Admin Page /</a></li>
                    <li><a href="#">Contact </a></li>
                </ul>
            </div>
            <div class="copy">
                <p class="link"><span>© All rights reserved | Esperanza foot wears by&nbsp;<a href="http://w3layouts.com/">TAOBAL</a></span></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>