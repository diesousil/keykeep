<nav class="main-header navbar navbar-expand navbar-black navbar-dark">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Sidebar user (optional) -->
        <li class="nav-item topbar-user">
            <div class="image">
            <a href="<?php echo URL::to('myprofile'); ?>" class="d-block"><img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"></a>
            </div>
            <div class="info">
                <a href="<?php echo URL::to('myprofile'); ?>" class="d-block">{{$userName}}</a>
            </div>
        </li>
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-arrow-down"></i>                
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Diego Silva</span>
                
                <div class="dropdown-divider"></div>

                <a href="<?php echo URL::to('myprofile'); ?>" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> My Profile
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-key mr-2"></i> Change Password
                </a>

                
                <a href="<?php echo URL::to('about'); ?>" class="dropdown-item">
					<i class="fa fa-at mr-2"></i> About
                </a>
				
                <a href="<?php echo URL::to('logout'); ?>" class="dropdown-item">
					<i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>

            </div>
        </li>
        
    </ul>
</nav>