<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Chall 1.2</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/uniform/css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/space.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body class="page-sidebar-fixed">

    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Sidebar -->

        @include('layout.sidebar')

        <!-- /Page Sidebar -->

        <!-- Page Content -->
        <div class="page-content">

            <!-- Page Header -->

            @include('layout.header')

            <!-- /Page Header -->

            <!-- Page Inner -->

            <div class="page-inner">
                @yield('content')
            </div>

            <!-- /Page Inner -->

        </div><!-- /Page Content -->
    </div><!-- /Page Container -->


    <!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/nvd3/nv.d3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/space.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui-modals.js') }}"></script>
    <script src="{{ asset('assets/js/pages/*') }}"></script>

</body>


</html>
