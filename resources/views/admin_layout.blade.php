<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext'
          rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{asset('backend/css/ie.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="{{asset('backend/css/ie9.css')}}" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{asset('backend/img/favicon.ico')}}">
    <!-- end: Favicon -->


</head>

<body>
<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse"
               data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html"><span>Admin Dashboard</span></a>

            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> {{Session::get('admin_name')}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="index.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a>
                    </li>
                    <li><a href="{{route('all_categories')}}"><i class="icon-envelope"></i><span class="hidden-tablet"> All Category</span></a>
                    </li>
                    <li><a href="{{route('add_categories')}}"><i class="icon-tasks"></i><span class="hidden-tablet"> Add Category</span></a>
                    </li>
                    <li><a href="{{route('all_orders')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Orders</span></a>
                    </li>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products  <span
                                        class="halflings-icon arrow-down"></span></span></a>
                        <ul>
                            <li><a class="submenu" href="{{route('all_products')}}"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet">All Products</span></a></li>
                            <li><a class="submenu" href="{{route('add_product')}}"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Add Products</span></a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Sliders <span
                                        class="halflings-icon arrow-down"></span></span></a>
                        <ul>
                            <li><a class="submenu" href="{{route('all_sliders')}}"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet">All Sliders</span></a></li>
                            <li><a class="submenu" href="{{route('add_slider')}}"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Add Sliders</span></a></li>

                        </ul>
                    </li>
                    <li><a href="gallery.html"><i class="icon-picture"></i><span
                                    class="hidden-tablet"> Delivery man</span></a></li>
                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">

            @yield('admin_content')

        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->


<footer>

    <p>
        <span class="footer-bottom">Powered by: Md.Jahid Hasan Shuvo</span>
    </p>

</footer>

<!-- start: JavaScript-->
<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>

<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('backend/js/fullcalendar.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.chosen.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.cleditor.min.js')}}"></script>


<script src="{{asset('backend/js/jquery.elfinder.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.raty.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.iphone.toggle.js')}}"></script>

<script src="{{asset('backend/js/jquery.uploadify-3.1.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.imagesloaded.js')}}"></script>

<script src="{{asset('backend/js/jquery.masonry.min.js')}}"></script>

<script src="{{asset('backend/js/jquery.knob.modified.js')}}"></script>

<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('backend/js/custom.js')}}"></script>
<script src="{{asset('backend/js/bootbox.min.js')}}"></script>
<script src="{{asset('backend/js/printPreview.js')}}"></script>

<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Are you want delete!!", function (confirmed) {
            if (confirmed) {
                window.location.href = link;
            }
            ;
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#btnPrint").printPreview({
            obj2print: '#masterContent',
            width: '810'

            /*optional properties with default values*/
            //obj2print:'body',     /*if not provided full page will be printed*/
            //style:'',             /*if you want to override or add more css assign here e.g: "<style>#masterContent:background:red;</style>"*/
            //width: '670',         /*if width is not provided it will be 670 (default print paper width)*/
            //height:screen.height, /*if not provided its height will be equal to screen height*/
            //top:0,                /*if not provided its top position will be zero*/
            //left:'center',        /*if not provided it will be at center, you can provide any number e.g. 300,120,200*/
            //resizable : 'yes',    /*yes or no default is yes, * do not work in some browsers*/
            //scrollbars:'yes',     /*yes or no default is yes, * do not work in some browsers*/
            //status:'no',          /*yes or no default is yes, * do not work in some browsers*/
            //title:'Print Preview' /*title of print preview popup window*/

        });
    });
</script>

<!-- end: JavaScript-->
</body>


</html>
