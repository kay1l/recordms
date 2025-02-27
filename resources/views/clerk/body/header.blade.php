<style>
    .admin-img img {
        margin-left: 70px;
    }
    .responsive-time{
        position: relative;
    }
</style>
<header class="header">
    <div class="page-brand">
        <a class="link" href="{{ route('clerk.dashboard') }}">
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
            <li class="responsive-time">
                <span style="margin-left: 20px;">Philippine Standard Time: <span id="current-time"
                        style="font-weight: bold;"></span></span>
            </li>
        </ul>
       {{-- <ul class="nav navbar-toolbar">
        <div> Clerk Dashboard</div>
        </ul> --}}
        <!-- END TOP-LEFT TOOLBAR-->
        {{-- <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">

            <li class="dropdown dropdown-user">
                @if (Auth::check())
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img class="wd-100 rounded-circle"
                        src="{{ !empty($clerkData->photo) ? url('upload/admin_images/' . $clerkData->photo) : url('upload/no_image.jpg') }}"
                        alt="profile">
                    <span> {{ Auth::user()->name }}<i class="fa fa-angle-down m-l-5"></i></a></span>
            @else
                <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
                @endif
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('clerk.profile') }}"><i
                            class="fa fa-user"></i>Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.password.update') }}"><i
                            class="fa fa-cog"></i>Settings</a>
                    <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{ route('index.logout') }}"><i
                            class="fa fa-sign-out"></i>Logout</a>
                </ul>
            </li>
        </ul> --}}
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
