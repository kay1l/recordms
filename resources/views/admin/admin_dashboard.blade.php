@extends('admin.master')
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
    .stats-section {
        margin: 20px;
    }
    .stats-section h3 {
        font-size: 18px;
        margin-bottom: 20px;
    }
    .stats-section .card {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
<!-- START PAGE CONTENT-->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

    </ol>
  </nav>
<div class="container mt-5">
    <div class="welcome-box">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand text-white" href="#"></a>
        </nav>
        @if(Auth::check())
        <p>Welcome Mr./Mrs. <b>{{ Auth::user()->name }}</b> to the Admin Dashboard!</p>
        @else
        <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
        @endif

        <p>As an admin, you have the highest level of access in the system. Please ensure you monitor activities and update user statuses promptly. If you encounter any issues, please contact technical support. Remember to log out when you finish using the system.</p>

        <p>Thank you for your diligence in maintaining the system's integrity. Your efforts are crucial in ensuring a smooth experience for all users. If you need assistance, our support team is here to help.</p>

        <p>If you do not agree with these conditions, please log out.</p>

        <p>Have a productive day and God bless!</p>
    </div>




    {{-- <!-- Statistics Section -->
    <div class="stats-section">
        <h3>User Activity Statistics</h3>
        <div class="card">
            <canvas id="activityChart"></canvas>
        </div>
        <!-- Add more cards or charts as needed -->
    </div> --}}
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('activityChart').getContext('2d');
        var activityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($activityLabels),
                datasets: [{
                    label: 'Number of Activities',
                    data: @json($activityData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection



