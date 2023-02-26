<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>{{ config('app.name') }} - Start Shift </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">

    @vite(['resources/js/app.js'])

</head>

<body class="hold-transition theme-primary bg-img"
    style="background-image: url({{ asset('images/auth-bg/bg-16.jpg') }})">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile px-20 pt-40 pb-0">
                                <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';"
                                    src="{{ asset('images/avatar/avatar-1.png') }}" alt="User Image"
                                    class="bg-light rounded-circle">
                                <h2 class="text-primary fw-600">
                                    {{ auth()->check() ? auth()->user()->name : 'Guest User' }}</h2>
                                <p class="mb-5 text-fade">
                                    You can start you session of this shift by pressing the button below.
                                </p>
                            </div>
                            <div class="px-40 pb-40 pt-20">
                                <form action="{{ route('shift.start') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="shift_id" value="{{ $shift_id }}">
                                    <input type="hidden" name="latitude">
                                    <input type="hidden" name="longitude">
                                    {{-- <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent">
                                                <i class="text-fade ti-lock"></i>
                                            </span>
                                            <input type="text" class="form-control ps-15 bg-transparent"
                                                placeholder="Shift ID or URL">
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <input name="check_type" type="radio" class="with-gap" id="radio_3"
                                                value="in" checked />
                                            <label for="radio_3" style="margin-right: 20px;">Check IN</label>
                                            <input name="check_type" type="radio" id="radio_4" class="with-gap"
                                                value="out" />
                                            <label for="radio_4">Check OUT</label>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary w-p100 mt-10">
                                                Check In
                                            </button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                @guest
                                    <div class="text-center">
                                        <p class="mt-15 mb-0 text-fade"> Or <a href="{{ route('login') }}"
                                                class="text-primary">Login </a>to the system and check in.
                                        </p>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('src/js/vendors.min.js') }}"></script>
    <script src="{{ asset('src/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>


    <script>
        const successCallback = (position) => {
            console.log("You can start your shift now.")
            $("[name='latitude']").val(position.coords.latitude)
            $("[name='longitude']").val(position.coords.longitude)
        };

        const errorCallback = (error) => {
            alert(error.message)
        };

        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    </script>
</body>

</html>
