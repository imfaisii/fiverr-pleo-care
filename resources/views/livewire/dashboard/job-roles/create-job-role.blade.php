<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mt-4 mb-4" :errors="$errors" />

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Role Name</label>
                                            <input wire:model.lazy="payment.name" type="text"
                                                class="form-control @error('payment.name') is-invalid @enderror"
                                                placeholder="Please enter the role name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Default Payment <i data-bs-toggle="tooltip"
                                                    data-popup="tooltip-custom" data-bs-placement="top"
                                                    data-bs-original-title="If no payment is added, this will be the default payment charged every hour."
                                                    class="fa fa-info-circle" aria-hidden="true"></i>
                                            </label>
                                            <input wire:model.lazy="payment.default" type="number"
                                                class="form-control @error('payment.default') is-invalid @enderror"
                                                placeholder="Please enter payment in any case">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-30 mb-xl-0">
                                    <div id="calendar" wire:ignore></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <x-lv-btn id="getEvents" functionName="saveRoles"
                                    btnText="{{ $updateId ? 'Update' : 'Create' }} Role" />
                            </div>
                        </div>
                    </div>
                </div>

                <div wire:ignore.self class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <div class="px-4 py-3 modal-header border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="px-4 pt-0 pb-4 modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Payment Amount</label>
                                                <input class="form-control" placeholder="Enter Payment Amount"
                                                    type="number" name="title" id="event-title" required />
                                                <div class="invalid-feedback">Please provide a valid payment amount
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger"
                                                id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-danger-light me-1"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"
                                                id="btn-save-event">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- if the user is updating --}}
    @if ($payment && array_key_exists('events', $payment))
        <script>
            var calendarEvents = @json($payment['events']);
            calendarEvents = JSON.parse(calendarEvents);
        </script>
    @endif
</div>


@push('extended-js')
    <script src="{{ asset('assets/vendor_components/full-calendar/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/full-calendar/fullcalendar.min.js') }}"></script>
    <script>
        var myCalendarObj;
    </script>
    <script src="{{ asset('src/js/pages/demo.calendar.js') }}"></script>
    <script>
        $("#getEvents").click(function(e) {
            let events = myCalendarObj.getEvents();

            if (events.length > 0)
                @this.events = events;

            @this.saveRoles();
        });
    </script>
@endpush
