<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">

    <!--for product image zoom -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

<!--[if lt IE 9] >
    <script src="{{asset('frontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="URL::to('images/ico/c2c.png')">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/c2c.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/laptop.jpg')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/shoppingicon.jpg')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/laptop.jpg')}}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +024685631</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@pinesolution.xyz</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('home')}}" class="active"><i class="fa fa-home"></i>Home</a></li>
                            <li><a href="{{route('delivery_man')}}"><i class="fa fa-user"></i> Delivery Man</a></li>
                            <li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{route('shopping_cart')}}"><i class="fa fa-shopping-cart"></i>
                                    <?php $item = 0; ?>
                                    @foreach(Cart::content() as $i)
                                        <?php $it = $i->qty;
                                        $item += (int)$it;
                                        ?>
                                    @endforeach
                                    Cart @if($item)<i class="btn btn-info">{{$item}}</i>@endif</a></li>
                            @if(Session::get('customer_id'))
                                <li><a href="{{route('customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                            @else
                                <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->

<!--/slider--> @yield('slider')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>

                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php
                        $categories = \App\Category::all()->where('publication_status', '=', 1)->where('category_id', '=', null);
                        ?>
                        @foreach ($categories as $category)
                            <div class="panel panel-default" data-parent="#accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-target="#subcategories{{$loop->iteration}}">
                                            @if(count($category->children))<span class="badge pull-right"><i
                                                        class="fa fa-plus"></i></span>@endif
                                            {{$category->name}}
                                        </a>
                                    </h4>
                                </div>
                                @if(count($category->children))
                                    <div id="subcategories{{$loop->iteration}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                @foreach($category->children as $subCategory)
                                                    @if($subCategory->publication_status == 1)
                                                        <li>
                                                            <a href="{{route('search_by_category',['id'=>$subCategory->id])}}">{{$subCategory->name}}
                                                                ({{count($subCategory->products)}})</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div><!--/category-products-->

                    <!--     <div class="brands_products"><!--brands_products
                             <h2>Brands</h2>
                             <div class="brands-name">
                                 <ul class="nav nav-pills nav-stacked">
                                     <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                     <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                     <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                     <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                     <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                     <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                     <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                 </ul>
                             </div>
                         </div><!--/brands_products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>Online</span>-shopping</h2>
                        <p>We Provide the best quality products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2018. All rights reserved.</p>
                <p class="pull-right">Designed by <span>Md. Jahid Hasan Shuvo</span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/jqzoom.js')}}"></script>

<script type="text/javascript">
    $("#bzoom").zoom({
        zoom_area_width: 300,
        autoplay_interval: 3000,
        small_thumbs: 2,
        autoplay: true
    });
</script>
</body>
</html>