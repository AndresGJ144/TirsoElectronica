<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-9325492-23"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS') }}');
    </script>
    <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  
    
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:url" content="{{ request()->url() }}"/>
    <title>{{ config('app.name') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href={{asset("indexMetro/img/favicon.png")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/normalize.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/main.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/animate.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/font-awesome.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("indexMetro/css/font/flaticon.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/owl.theme.default.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/meanmenu.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/css/select2.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/vendor/noUiSlider/nouislider.min.css")}}>
    <link rel="stylesheet" href={{asset("indexMetro/style.css")}}>
    <script src={{asset("indexMetro/js/vendor/modernizr-2.8.3.min.js")}}></script>

    <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                var productId;
        $(document).ready(function(){
            
            setTimeout(function(){


 

                   //Siempre usar .on('click') en vez de .click, 
                $('.verImgPrd').on('click', function() {

                    

                    var productId = $(this).attr("id");
                    console.log(productId);

                    $.get('getImgPr/'+productId,function(data){

                        console.log(data);
                        //Modifiquemos las vistas de el modal para colocar las imagenes
                        var img = JSON.stringify(data);
                        
                        
                        var imgJS = JSON.parse(img);

                        console.log(imgJS[0]['src']);
                        
                        $('#img1').attr('src','http://localhost:8000/storage/'+imgJS[0]['src']);
                        $('#img2').attr('src','http://localhost:8000/storage/'+imgJS[1]['src']);
                        $('#img3').attr('src','http://localhost:8000/storage/'+imgJS[2]['src']);
                        
                    });
                    
                 });
               
                }, 1000);  

         });

         
        
        </script>
    <!-- Nivo Slider CSS --> <!-- necesario para index -->
    <link rel="stylesheet" href={{asset("indexMetro/lib/custom-slider/css/nivo-slider.css")}} type="text/css" />
    <link rel="stylesheet" href={{asset("indexMetro/lib/custom-slider/css/preview.css")}} type="text/css" media="screen"/> 

         

    @yield('css')   
    
    @yield('og')
    <!--
        El Open Graph Protocol es un método simple que nos permite incluir meta información en nuestra página web y así convertirla en un objeto Social Graph, una vez siendo un objeto puede interactuar con otros objetos Social Graph como el share de Google+ o el like de Facebook de modo correcto.
    -->
    
</head>
<body>
    <div class="wrapper-area">
        <noscript>
            <!-- 
                <noscript> define un contenido alternativo para los usuarios que tienen scripts desactivados en su navegador o tienen un navegador que no admite el script.

                El contenido dentro del elemento <noscript> se mostrará si los scripts no son compatibles o están deshabilitados en el navegador del usuario.
            -->
            <p class="alert alert-danger">
                You need to turn on your javascript. Some functionality will not work if this is disabled.
                <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
            </p>
        </noscript>

        
            
        <header>
            <?php 
                $namePage = "Request::url()";
            ?>
            
            <div
            @if ($namePage == "http://localhost:8000")
                class="header-area-style1" 
            @else
                class="header-area-style3" 
            @endif
            id="sticker">
            
                <div class="header-top">
                    <div class="header-top-inner-top">        
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="header-contact">
                                        <ul>
                                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href={{asset("+1234567890")}}> + 123 456 7890</a></li>
                                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href={{asset("#")}}> info@metro.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="account-wishlist">
                                        <ul>

                                            @if(auth()->check())
                                                <li><a href="{{ route('accounts') }}"><i class="fa fa-home"></i> My Account</a></li>
                                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                                            @else
                                                <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> Login</a></li>
                                                <li><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> Register</a></li>
                                            @endif
                                            <!-- <li id="cart" class="menubar-cart visible-xs"> -->
                                            <li>
                                                <a href="{{ route('cart.index') }}" title="View Cart">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span class="cart-number">{{ $cartCount }}</span>
                                                </a>
                                            </li>

                                            <li><a href={{asset("#")}}><i class="fa fa-usd" aria-hidden="true"></i> COP</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <!-- Logo y buscador ------------ -->
                    <div class="header-top-inner-bottom"> 
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="logo-area">
                                        <a href="{{ route('home') }}"><img class="img-responsive" src={{asset("indexMetro/img/logo.png")}} alt="logo"></a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    <!-- search form -->
                                                    
                                    <form action="{{route('search.product')}}" method="GET">
                                        <div class="search-area">
                                            <div class="input-group" id="adv-search">
                                                <!--<input type="text" class="form-control" placeholder="Search Product" /> -->
                                                <input type="text" name="q" class="form-control" placeholder="Search..." value="{!! request()->input('q') !!}">
                                                <div class="input-group-btn">
                                                    <div class="btn-group" role="group">
                                                        <div class="dropdown dropdown-lg">
                                                            <button type="button" class="btn btn-metro dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span>All Categories</span><i class="fa fa-caret-up" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                                <ul class="sidenav-nav">

                                                                    @foreach($categories as $category)
                                                                        <li>
                                                                            @if($category->children()->count() > 0)
                                                                                @include('layouts.front.category-sub', ['subs' => $category->children])
                                                                            @else
                                                                                <a 
                                                                                    @if(request()->segment(2) == $category->slug) 
                                                                                        class="active" 
                                                                                    @endif 
                                                                                    href="{{route('front.category.slug', $category->slug)}}">
                                                                                    {{$category->name}}
                                                                                </a>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach

                                                                    <!-- 
                                                                    <li><a href={{asset("#")}}><i class="flaticon-dress-1"></i>Women</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-polo"></i>Men</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-plug"></i>Electornics</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-necklace"></i>Jewellery</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-screen"></i>Computer</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-headphones"></i>Head Phone</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-transport"></i>Toys</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-fashion"></i>Shoes</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-dress"></i>Kid’s Wear</a></li>
                                                                    <li><a href={{asset("#")}}><i class="flaticon-technology"></i>Mobile</a></li>
                                                                    -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                                                                            
                                                        
                                                        <!-- /.search form -->
                                                        <button type="submit" id="search-btn" class="btn btn-metro-search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categorias y Menu ------------- -->
                <div class="header-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                
                                <div class="logo-area">
                                    <a href="{{ route('home') }}"><img class="img-responsive" src={{asset("indexMetro/img/logo.png")}} alt="logo"></a>
                                </div>
                                <div class="category-menu-area" id="category-menu-area-top">
                                    <h2 class="category-menu-title"><a href={{asset("#")}}><i class="fa fa-bars" aria-hidden="true"></i></a>Categories</h2>
                                    <ul class="category-menu-area-inner">

                                        @foreach($categories as $category)
                                            <li>
                                                @if($category->children()->count() > 0)
                                                    @include('layouts.front.category-sub', ['subs' => $category->children])
                                                @else
                                                    {{-- En data toogle iba dropdown, se quito para que funcionaran los links --}}
                                                    
                                                    <a class="dropdown-toggle" data-toggle=""
                                                        @if(request()->segment(2) == $category->slug) 
                                                            class="active" 
                                                        @endif 
                                                        href="{{route('front.category.slug', $category->slug)}}">
                                                        <i class="{{ $category->iconClass}}"></i>
                                                        {{$category->name}}
                                                        
                                                    </a>
                                                    
                                                    <!--
                                                    <ul class="dropdown-menu">
                                                        <li><a href={{asset("#")}}>Women Sub Title 1</a></li>
                                                        <li><a href={{asset("#")}}>Women Sub Title 2</a></li>
                                                        <li><a href={{asset("#")}}>Women Sub Title 3</a></li>
                                                        <li><a href={{asset("#")}}>Women Sub Title 4</a></li>
                                                        <li><a href={{asset("#")}}>Women Sub Title 5</a></li>
                                                    </ul> 
                                                -->
                                                    
                                                @endif
                                            </li>
                                        @endforeach
                                        <!--
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}>
                                                <i class="flaticon-dress-1"></i>
                                                Women
                                                <span>
                                                    <i class="flaticon-next"></i>
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href={{asset("#")}}>Women Sub Title 1</a></li>
                                                <li><a href={{asset("#")}}>Women Sub Title 2</a></li>
                                                <li><a href={{asset("#")}}>Women Sub Title 3</a></li>
                                                <li><a href={{asset("#")}}>Women Sub Title 4</a></li>
                                                <li><a href={{asset("#")}}>Women Sub Title 5</a></li>
                                            </ul>
                                        </li>                    
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-polo"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-plug"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-necklace"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-screen"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-headphones"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-transport"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-fashion"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-dress"></i></li>
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" href={{asset("#")}}><i class="flaticon-technology"></i></li>
                                        -->
                                    </ul>
                                </div>

                                
                            </div>
                            <!-- -------------------------------------------------- -->
                            <div class="col-lg-9 col-md-9 col-sm-8">
                                <div class="main-menu-area">
                                    <nav>
                                        <ul>
                                            <li><a href={{asset("#")}}>Home</a>
                                                <ul>
                                                    <li><a href={{asset("index.html")}}>Home 1</a></li>
                                                    <li><a href={{asset("index2.html")}}>Home 2</a></li>
                                                    <li><a href={{asset("index3.html")}}>Home 3</a></li>
                                                    <li><a href={{asset("index4.html")}}>Home 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href={{asset("about.html")}}>About</a></li>
                                            <li><a href={{asset("#")}}>Blog</a>
                                                <ul>
                                                    <li><a href={{asset("blog.html")}}>Blog</a></li>
                                                    <li><a href={{asset("single-blog.html")}}>Single Blog</a></li>
                                                    <li class="has-child-menu"><a href={{asset("#")}}>Demo</a>
                                                        <ul class="thired-level">
                                                            <li><a href={{asset("#")}}>Demo 1</a></li>
                                                            <li><a href={{asset("#")}}>Demo 2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href={{asset("#")}}>Pages</a>
                                                <ul class="mega-menu-area">
                                                    <li>
                                                        <a href={{asset("index.html")}}>Home 1</a>
                                                        <a href={{asset("index2.html")}}>Home 2</a>
                                                        <a href={{asset("index3.html")}}>Home 3</a>
                                                        <a href={{asset("index4.html")}}>Home 4</a>
                                                    </li>
                                                    <li>
                                                        <a href={{asset("single-blog.html")}}>Single Blog 2</a>
                                                        <a href={{asset("portfolio1.html")}}>Portfolio 1</a>
                                                        <a href={{asset("portfolio2.html")}}>Portfolio 2</a>
                                                        <a class="active" href={{asset("shop1.html")}}>Shop 1</a>
                                                    </li>
                                                    <li>
                                                        <a href={{asset("shop2.html")}}>Shop 2</a>
                                                        <a href={{asset("shop3.html")}}>Shop 3</a>
                                                        <a href={{asset("shop4.html")}}>Shop 4</a>
                                                        <a href={{asset("shop5.html")}}>Shop 5</a>
                                                    </li>
                                                    <li>
                                                        <a href={{asset("shop6.html")}}>Shop 6</a>
                                                        <a href={{asset("shop7.html")}}>Shop 7</a>
                                                        <a href={{asset("product-details1.html")}}>Product Details 1</a>
                                                        <a href={{asset("product-details2.html")}}>Product Details 2</a>
                                                    </li>
                                                    <li>
                                                        <a href={{asset("login-registration.html")}}>Login Registration</a>
                                                        <a href={{asset("my-account.html")}}>My Account</a>
                                                        <a href={{asset("wishlist.html")}}>Wishlist</a>
                                                        <a href={{asset("cart.html")}}>Cart</a>
                                                    </li>
                                                    <li>
                                                        <a href={{asset("check-out.html")}}>Check Out</a>
                                                        <a href={{asset("order-history.html")}}>Order History</a>
                                                        <a href={{asset("order-details.html")}}>Order Details</a>
                                                        <a href={{asset("404.html")}}>404</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href={{asset("contact.html")}}>Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu Area Start Here -->
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul>
                                                <li class="active"><a href={{asset("#")}}>Home</a>
                                                    <ul>
                                                        <li><a href={{asset("index.html")}}>Home 1</a></li>
                                                        <li><a href={{asset("index2.html")}}>Home 2</a></li>
                                                        <li><a href={{asset("index3.html")}}>Home 3</a></li>
                                                        <li><a href={{asset("index4.html")}}>Home 4</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href={{asset("about.html")}}>About</a></li>
                                                <li><a href={{asset("#")}}>Blog</a>
                                                    <ul>
                                                        <li><a href={{asset("blog.html")}}>Blog</a></li>
                                                        <li><a href={{asset("single-blog.html")}}>Single Blog</a></li>
                                                        <li class="has-child-menu"><a href={{asset("#")}}>Demo</a>
                                                            <ul class="thired-level">
                                                                <li><a href={{asset("#")}}>Demo 1</a></li>
                                                                <li><a href={{asset("#")}}>Demo 2</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href={{asset("#")}}>Portfolio</a>
                                                    <ul>
                                                        <li><a href={{asset("portfolio1.html")}}>Portfolio 1</a></li>
                                                        <li><a href={{asset("portfolio2.html")}}>Portfolio 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href={{asset("#")}}>Shop</a>
                                                    <ul>
                                                        <li><a href={{asset("shop1.html")}}>Shop 1</a></li>
                                                        <li><a href={{asset("shop2.html")}}>Shop 2</a></li>
                                                        <li><a href={{asset("shop3.html")}}>Shop 3</a></li>
                                                        <li><a href={{asset("shop4.html")}}>Shop 4</a></li>
                                                        <li><a href={{asset("shop5.html")}}>Shop 5</a></li>
                                                        <li><a href={{asset("shop6.html")}}>Shop 6</a></li>
                                                        <li><a href={{asset("shop7.html")}}>Shop 7</a></li>
                                                        <li><a href={{asset("product-details1.html")}}>Shop Details 1</a></li>
                                                        <li><a href={{asset("product-details2.html")}}>Shop Details 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href={{asset("#")}}>Pages</a>
                                                    <ul>
                                                        <li><a href={{asset("login-registration.html")}}>Login Registration</a></li>
                                                        <li><a href={{asset("my-account.html")}}>My Account</a></li>
                                                        <li><a href={{asset("cart.html")}}>Cart</a></li>
                                                        <li><a href={{asset("wishlist.html")}}>Wishlist</a></li>
                                                        <li><a href={{asset("check-out.html")}}>Check Out</a></li>
                                                        <li><a href={{asset("order-history.html")}}>Order History</a></li>
                                                        <li><a href={{asset("order-details.html")}}>Order Details</a></li>
                                                        <li><a href={{asset("404.html")}}>404</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href={{asset("contact.html")}}>Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu Area End Here -->
                </div>
            </div>
        </header>

        
        @yield('content')  

        <footer>
            @include('layoutIndexM.layoutFooter')
        </footer>

        @section('js')
        @show
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <!-- jquery-->
        <script src={{asset("indexMetro/js/vendor/jquery-2.2.4.min.js")}} type="text/javascript"></script>
        <!-- Bootstrap js -->
        <script src={{asset("indexMetro/js/bootstrap.min.js")}} type="text/javascript"></script>
        <!-- Owl Cauosel JS -->
        <script src={{asset("indexMetro/js/owl.carousel.min.js")}} type="text/javascript"></script>
        <!-- Meanmenu Js -->
        <script src={{asset("indexMetro/js/jquery.meanmenu.min.js")}} type="text/javascript"></script>
        <!-- WOW JS -->
        <script src={{asset("indexMetro/js/wow.min.js")}} type="text/javascript"></script>
        <!-- Plugins js -->
        <script src={{asset("indexMetro/js/plugins.js")}} type="text/javascript"></script>
        <!-- Countdown js -->
        <script src={{asset("indexMetro/js/jquery.countdown.min.js")}} type="text/javascript"></script>
        <!-- Srollup js -->
        <script src={{asset("indexMetro/js/jquery.scrollUp.min.js")}} type="text/javascript"></script>
        <!-- Actual Js -->
        <script src={{asset("indexMetro/js/jquery.actual.min.js")}} type="text/javascript"></script>
        <!-- Nouislider Js -->
        <script src={{asset("indexMetro/vendor/noUiSlider/nouislider.min.js")}} type="text/javascript"></script>
        <!-- wNumb Js -->
        <script src={{asset("indexMetro/js/wNumb.js")}} type="text/javascript"></script>
        <!-- ---------------------------------------------------------- -->
        <!-- necesario para product.blade.php --><!-- Select2 Js -->
        <script src={{asset("indexMetro/js/select2.min.js")}} type="text/javascript"></script>
        <!-- Custom Js -->
        <script src={{asset("indexMetro/js/main.js")}} type="text/javascript"></script>
        <!-- ---------------------------------------------------------- -->
        <!-- necesario para index -->
        <!-- Nivo slider js -->
        <script src={{asset("indexMetro/lib/custom-slider/js/jquery.nivo.slider.js")}} type="text/javascript"></script>
        <script src={{asset("indexMetro/lib/custom-slider/home.js")}} type="text/javascript"></script>
        <!-- Isotope js -->
        <script src={{asset("indexMetro/js/isotope.pkgd.min.js")}} type="text/javascript"></script>  
        
       
            
        
        
    </div>    
</body>
</html>