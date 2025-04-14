<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Palompon Intitute of Technology</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="icon" href="{{ asset('./assets/img/pit.png') }}" type="image/x-icon">
    <link href="{{ asset('./assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('./assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('./assets/vendors/DataTables/datatables.min.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.12.3/sweetalert2.css">
    <link href="{{ asset('./assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('./assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
        rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.12.3/sweetalert2.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('clerk.body.header')
        <!-- END HEADER-->

        <!-- START SIDEBAR-->
        @include('clerk.body.sidebar')
        <!-- END SIDEBAR-->

        <div class="content-wrapper">

            <!-- START PAGE CONTENT-->
            @yield('content')
            <!-- END PAGE CONTENT-->

            @include('clerk.body.footer')
        </div>
    </div>


    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->

    <script src="{{ asset('./assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('./assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('./assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.12.3/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="{{ asset('./assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function() {
                $('#complete').DataTable();
                $('#create').DataTable();
                $('#hero-table').DataTable();
            });

            $(document).ready(function() {
                var currentYear = new Date().getFullYear();

                $('#year').datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true,

                }).datepicker('setDate', new Date(currentYear, 0, 1));
            });
            $(document).ready(function() {
                var currentYear = new Date().getFullYear();

                $('#year_update').datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true,

                })
            });

            $(document).ready(function() {
                var currentDate = new Date();
                $('#start .input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    viewMode: "decade", // Starts at the decade level (decade view)
                    autoclose: true, // Allows full date selection after drilling down
                }).datepicker('setDate', (currentDate));
            });
            $(document).ready(function() {
                var currentDate = new Date();
                $('#end .input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    viewMode: "decade",
                    autoclose: true,
                }).datepicker('setDate', (currentDate));
            });

            // Update Status Date
            $(document).ready(function() {
                var currentDate = new Date();
                $('#start_update .input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    viewMode: "decade",
                    autoclose: true,
                })
            });
            $(document).ready(function() {
                var currentDate = new Date();
                $('#end_update .input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    viewMode: "decade",
                    autoclose: true,
                })
            });

        });
    </script>

</body>

</html>
