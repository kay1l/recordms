<style>
    .admin-img img{
        margin-left: 70px;
    }

</style>
<header class="header">
    <div class="page-brand">
        <a class="link" href="{{route('index')}}">
            <span class="brand">
               
                <div class="admin-img">
                    <img src="{{ asset('./assets/img/pit.png') }}"  width="50px"  />
                </div>
            </span>
            <span class="brand-mini">
                <img src="{{ asset('./assets/img/pit.png') }}"  width="50px"  />
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
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">

           @if (Auth::check())
           <li class="dropdown dropdown-user">
           <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                <img class="wd-100 rounded-circle"
                src="{{ !empty($userkData->photo) ? url('upload/admin_images/' . $userkData->photo) : url('upload/no_image.jpg') }}"
                alt="profile">
            <span> {{ Auth::user()->name}}<i class="fa fa-angle-down m-l-5"></i></a></span>
            @else
            <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
            @endif
            
               
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('index.logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
                </ul>
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
    
</header>