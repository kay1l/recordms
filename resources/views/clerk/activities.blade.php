@extends('clerk.master')

@section('content')
<style>
    .ibox {
        margin-top: 30px;
        min-height: 40vh;
        width:1000px;
    }
    
    .ibox-body {
        font-size: 20px;
    }
    
    .form-group-sm {
        margin-bottom: 10px;
        margin-left: 30px;
    }
    
    .form-inline {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }
    .container {
            
            display: flex;
            justify-content: center;          
        }
</style>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('clerk.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Activity Matrix</li>
    </ol>
  </nav>
<div class="container">
<div class="ibox ibox-success">
    <div class="ibox-head">
        <div class="ibox-title"></div>
        <div class="ibox-tools">
            <a class="ibox-collapse"><i class=""></i></a>
        </div>
    </div>
    <div class="ibox-body text-center">
       <h2> <b>Please Select Year and College</b></h2>
    </div>
    <form id="activityFormMatrix" action="{{ route('matrixResult.clerk') }}" method="GET" class="form-inline">
        @csrf
        <div class="form-group-sm mr-3">
            <label for="year"><b>Year</b></label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input class="form-control" type="text" id="year" name="year" placeholder="" style="width: 100px;">
        </div>
        </div>
        <div class="form-group-sm mr-3">
            <label for="collegeCode"><b> College</b></label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"></i></span>
            <select class="form-control" id="collegeCode" name="collegeCode" style="width: 300px;">
                <option value="">Select College</option>
                @foreach ($college as $college)
                    <option value="{{ $college->collegeCode }}">{{ $college->collegeName }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group-sm mr-3">
            <label for="collegeCode"><b> Departments</b></label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"></i></span>
            <select class="form-control" id="programId" name="programId" style="width: 300px;">
                <option value="">Select Department</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->programId }}">{{ $program->programName }}</option>
                @endforeach
            </select>   
        </div>
        </div>
        {{--  kuhaon ni human ka maam oruque --}}
        <button type="submit" class="btn btn-success">View Activity Matrix</button>
    </form>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $(document).ready(function() {
                    $('#collegeCode').change(function() {
                        var collegeCode = $(this).val();
                        if (collegeCode) {
                            $.ajax({
                                url: '/getProponents/' + collegeCode,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $('#programId').empty();
                                    $('#programId').append(
                                        '<option value="">---</option>');
                                    $.each(data, function(key, value) {
                                        $('#programId').append(
                                            '<option value="' +
                                            value.programId + '">' +
                                            value.programName +
                                            '</option>');
                                    });
                                }
                            });
                        } else {
                            $('#programId').empty();
                            $('#programId').append('<option value="">---</option>');
                        }
                    });
                });
    });
    
</script>

@endsection
