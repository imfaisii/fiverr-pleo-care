<div>
    {{-- Stop trying to control. --}}
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add New Company</h4>
            </div>
            <!-- /.box-header -->
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="form">
                <div class="box-body">
                    <h4 class="mb-0 box-title text-primary"><i class="ti-bag me-15"></i>
                        Get information about Company
                    </h4>
                    <hr class="my-15">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Company ID/Number</label>
                            <input wire:model.lazy='companyId' type="text"
                                class="form-control mb-1 @error('companyId') is-invalid @enderror"
                                placeholder="PK221333">
                            @error('companyId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <x-lv-btn functionName="checkCompany" btnText="Check Status" />
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>

    <!-- Sign up Modal -->

    <div wire:ignore.self id="createCompanyModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mt-2 mb-4 text-center">
                        <a href="#" class="text-success">
                            <span>
                                <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';" src="{{ asset('images/logo-dark-text.png') }}" alt="" height="60">
                            </span>
                        </a>
                    </div>
                    <form class="ps-3 pe-3" action="#">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input wire:model.lazy='account.name'
                                class="form-control @error('account.name') is-invalid @enderror" type="text"
                                placeholder="Company Name" disabled>
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


    @if (!array_key_exists('errors', $companyData) && count($companyData) > 0)
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';" src="{{ asset('images/avatar/avatar-13.png') }}"
                        class="bg-light h-100 rounded-circle avatar-lg img-thumbnail" style="width:100px;"
                        alt="profile-image">

                    <h4 class="mt-2 mb-0">{{ $companyData['company_name'] }}</h4>
                    <button type="button"
                        class="mb-2 mr-2 btn btn-success btn-sm">{{ ucwords($companyData['company_status']) }}</button>
                    @if (!\App\Models\User::whereName($companyData['company_name'])->exists())
                        <button type="button" class="mb-2 btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#createCompanyModal">
                            Create Account
                        </button>
                    @else
                        <button type="button" class="mb-2 btn btn-success btn-sm">
                            Already Created
                        </button>
                    @endif
                </div>
                <div class="col-lg-12 col-12">
                    <div>
                        <div class="box-header with-border">
                            <h4 class="box-title">Company Details</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form">
                            <div class="box-body">
                                <h4 class="mb-0 box-title text-primary"><i class="ti-user me-15"></i> About Company</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Company Number</label>
                                            <input wire:model='companyData.company_number' type="text"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Date of creation</label>
                                            <input wire:model='companyData.date_of_creation' type="text"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Type</label>
                                            <input wire:model='companyData.type' type="text" class="form-control"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-20 mb-0 box-title text-primary"><i class="ti-envelope me-15"></i>
                                    Address
                                    Information
                                </h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Address Line 1</label>
                                            <input wire:model='companyData.registered_office_address.address_line_1'
                                                type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Postal Code</label>
                                            <input wire:model='companyData.registered_office_address.postal_code'
                                                type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Locality</label>
                                            <input wire:model='companyData.registered_office_address.locality'
                                                type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div> <!-- end card-body -->
        </div>
    @endif
</div>
