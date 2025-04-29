
@extends('admin.master')
@section('content')
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
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
            font-weight: 700;
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

        .btn-upload {
            width: 80px;
            padding: 5px;
            font-size: 12px;
        }

        .file-input {
            display: none;
        }

        .progress-bar {
            color: black;
            font-size: 11px;
        }

        .name {
            display: block;
            width: 200px;
        }
    </style>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('activity.matrix') }}">Activities Matrix</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $selectedCollegeName }} Matrix</li>
        </ol>
    </nav>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"> College: {{ $selectedCollegeName }} <br> Year: {{ $selectedYear }} </div>
                <div class="ibox-title text-left">Department : {{ $selectedProgramName }} </div>
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
                                <th>Memorandum of Aggrement</th>
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
                                    <td class="name">{{ $activity->activity_name }}</td>
                                    <td><span
                                            class="badge badge-default m-r-5 m-b-5">{{ $activity->start->format('M d Y') . ' - ' . $activity->end->format('M d Y') }}
                                        </span>
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

                                    {{-- moa --}}
                                    <td>

                                        <button type="button"
                                            class="btn m-r-5 btn-upload
                                        {{ $activity->moa_uploaded ? 'd-none' : 'btn-info' }}"
                                            data-toggle="modal" data-target="#uploadModal"
                                            data-activity-code="{{ $activity->activity_code }}" data-file-type="moa">
                                            <span class="active-hidden">
                                                <i
                                                    class="fa {{ $activity->moa_uploaded ? 'fa-cloud-upload' : 'fa-cloud-upload' }}"></i>
                                                {{ $activity->moa_uploaded ? 'Reupload' : 'Upload' }}
                                            </span>
                                            <span class="active-visible" style="display: none;">
                                                <i class="fa fa-check"></i>
                                            </span>
                                        </button>


                                        <span class="file-name" id="moa-file-name-{{ $activity->activity_code }}">
                                            @if ($activity->moa_uploaded)
                                                <a href="javascript:void(0);"
                                                    class="text-center align-middle text-danger m-l-5 btn-clear"
                                                    data-activity-code="{{ $activity->activity_code }}"
                                                    data-file-type="moa" style="font-size: 1.5em;">
                                                    &times;
                                                </a>
                                                <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->moa_uploaded)]) }}"
                                                    target="_blank">
                                                    {{ basename($activity->moa_uploaded) }}
                                                </a>
                                            @else
                                                <span class="text-muted">No file uploaded</span>
                                            @endif

                                        </span>

                                    </td>

                                    {{-- proposal --}}
                                    <td>
                                        @if ($activity->moa_uploaded)
                                            <button type="button"
                                                class="btn m-r-5 btn-upload
                                        {{ $activity->proposal_uploaded ? 'd-none' : 'btn-info' }}"
                                                data-toggle="modal" data-target="#uploadModal"
                                                data-activity-code="{{ $activity->activity_code }}"
                                                data-file-type="proposal">
                                                <span class="active-hidden">
                                                    <i
                                                        class="fa {{ $activity->proposal_uploaded ? 'fa-cloud-upload' : 'fa-cloud-upload' }}"></i>
                                                    {{ $activity->proposal_uploaded ? 'Reupload' : 'Upload' }}
                                                </span>
                                                <span class="active-visible" style="display: none;">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </button>

                                            <span class="file-name" id="proposal-file-name-{{ $activity->activity_code }}">
                                                @if ($activity->proposal_uploaded)
                                                    <a href="javascript:void(0);"
                                                        class="text-center align-middle text-danger m-l-5 btn-clear"
                                                        data-activity-code="{{ $activity->activity_code }}"
                                                        data-file-type="proposal" style="font-size: 1.5em;">
                                                        &times;
                                                    </a>
                                                    <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->proposal_uploaded)]) }}"
                                                        target="_blank">
                                                        {{ basename($activity->proposal_uploaded) }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">No file uploaded</span>
                                                @endif
                                            </span>
                                        @endif
                                    </td>

                                    {{-- terminal --}}
                                    <td>
                                        @if ($activity->proposal_uploaded)
                                            <button type="button"
                                                class="btn m-r-5 btn-upload
                                    {{ $activity->terminal_uploaded ? 'd-none' : 'btn-info' }}"
                                                data-toggle="modal" data-target="#uploadModal"
                                                data-activity-code="{{ $activity->activity_code }}"
                                                data-file-type="terminal">
                                                <span class="active-hidden">
                                                    <i
                                                        class="fa {{ $activity->terminal_uploaded ? 'fa-cloud-upload' : 'fa-cloud-upload' }}"></i>
                                                    {{ $activity->terminal_uploaded ? 'Reupload' : 'Upload' }}
                                                </span>
                                                <span class="active-visible" style="display: none;">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </button>
                                            <span class="file-name" id="terminal-file-name-{{ $activity->activity_code }}">
                                                @if ($activity->terminal_uploaded)
                                                    <a href="javascript:void(0);"
                                                        class="text-center align-middle text-danger m-l-5 btn-clear"
                                                        data-activity-code="{{ $activity->activity_code }}"
                                                        data-file-type="terminal" style="font-size: 1.5em;">
                                                        &times;
                                                    </a>
                                                    <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->terminal_uploaded)]) }}"
                                                        target="_blank">
                                                        {{ basename($activity->terminal_uploaded) }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">No file uploaded</span>
                                                @endif
                                            </span>
                                        @endif
                                    </td>

                                    {{-- attendance --}}
                                    <td>
                                        @if ($activity->terminal_uploaded)
                                            <button type="button"
                                                class="btn m-r-5 btn-upload {{ $activity->attendance_uploaded ? 'd-none' : 'btn-info' }}"
                                                data-toggle="modal" data-target="#uploadModal"
                                                data-activity-code="{{ $activity->activity_code }}"
                                                data-file-type="attendance">
                                                <span class="active-hidden">
                                                    <i
                                                        class="fa {{ $activity->attendance_uploaded ? 'fa-cloud-upload' : 'fa-cloud-upload' }}"></i>
                                                    {{ $activity->attendance_uploaded ? 'Reupload' : 'Upload' }}
                                                </span>
                                                <span class="active-visible" style="display: none;">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </button>

                                            <span class="file-name"
                                                id="attendance-file-name-{{ $activity->activity_code }}">
                                                @if ($activity->attendance_uploaded)
                                                    <a href="javascript:void(0);"
                                                        class="text-center align-middle text-danger m-l-5 btn-clear"
                                                        data-activity-code="{{ $activity->activity_code }}"
                                                        data-file-type="attendance" style="font-size: 1.5em;">
                                                        &times;
                                                    </a>
                                                    <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->attendance_uploaded)]) }}"
                                                        target="_blank">
                                                        {{ basename($activity->attendance_uploaded) }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">No file uploaded</span>
                                                @endif
                                            </span>
                                        @endif
                                    </td>


                                    {{-- evaluation --}}
                                    <td>
                                        @if ($activity->attendance_uploaded)
                                            <button type="button"
                                                class="btn m-r-5 btn-upload
                                    {{ $activity->evaluation_uploaded ? 'd-none' : 'btn-info' }}"
                                                data-toggle="modal" data-target="#uploadModal"
                                                data-activity-code="{{ $activity->activity_code }}"
                                                data-file-type="evaluation">
                                                <span class="active-hidden">
                                                    <i
                                                        class="fa {{ $activity->evaluation_uploaded ? 'fa-cloud-upload' : 'fa-cloud-upload' }}"></i>
                                                    {{ $activity->evaluation_uploaded ? 'Reupload' : 'Upload' }}
                                                </span>
                                                <span class="active-visible" style="display: none;">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </button>

                                            <span class="file-name"
                                                id="evaluation-file-name-{{ $activity->activity_code }}">
                                                @if ($activity->evaluation_uploaded)
                                                    <a href="javascript:void(0);"
                                                        class="text-center align-middle text-danger m-l-5 btn-clear"
                                                        data-activity-code="{{ $activity->activity_code }}"
                                                        data-file-type="evaluation" style="font-size: 1.5em;">
                                                        &times;
                                                    </a>
                                                    <a href="{{ route('file.download.admin', ['filePath' => base64_encode($activity->evaluation_uploaded)]) }}"
                                                        target="_blank">
                                                        {{ basename($activity->evaluation_uploaded) }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">No file uploaded</span>
                                                @endif
                                            </span>
                                        @endif
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
                                                aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                aria-valuemax="100" style="width:{{ $progress }}%"
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
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel"> <i class=" fa fa-cloud-upload fa-2x "></i><b> Upload
                            Files</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-upload-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="activityCode" id="modal-activity-code">
                        <input type="hidden" name="fileType" id="modal-file-type">
                        <div class="form-group">
                            <label for="modal-file-input"></label>
                            <input type="file" class="form-control" id="modal-file-input" name="file"
                                accept=".pdf" multiple>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                    <button type="button" class="btn btn-success" id="upload-file-btn" onclick="submitModalForm()">
                        <i class="fa fa-upload"></i> Upload
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.dispatchEvent(new CustomEvent('uploadSuccess', {
                detail: {
                    activityCode: 'activityCode',
                    fileType: 'fileType',
                    filePath: 'filePath'
                }
            }));

            function fetchProgress(activityCode) {
                $.ajax({
                    url: '{{ url('/get-activities/admin/progress') }}/' + activityCode,
                    type: 'GET',
                    success: function(response) {
                        var progress = parseFloat(response.progress);
                        var progressClass = '';

                        if (progress == 100) {
                            progressClass = 'bg-success';
                        } else if (progress >= 60) {
                            progressClass = 'bg-primary';
                        } else if (progress >= 40) {
                            progressClass = 'bg-warning';
                        } else {
                            progressClass = 'bg-danger';
                        }
                        console.log(progress)
                        var roundedProgress = Math.round(progress);
                        $('#progress-bar-' + activityCode).width(roundedProgress + '%').text(
                            roundedProgress + '% Complete');
                        $('#progress-bar-' + activityCode).removeClass(
                            'bg-success bg-primary bg-danger').addClass(progressClass);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to fetch progress.');
                    }
                });
            }

            function updateButtonAndFileName(activityCode, fileType, filePath) {
                console.log('Updating button for activityCode:', activityCode, 'fileType:', fileType, 'filePath:',
                    filePath);

                var button = $(`button[data-activity-code="${activityCode}"][data-file-type="${fileType}"]`);
                console.log('Button:', button);

                if (button.length) {
                    button.hide();
                }

                var fileNameSpan = $(`#${fileType}-file-name-${activityCode}`);
                console.log('File Name Span:', fileNameSpan);

                if (fileNameSpan.length) {
                    var fileNameHtml = `<a href="${filePath}" target="_blank">${filePath.split('/').pop()}</a>`;
                    fileNameSpan.html(fileNameHtml);
                }

                var nextFileType = getNextFileType(fileType);
                console.log('Next File Type:', nextFileType);

                if (nextFileType) {
                    var nextButton = $(
                        `button[data-activity-code="${activityCode}"][data-file-type="${nextFileType}"]`);
                    console.log('Next Button:', nextButton);

                    if (nextButton.length) {
                        nextButton.removeClass('btn-info');
                        nextButton.prop('disabled', false);
                    }
                }
            }

            function getNextFileType(fileType) {
                switch (fileType) {
                    case 'moa':
                        return 'proposal';
                    case 'proposal':
                        return 'attendance';
                    case 'attendance':
                        return 'evaluation';
                    case 'evaluation':
                        return 'terminal';
                    default:
                        return null;
                }
            }

            $(document).on('uploadSuccess', function(event, data) {
                updateButtonAndFileName(data.activityCode, data.fileType, data.filePath);
                fetchProgress(data.activityCode);
            });
            $('#uploadModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var activityCode = button.data('activity-code');
                var fileType = button.data('file-type');

                var modal = $(this);
                modal.find('#modal-activity-code').val(activityCode);
                modal.find('#modal-file-type').val(fileType);
                $('#modal-upload-form').attr('action', '{{ url('/uploadFileMatrix/admin') }}/' + activityCode);
            });

            window.submitModalForm = function() {
                var form = document.getElementById('modal-upload-form');
                var formData = new FormData(form);
                var file = document.getElementById('modal-file-input');


                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 100;
                                $('#progress-bar-' + formData.get('activityCode')).width(
                                    percentComplete + '%').text(percentComplete.toFixed(
                                    2) + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        console.log('Upload success response:', response);
                        var activityCode = formData.get('activityCode');
                        var fileType = formData.get('fileType');
                        var filePath = response.filePath;

                        var progress = parseFloat(response.progress);
                        var roundedProgress = Math.round(progress);


                        $('#progress-bar-' + activityCode).width(roundedProgress + '%').text(
                            roundedProgress + '% Complete');

                        if (response.status === 'Completed') {
                            $('#updated-at-' + activityCode).html(
                                `<span class="badge badge-default">${response.updatedAt}</span>`
                            );
                        }

                        var progressClass = '';
                        if (progress == 100) {
                            progressClass = 'bg-success';
                        } else if (progress >= 60) {
                            progressClass = 'bg-primary';
                        } else if (progress >= 20) {
                            progressClass = 'bg-warning';
                        } else {
                            progressClass = 'bg-danger';
                        }

                        $('#progress-bar-' + activityCode).removeClass(
                            'bg-success bg-primary bg-danger').addClass(progressClass);

                        $(document).trigger('uploadSuccess', {
                            activityCode: activityCode,
                            fileType: fileType,
                            filePath: filePath,
                        });

                        $('#uploadModal').modal('hide');
                        form.reset();

                        setTimeout(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('File upload failed!');
                    }
                });
            };

            $('.progress').each(function() {
                var activityCode = $(this).attr('data-activity-code');
                fetchProgress(activityCode);
            });

            $(document).on('click', '.btn-clear', function() {
                var activityCode = $(this).data('activity-code');
                var fileType = $(this).data('file-type');

                $.ajax({
                    url: '{{ route('file.clear.admin') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        activityCode: activityCode,
                        fileType: fileType
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the UI
                            $(`#${fileType}-file-name-${activityCode}`).html(
                                '<span class="text-muted">No file uploaded</span>');
                            $(`button[data-activity-code="${activityCode}"][data-file-type="${fileType}"]`)
                                .removeClass('d-none');


                        } else {
                            alert('Failed to clear the file.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('An error occurred while clearing the file.');
                    }
                });
            });

        });
    </script>
@endsection
