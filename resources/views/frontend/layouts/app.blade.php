<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', app_name())</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="@yield('meta_description', 'LaraShop')">
<meta name="author" content="@yield('meta_author', 'Thet Nyihtwe')">
        @yield('meta')

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->

<!-- //font-awesome icons -->
<!-- js -->
{!! Html::script(('assets/js/jquery-1.11.1.min.js')) !!}
<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
<!-- //js -->

<!-- start-smoth-scrolling -->
<!-- Styles -->
        @yield('before-styles')
        
        <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        {{ Html::style(('assets/css/bootstrap.css')) }}<!--link to css file-->
        {{ Html::style(('assets/css/style.css')) }}<!--link to css file-->
        {{ Html::style(('assets/css/font-awesome.css')) }}<!--link to css file-->

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- @langRTL
            {!! Html::style(elixir('css/rtl.css')) !!}
        @endif -->

        @yield('after-styles')

        
        <!-- start-smoth-scrolling -->
        {!! Html::script(('assets/js/move-top.js')) !!}
        <!-- <script type="text/javascript" src="js/move-top.js"></script> -->
        {!! Html::script(('assets/js/easing.js')) !!}
        <!-- <script type="text/javascript" src="js/easing.js"></script> -->
       <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
       </script>

        <!-- Scripts -->

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
</head>
    
<body>
<!-- header -->
    <div class="agileits_header">
        <div class="w3l_offers">
            <a href="products.html">Today's special Offers !</a>
        </div>
        <div class="w3l_search">
            <form action="{{url('/products')}}" method="get">
                <input type="text" name="q" placeholder="Search a product..." quired="">
                <input type="submit" value="">
            </form>
        </div>
        <div class="product_list_header">  
            <form action="{{route('frontend.shoppingcart')}}" method="get" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
        </div>
        <div class="w3l_header_right">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">@if(Auth::check()) {{Auth::user()->name}} @endif<i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                            @if(Auth::check())
                                <li><a href="{{route('frontend.auth.logout')}}">Log Out</a></li>
                            @else
                                <li><a href="{{route('frontend.auth.login')}}">Login</a></li> 
                                <li><a href="{{route('frontend.auth.register')}}">Sign Up</a></li>
                            @endif                
                                

                                
                            </ul>
                        </div>                  
                    </div>  
                </li>
            </ul>
        </div>
        <div class="w3l_header_right1">
            <h2><a href="mail.html">Contact Us</a></h2>
        </div>
        <div class="clearfix"> </div>
    </div>
<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
         var navoffeset=$(".agileits_header").offset().top;
         $(window).scroll(function(){
            var scrollpos=$(window).scrollTop(); 
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
         });
         
    });
    </script>
<!-- //script-for sticky-nav -->
    <div class="logo_products">
        <div class="container">
            <div class="w3ls_logo_products_left">
                <h1><a href="index.html"><span>Grocery</span> Store</a></h1>
            </div>
            <div class="w3ls_logo_products_left1">
                
            </div>
            <div class="w3ls_logo_products_left1">
                <ul class="phone_email">
                    <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //header -->
<!-- products-breadcrumb -->
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
                <li><i class="fa fa-menu-bars" aria-hidden="true"></i><a href="{{route('frontend.products')}}">Products</a><span>|</span></li>
               <li><i class="fa fa-lists" aria-hidden="true"></i><a href="faqs.html">FAQs</a><span>|</span></li>
               
            </ul>
        </div>
    </div>
<!-- //products-breadcrumb -->
<!-- banner -->
    <div class="banner">
        <div class="w3l_banner_nav_left">
            <nav class="navbar nav_bottom">
             <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header nav_2">
                  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
               </div> 
               <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    @include('frontend.includes.categories_menus')
                 </div><!-- /.navbar-collapse -->
            </nav>
        </div>
        <!--start w3l_banner_nav_right-->
        <div class="w3l_banner_nav_right">
            @include('includes.partials.messages')
            @yield('content')
 
        </div>
        <!-- //end of nav_right-->
        <div class="clearfix"></div>
    </div>
<!-- //banner -->
@yield('secondary_content','')
<!-- newsletter -->
    <div class="newsletter">
        <div class="container">
            <div class="w3agile_newsletter_left">
                <h3>sign up for our newsletter</h3>
            </div>
            <div class="w3agile_newsletter_right">
                <form action="#" method="post">
                    <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="subscribe now">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //newsletter -->
<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="col-md-3 w3_footer_grid">
                <h3>information</h3>
                <ul class="w3_footer_grid_list">
                    <li><a href="events.html">Events</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="products.html">Best Deals</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="short-codes.html">Short Codes</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>policy info</h3>
                <ul class="w3_footer_grid_list">
                    <li><a href="faqs.html">FAQ</a></li>
                    <li><a href="privacy.html">privacy policy</a></li>
                    <li><a href="privacy.html">terms of use</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>what in stores</h3>
                <ul class="w3_footer_grid_list">
                    <li><a href="pet.html">Pet Food</a></li>
                    <li><a href="frozen.html">Frozen Snacks</a></li>
                    <li><a href="kitchen.html">Kitchen</a></li>
                    <li><a href="products.html">Branded Foods</a></li>
                    <li><a href="household.html">Households</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>twitter posts</h3>
                <ul class="w3_footer_grid_list1">
                    <li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam <a href="#">http://sd.ds/13jklf#</a>
                        eius modi tempora incidunt ut labore et
                        <a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
                    <li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam <a href="#">http://fd.uf/56hfg#</a>
                        eius modi tempora incidunt ut labore et
                        <a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
            <div class="agile_footer_grids">
                <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                    <div class="w3_footer_grid_bottom">
                        <h4>100% secure payments</h4>
                        <img src="images/card.png" alt=" " class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                    <div class="w3_footer_grid_bottom">
                        <h5>connect with us</h5>
                        <ul class="agileits_social_icons">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="wthree_footer_copy">
                <p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
            </div>
        </div>
    </div>
<!-- //footer -->
@yield('before-scripts')
{!! Html::script(('assets/js/bootstrap.min.js')) !!}
<!-- Bootstrap Core JavaScript -->
<!--script src="js/bootstrap.min.js"></script-->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->

    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->     
        
        @yield('after-scripts')
        @include('includes.partials.ga')
</body>
</html>