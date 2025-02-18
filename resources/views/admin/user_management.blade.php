@extends('admin.master')
@section('content')
    <!-- START PAGE CONTENT-->


    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{route('activity.matrix')}}">Activities Matrix</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Accounts Table</li>
        </ol>
    </nav>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $uheadRole }}</h2>
                        <div class="m-b-5">Extension UnitHeads</div><i class="ti-user widget-stat-icon"></i>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $clerkRole }}</h2>
                        <div class="m-b-5">Extension Office Clerks</div><i class="ti-user widget-stat-icon"></i>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $userRole }}</h2>
                        <div class="m-b-5">New Users</div><i class="ti-user widget-stat-icon"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox">
        <div class="ibox-head">

            <div class="ibox-title">
                <h2><b>Accounts Table</b></h2>
            </div>

        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="users" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>College</th>
                        <th>Role</th>
                        <th>Download Permission</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span
                                    class="badge badge-default badge-pill m-r-20 m-b-20">{{ $user->college->collegeName ?? null }}</span>
                            </td>
                            <td>
                                @if ($user->role == 'Clerk')
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5">{{ $user->role }}</span>
                                @elseif ($user->role == 'UnitHead')
                                    <span class="badge badge-info badge-pill m-r-5 m-b-5">{{ $user->role }}</span>
                                @else
                                    <span class="badge badge-danger badge-pill m-r-5 m-b-5">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <form action="{{ route('file-permissions.update', $user->id) }}" method="POST"
                                    class="permissionForm">
                                    @csrf
                                    @if ($user->role == 'Clerk')
                                        <button type="submit" class="btn btn-link text-primary"
                                            title="Toggle download permission">
                                            <i class="fa 
                                                {{ $user->fileDownloadPermission && $user->fileDownloadPermission->can_download ? 'fa-toggle-on text-primary' : 'fa-toggle-off text-danger' }} 
                                                fa-2x toggleIcon">
                                            </i>
                                        </button>
                                    @endif
                                </form>
                            </td>


                            <td class="text-center align-middle">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $user->id }}"
                                    data-id="{{ $user->id }}" onclick="updateUrl('{{ $user->id }}')">
                                    <i class="fa fa-cog fa-2x text-primary"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle{{ $user->id }}"><b>Update
                                                Role</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="userForm" action="{{ route('user.change.role') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="role{{ $user->id }}" class="col-form-label"></label>
                                                <select id="role{{ $user->id }}" name="role" class="form-control">
                                                    <option value="clerk" {{ $user->role == 'Clerk' ? 'selected' : '' }}>
                                                        Clerk
                                                    </option>
                                                    <option value="unithead"
                                                        {{ $user->role == 'Unithead' ? 'selected' : '' }}> Unit Head
                                                    </option>
                                                    <option value="user" {{ $user->role == 'User' ? 'selected' : '' }}>
                                                        User
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">  <i class="fa fa-times"></i> Close</button>
                                            <button type="submit" class="btn btn-success">  <i class="fa fa-check"></i> Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!-- END PAGE CONTENT-->
    <script>
        document.querySelectorAll('.userForm').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to change the role of this User?",
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


        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.permissionForm').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission
                    const formElement = this;
                    const actionUrl = formElement.action;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to toggle the download permission for this user?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, toggle it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request
                            $.ajax({
                                url: actionUrl,
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire(
                                            'Updated!',
                                            'The download permission has been toggled.',
                                            'success'
                                        );

                                        // Update the toggle icon dynamically
                                        const toggleIcon = formElement
                                            .querySelector('.toggleIcon');

                                        if (response.can_download) {
                                            toggleIcon.classList.remove(
                                                'fa-toggle-off',
                                                'text-danger');
                                            toggleIcon.classList.add(
                                                'fa-toggle-on',
                                                'text-primary');

                                        } else {
                                            toggleIcon.classList.remove(
                                                'fa-toggle-on',
                                                'text-primary');
                                            toggleIcon.classList.add(
                                                'fa-toggle-off',
                                                'text-danger');

                                        }
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'An error occurred while toggling the permission.',
                                            'error'
                                        );
                                    }
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred. Please try again later.',
                                        'error'
                                    );
                                    console.error('Error:', error);
                                }
                            });
                        }
                    });
                });
            });
        });
    </script>
@endsection
