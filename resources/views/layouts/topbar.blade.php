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
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$userName}}</a>
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
                
                <a href="#" class="dropdown-item">
                    <i class="fa fa-key mr-2"></i> Change Password
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                </a>
                
            </div>
        </li>
        
    </ul>
</nav>