<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Client Create Form</h4>
            </div>
            <!-- /.box-header -->
            <form class="form">
                <div class="box-body">
                    <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-user me-15"></i> Personal Information
                    </h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label">Name</label>
                            <input wire:model.lazy='client.name'
                                class="form-control @error('client.name') is-invalid @enderror" type="text"
                                placeholder="Enter Name">
                            @error('client.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label">Email Address</label>
                            <input wire:model.lazy='client.email'
                                class="form-control @error('client.email') is-invalid @enderror" type="email"
                                placeholder="Enter Email Address">
                            @error('client.email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label">City</label>
                            <input wire:model.lazy='client.city'
                                class="form-control @error('client.city') is-invalid @enderror" type="text"
                                placeholder="Enter City">
                            @error('client.city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select wire:model.lazy='client.gender'
                                    class="form-select @error('client.gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('client.gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Age</label>
                            <input wire:model.lazy='client.age'
                                class="form-control @error('client.age') is-invalid @enderror" type="number"
                                placeholder="Enter Age">
                            @error('client.age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input wire:model.lazy='client.phone_number'
                                class="form-control @error('client.phone_number') is-invalid @enderror" type="number"
                                placeholder="Enter Phone Number">
                            @error('client.phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <textarea rows="2" wire:model.lazy='client.address'
                                class="form-control @error('client.address') is-invalid @enderror" type="number" placeholder="Enter Address"></textarea>
                            @error('client.address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <x-lv-btn functionName="addClient" btnText="Add Client" />
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
