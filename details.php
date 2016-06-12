<?php
include_once ('php/validate.php');
$getDisplay = $myvalidate->blogDisplay();
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
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <!-- start details -->
    <link rel="stylesheet" type="text/css" href="css/productviewgallery.css" media="all" />
    <script type="text/javascript" src="js/cloud-zoom.1.0.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/productviewgallery.js"></script>
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
                <a href="index.php" ><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
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
            <h2 class="style">our Esperanza shoes</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">
<div class="main">
<!-- start content -->
<div class="single">
<!-- start span1_of_1 -->
<div class="left_content">
    <div class="span1_of_1">
        <!-- start product_slider -->
        <div class="product-view">
            <div class="product-essential">
                <div class="product-img-box">
                    <div class="more-views">
                        <div class="more-views-container">
                            <ul>
                                <li>
                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                        <img  src="images/0001-2.jpg"  title="" alt="" /></a>
                                </li>
                                <li>
                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" href=""  title="" alt="">
                                        <img  src="images/0001-1.jpg"  title="" alt="" /></a>
                                </li>
                                <li>
                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                        <img  src="images/0001-5.jpg"  title="" alt="" /></a>
                                </li>
                                <li>
                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" href=""  title="" alt="">
                                        <img  src="images/0001-3.jpg" title="" alt="" /></a>
                                </li>
                                <li>
                                    <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                        <img  src="images/0001-4.jpg" title="" alt="" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-image">
                        <a class="cs-fancybox-thumbs cloud-zoom" rel="adjustX:30,adjustY:0,position:'right',tint:'#202020',tintOpacity:0.5,smoothMove:2,showTitle:true,titleOpacity:0.5" data-fancybox-group="thumb" href="images/0001-2.jpg" title="Women Shorts" alt="Women Shorts">
                            <img src="images/0001-2.jpg" alt="Women Shorts" title="Women Shorts" />
                        </a>
                    </div>
                    <script type="text/javascript">
                        var prodGallery = jQblvg.parseJSON('{"prod_1":{"main":{"orig":"images/0001-2.jpg","main":"images/large/0001-2.jpg","thumb":"images/small/0001-2.jpg","label":""},"gallery":{"item_0":{"orig":"images/0001-2.jpg","main":"images/large/0001-2.jpg","thumb":"images/small/0001-2.jpg","label":""},"item_1":{"orig":"images/0001-1.jpg","main":"images/large/0001-1.jpg","thumb":"images/small/0001-1.jpg","label":""},"item_2":{"orig":"images/0001-5.jpg","main":"images/large/0001-5.jpg","thumb":"images/small/0001-5.jpg","label":""},"item_3":{"orig":"images/0001-3.jpg","main":"images/large/0001-3.jpg","thumb":"images/small/0001-3.jpg","label":""},"item_4":{"orig":"images/0001-4.jpg","main":"images/large/0001-4.jpg","thumb":"images/small/0001-4.jpg","label":""}},"type":"simple","video":false}}'),
                            gallery_elmnt = jQblvg('.product-img-box'),
                            galleryObj = new Object(),
                            gallery_conf = new Object();
                        gallery_conf.moreviewitem = '<a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt=""><img src="" src_main="" title="" alt="" /></a>';
                        gallery_conf.animspeed = 200;
                        jQblvg(document).ready(function() {
                            galleryObj[1] = new prodViewGalleryForm(prodGallery, 'prod_1', gallery_elmnt, gallery_conf, '.product-image', '.more-views', 'http:');
                            jQblvg('.product-image .cs-fancybox-thumbs').absoluteClick();
                            jQblvg('.cs-fancybox-thumbs').fancybox({ prevEffect : 'none',
                                nextEffect : 'none',
                                closeBtn : true,
                                arrows : true,
                                nextClick : true,
                                helpers: {
                                    thumbs : {
                                        position: 'bottom'
                                    }
                                }
                            });
                            jQblvg('#wrap').css('z-index', '100');
                            jQblvg('.more-views-container').elScroll({type: 'vertical', elqty: 4, btn_pos: 'border', scroll_speed: 400 });

                        });

                        function initGallery(a,b,element) {
                            galleryObj[a] = new prodViewGalleryForm(prods, b, gallery_elmnt, gallery_conf, '.product-image', '.more-views', '');
                        };
                    </script>
                </div>
            </div>
        </div>
        <!-- end product_slider -->
    </div>
    <!-- start span1_of_1 -->
    <div class="span1_of_1_des">
        <div class="desc1">
            <h3>Full view of the Product</h3>
            <h5>#3500 <span>#4000</span>  <a href="#">click for offer</a></h5>
            <div class="available">
                <div class="btn_form">
                    <form>
                        <input type="submit" value="buy now" title="" />
                    </form>
                </div>

            </div><br><br><br><br>
            <div class="share-desc">
                <div class="share">
                    <h4>Share Product :</h4>
                    <ul class="share_nav">
                        <li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
                        <li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
                        <li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
                        <li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- start left content_bottom -->
    <div class="left_content_btm">
        <!-- start tabs -->

        <!-- end tabs -->
    </div>
    <!-- end left content_bottom -->
</div>
<!-- start left_sidebar -->
<div class="left_sidebar">

    <h4>recent products</h4>
    <div class="left_products">
        <div class="left_img">
            <img src="images/det_pic1.jpg" alt=""/>
        </div>
        <div class="left_text">
            <p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></p>
            <span class="line">$72.00</span>
            <span>$52.00</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="left_products">
        <div class="left_img">
            <img src="images/det_pic2.jpg" alt=""/>
        </div>
        <div class="left_text">
            <p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></p>
            <span class="line">$86.00</span>
            <span>$83.00</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="left_products">
        <div class="left_img">
            <img src="images/det_pic1.jpg" alt=""/>
        </div>
        <div class="left_text">
            <p><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></p>
            <span class="line">$76.00</span>
            <span>$75.00</span>
        </div>
        <div class="clear"></div>
    </div>
    <h4>related colors</h4>
    <ul class="color-list">
        <li><a href="#"> <span class="color2"> </span><p class="red">Green</p></a></li>
        <li><a href="#"> <span class="color3"> </span><p class="red">Blue</p></a></li>
        <li><a href="#"> <span class="color4"> </span><p class="red">Yellow</p></a></li>
        <li><a href="#"> <span class="color5"> </span><p class="red">Violet</p></a></li>
        <li><a href="#"> <span class="color6"> </span><p class="red">Orange</p></a></li>
        <li><a href="#"> <span class="color7"> </span><p class="red">Gray</p></a></li>
    </ul>
</div>
<div class="clear"></div>
</div>
<!-- end content -->
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
                    <li><a class="icon1" href="#"></a></li>
                    <li><a class="icon2" href="#"></a></li>
                    <li><a class="icon3" href="#"></a></li>
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
                    <li><a href="#">support /</a></li>
                    <li><a href="#">Terms and conditions /</a></li>
                    <li><a href="#">Faqs /</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div class="copy">
                <p class="link"><span>© All rights reserved | Esperanza footware by&nbsp;<a href="#"> TaoBal</a></span></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>