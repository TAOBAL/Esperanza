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
<!-- start slider -->
<div class="slider">
    <!---start-image-slider---->
    <div class="image-slider">
        <div class="wrapper">
            <div id="ei-slider" class="ei-slider">
                <ul class="ei-slider-large">
                    <li>
                        <img src="images/slider-image1.jpg" alt="image06"/>
                        <div class="ei-title">
                            <h3 class="btn">#6000</h3>
                            <h2>pink shoes <br>	2016 collections</h2>
                            <h3 class="active">It is balance and easy to carry on any surface

                            </h3>
                            <h3>
                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>
                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="images/slider-image2.jpg" alt="image01" />
                        <div class="ei-title">
                            <h3 class="btn">#5000</h3>
                            <h2>Anns Field <br>	2016 collections</h2>
                            <h3 class="active">It is the trending shoe for this summer period<br>

                            </h3>
                            <h3>
                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>
                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="images/slider-image3.jpg" alt="image02" />
                        <div class="ei-title">
                            <h3 class="btn">#6000</h3>
                            <h2>Prada <br>	2016 collections</h2>
                            <h3 class="active">It is a balance heel that goes well for any ocassion<br>

                            </h3>
                            <h3>

                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>

                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="images/slider-image4.jpg" alt="image03"/>
                        <div class="ei-title">
                            <h3 class="btn">#6000</h3>
                            <h2>Mellow Yellow <br>	2016 collections</h2>
                            <h3 class="active">It is the trending shoe for this summer period<br>

                            </h3>
                            <h3>

                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>

                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="images/slider-image1.jpg" alt="image04"/>
                        <div class="ei-title">
                            <h3 class="btn">#5000</h3>
                            <h2>Anns Feild <br>	2015 collections</h2>
                            <h3 class="active">It is the trending shoe for this summer period

                            </h3>
                            <h3>
                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>
                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="images/slider-image5.jpg" alt="image05"/>
                        <div class="ei-title">
                            <h3 class="btn">#6000</h3>
                            <h2>Anns Feild <br>	2015 collections</h2>
                            <h3 class="active">It is the trending shoe for this summer period
                            </h3>
                            <h3>
                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>
                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="images/slider-image3.jpg" alt="image07"/>
                        <div class="ei-title">
                            <h3 class="btn">#7000</h3>
                            <h2>Anns Feild <br>	2015 collections</h2>
                            <h3 class="active">It is the trending shoe for this summer period

                            </h3>
                            <h3>
                                <a class="ei_icons" href="details.html"><img src="images/icon_2.png" alt=""></a>
                                <a class="ei_icons" href="details.html"><img src="images/icon_4.png" alt=""></a>
                            </h3>
                        </div>
                    </li>
                </ul><!-- ei-slider-large -->
                <ul class="ei-slider-thumbs">
                    <li class="ei-slider-element">Current</li>
                    <li>
                        <a href="#">
                            <span class="active">pink shoes</span>
                            <p>now of #6000 <br>16.5% off</p>
                        </a>
                        <img src="images/thumbs/1.jpg" alt="thumb01" />
                    </li>
                    <li class="hide"><a href="#"><span>anns field</span><p>now of #6000 <br>16.5% off</p> </a><img src="images/thumbs/2.jpg" alt="thumb01" /></li>
                    <li  class="hide1"><a href="#"><span>prada</span><p>now of #5000 <br>20% off</p></a><img src="images/thumbs/3.jpg" alt="thumb02" /></li>
                    <li class="hide1"><a href="#"><span>casa devi</span><p>now of #6000 <br>16% off</p></a><img src="images/thumbs/4.jpg" alt="thumb03" /></li>
                    <li><a href="#"><span>mellow yellow</span><p>now of #7000 <br>15% off</p> </a><img src="images/thumbs/1.jpg" alt="thumb04" /></li>
                    <li><a href="#"><span>anns field</span><p>now of #5000 <br>12% off</p> </a><img src="images/thumbs/5.jpg" alt="thumb05" /></li>
                    <li><a href="#"><span>anns field</span><p>now of #7000 <br>18% off</p></a><img src="images/thumbs/3.jpg" alt="thumb07" /></li>
                </ul><!-- ei-slider-thumbs -->
            </div><!-- ei-slider -->
        </div><!-- wrapper -->
    </div>
    <!---End-image-slider---->
