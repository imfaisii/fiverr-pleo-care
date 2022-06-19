@extends('layouts.auth.guest')
@section('content')
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="mb-10 fw-600 text-primary">New Password</h2>
                                <!-- Session Status -->
                                <x-auth-session-status class="mt-2 mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mt-2 mb-4" :errors="$errors" />
                            </div>
                            <div class="p-40">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="text-fade ti-email"></i></span>
                                            <input type="email" class="form-control ps-15 bg-transparent" name="email"
                                                :value="old('email', $request - > email)" placeholder="Email Address"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="text-fade ti-email"></i></span>
                                            <input type="password" class="form-control ps-15 bg-transparent" name="password"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="text-fade ti-email"></i></span>
                                            <input type="password" class="form-control ps-15 bg-transparent"
                                                name="password_confirmation" placeholder="Password Confirmation" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary w-p100 mt-10">Reset
                                                Password</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('extended-js')
    <script>
        $("form").submit(function(e) {
            $(this).find(':input[type=submit]').prop('disabled', true);
        });
    </script>
@endpush
