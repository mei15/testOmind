<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('head_title') - {{ env('APP_NAME') }}</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico')}}">

    <link rel="stylesheet" href="{{ asset('/plugins/morris/morris.css')}}">

    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>

<body>
    <div id="app">

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">

                        <a href="index.html" class="logo">
                            <img src="{{ asset('/images/user/logo.jpeg')}}" alt="" class="logo-small">
                            <img src="{{ asset('/images/user/logo.jpeg')}}" alt="" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="float-right list-unstyled mb-0 ">


                            <li class="dropdown notification-list">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="/images/user/logo.jpeg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                       
                                        <form method="POST" action="{{route('logout')}}">
                                            @csrf
                                            <button type="submit" class="d-none" id='logout'></button>
                                            <a class="dropdown-item text-danger" onclick="$('#logout').click()"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link" id="mobileToggle">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            @yield('title')

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ url('/home') }}">
                                    <i class="ti-dashboard"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            @if(Auth::user()->userable_type == 'App\Models\Admin')
                            <li class="has-submenu">
                                <a href="{{ route('penjaga.index') }}"><i class="ti-user"></i>Penjaga</a>
                            </li>
                            @endif
                           
                            <li class="has-submenu">
                                <a href="{{ route('tempat.index') }}"><i class="ti-pencil-alt"></i>Tempat Jaga</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end navigation -->
                </div> <!-- end container-fluid -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        <div class="wrapper">
            @yield('content')
        </div>
        <!-- end wrapper -->

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2020 TEST<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href='https://instagram.com/ameilia15'>Ameilia</a></span>.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- End Footer -->

    <!-- jQuery  -->
    <script src="{{asset('/js/jquery.min.js') }}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('/js/jquery.slimscroll.js') }}"></script>
    <script src="{{asset('/js/waves.min.js') }}"></script>

    <script src="{{asset('/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    @stack('scripts')

    <!-- App js -->
    <script src="{{ asset(mix('/js/app.js')) }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>