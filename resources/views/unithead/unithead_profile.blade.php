@extends('unithead.master')
@section('content')
    <!-- START PAGE CONTENT-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('unithead.dashboard') }}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{route('activities.Matrix')}}">Activities Matrix</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="ibox">
                    <div class="ibox-body text-center">
                        <div class="m-t-20">
                            <img class="wd-100 rounded-circle"
                                src="{{ !empty($unitData->photo) ? url('upload/admin_images/' . $unitData->photo) : url('upload/no_image.jpg') }}"
                                alt="profile">
                        </div>
                        <h5 class="font-strong m-b-10 m-t-10">{{ $unitData->name }}</h5>
                        <div class="m-b-20 text-muted">{{ $unitData->role }}
                            <h6 class="text-muted m-b-10 m-t-10">{{ $unitData->college->collegeName }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="ibox">
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-settings"></i>
                                    Update Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i>
                                    Update Password </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-1">
                                <form action="{{ route('unithead.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="ibox">
                                        <div class="ibox-head">
                                            <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Update
                                                Information</h5>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                            <div class="form-horizontal">

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="name" type="text"
                                                            placeholder="" value="{{ $unitData->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text"
                                                            placeholder="Email address" name="email"
                                                            value="{{ $unitData->email }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="photo"
                                                            id="image" aria-describedby="inputGroupFileAddon03"
                                                            aria-label="Upload">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10 ml-sm-auto">
                                                        <button class="btn btn-info" type="submit">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                        <form action="{{ route('unithead.password.update') }}" method="POST">
                            @csrf
                            <div class="ibox">
                                <div class="ibox-head">
                                    <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-edit"></i> Update Password</h5>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <div class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-5">
                                                <input class="form-control" name="oldpassword" type="password"
                                                    @error('oldpassword') is-invalid @enderror id="oldpassword"
                                                    autocomplete="off">
                                                @error('oldpassword')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-5">
                                                <input class="form-control" name="newpassword" type="password"
                                                    @error('newpassword') is-invalid @enderror id="newpassword"
                                                    autocomplete="off">
                                                @error('newpassword')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-5">
                                                <input class="form-control" name="confirmpassword" type="password"
                                                    placeholder="">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 ml-sm-auto">
                                                <button class="btn btn-info" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-3">
                <div class="row">
                    <div class="col-md-6" style="border-right: 1px solid #eee;">
                        <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Month Statistics
                        </h5>

                    </div>
                    <div class="col-md-6">
                        <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user-plus"></i> Latest Followers
                        </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
