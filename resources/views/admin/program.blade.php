@extends('admin.master')
@section('content')
    <!-- START PAGE CONTENT-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{route('activity.matrix')}}">Activities Matrix</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page">Programs Table</li>
        </ol>
      </nav>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><h2><b> Departments Table</b></h2></div>
                <div class="form-group-sm text-right">
                    <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        <i class="fa fa-plus"></i> Add Department
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('program.store') }}" method="POST" class="departmentForm">
                                        @csrf

                                        <div class="form-group-sm row">
                                            <label class="col-sm-3 col-form-label"><b>Department Name </b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="" id="programName"
                                                    name="programName">
                                            </div>
                                        </div>
                                        <div class="form-group-sm row">
                                            <label class="col-sm-3 col-form-label"><b>College </b></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="collegeCode" name="collegeCode">
                                                    <option value="">Select College</option>
                                                    @foreach ($colleges as $college)
                                                        <option value="{{ $college->collegeCode }}">
                                                            {{ $college->collegeName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
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
                <table class="table table-striped table-bordered table-hover" id="program" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            {{-- <th>Program No.</th> --}}
                            <th>Department </th>
                            <th>College</th>
                            <th>Status</th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                {{-- <td>{{ $program->programId }}</td> --}}
                                <td>{{ $program->programName }}</td>
                                <td>{{ $program->college->collegeName }}</td>



                                <td class="text-center align-middle">
                                    <!-- Status Badge -->
                                    @if ($program->status == 'Active')
                                        <span class="badge badge-success badge-pill m-r-5 m-b-5">{{ $program->status }}</span>
                                    @elseif($program->status == 'Inactive')
                                        <span class="badge badge-danger badge-pill m-r-5 m-b-5">{{ $program->status }}</span>
                                    @endif

                                    <!-- Toggle Button -->
                                    <form action="{{ route('program.update', $program->programId) }}" method="POST" class="programForm d-inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-link text-primary">
                                            @if($program->status == 'Active')
                                                <i class="fa fa-toggle-on fa-2x"></i>
                                            @else
                                                <i class="fa fa-toggle-off fa-2x" style="color: rgb(241, 85, 85);"></i>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                {{-- <td> <span class="badge badge-default badge-pill m-r-5 m-b-5">{{ $program->created_at->format('Y-m-d') }}</span></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.programForm').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const formElement = this;
            const actionUrl = formElement.action;

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
                    // Perform the AJAX request
                    $.ajax({
                        url: actionUrl,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'PUT'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Updated!',
                                    'The program status has been changed.',
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

@endsection
