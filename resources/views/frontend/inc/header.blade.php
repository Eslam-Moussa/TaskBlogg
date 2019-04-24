<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('/')}}/website/css/bootstrap.min.css">
    <!-- bootstrap ar  -->
    <link rel="stylesheet" href="{{url('/')}}/website/css/animate.min.css">
    <link rel="stylesheet" href="{{url('/')}}/website/css/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="{{url('/')}}/website/css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home">
    <header id="header">
        <!-- Start header-top -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-top">
                            <ul class="list-inline topBarNav">
                                <li><a href="#"> <span><i class="fas fa-phone"></i> Phone: (123) 456-7890</span></a>
                                </li>
                                <li><a href="#"> <span class="hidden-sm"><i class="far fa-envelope"></i> Email:
                                            mail@example.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social pull-right">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="line">
        <!--/.header-top -->
        <div class="menu-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-6">
                        
                    </div>
                    <!-- Navigation
                        ================================================== -->
                    <div class="col-md-10 col-sm-10 col-xs-6">
                        <nav id="navigation1" class="navigation navbar-static-top">
                            <!-- Logo Area Start -->
                            <div class="nav-header">
                                <a class="nav-brand" href=""></a>
                                <div class="nav-toggle"></div>
                            </div>
                            <!-- Main Menus Wrapper -->
                            <div class="nav-menus-wrapper">
                                <ul class="nav-menu">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="category.html">Category</a>
                                        <ul class="nav-dropdown">
                                            @if(!empty($CatHeader))
                                            @foreach($CatHeader as $get)
                                            <li><a href="{{url('/PostBy')}}/{{$get->slogen_cat}}">
                                                    @if(!empty($get->cat_name))
                                                    {{$get->cat_name}}
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/admin')}}">Admin Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container -->
        </div>
    </header>