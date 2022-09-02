<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="col-lg-12 col-12">
        <div class="card ribbon-box">
            <div class="card-body">
                @if ($expectedPay)
                    <div class="ribbon ribbon-success float-end"><i class="mdi mdi-cash me-1"></i>
                        Approx . {{ $expectedPay }} £</div>
                @endif
                <h5 class="float-start mt-0 mb-4">Shift Create Form</h5>
                <div class="ribbon-content">
                    <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-alarm-clock me-15"></i> Basic Information
                    </h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label">Title</label>
                            <input wire:model.lazy='shift.name'
                                class="form-control @error('shift.name') is-invalid @enderror" type="text"
                                placeholder="Enter Title">
                            @error('shift.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label">Hourly Rate</label>
                            <input wire:model.lazy='shift.hourly_rate'
                                class="form-control @error('shift.hourly_rate') is-invalid @enderror" type="number"
                                placeholder="In pounds £">
                            @error('shift.hourly_rate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label">Start Time</label>
                            <input wire:model.lazy='shift.start_time'
                                class="form-control @error('shift.start_time') is-invalid @enderror"
                                type="datetime-local">
                            @error('shift.start_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label">End Time</label>
                            <input wire:model.lazy='shift.end_time'
                                class="form-control @error('shift.end_time') is-invalid @enderror"
                                type="datetime-local">
                            @error('shift.end_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-1">
                            <label class="form-label">Description</label>
                            <textarea rows="5" placeholder="What the employee is supposed to do?" wire:model.lazy='shift.description'
                                class="form-control @error('shift.description') is-invalid @enderror"></textarea>
                            @error('shift.description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-user me-15"></i> Client Information
                        </h4>
                        <hr class="my-15">
                        <div class="col-md-6 mb-1">
                            <div class="form-group">
                                <label class="form-label">Client</label>
                                <select wire:model.lazy='shift.client_id'
                                    class="form-select @error('shift.client_id') is-invalid @enderror">
                                    <option value="">Select client</option>
                                    @forelse ($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->name }} ( {{ $client->email }} )
                                        </option>
                                    @empty
                                        <option value="">No client found.</option>
                                    @endforelse
                                </select>
                                @error('shift.client_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if ($clientData)
                            <div class="col-md-6 col-lg-6">
                                <a target="_blank" href="mailto:{{ $clientData['email'] }}"
                                    class="box box-body box-inverse box-primary" href="#">
                                    <div class="flexbox align-items-center">
                                        <div>
                                            <h6 class="mb-0">{{ $clientData['name'] }}</h6>
                                            <small class="text-white-70">Client</small>
                                        </div>
                                        <img class="avatar avatar-lg avatar-bordered"
                                            src="{{ asset('images/avatar/3.jpg') }}" alt="...">
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div> <!-- end card-body -->
            <div class="card-footer">
                <x-lv-btn functionName="store" btnText="Create Shift" />
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
