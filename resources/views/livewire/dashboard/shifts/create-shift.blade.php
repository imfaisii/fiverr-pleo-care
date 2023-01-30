<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="col-lg-12 col-12">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="ribbon ribbon-success float-end"><i class="mdi mdi-link me-1"></i>
                    <a class="text-white" href="{{ route('shift.view', ['uuid' => $shift['uuid']]) }}" target="_blank">
                        Public URL . {{ route('shift.view', ['uuid' => $shift['uuid']]) }}
                    </a>
                </div>
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
                            <x-livewire.input property='shift.name' type="text" placeholder="Enter Title" />
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label">Job Role</label>
                            <select wire:model.lazy='shift.job_role_id'
                                class="form-select @error('shift.job_role_id') is-invalid @enderror">
                                <option value="">Select Job Role</option>
                                @forelse ($jobRoles as $jobRole)
                                    <option value="{{ $jobRole->id }}">
                                        {{ $jobRole->name }}
                                    </option>
                                @empty
                                    <option value="">No job role found.</option>
                                @endforelse
                            </select>
                            @error('shift.job_role_id')
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
                            <div wire:ignore>
                                <textarea id="editor" placeholder="What the employee is supposed to do?"></textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-user me-15"></i> Client Information
                        </h4>
                        <hr class="my-15">
                        <div class="@if ($clientData) col-md-6 @else col-md-12 @endif mb-1">
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
                                        <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';"
                                            class="avatar avatar-lg avatar-bordered"
                                            src="{{ asset('images/avatar/3.jpg') }}" alt="...">
                                    </div>
                                </a>
                            </div>
                        @endif

                        <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-credit-card me-15"></i> Address
                            Information
                        </h4>
                        <hr class="my-15">

                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <div class="form-group">
                                    <label for="address_address">Address</label>
                                    <input type="text" id="address-input" name="address_address"
                                        class="form-control map-input" value="Gujrat, Pakistan">
                                    <input type="hidden" name="address_latitude" id="address-latitude"
                                        value="32.596003" />
                                    <input type="hidden" name="address_longitude" id="address-longitude"
                                        value="74.0835607" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div wire:ignore id="address-map-container" style="width:100%;height:400px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div>
                        </div>

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


@push('extended-js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC7Z6nNR2uNFnYzKDJemCQSA4SK03JpiM&libraries=places&callback=initialize"
        async defer></script>

    <script src="{{ asset('js/app/shifts/map.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.editing.view.document.on('change:isFocused', (evt, data, isFocused) => {
                    if (!isFocused) @this.description = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

        // saving lat long to backend var
        function setBackendVars(long, lat, address) {
            @this.address_address = $("#address-input").val()
            @this.address_longitude = lat
            @this.address_longitude = long
        }
    </script>
@endpush
