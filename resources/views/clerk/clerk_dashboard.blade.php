@extends('clerk.master')
@section('content')

<style>
    .welcome-box {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 0;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: 'Poppins', sans-serif;
    }
    .welcome-box .navbar {
        border-bottom: 1px solid #dee2e6;
    }
    .welcome-box p {
        margin: 20px;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
    }
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 40px; /* Ensure there's enough space for the timeline dots */
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
    .card {
        width: 320px;
        margin-top: 30px;
        overflow: hidden; /* Prevent content overflow */
    }
    .card-body {
        padding: 15px; /* Adjust padding for better content fit */
    }
    .card-header h6 {
        font-size: 16px;
    }
    .card-header small {
        font-size: 12px;
    }
    .timeline a {
        text-decoration: none;
        color: #007bff;
    }
    .timeline p {
        font-size: 14px;
        line-height: 1.5;
    }
</style>

<!-- START PAGE CONTENT-->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clerk.dashboard') }}">Dashboard</a></li>
    </ol>
</nav>

<div class="container mt-5">
    <div class="welcome-box">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand text-white" href="#"></a>
        </nav>
        @if(Auth::check())
        <p>Greetings, <b>{{ Auth::user()->name }}</b>! Welcome to the Clerk Dashboard.</p>
        @else
        <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
        @endif

        <p>As a clerk, you play a vital role in managing daily activities within the system. Please make sure to handle tasks efficiently and keep the data updated. If you need any assistance, reach out to our support team.</p>

        <p>Your contribution is important in maintaining the smooth operation of the system. If you face any challenges, do not hesitate to seek help. Remember to log out once you are done using the system.</p>

        <p>Thank you for your hard work and dedication. Have a wonderful day ahead!</p>
    </div>

    {{-- <div class="card">
        <div class="card-header">
            <h6 class="m-0">Latest Uploads</h6>
            <small class="text-muted"></small>
        </div>
        <div class="card-body">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <ul class="timeline">
                            @foreach($activities as $activity)
                                @if($activity->moa_uploaded_at)
                                    <li>
                                        <a href="#" class="float-right">{{ $activity->moa_uploaded_at->format('d M, Y H:i') }}</a>
                                        <p>MOA Uploaded for {{ $activity->activity_name }}</p>
                                    </li>
                                @endif
                                @if($activity->proposal_uploaded_at)
                                    <li>
                                        <a href="#" class="float-right">{{ $activity->proposal_uploaded_at->format('d M, Y H:i') }}</a>
                                        <p>Proposal Uploaded for {{ $activity->activity_name }}</p>
                                    </li>
                                @endif
                                @if($activity->attendance_uploaded_at)
                                    <li>
                                        <a href="#" class="float-right">{{ $activity->attendance_uploaded_at->format('d M, Y H:i') }}</a>
                                        <p>Attendance Uploaded for {{ $activity->activity_name }}</p>
                                    </li>
                                @endif
                                @if($activity->evaluation_uploaded_at)
                                    <li>
                                        <a href="#" class="float-right">{{ $activity->evaluation_uploaded_at->format('d M, Y H:i') }}</a>
                                        <p>Evaluation Uploaded for {{ $activity->activity_name }}</p>
                                    </li>
                                @endif
                                @if($activity->terminal_uploaded_at)
                                    <li>
                                        <a href="#" class="float-right">{{ $activity->terminal_uploaded_at->format('d M, Y H:i') }}</a>
                                        <p>Terminal Uploaded for {{ $activity->activity_name }}</p>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="text-muted mt-5 mb-5 text-center small">by : <a class="text-muted" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>
        </div>
    </div> --}}
</div>
@endsection