</div>
<!-- start image1_of_3 -->
<div class="top_bg">
    <div class="wrap">
        <div class="main1">
            <div class="image1_of_3">
                <img src="images/imgT.jpg" alt=""/>
                <a href="details.php"><span class="tag">on sale</span></a>
            </div>
            <div class="image1_of_3">
                <img src="images/imgT.jpg" alt=""/>
                <a href="collection.php"><span class="tag">special offers</span></a>
            </div>
            <div class="image1_of_3">
                <img src="images/imgT.jpg" alt=""/>
                <a href="collection.php"><span class="tag">must have</span></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="top_main">
                <h2>new arrivals on Esperanza</h2>
                <a href="collection.php">show all</a>
                <div class="clear"></div>
            </div>
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <div class="grid1_of_3">
                    <a href="#">
                        <img src="images/pic1.jpg" alt=""/>
                        <h3>even & odd</h3>
                        <span class="price">#5000</span>
                    </a>
                </div>
                <div class="grid1_of_3">
                    <a href="#">
                        <img src="images/pic2.jpg" alt=""/>
                        <h3>buffalo decollete</h3>
                        <span class="price">#6000</span>
                        <span class="price1 bg">on sale</span>
                    </a>
                </div>
                <div class="grid1_of_3">
                    <a href="#">
                        <img src="images/pic3.jpg" alt=""/>
                        <h3>even & odd</h3>
                        <span class="price">#5000</span>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="top_main">
                <h2>Trending</h2>
                <a href="collection.php">show all</a>
                <div class="clear"></div>
            </div>
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <div class="grid1_of_3">
                    <a href="#">
                        <img src="images/pic4.jpg" alt=""/>
                        <h3>buffalo decollete</h3>
                        <span class="price">$145,99</span>
                    </a>
                </div>
                <div class="grid1_of_3">
                    <a href="#">
                        <img src="images/pic5.jpg" alt=""/>
                        <h3>even & odd</h3>
                        <span class="price">$185,99</span>
                    </a>
                </div>
                <div class="grid1_of_3">
                    <a href="#">
                        <img src="images/pic6.jpg" alt=""/>
                        <h3>buffalo decollete</h3>
                        <span class="price">$145,99</span>
                        <span class="price1 bg1">out of stock</span>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <!-- start grids_of_2 -->
            <div class="grids_of_2">
                <div class="grid1_of_2">
                    <div class="span1_of_2">
                        <h2>free shipping</h2>
                        <p>Free shipping is only available for our customers residing in ile-ife that is purchasing two and above of our goods but other customers outside ile-ife osun state will attract a token fee! place your order now!!!!</p>
                    </div>
                    <div class="span1_of_2" >
                        <h2>testimonials</h2>
                        <p>Your shoes were a hit! Since I have decided to get a pair with red and cream leather I thought I would send along a photo of the green and cream you just made me......they show up darker than real life but you remember them I am sure. Again, no worries on the timing and I really enjoy these shoes....they are incredibly comfortable and even though they are new....I had a 20 hour day and they were perfect. Hope all is well and the show was a success for you.</p>
                    </div>
                </div>
                <div class="grid1_of_2 bg">
                    <h2>blog news</h2>
                    <div class="grid_date">
                        <div class="date1">
                            <h4>apr 01</h4>
                        </div>
                        <div class="date_text">
                            <h4><a href="#"> Top 5 Adventures for Summer Sixteen ,</a></h4>
                            <p>This summer, we’re living for the moment. There is nothing more thrilling than embarking on a weekend of adventure with a good group of friends and seeing what the weekend has to offer—carefree living starts now! Whether it be a festival, a day at the beach, exploring the city, surfing, or grabbing some roadside eats, we’re up for it all.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="grid_date">
                        <div class="date1">
                            <h4>feb 01</h4>
                        </div>
                        <div class="date_text">
                            <h4><a href="#"> A Weekend of Summer with ECCO ,,</a></h4>
                            <p>The best shoes take you on the adventure of life, and make every journey more memorable than the last. When summer is in full swing, you never know how the day will unfold. So, this summer we’re throwing out the map and hitting the open road. There is nothing more thrilling than packing our bags and embarking on an unscripted adventure with the windows down, music cranked and a couple of friends in the back seat to enjoy the ride.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<!-- start footer -->

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
<script type="text/javascript">
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>
</body>
</html>