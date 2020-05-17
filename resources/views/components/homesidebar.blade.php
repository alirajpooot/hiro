
    <div class="dashboard-sidebar">
        <div class="dashboard-sidebar-inner" data-simplebar>
            <div class="dashboard-nav-container">

                <!-- Responsive Navigation Trigger -->
                <a href="#" class="dashboard-responsive-nav-trigger">
                    <span class="hamburger hamburger--collapse" >
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                    <span class="trigger-title">Dashboard Navigation</span>
                </a>
                
                <!-- Navigation -->
                <div class="dashboard-nav">
                    <div class="dashboard-nav-inner">

                        <ul data-submenu-title="Account">
                            <li class="active"><a href="{{route('home')}}"><i class="icon-material-outline-group"></i> General Information</a></li>
                            <li><a href="{{route('home.services')}}"><i class="icon-material-outline-settings"></i> Manage Services</a></li>
                            <li><a href="{{route('home.links')}}"><i class="icon-feather-globe"></i> External Links</a></li>
                            <li><a href="{{route('home.password')}}"><i class="icon-material-outline-lock"></i> Change Password</a></li>
                            <li><a href="{{route('logout')}}"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                        </ul>
                        
                    </div>
                </div>
                <!-- Navigation / End -->

            </div>
        </div>
    </div>
