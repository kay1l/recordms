@extends('admin.master')
@section('content')
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            font-size: 75%;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .file-name {
            display: block;
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 0.8em;
        }

        .ibox {
            margin-top: 30px;
        }

        .progress-bar {
            color: black;
            font-size: 11px;
        }

        .name {
            width: 200px;
            display: block;

        }
    </style>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('activities.matrix') }}">Activities Matrix</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $selectedCollegeName }} Matrix</li>
        </ol>
    </nav>
    <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">College: {{ $selectedCollegeName }} <br> Year: {{ $selectedYear }} <br> Department: {{$selectedProgramName}}
                </div>


            </div>
            <div class="ibox-body">
                <div style="overflow-x: auto; width: 100%;">
                    <table class="table table-bordered" style="width: 100%; table-layout: auto;">
                        <thead class="thead-default">
                            <tr>
                                <th>Activity Code</th>
                                <th>Activity Name</th>
                                <th>Implementation Period</th>
                                <th>Quarter</th>
                                <th>Memorandum of Agreement</th>
                                <th>Proposal</th>
                                <th>Terminal Report</th>
                                <th>Attendance</th>
                                <th>Evaluation</th>
                                <th>Progress</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td><span class="badge badge-success m-r-5 m-b-5">{{ $activity->activity_code }}</span>
                                    </td>
                                    <td class="name">
                                        {{ $activity->activity_name }}
                                    </td>

                                    <td><span
                                            class="badge badge-default m-r-5 m-b-5">{{ $activity->start->format('M d Y') . ' - ' . $activity->end->format('M d Y')  }} </span>
                                    </td>

                                    <td>@if ($activity->quarter == '1')
                                        <span>1st Quarter</span>
                                    @elseif ($activity->quarter == '2')
                                    <span>2nd Quarter</span>
                                    @elseif ($activity->quarter == '3')
                                    <span>3rd Quarter</span>
                                    @elseif ($activity->quarter == '4')
                                    <span>4th Quarter</span>
                                    @endif
                                </td>
                                    {{-- moa --}}
                                    <td>
                                        <span class="file-name" id="moa-file-name-{{ $activity->activity_code }}">
                                            @if ($activity->moa_uploaded)
                                                <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->moa_uploaded)]) }}"
                                                    target="_blank">
                                                    {{ basename($activity->moa_uploaded) }}
                                                </a>
                                            @else
                                                <span class="text-muted"> No file uploaded</span>
                                            @endif
                                        </span>
                                    </td>

                                    {{-- proposal --}}
                                    <td>
                                        <span class="file-name" id="proposal-file-name-{{ $activity->activity_code }}">
                                            @if ($activity->proposal_uploaded)
                                                <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->proposal_uploaded)]) }}"
                                                    target="_blank">
                                                    {{ basename($activity->proposal_uploaded) }}
                                                </a>
                                            @else
                                                <span class="text-muted">No file uploaded</span>
                                            @endif
                                        </span>
                                    </td>

                                    {{-- terminal --}}
                                    <td>
                                        <span class="file-name" id="terminal-file-name-{{ $activity->activity_code }}">
                                            @if ($activity->terminal_uploaded)
                                                <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->terminal_uploaded)]) }}"
                                                    target="_blank">
                                                    {{ basename($activity->terminal_uploaded) }}
                                                </a>
                                            @else
                                                <span class="text-muted">No file uploaded</span>
                                            @endif
                                        </span>
                                    </td>

                                    {{-- attendance --}}
                                    <td>
                                        <span class="file-name" id="attendance-file-name-{{ $activity->activity_code }}">
                                            @if ($activity->attendance_uploaded)
                                                <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->attendance_uploaded)]) }}"
                                                    target="_blank">
                                                    {{ basename($activity->attendance_uploaded) }}
                                                </a>
                                            @else
                                                <span class="text-muted">No file uploaded</span>
                                            @endif
                                        </span>
                                    </td>

                                    {{-- evaluation --}}
                                    <td>
                                        <span class="file-name" id="evaluation-file-name-{{ $activity->activity_code }}">
                                            @if ($activity->evaluation_uploaded)
                                                <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->evaluation_uploaded)]) }}"
                                                    target="_blank">
                                                    {{ basename($activity->evaluation_uploaded) }}
                                                </a>
                                            @else
                                                <span class="text-muted">No file uploaded</span>
                                            @endif
                                        </span>
                                    </td>


                                    <td>
                                        @php
                                            $progressClass = '';
                                            $progress = $activity->progress;
                                            if ($progress == 100) {
                                                $progressClass = 'bg-success';
                                            } elseif ($progress >= 60) {
                                                $progressClass = 'bg-warning';
                                            } elseif ($progress == 0) {
                                                $progressClass = 'bg-danger';
                                            }
                                        @endphp
                                        <div class="progress" data-activity-code="{{ $activity->activity_code }}">
                                            <div class="progress-bar {{ $progressClass }}" role="progressbar"
                                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"
                                                style="width:{{ $progress }}%"
                                                id="progress-bar-{{ $activity->activity_code }}">
                                                {{ $progress }}% Submitted
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('downloadPdf.admin', ['activityCode' => $activity->activity_code]) }}"
                                            class="">
                                            <i class="fa fa-download fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to fetch progress for each activity
            function fetchProgress(activityCode) {
                $.ajax({
                    url: '{{ url('/get-activities-progress') }}/' + activityCode,
                    type: 'GET',
                    success: function(response) {
                        var progress = parseFloat(response.progress);

                        var progressClass = '';
                        if (isNaN(progress)) {
                            progress = 0;
                        }

                        if (progress == 100) {
                            progressClass = 'bg-success';
                        } else if (progress >= 60) {
                            progressClass = 'bg-primary';
                        } else if (progress >= 40) {
                            progressClass = 'bg-warning';
                        } else {
                            progressClass = 'bg-danger';
                        }
                        var roundedProgress = Math.round(progress);
                        $('#progress-bar-' + activityCode).width(roundedProgress + '%').text(
                            roundedProgress + '% Complete');
                        $('#progress-bar-' + activityCode).removeClass(
                            'bg-success bg-primary bg-warning bg-danger').addClass(progressClass);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to fetch progress.');
                    }
                });
            }

            // Fetch progress for each activity on page load
            $('.progress').each(function() {
                var activityCode = $(this).attr('data-activity-code');
                fetchProgress(activityCode);
            });
        });
    </script>
@endsection
