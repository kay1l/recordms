@extends('admin.master')

@section('content')
<style>
    .ibox {
        margin-top: 30px;
        min-height: 40vh;
        width: 1000px;
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
    .container{
        display: flex;
        justify-content: center; 
    }
</style>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
      {{-- <li class="breadcrumb-item"><a href="{{route('activity.matrix')}}">Activities Matrix</a></li> --}}
      <li class="breadcrumb-item active" aria-current="page">Select Year</li>
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
        <h2> <b> Select Year</b></h2>
    </div>
    <form action="{{ route('overview.result' )}}" method="GET" class="form-inline">
        @csrf
        <div class="form-group-sm mr-3">
            <label for="year"><b>Year</b></label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input class="form-control" type="text" id="year" name="year" placeholder="" style="width: 100px;">
        </div>
        </div>
        <button type="submit" class="btn btn-success">View Activities</button>
    </form>
</div>
</div>

@endsection
