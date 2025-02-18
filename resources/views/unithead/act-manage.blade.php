@extends('unithead.master')
@section('content')
    <!-- START PAGE CONTENT-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('unithead.dashboard')}}">Dashboard</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{route('activities.Matrix')}}">Activities Matrix</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page"> Activity Target</li>
        </ol>
      </nav>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Activity Table</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="target" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Activity Code</th>
                            <th>Activity Name</th>
                            <th>Target No. of Partnership</th>
                            <th>Target No. of Trainees</th>
                            <th>Target Percentage of Beneficiaries</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td><span class=" badge badge-success m-r-5 m-b-5">{{ $report->activity_code }}</span></td>
                                <td class="text-center align-middle">{{ $report->activity->activity_name }}</td>
                                <td class="text-center align-middle">{{  $report->partnership_target  }}</td>
                                <td class="text-center align-middle">{{  $report->trainees_target  }}</td>
                                <td class="text-center align-middle">{{ $report->percentage_target  }}%</td>
                                <td class="text-center align-middle">
                                    @if (!$report->is_updated)
                                        
                                   
                                    <a href="#" class="text-info" data-toggle="modal" data-target="#actionModal_{{ $report->activity_code }}">
                                        <i class="fa fa-gear fa-2x"></i>
                                    </a>

                                    <div class="modal fade" id="actionModal_{{ $report->activity_code }}" tabindex="-1"
                                        role="dialog" aria-labelledby="actionModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Please Complete the Form Below</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('target.update', ['activityCode' => $report->activity_code]) }}" method="POST">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 form-label text-left" for="partnership_target"><b>Target no. of Partnership</b></label>
                                                            <input type="number" class="form-control-sm align-right" id="partnership_target" name="partnership_target" placeholder="{{ $report->partnership_target ?? '' }}">
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 form-label text-left" for="trainees_target"><b> Target no. of Trainees</b></label>
                                                            <input type="number" class="form-control-sm" id="trainees_target" name="trainees_target" placeholder="{{ $report->trainees_target ?? '' }}">
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 form-label text-left" for="percentage_target"><b> Target percentage of beneficiaries ratings</b></label>
                                                            <input type="number" class="form-control-sm" id="percentage_target" name="percentage_target" placeholder="{{ $report->percentage_target ?? '' }}">
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
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
