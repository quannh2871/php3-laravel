<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item active-pro ">
                <a class="nav-link" href="#">
                    <i class="material-icons">logout</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>
