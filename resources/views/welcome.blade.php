<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>{{ config('app.name') }} - Coming soon </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">

</head>

<body class="hold-transition dark-skin bg-img theme-primary"
    style="background-image: url({{ asset('images/auth-bg/bg-15.png') }}); background-repeat: repeat-y; background-position: bottom right;">

    <div class="container h-p100">
        <div class="row justify-content-md-center align-items-center h-p100">
            <div class="col-md-8 col-12">
                <div class="box box-transparent no-border no-shadow">
                    <div class="box-body text-center">
                        <img src="{{ asset('images/logo-light-text4.png') }}" class="mb-20" alt="" />
                        <h1 class="mt-20 fs-60 text-white">Coming Soon</h1>

                        {{-- <h3 class="mb-20 text-fade">Next generation of frameworks for admin design</h3> --}}

                        <p class="gap-items-2 mb-35">
                            <a class="btn btn-social-icon btn-facebook" href="#"><i
                                    class="fa fa-facebook"></i></a>
                            <a class="btn btn-social-icon btn-google" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social-icon btn-instagram" href="#"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="btn btn-social-icon btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                        </p>
                        <!--timer-->
                        <div class="examples">
                            <div id="countdown-dark" class="row justify-content-md-center text-white"></div>
                        </div>
                        <!--//timer-->
                        <div class="flexbox justify-content-center">
                            <button type="button" class="btn btn-primary-light btn-md mb-5" data-bs-toggle="modal"
                                data-bs-target="#modal-center"><i class="mdi mdi-send"></i> Notify Me </button>
                            <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-md mb-5"><i
                                    class="mdi mdi-search-web"></i> Login Here </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h2>Subscribe Us</h2>
                    <p>Be the first to know when our site is ready</p>
                    <form class="mx-auto flexbox w-p75 mb-30" method="post" action="">
                        <input type="text" class="form-control rounded" name="EMAIL"
                            placeholder="Enter email address">
                        <button class="btn btn-danger text-nowrap" type="submit">Notify me</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->




    <!-- Vendor JS -->
    <script src="{{ asset('src/js/vendors.min.js') }}"></script>
    <script src="{{ asset('src/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

    <!-- EmployX App -->
    <script src="{{ asset('src/js/pages/coundown-timer.js') }}"></script>


</body>

</html>
