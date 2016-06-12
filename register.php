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
    <!--<link href="css/home.css" rel="stylesheet" type="text/css" />-->
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="collection.php">products</a></li>
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
                <li><a href="HowitWorks.php">How it Works</a></li>
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
<!-- start top_bg -->
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h4 class="style" style="color: #57C5A0">login or create an account</h4>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="login_left">
                <h3>login customers</h3>
                <p>if you have any account with us, please log in.</p>
                <!-- start registration -->
                <div class="registration">

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
                            <!-- Form -->
                            <form id="registration_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div>
                                    <label>
                                        <input placeholder="email:" name = "lemail" type="email" value="<?php echo $lemail;?>" tabindex="3"  required="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input placeholder="password" name = "lpassword" type="password" value="<?php echo $lpassword;?>" tabindex="4" required="">
                                    </label>
                                </div>
                                <div>
                                    <input type="submit" name = "login" value="sign in" style="background-color: #57C5A0;border: 1px solid #57C5A0" id="register-submit">
                                    <span><?php
                                        for($i=0; $i<count($logarray); $i++){
                                            echo $logarray[$i];
                                        }
                                        ;?></span>
                                </div>
                                <div class="forget">
                                    <a href="#">forgot your password</a>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
                <!-- end registration -->
            </div>
            <div class="login_left">
                <h3>register new customers</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping address, view and track your orders in your accoung and more.</p>
                <div class="registration_left">
                    <div class="registration_form">
                        <!-- Form -->
                        <form id="registration_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <div>
                                <label>
                                    <input placeholder="first name:" name = "rfname" type="text" tabindex="1" value="<?php echo $rfname;?>" required="" autofocus="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="last name:" name = "rlname" type="text" tabindex="2" value="<?php echo $rlname;?>" required="" autofocus="">
                                </label>
                            </div>
                            <div class="sky_form">
                                <ul>
                                    <li><label class="radio left"><input type="radio" value="Male" name="rgender" checked=""><i>Male</i></label></li>
                                    <li><label class="radio"><input type="radio" value="Female" name="rgender"><i>Female</i></label></li>
                                </ul>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="email address:" name = "remail" type="email" value="<?php echo $remail;?>"  tabindex="3" required="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="password" name = "rpassword" type="password" value="<?php echo $rpassword;?>" tabindex="4" required="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input placeholder="retype password" name = "cpassword" type="password"  value="<?php echo $cpassword;?>"tabindex="4" required="">
                                </label>
                            </div>
                            <div>
                                <input type="submit" value="create an account"  name = "register" style="background-color: #57C5A0;border: 1px solid #57C5A0" id="register-submit">
                                <span><?php
                                    for($i=0; $i<count($regarray); $i++){
                                        echo $regarray[$i];
                                    }
                                    ;?></span>
                            </div>
                            <div class="sky_form">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i>i agree to <a class="terms" href="#"style="text-decoration: none"> terms of service</a> </i></label>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
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