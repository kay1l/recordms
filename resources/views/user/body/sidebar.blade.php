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
</style>   <!-- START SIDEBAR-->
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
                    <li>
                        <a class="active" href="{{ route('index') }}"><i
                                class="sidebar-item-icon fa fa-home"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="active" href="{{ route('index.logout') }}"><i
                                class="sidebar-item-icon fa fa-power-off"></i>
                            <span class="nav-label">Help Center</span>
                        </a>
                    </li> --}}
                    <li>
                        <a class="active" href="{{ route('index.logout') }}"><i
                                class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    
                  
                    
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
