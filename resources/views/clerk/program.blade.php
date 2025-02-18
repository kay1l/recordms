@extends('clerk.master')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Programs Table</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Programs</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Programs</div>
                <div class="form-group-sm text-right">
                    <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        <i class="fa fa-plus"></i> Add Program
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Program</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('program.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group-sm row">
                                            <label class="col-sm-2 col-form-label"><b>Program Name</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="" id="programName"
                                                    name="programName">
                                            </div>
                                        </div>
                                        <div class="form-group-sm row">
                                            <label class="col-sm-2 col-form-label"><b>College Name</b></label>
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
                            <th>ProgramID</th>
                            <th>Program Name</th>
                            <th>College</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ProgramID</th>
                            <th>Program Name</th>
                            <th>College</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->programId }}</td>
                                <td>{{ $program->programName }}</td>
                                <td>{{ $program->college->collegeName }}</td>
                                <td> @if ($program->status == 'Active')
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5">{{ $program->status }}</span>
                                    @elseif($program->status == 'Inactive')
                                    <span class="badge badge-danger badge-pill m-r-5 m-b-5">{{ $program->status }}</span>
                                @endif 
                                <td>{{ $program->created_at }}</td>

                                <td>
                                    <button class="btn btn-info btn-circle-sm" data-toggle="modal"
                                        data-target="#actionModal_{{ $program->programId }}">
                                        <i class="fa fa-gear"></i></i></button>

                                    <div class="modal fade" id="actionModal_{{ $program->programId }}" tabindex="-1"
                                        role="dialog" aria-labelledby="actionModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('program.change.status', ['programId' => $program->programId]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="status" name="status">
                                                                <option value="">Change College Status</option>
                                                                <option value="Active"
                                                                    {{ $program->status == 'Active' ? 'selected' : '' }}>
                                                                    Active</option>
                                                                <option value="Inactive"
                                                                    {{ $program->status == 'Inactive' ? 'selected' : '' }}>
                                                                    Inactive</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group-sm row">

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

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
