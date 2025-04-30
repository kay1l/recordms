@extends('admin.master')
@section('content')
    <style>
        .table-content {
            font-size: 0.95rem;
        }

        .badge {
            font-size: 0.90rem;
        }

        .thead {
            font-size: 0.99rem;
        }

        .select2-container--default .select2-selection--multiple {
            height: auto !important;
            min-height: 34px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-group .select2-container {
            width: 100% !important;
        }

        .input-group .select2-container .select2-selection--multiple {
            border-left: 0;
            border-radius: 0 4px 4px 0;
        }

        .name {
            display: block;
            width: 200px;
        }

        .code {
            font-size: 11px;
        }

        .period {
            font-size: 12px;
        }
    </style>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Activities Table</li>
        </ol>
    </nav>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $completeAct }}</h2>
                        <div class="m-b-5">ACCOMPLISHED ACTIVITIES</div><i class="fa fa-check widget-stat-icon"></i>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalAct }}</h2>
                        <div class="m-b-5">TOTAL ACTIVITIES</div><i class="fa fa-list widget-stat-icon"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">
                    <h2><b>Activities Table</b></h2>
                </div>
                <div class="form-group-sm text-right">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class=" fa fa-pencil"></i> Create Activity
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Fill Activity Details</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="activityForm" action="{{ route('admin.activity.store') }}" method="POST" class="actForm text-left">
                                        @csrf
                                        <div class="form-group-sm">
                                            <label><b>Activity Title</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-chart-line"></i></span>
                                                <input class="form-control input" type="text" placeholder=""
                                                    id="activity_name" name="activity_name" required>
                                            </div>
                                        </div>
                                        {{-- <div class="row"> --}}
                                        <div class="form-group-sm">
                                            <label for="collegeCode"><b>College</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                                <select class="form-control" id="collegeCode" name="collegeCode">
                                                    <option value="">---</option>
                                                    @foreach ($college as $col)
                                                        <option value="{{ $col->collegeCode }}">{{ $col->collegeName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" form-group-sm">
                                            <label for="proponentId"><b>Department</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                <select class="form-control" id="proponentId" name="proponentId">
                                                    <option value=""><b>---</b></option>
                                                    @foreach ($programs as $program)
                                                        <option value="{{ $program->programId }}">
                                                            {{ $program->programName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- </div> --}}
                                        <div class="form-group-sm">
                                            <label><b>College(s)/ Agency Involved</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                <!-- Replacing the input with a select element for Select2 -->
                                                <select class="form-control select2" id="proponent" name="proponent[]"
                                                    multiple="multiple">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group-sm">
                                            <label><b>Proponents</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                <!-- Replacing the input with a select element for Select2 -->
                                                <select class="form-control select2" id="proponents" name="proponents[]"
                                                    multiple="multiple">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4 form-group" id="start">
                                                <label class="font-normal"><b>Start Date</b></label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="start" class="form-control" type="text"
                                                        name="start">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-group" id="end">
                                                <label class="font-normal"><b>End Date</b></label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="end" class="form-control" type="text"
                                                        name="end">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label><b>Year</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input class="form-control input" type="text" id="year"
                                                        name="year">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label><b>Target no. of Partnership</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                    <!-- Icon for partnership -->
                                                    <input class="form-control input" type="number"
                                                        id="partnership_target" name="partnership_target">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label><b>Target no. of Attendees</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                    <!-- Icon for attendees -->
                                                    <input class="form-control input" type="number" id="trainees_target"
                                                        name="trainees_target">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-sm">
                                            <label><b>Budget(Php)</b></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa-solid fa-peso-sign"></i></i></span>
                                                <!-- Icon for budget -->
                                                <input class="form-control input" type="text" placeholder="₱"
                                                    id="budget" name="budget">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i
                                                    class="fas fa-times"></i> Cancel</button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-check"></i> Submit
                                            </button>
                                        </div>
                                    </form>
                                </div> <!-- Close modal-body -->
                            </div> <!-- Close modal-content -->
                        </div> <!-- Close modal-dialog -->
                    </div> <!-- Close modal -->

                    @foreach ($activity as $item)
                        <!-- Modal -->
                        <div class="modal fade" data-toggle="modal" id="exampleModalCenter2-{{ $item->activity_code }}"
                            tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenter2Title-{{ $item->activity_code }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalCenter2Title"><b>Update Activity
                                                Details</b>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="activity-form" action="{{ route('admin.activity.update', ['activityCode' => $item->activity_code]) }}" method="POST" class="actForm text-left">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group-sm">
                                                <label><b>Activity Title</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-chart-line"></i></span>
                                                    <input class="form-control input" type="text" id="activity_name"
                                                        name="activity_name" value="{{ $item->activity_name }}">
                                                </div>
                                            </div>
                                            {{-- <div class="row"> --}}
                                            <div class="form-group-sm">
                                                <label for="collegeCode"><b>College</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-university"></i></span>
                                                    <select class="form-control" id="collegeCode1" name="collegeCode1">
                                                        <option value="">---</option>
                                                        @foreach ($college as $col)
                                                            <option value="{{ $col->collegeCode }}"
                                                                {{ $col->collegeCode == $item->collegeCode ? 'selected' : '' }}>
                                                                {{ $col->collegeName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" form-group-sm">
                                                <label for="proponentId"><b>Department</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                                    <select class="form-control" id="proponentId1" name="proponentId1">
                                                        <option value=""><b>---</b></option>
                                                        @foreach ($programs as $program)
                                                            <option value="{{ $program->programId }}"
                                                                {{ $program->programId == $item->programId ? 'selected' : '' }}>
                                                                {{ $program->programName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- </div> --}}
                                            <div class="form-group-sm">
                                                <label><b>College(s)/Agency Involved</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                    <select class="form-control select2" id="proponent_update"
                                                        name="proponent_update[]" multiple="multiple">
                                                        @foreach (explode(',', $item->proponent) as $proponent)
                                                        <option value="{{ $proponent }}" selected>{{ $proponent }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group-sm">
                                                <label><b>Proponents</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                    <!-- Replacing the input with a select element for Select2 -->
                                                    <select class="form-control select2" id="proponents_update"
                                                        name="proponents_update[]" multiple="multiple">
                                                        @foreach (explode(',', $item->proponents) as $proponents)
                                                            <option value="{{ $proponents }}" selected>
                                                                {{ $proponent }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group" id="start_update">
                                                    <label class="font-normal"><b>Start Date</b></label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                        <input id="start_update" class="form-control" type="text"
                                                            name="start_update" value="{{ $item->start }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group" id="end_update">
                                                    <label class="font-normal"><b>End Date</b></label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                        <input id="end_update" class="form-control" type="text"
                                                            name="end_update" value="{{ $item->end }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label><b>Year</b></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                        <input class="form-control input" type="text" id="year_update"
                                                            name="year_update" value="{{ $item->year }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label><b>Target no. of Partnership</b></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                        <!-- Icon for partnership -->
                                                        <input class="form-control input" type="number"
                                                            id="partnership_target" name="partnership_target"
                                                            value="{{ $item->partnership_target }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label><b>Target no. of Attendees</b></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                        <!-- Icon for attendees -->
                                                        <input class="form-control input" type="number"
                                                            id="trainees_target" name="trainees_target"
                                                            value="{{ $item->trainees_target }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-sm">
                                                <label><b>Budget(Php)</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa-solid fa-peso-sign"></i></i></span>
                                                    <!-- Icon for budget -->
                                                    <input class="form-control input" type="text" placeholder="₱"
                                                        id="budget" name="budget" value="{{ $item->budget }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i
                                                        class="fas fa-times "></i> Cancel</button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-check"></i> Update
                                                </button>
                                            </div>
                                        </form>
                                    </div> <!-- Close modal-body -->
                                </div> <!-- Close modal-content -->
                            </div> <!-- Close modal-dialog -->
                        </div> <!-- Close modal -->
                    @endforeach

                </div> <!-- Close ibox-head -->
            </div> <!-- Close ibox -->

            <div class="ibox-body" >
                <div class="table-responsive" >
                    <div style="overflow-x: auto;">
                    <table   class="table table-bordered table-hover " id="create" cellspacing="0"
                        width="100%">
                        <thead class="thead" >
                            <tr>
                                <th>Activity Code</th>
                                <th>Activity Title</th>
                                <th>Implementation Period</th>
                                <th>Quarter</th>
                                <th>College</th>
                                <th>Department</th>
                                <th>Proponent</th>
                                <th>College(s)/ Agency Involved</th>
                                <th>Year</th>
                                <th>Budget (Php)</th>
                                <th>Remarks</th>
                                <th>Update</th>

                            </tr>
                        </thead>
                        <tbody class="table-content "  >

                            @forelse ($activities as $activity)

                                <tr >
                                    <td><span
                                            class="badge badge-success m-r-5 m-b-5 code">{{ $activity->activity_code }}</span>
                                    </td>
                                    <td class="name">{{ $activity->activity_name }}</td>
                                    <td><span
                                            class="badge badge-default m-r-5 m-b-5 period">{{ $activity->start->format('M Y') . ' - ' . $activity->end->format('M Y') }}</span>
                                    </td>

                                    <td>
                                        @if ($activity->quarter == '1')
                                            <span>1st Quarter</span>
                                        @elseif ($activity->quarter == '2')
                                            <span>2nd Quarter</span>
                                        @elseif ($activity->quarter == '3')
                                            <span>3rd Quarter</span>
                                        @elseif ($activity->quarter == '4')
                                            <span>4th Quarter</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                        $college = App\Models\College::where('collegeCode', $activity->collegeCode)->first();
                                    @endphp
                                    {{ $college->collegeName ?? 'Unknown College' }}

                                    </td>

                                    <td>
                                        @php
                                        $program = App\Models\Program::where('programId', $activity->proponentId)->first();
                                    @endphp
                                    {{ $program->programName ?? 'Unknown Program' }}

                                    </td>
                                    <td>
                                        @foreach (explode(',', $activity->proponents) as $prop)
                                            <span class="badge badge-default m-r-5 m-b-5">{{ trim($prop) }}</span>
                                            @if (!$loop->last)
                                                <span><b> </b></span> <!-- Add a comma except for the last item -->
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach (explode(',', $activity->proponent) as $proponent)
                                            <span class="badge badge-default m-r-5 m-b-5">{{ trim($proponent) }}</span>
                                            @if (!$loop->last)
                                                <span><b> </b></span> <!-- Add a comma except for the last item -->
                                            @endif
                                        @endforeach
                                    </td>

                                    <td><span class="badge badge-info m-r-5 m-b-5">{{ $activity->year }}</span></td>
                                    <td><span class="badge badge-secondary m-r-5 m-b-5">₱{{ $activity->budget }}</span>
                                    </td>
                                    <td>{{ $activity->status }}</td>

                                    <td class="text-center align-middle">
                                        <a href="#" data-toggle="modal"
                                            data-target="#exampleModalCenter2-{{ $activity->activity_code }}"
                                            data-id="{{ $activity->activity_code }}">
                                            <i class="fa-regular fa-pen-to-square fa-2x text-primary"></i>
                                        </a>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center text-muted">No activities to be displayed.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
            </div> <!-- Close ibox-body -->
        </div> <!-- Close page-content -->
    </div> <!-- Close page-content -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function () {

    $('#activityForm').submit(function (event) {
        event.preventDefault();  // Prevent the default form submission

        var formData = new FormData(this);

        var submitButton = $('button[type="submit"]');
        submitButton.prop('disabled', true);
        submitButton.html('<i class="fa fa-spinner fa-spin"></i> Submitting...');

        // Send the form data via AJAX
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire(
                        'Success!',
                        'The activity has been successfully submitted.',
                        'success'
                    );
                    $('#exampleModalCenter').modal('hide');

                    var newActivity = response.activity;
                    var newActivityRow = `
                <tr>
                    <td><span class="badge badge-success m-r-5 m-b-5 code">${newActivity.activity_code}</span></td>
                    <td class="name">${newActivity.activity_name}</td>
                    <td><span class="badge badge-default m-r-5 m-b-5 period">${newActivity.start} - ${newActivity.end}</span></td>
                    <td>
                        ${newActivity.quarter === '1' ? '1st Quarter' :
                          newActivity.quarter === '2' ? '2nd Quarter' :
                          newActivity.quarter === '3' ? '3rd Quarter' :
                          '4th Quarter'}
                    </td>
                    <td>${newActivity.collegeCode}</td>
                    <td>${newActivity.programId}</td>
                    <td>
                        ${newActivity.proponents.split(',').map(proponent =>
                            `<span class="badge badge-default m-r-5 m-b-5">${proponent.trim()}</span>`).join('')}
                    </td>
                    <td>
                        ${newActivity.proponent.split(',').map(proponent =>
                            `<span class="badge badge-default m-r-5 m-b-5">${proponent.trim()}</span>`).join('')}
                    </td>
                    <td><span class="badge badge-info m-r-5 m-b-5">${newActivity.year}</span></td>
                    <td><span class="badge badge-secondary m-r-5 m-b-5">₱${newActivity.budget}</span></td>
                    <td>${newActivity.status}</td>
                    <td class="text-center align-middle">
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter2-${newActivity.activity_code}" data-id="${newActivity.activity_code}">
                            <i class="fa-regular fa-pen-to-square fa-2x text-primary"></i>
                        </a>
                    </td>
                </tr>
            `;

            $('#create tbody').prepend(newActivityRow);

                } else {
                    Swal.fire(
                        'Warning!',
                        'Please ensure all required fields are completed before proceeding.',
                        'warning'
                    );
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Warning!',
                    'Please ensure all required fields are completed before proceeding.',
                    'warning'
                );
            },
            complete: function () {
                submitButton.prop('disabled', false);
                submitButton.html('<i class="fas fa-arrow-right"></i> Submit');
            }
        });
    });
});

            $(document).ready(function() {
                $('#collegeCode').change(function() {
                    var collegeCode = $(this).val();
                    if (collegeCode) {
                        $.ajax({
                            url: '/getProponentsdirector/' + collegeCode,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#proponentId').empty();
                                $('#proponentId').append(
                                    '<option value="">---</option>');
                                $.each(data, function(key, value) {
                                    $('#proponentId').append(
                                        '<option value="' +
                                        value.programId + '">' +
                                        value.programName +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('#proponentId').empty();
                        $('#proponentId').append('<option value="">---</option>');
                    }
                });
            });

            $(document).ready(function() {
                $('#collegeCode1').change(function() {
                    var collegeCode = $(this).val();
                    if (collegeCode) {
                        $.ajax({
                            url: '/getProponents/' + collegeCode,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#proponentId1').empty();
                                $('#proponentId1').append(
                                    '<option value="">---</option>');
                                $.each(data, function(key, value) {
                                    $('#proponentId1').append(
                                        '<option value="' +
                                        value.programId + '">' +
                                        value.programName +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('#proponentId1').empty();
                        $('#proponentId1').append('<option value="">---</option>');
                    }
                });
            });

            $(document).ready(function() {
                $('.select2').select2({
                    tags: true,
                });
                $('body').on('shown.bs.modal', '.modal', function() {

                    $(this).find('.select2').select2({
                        tags: true,
                    });
                });
            });
        });
    </script>
@endsection
