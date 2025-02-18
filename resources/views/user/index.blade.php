@extends('user.master')
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
</style>

<div class="container mt-5">
    <div class="welcome-box">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand text-white" href="#"></a>
        </nav>
        @if(Auth::check())
        <p>Welcome Mr./Mrs. <b>{{ Auth::user()->name }}</b> to your Page!</p>
    @else
        <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
    @endif

    <p>Please note that all activities are closely monitored. If you encounter any issues, please contact the System Administrator. Remember to log out when you finish using the system.</p>

    <p>Thank you for your patience. The admin will update your status soon. Once updated, you will have access to additional features based on your role permitted by the admin. If you need assistance, our support team is here to help.</p>
    
    <p>If you do not agree with these conditions, please log out.</p>
    
    <p>Have a productive day and God bless!</p>
    
        
    </div>
</div>
@endsection
