<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include_once ('php/validate.php');
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
                <li><a href="index.php">Home</a></li>
                <li><a href="collection.php">products</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a href="HowitWorks.php">How it Works</a></li>
                <li class="active"><a href="contact.php">Contact</a></li>
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
            <h2 class="style">Contact us</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="contact">
                <div class="contact_left">
                    <div class="contact_info">
                        <h3>Find Us Here</h3>
                        <div class="map">

                            <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://www.google.com.ng/maps/@7.5216087,4.5065325,14.25z?hl=en" style="color:#242424;text-shadow:0 1px 0 #ffffff; text-align:left;font-size:12px;padding: 5px;">View Larger Map</a></small>
                        </div>
                    </div>
                    <div class="company_address">
                        <h3>Company Information :</h3>
                        <p>Moremi Hall,</p>
                        <p>Obafemi Awolowo University,Ile-Ife</p>
                        <p>Osun state.</p>
                        <p>Nigeria</p>
                        <p>Phone:+234 803 6014 774</p>
                        <p>Phone: +234 816 9138 303</p>
                        <p>Email: <a href="https://www.facebook.com/taofeeqah.balogun">Info@Taobal.com</a></p>
                        <p>Follow on: <a href="https://www.facebook.com/taofeeqah.balogun">Facebook</a>, <a href="https://twitter.com/TawfeeqahDamsel/following">Twitter</a></p>
                    </div>
                </div>
                <div class="contact_right">
                    <div class="contact-form">
                        <?php
                            for($i=0; $i<count($conatctArray); $i++){
                                echo $conatctArray[$i];
                            }
                        ?>
                        <h3>Contact Us</h3>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            <div>
                                <span><label>NAME</label></span>
                                <span><input name="userName" value="<?php echo $userName;?>" type="text" class="textbox"></span>
                            </div>
                            <div>
                                <span><label>E-MAIL</label></span>
                                <span><input name="userEmail" value="<?php echo $userEmail;?>" type="text" class="textbox"></span>
                            </div>
                            <div>
                                <span><label>MOBILE</label></span>
                                <span><input name="userPhone" value="<?php echo $userPhone;?>" type="text" class="textbox"></span>
                            </div>
                            <div>
                                <span><label>SUBJECT</label></span>
                                <span><textarea name="userMsg"><?php echo $userMsg;?></textarea></span>
                            </div>
                            <div>
                                <span><input type="submit" name="contact" value="submit us"></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
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