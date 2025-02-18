@extends('admin.master')
@section('content')
    <style>
        .modal-body {}
    </style>
    <!-- START PAGE CONTENT-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{route('activity.matrix')}}">Activities Matrix</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page">Colleges Table</li>
        </ol>
      </nav>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{$activeCollege}}</h2>
                        <div class="m-b-5">ACTIVE COLLEGES</div><i class="ti ti-book widget-stat-icon"></i>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{$inactiveCollege}}</h2>
                        <div class="m-b-5">INACTIVE COLLEGES</div><i class="ti ti-book widget-stat-icon"></i>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><h2><b>Colleges Table</b></h2></div>
                <div class="form-group-sm text-right">
                    <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" title="Add College"
                        data-target="#addCollegeModal">
                        <i class="fa fa-plus" ></i> Add College
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addCollegeModal" tabindex="-1" role="dialog"
                        aria-labelledby="addCollegeModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add College</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('college.store') }}" method="POST" >
                                        @csrf
                                        <div class="form-group-sm row">
                                            <label class="col-sm-2 col-form-label"><b>College Code</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="collegeCode"
                                                    name="collegeCode" value="{{ old('collegeCode') }}">
                                                @if ($errors->has('collegeCode'))
                                                    <span class="text-danger">{{ $errors->first('collegeCode') }}</span>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="form-group-sm row">
                                            <label class="col-sm-2 col-form-label"><b>College Name</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="collegeName"
                                                    name="collegeName" value="{{ old('collegeName') }}">
                                                   
                                                @if ($errors->has('collegeName'))
                                                    <span class="text-danger">{{ $errors->first('collegeName') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="college" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">College Code</th>
                            <th class="text-center align-middle">College Name</th>
                            <th class="text-center align-middle">Status</th>
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($colleges as $college)
                            <tr>
                                <td>{{ $college->collegeCode }}</td>
                                <td>{{ $college->collegeName }}</td>
                                <td class="text-center align-middle">
                                    @if ($college->status == 'Active')
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5">{{ $college->status }}</span>
                                @elseif($college->status == 'Inactive')
                                    <span class="badge badge-danger badge-pill m-r-5 m-b-5">{{ $college->status }}</span>
                                @endif
                                
                                    <!-- Toggle Form -->
                                    <form action="{{ route('college.update', $college->collegeCode) }}" method="POST" class="collegeForm d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-link text-primary" title="Toggle to change college Status">
                                            @if($college->status == 'Active')
                                            <i class="fa fa-toggle-on fa-2x"></i>
                                        @else
                                            <i class="fa fa-toggle-off fa-2x" style="color: rgb(241, 85, 85);"></i>
                                        @endif
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
      document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.collegeForm').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const formElement = this; // Reference the form element
            const actionUrl = formElement.action; // Get the form's action URL

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change the status of this college?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform AJAX request
                    $.ajax({
                        url: actionUrl, 
                        method: 'POST',
                        data: {
                            _token: '{{csrf_token()}}',
                            _method: 'PUT'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Updated!',
                                    'The college status has been changed.',
                                    'success'
                                );
                                const statusBadge = formElement.closest('tr').querySelector('.badge');
                                const icon = formElement.querySelector('i');

                                if (response.new_status === 'Active') {
                                    statusBadge.classList.remove('badge-danger', );
                                    statusBadge.classList.add('badge-success');
                                    statusBadge.textContent = 'Active';

                                    icon.classList.remove('fa-toggle-off', 'text-danger');
                                    icon.classList.add('fa-toggle-on', 'text-primary');
                                  
                                } else {
                                    statusBadge.classList.remove('badge-success');
                                    statusBadge.classList.add('badge-danger' );
                                    statusBadge.textContent = 'Inactive';

                                    icon.classList.remove('fa-toggle-on', 'text-primary');
                                    icon.classList.add('fa-toggle-off', 'text-danger');
                                 
                                }  
                                
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while updating the status.',
                                    'error'
                                );
                            }
                        },
                        error: function (xhr, status, error) {
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
    @if ($errors->any())
        <script>
            $(document).ready(function () {
                $('#addCollegeModal').modal('show');
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

@endsection
