@extends('clerk.master')
@section('content')
    <style>
        .table-content {
            font-size: 0.95rem;
        }

        .badge {
            font-size: 0.80rem;
        }

        .thead {
            font-size: 0.99rem;
        }
        .select2-container--default .select2-selection--multiple {
            height: auto !important;
            min-height: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-group .select2-container {
            width: 100% !important;
            font-size: 14px;
        }

        .input-group .select2-container .select2-selection--multiple {
            border-left: 0;
            border-radius: 0 4px 4px 0;
        }
    </style>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accomplished Activities</li>
        </ol>
    </nav>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Accomplished Activities</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="complete" cellspacing="0" width="100%">
                    <thead class="thead">
                        <tr>
                            <th>Activity Code</th>
                            <th>Activity Name</th>
                            <th>Date Accomplished</th>
                            <th>College</th>
                            <th>Status</th>
                            <th>Manage</th>

                        </tr>
                    </thead>
                    <tbody class="table-content">
                        @foreach ($completeActs as $complete)
                            <tr>
                                <td class="text-center align-middle"><span
                                        class=" badge badge-success m-r-5 m-b-5">{{ $complete->activity_code }}</span></td>
                                <td class="text-center align-middle">{{ $complete->activity_name }}</td>
                                <td class="text-center align-middle"><span
                                        class="badge badge-default m-r-5 m-b-5">{{ $complete->updated_at->format('Y-m-d') }}</span>
                                </td>
                                <td class="text-center align-middle">{{ $complete->college->collegeName }}</td>
                                <td class="text-center align-middle"><span
                                        class="badge badge-success m-r-5 m-b-5"">{{ $complete->status }}</span></td>
                                <td class="text-center align-middle">
                                    {{-- @if ($complete->is_updated)
                                    <a href="#" class="disabled" aria-disabled="true" title="This activity is already updated">
                                        <i class="fa fa-edit fa-2x text-muted"></i> 
                                    </a>
                                    @else --}}
                                    <a href="#" class="" data-toggle="modal" data-target="#modal-{{ $complete->activity_code }}">
                                        <i class="fa fa-edit fa-2x"></i> 
                                    </a>
                                    {{-- @endif --}}
                                    <div class="modal fade" id="modal-{{ $complete->activity_code }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-{{ $complete->activity_code }}-Title">
                                                        <b>Please Complete the Form Below (Accomplished)</b> </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('submit.accomplished', ['activityCode' => $complete->activity_code]) }}"
                                                        method="POST" class="text-left">
                                                        @csrf
                                                        <div class="row">
                                                           
                                                            <div class="col-sm-9 form-group">
                                                                <label><b>No. of Partnerships</b></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-handshake-o"></i></span>
                                                                    <input type="number" class="form-control input"
                                                                        id="partnership_accomplished"
                                                                        name="partnership_accomplished" placeholder=" ">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9 form-group">
                                                                <label><b>Name of Active Partnerships</b></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-handshake-o"></i></span>
                                                                   <select class="form-control select2" multiple="multiple" name="partnership_name_accomplished[]" id="partnership_name_accomplished">
                                                                       
                                                                   </select>
                                                                        
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9 form-group">
                                                                <label><b>No. of Trainees</b></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-users"></i></span>
                                                                    <input type="number" class="form-control input"
                                                                        id="trainees_accomplished"
                                                                        name="trainees_accomplished" placeholder=" ">
                                                                </div>
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

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
       document.addEventListener('DOMContentLoaded', function() {
         $(document).ready(function() {
            $('.select2').select2({
                allowClear: true,
                tags: true 
            });
        });
    });
   </script>
    @endsection
