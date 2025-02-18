<style>
    .nav-label {
        font-weight: normal;
        font-size: 15px;
    }

    /* Add space between sidebar items */
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
                <a class="link" href="{{route('unithead.dashboard')}}">
                <div class="font-strong">Palompon Institute of  Technology
                   
                   
                </div>
            </div>
        </div>
    </a>
        <ul class="side-menu metismenu">
            <li class="heading">Unithead Pages</li>
            <li>
                <a class="active" href="{{route('unithead.dashboard')}}">
                    <i class="sidebar-item-icon fa fa-home"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

           
            <li>
                <a href="{{route('activities.Matrix')}}">
                    <i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Activity Matrix</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{route('unit.activity.manage')}}">
                    <i class="sidebar-item-icon fa fa-list"></i>
                    <span class="nav-label">Activity Target</span>
                </a>
            </li> --}}
            <li>
                <a href="{{route('unithead.profile')}}">
                    <i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">Profile</span>
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
