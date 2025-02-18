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
      <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div class="admin-info">
                        <a class="link" href="{{route('admin.dashboard')}}">
                        <div class="font-strong">Palompon Institute of  Technology
                        </div>
                    </div>
                </div>
            </a>
                <ul class="side-menu metismenu">
                    <li class="heading">DIRECTOR PAGES</li>
                    <li>
                        <a class="active" href="{{ route('admin.dashboard') }}"><i
                                class="sidebar-item-icon fa fa-home"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                 
                    <li>
                        <a href="{{route('activities.matrix')}}"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Activity Matrix</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.overview')}}"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Activity Overview </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('college.manage')}}">
                            <i class="sidebar-item-icon fa fa-university"></i>
                            <span class="nav-label">Colleges</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('program.manage')}}">
                            <i class="sidebar-item-icon fa fa-book"></i>
                            <span class="nav-label">Departments</span>
                        </a>
                    </li>
              
                <li>
                    <a href="{{route('manage.user')}}"><i class="sidebar-item-icon fa fa-users"></i>
                        <span class="nav-label">User Accounts</span>
                    </a>
                </li>
             
                    <li>
                        <a href="{{route('admin.profile')}}"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('index.logout')}}"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
{{-- <script>
      document.querySelectorAll('.nav-label').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
    
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change the status of this program?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Submitted!',
                        'Your data has been submitted.',
                        'success'
                    );
                }
            });
        });
    });
</script> --}}