<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Employee Create Form</h4>
            </div>
            <!-- /.box-header -->
            <form class="form">
                <div class="box-body">
                    <h4 class="box-title text-primary mb-0"><i class="ti-save me-15"></i> Account Info</h4>
                    <hr class="my-15">
                    <form class="ps-3 pe-3" action="#">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input wire:model.lazy='account.name'
                                        class="form-control @error('account.name') is-invalid @enderror" type="text"
                                        placeholder="Employee Name">
                                    @error('account.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input wire:model.lazy='account.email'
                                        class="form-control @error('account.email') is-invalid @enderror" type="email"
                                        placeholder="john@deo.com">
                                    @error('account.email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input wire:model.lazy='account.password'
                                        class="form-control @error('account.password') is-invalid @enderror"
                                        type="password" placeholder="Enter your password">
                                    @error('account.password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mb-3 text-center">
                        </div> --}}
                    </form>
                    <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-user me-15"></i> Personal Information
                    </h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label">City</label>
                            <input wire:model.lazy='info.city'
                                class="form-control @error('info.city') is-invalid @enderror" type="text"
                                placeholder="Enter City">
                            @error('info.city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select wire:model.lazy='info.gender'
                                    class="form-select @error('info.gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('info.gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Age</label>
                            <input wire:model.lazy='info.age'
                                class="form-control @error('info.age') is-invalid @enderror" type="number"
                                placeholder="Enter Age">
                            @error('info.age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input wire:model.lazy='info.phone_number'
                                class="form-control @error('info.phone_number') is-invalid @enderror" type="number"
                                placeholder="Enter Phone Number">
                            @error('info.phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <textarea rows="2" wire:model.lazy='info.address' class="form-control @error('info.address') is-invalid @enderror"
                                type="number" placeholder="Enter Address"></textarea>
                            @error('info.address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <x-lv-btn functionName="createAccount" btnText="Create Account" />
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
