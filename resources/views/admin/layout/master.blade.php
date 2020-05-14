<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'Move Klang Admin Panel')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="@yield('description', 'Move Klang Admin Panel')" name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="_token" content="{{csrf_token()}}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/admin/assets/images/favicon.png')}}">

        @stack('css')
        <link href="{{ asset('public/admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
         <!-- Top Bar Start -->
         <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="../dashboard/crm-index.html" class="logo">
                    <span>
                        
                    </span>
                    <span>
                        <img src="{{ asset('public/admin/assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{ asset('public/admin/assets/images/logo.png')}}" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 
                    

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('public/admin/assets/images/users/user-1.png')}}" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm">{{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My Wallet</a>
                            <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="ti-lock text-muted mr-2"></i> Lock screen</a>
                            <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="ti-power-off text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu">
                <li @if(Request::segment(2) =='dashboard') class="mm-active" @endif>
                <a href="{{url('admin/dashboard')}}"><i class="ti-bar-chart"></i><span>Dashboard</span></a>
                </li>
                <li @if(Request::segment(2) =='sliders') class="mm-active" @endif>
                    <a href="{{route('sliders')}}"><i class="ti-image"></i><span>Home Sliders</span></a> 
                </li>
                <li @if(Request::segment(2) =='categories') class="mm-active" @endif>
                    <a href="{{route('news.categories')}}"><i class="ti-layers"></i><span>Manage Categories</span></a> 
                </li>
                <li @if(Request::segment(2) =='locations') class="mm-active" @endif>
                <a href="{{route('locations')}}"><i class="ti-location-pin" ></i><span>Manage Locations</span></a> 
                </li>
                <li @if(Request::segment(2) =='businessnature') class="mm-active" @endif>
                    <a href="{{route('businessnature')}}"><i class="ti-location-pin" ></i><span>Business Types</span></a> 
                    </li>
                <li @if(Request::segment(2) =='companies') class="mm-active" @endif>
                    <a href="javascript: void(0);"><i class="ti-bag"></i>Companies <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('companies.add')}}">Add New Company</a></li>                                    
                    <li><a href="{{route('companies.list')}}">Company List</a></li>                               
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end left-sidenav-->

        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content">

                @yield('content')

                <footer class="footer text-center text-sm-left">
                    &copy; 2020 Move Klang </span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        

        @stack('js')
       
        
    </body>

</html>