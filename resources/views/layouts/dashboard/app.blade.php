<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.dashboard.styles')
    @include('partials.toastr')

    @stack('extended-css')
</head>

<body class="fixed hold-transition light-skin sidebar-mini theme-primary">

    <div class="wrapper">
        <div id="loader"></div>

        <!-- header -->
        <x-partials.dashboard.header />

        <!-- side-bar -->
        <x-partials.dashboard.side-bar />

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Side panel -->
        <x-partials.dashboard.user-profile />

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    <!-- footer -->
    <x-partials.dashboard.footer />

    <!-- Page Content overlay -->
    @include('partials.dashboard.scripts')
    @stack('extended-js')
</body>

</html>
