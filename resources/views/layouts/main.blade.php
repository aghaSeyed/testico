<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/core.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/components.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/admin/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="/admin/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/admin/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/admin/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="/admin/js/core/app.js"></script>
    <script type="text/javascript" src="/admin/js/pages/dashboard.js"></script>
    <!-- /theme JS files -->
    @section('scripts')
        @show

</head>

<body>

<!-- Main navbar -->
<x-main-header :name="$name"/>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @if(\Illuminate\Support\Facades\Auth::guard('Teacher')->check())
            <x-teacher-sidebar/>
        @elseif(\Illuminate\Support\Facades\Auth::guard()->check())
            <x-student-sidebar/>
            @else
            <x-admin-sidebar/>
    @endif
    <!-- /main sidebar -->


        <!-- Main content -->
    @yield('content')
    <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
@section('scripts-bottom')
@show
</body>
</html>
