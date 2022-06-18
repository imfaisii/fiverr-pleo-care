<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center g-0">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary fw-600">Let's Get Started</h2>
                            <p class="mb-0 text-fade">Sign in to continue to {{ config('app.name') }}.</p>
                        </div>
                        <div class="p-40">
                            <form>
                                <x-auth-validation-errors class="mt-2 mb-4" :errors="$errors" />
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i
                                                class="text-fade ti-user"></i></span>
                                        <input wire:model.lazy='user.email' type="email"
                                            class="form-control ps-15 bg-transparent @error('user.email') is-invalid @enderror"
                                            placeholder="Email Address">
                                    </div>
                                    @error('user.email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-transparent"><i
                                                class="text-fade ti-lock"></i></span>
                                        <input wire:model.lazy='user.password' type="password"
                                            class="form-control ps-15 bg-transparent @error('user.password') is-invalid @enderror"
                                            placeholder="Password">
                                    </div>
                                </div>
                                @error('user.password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" id="basic_checkbox_1">
                                            <label for="basic_checkbox_1">Remember Me</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="fog-pwd text-end">
                                            <a href="{{ route('password.request') }}"
                                                class="text-primary fw-500 hover-primary"><i class="ion ion-locked"></i>
                                                Forgot pwd?</a><br>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button wire:click.prevent="store" wire:loading.attr="disabled" type="submit"
                                            class="btn btn-primary w-p100 mt-10">SIGN IN
                                            <div wire:loading wire:target="store">
                                                <span class="spinner-border spinner-border-sm btn-spinner ml-2 mr-2"
                                                    role="status" aria-hidden="true"></span>
                                            </div>
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0 text-fade">Don't have an account? <a
                                        href="{{ route('register') }}" class="text-primary ms-5">Sign Up</a></p>
                            </div>

                            {{-- <div class="text-center">
                                <p class="mt-20 text-fade">- Sign With -</p>
                                <p class="gap-items-2 mb-0">
                                    <a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook-light"
                                        href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter-light"
                                        href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-instagram-light"
                                        href="#"><i class="fa fa-instagram"></i></a>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
