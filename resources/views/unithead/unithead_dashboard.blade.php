@extends('unithead.master')
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
<!-- START PAGE CONTENT-->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('unithead.dashboard')}}">Dashboard</a></li>

    </ol>
  </nav>
<div class="container mt-5">
    <div class="welcome-box">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand text-white" href="#"></a>
        </nav>
        @if(Auth::check())
        <p>Hello Mr./Mrs. <b>{{ Auth::user()->name }}</b>! Welcome to the Unit head Dashboard.</p>
        @else
        <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
        @endif

        <p>As a unit head, you oversee the overall performance of your college. Ensure that tasks are being completed efficiently and monitor the progress regularly. If any issues arise, contact technical support immediately.</p>

        <p>Your leadership is crucial in maintaining the efficiency of our system. If you need any guidance, our support team is always ready to assist. Please remember to log out after completing your tasks.</p>

        <p>We appreciate your efforts and commitment. Have a productive day!</p>

</div>


@endsection