<style>
    .admin-img img {
        margin-left: 70px;
    }
</style>
<header class="header">
    <div class="page-brand">
        <a class="link" href="{{ route('unithead.dashboard') }}">
            <span class="brand">

                <div class="admin-img">
                    <img src="{{ asset('./assets/img/pit.png') }}" width="50px" />
                </div>
            </span>
            <span class="brand-mini">
                <img src="{{ asset('./assets/img/pit.png') }}" width="50px" />
            </span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
            <li>
                <span style="margin-left: 20px;">Philippine Standard Time: <span id="current-time" style="font-weight: bold;"></span></span>
            </li>
        </ul>
        <ul class="nav navbar-toolbar">
            <li>
                <a  href="javascript:refreshPage();" class="text-primary ml-3"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Refresh Page" >
                    <i class="fa fa-refresh fa-2x text-success"></i>
                </a>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            {{-- <li class="dropdown dropdown-inbox">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                    <span class="badge badge-primary envelope-badge">9</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                    <li class="dropdown-menu-header">
                        <div>
                            <span><strong>9 New</strong> Messages</span>
                            <a class="pull-right" href="mailbox.html">view all</a>
                        </div>
                    </li>
                    <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                        <div>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('./assets/img/users/u1.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"> </div>Jeanne Gonzalez<small
                                            class="text-muted float-right">Just now</small>
                                        <div class="font-13">Your proposal interested me.</div>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('./assets/img/users/u2.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"></div>Becky Brooks<small
                                            class="text-muted float-right">18 mins</small>
                                        <div class="font-13">Lorem Ipsum is simply.</div>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('./assets/img/users/u3.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"></div>Frank Cruz<small
                                            class="text-muted float-right">18 mins</small>
                                        <div class="font-13">Lorem Ipsum is simply.</div>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="./assets/img/users/u4.jpg" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"></div>Rose Pearson<small
                                            class="text-muted float-right">3 hrs</small>
                                        <div class="font-13">Lorem Ipsum is simply.</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown dropdown-notification">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span
                            class="notify-signal"></span></i></a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                    <li class="dropdown-menu-header">
                        <div>
                            <span><strong>5 New</strong> Notifications</span>
                            <a class="pull-right" href="javascript:;">view all</a>
                        </div>
                    </li>
                    <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                        <div>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">4 task compiled</div><small class="text-muted">22
                                            mins</small>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-default badge-big"><i
                                                class="fa fa-shopping-basket"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">You have 12 new orders</div><small class="text-muted">40
                                            mins</small>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-danger badge-big"><i class="fa fa-bolt"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">Server #7 rebooted</div><small class="text-muted">2
                                            hrs</small>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">New user registered</div><small class="text-muted">2
                                            hrs</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </li> --}}
            @if (Auth::check())
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <img class="wd-100 rounded-circle"
                            src="{{ !empty($unitData->photo) ? url('upload/admin_images/' . $unitData->photo) : url('upload/no_image.jpg') }}"
                            alt="profile">

                        <span> {{ Auth::user()->name }} <i class="fa fa-angle-down m-l-5"></i></a></span>
                       
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('unithead.profile') }}"><i
                                class="fa fa-user"></i>Profile</a>
                        {{-- <a class="dropdown-item" href="{{ route('unithead.password.update') }}"><i
                                class="fa fa-cog"></i>Settings</a>
                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a> --}}
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="{{ route('index.logout') }}"><i
                                class="fa fa-sign-out"></i>Logout</a>
                    </ul>
            @endif
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
    <script>
        function updateTime() {
            const options = {
                timeZone: 'Asia/Manila',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                weekday: 'short',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };
            const formatter = new Intl.DateTimeFormat('en-US', options);
            const currentTime = formatter.format(new Date());
            document.getElementById('current-time').innerText = currentTime;
        }
    
        // Update the time immediately and then every second
        updateTime();
        setInterval(updateTime, 1000);
    </script>
    <script>
        function refreshPage() {
            location.reload();
        }
    </script>
</header>
