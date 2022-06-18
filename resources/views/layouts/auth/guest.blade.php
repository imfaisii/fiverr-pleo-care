<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.guest.styles')
    @include('partials.toastr')

    @stack('extended-css')
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(../../../images/auth-bg/bg-16.jpg)">

    @yield('content')

    @include('partials.guest.scripts')
    @stack('extended-js')
</body>

</html>
