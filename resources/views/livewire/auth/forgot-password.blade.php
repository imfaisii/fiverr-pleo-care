<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center g-0">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="mb-10 fw-600 text-primary">Forgot Password ?</h2>
                            <!-- Session Status -->
                            <x-auth-session-status class="mt-2 mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mt-2 mb-4" :errors="$errors" />
                            <p class="mb-0 text-fade">Enter your email to reset your password.</p>
                        </div>
                        <div class="p-40">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i
                                                class="text-fade ti-email"></i></span>
                                        <input type="email" class="form-control ps-15 bg-transparent" name="email"
                                            :value="old('email')" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary w-p100 mt-10">Reset</button>
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
@push('extended-js')
    <script>
        $("form").submit(function(e) {
            $(this).find(':input[type=submit]').prop('disabled', true);
        });
    </script>
@endpush
