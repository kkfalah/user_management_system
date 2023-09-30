<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        {{-- <img src="{{ asset('backend-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link 
                    @if (Request::routeIs('users') || Request::routeIs('users.create'))
                        {{ 'active' }}
                    @endif
                    ">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('myaccount') }}" class="nav-link 
                    @if (Request::routeIs('myaccount') || Request::routeIs('myaccount.edit'))
                        {{ 'active' }}
                    @endif
                    ">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>My Account</p>
                    </a>
                </li>
                
                <li class="nav-item ">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="nav-icon  fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>                  
                    
                    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
