<div>
    <div class="row">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Managers Table</h5>
                    <button type="button" class="mb-2 btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#createManagerModal">
                        Create Account
                    </button>
                </div>
                <div class="card-body">
                    <livewire:tables.managers-table />
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self id="createManagerModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mt-2 mb-4 text-center">
                        <a href="#" class="text-success">
                            <span>
                                <img src="{{ asset('images/logo-dark-text.png') }}" alt="" height="60">
                            </span>
                        </a>
                    </div>
                    <form class="ps-3 pe-3" action="#">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input wire:model.lazy='account.name'
                                class="form-control @error('account.name') is-invalid @enderror" type="text"
                                placeholder="Manager Name">
                            @error('account.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input wire:model.lazy='account.email'
                                class="form-control @error('account.email') is-invalid @enderror" type="email"
                                placeholder="john@deo.com">
                            @error('account.email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input wire:model.lazy='account.password'
                                class="form-control @error('account.password') is-invalid @enderror" type="password"
                                placeholder="Enter your password">
                            @error('account.password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <x-lv-btn functionName="createAccount" btnText="Create Account" />
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
