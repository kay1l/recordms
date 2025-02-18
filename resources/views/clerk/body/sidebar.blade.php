<style>
    .nav-label {
        font-weight: normal;
        font-size: 15px;
    }
    .side-menu > li {
        margin-bottom: 10px;
    }
    .page-sidebar{
        position: fixed;
    }
</style>
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div class="admin-info">
                <a class="link" href="{{route('clerk.dashboard')}}">
                    
                <div class="font-strong">Palompon Institute of  Technology
                   
                   
                </div>
            </div>
        </div>
    </a>
        <ul class="side-menu metismenu">
            <li class="heading">Clerk Pages</li>
            <li>
                <a class="active" href="{{route('clerk.dashboard')}}">
                    <i class="sidebar-item-icon fa fa-home"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
         
            <li>
                <a href="{{route('hero.manage')}}">
                    <i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Hero Section</span>
                </a>
            </li>
            <li>
                <a href="{{route('activity.matrix')}}">
                    <i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Activity Matrix</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-list"></i>
                    <span class="nav-label">Activity Section</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            <ul class="nav-2-level collapse" aria-expanded="false">
                <li>
                    <a href="{{route('activity.manage')}}">
                        {{-- <i class="sidebar-item-icon fa fa-list"></i> --}}
                        <span class="nav-label">Activity Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('completed' )}}">Accomplished Activities</a>
                </li>
            </ul>
        </li>
                <li>
                    <a href="{{route('clerk.profile')}}">
                        <i class="sidebar-item-icon fa fa-user"></i>
                        <span class="nav-label">Profile </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('index.logout')}}">
                        <i class="sidebar-item-icon fa fa-sign-out"></i>
                        <span class="nav-label">Logout </span>
                    </a>
                </li>
                
          
        </ul>
    </div>
</nav>
