<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="col-lg-12 col-12">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="ribbon ribbon-success float-end"><i class="mdi mdi-link me-1"></i>
                    <a class="text-white" href="{{ config('app.shift_url') . '/' . $shift['uuid'] }}" target="_blank">
                        Public URL . {{ config('app.shift_url') . '/' . $shift['uuid'] }}
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
                            <input wire:model.lazy='shift.name'
                                class="form-control @error('shift.name') is-invalid @enderror" type="text"
                                placeholder="Enter Title">
                            @error('shift.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                            <textarea rows="5" placeholder="What the employee is supposed to do?" wire:model.lazy='shift.description'
                                class="form-control @error('shift.description') is-invalid @enderror"></textarea>
                            @error('shift.description')
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
                                        <img class="avatar avatar-lg avatar-bordered"
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
                                {{-- @error(['shift.address_address', 'shift.address_latitude', 'shift.address_longitude'])
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
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
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initialize" async defer></script>

    <script>
        function initialize() {

            $('form').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            const locationInputs = document.getElementsByClassName("map-input");

            const autocompletes = [];
            const geocoder = new google.maps.Geocoder;
            for (let i = 0; i < locationInputs.length; i++) {

                const input = locationInputs[i];
                const fieldKey = input.id.replace("-input", "");
                const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(
                    fieldKey + "-longitude").value != '';

                const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
                const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {
                        lat: latitude,
                        lng: longitude
                    },
                    zoom: 13
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {
                        lat: latitude,
                        lng: longitude
                    },
                });

                marker.setVisible(isEdit);

                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.key = fieldKey;
                autocompletes.push({
                    input: input,
                    map: map,
                    marker: marker,
                    autocomplete: autocomplete
                });
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({
                        'placeId': place.place_id
                    }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            const lat = results[0].geometry.location.lat();
                            const lng = results[0].geometry.location.lng();
                            setLocationCoordinates(autocomplete.key, lat, lng);
                        }
                    });

                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        input.value = "";
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                });
            }
        }

        function setLocationCoordinates(key, lat, lng) {
            const latitudeField = document.getElementById(key + "-" + "latitude");
            const longitudeField = document.getElementById(key + "-" + "longitude");
            latitudeField.value = lat;
            longitudeField.value = lng;
        }
    </script>
@endpush
