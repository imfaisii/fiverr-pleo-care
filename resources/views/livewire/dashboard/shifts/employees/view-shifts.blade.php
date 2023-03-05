<div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-4 mt-2">
                            <label>Search by company</label>
                            <select wire:model.lazy='company' class="form-select">
                                <option value="">Filter by company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label>Search by client</label>
                            <select wire:model.lazy='client' class="form-select">
                                <option value="">Filter by client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label>Records to show</label>
                            <select wire:model.lazy='limit' class="form-select">
                                <option value="">Show Total</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <label>Time from</label>
                            <input wire:model.lazy='start_time' class="form-control" type="date">
                        </div>
                        <div class="col-6 mt-2">
                            <label>Time to</label>
                            <input wire:model.lazy='end_time' class="form-control" type="date">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row mt-20">
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        @forelse ($shifts as $shift)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card ribbon-box">
                    <div class="card-body">
                        <div class="ribbon ribbon-success float-end"><i class="mdi mdi-cash me-1"></i>
                            Exp. Pay {{ $shift->expected_pay }} £
                        </div>
                        <h5 class="float-start mt-0">Shift # {{ $loop->iteration }}</h5>
                        <div class="ribbon-content">
                            <h4 class="media-heading mt-15 mb-0 px-25">
                                <a href="#">
                                    {{ $shift->manager->company->user->name }}
                                </a>
                            </h4>
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-gray-600">{{ $shift->description }}</p>
                                    <p class="text-gray-600">Required: <strong>{{ $shift->jobRole->name }}</strong></p>
                                    @if (is_null($shift->employee_id))
                                        @if ($rec = \App\Models\ShiftProposal::where('shift_id', $shift->id)->where('employee_id', auth()->user()->employee->id)->first())
                                            @if ($rec->status == 'rejected')
                                                <a class="btn btn-sm btn-bold btn-danger mt-15" href="#">
                                                    Your request for this shift was rejected.
                                                </a>
                                            @elseif($rec->status == 'approved')
                                                <a class="btn btn-sm btn-bold btn-success mt-15" href="#">
                                                    CONGRATULATIONS!!! You earned this shift. Follow the instructions in
                                                    email to complete the shift requirements.
                                                </a>
                                            @else
                                                <a class="btn btn-sm btn-bold btn-warning mt-15" href="#">
                                                    You have already submitted a proposal
                                                </a>
                                            @endif
                                        @else
                                            <a class="btn btn-sm btn-bold btn-primary mt-15 sa-warning"
                                                data-id="{{ $shift->id }}"
                                                data-company="{{ $shift->company->user->name }}" href="#">
                                                Click to submit proposal
                                            </a>
                                        @endif
                                    @else
                                        <a class="btn btn-sm btn-bold btn-warning mt-15" href="#">
                                            Assigned to someone</a>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-10 mb-0 px-30 by-1 py-10 text-mute">
                                <i class="fa fa-user"></i> by <a href="#" class="text-mute">
                                    {{ $shift->manager->user->name }}</a>
                                | <i class="fa fa-calendar"></i> {{ $shift->start_time->diffForHumans() }} <br><i
                                    class="fa fa-map-marker"></i> {{ $shift->address_address }}
                            </p>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
        @empty
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alert alert-danger" role="alert">
                    <strong>No Shifts found.</strong>
                </div>
            </div>
        @endif
    </div>

    <div wire:ignore.self id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center text-white">
                        <i class="fa fa-check fs-36"></i>
                        <h4 class="mt-2">Well Done!</h4>
                        <p class="mt-3">Your request for the shift is submitted. Your manager will review your request
                            and will update it accordingly. You will be notified via email is the shift is assigned to
                            you.</p>
                        <button type="button" class="btn btn-success-light my-2"
                            data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

@push('extended-js')
    <script src="{{ asset('assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        //Warning Message
        $('.sa-warning').click(function() {
            var shiftId = $(this).data('id')
            var companyName = $(this).data('company')

            swal({
                title: "Are you sure?",
                text: `You will be submitting a request for this shift to ${companyName}?`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#fec801",
                confirmButtonText: "Yes, send a proposal.",
                closeOnConfirm: false
            }, function() {
                @this.sendProposal(shiftId)

                swal.close()

                $("#success-alert-modal").modal('show')
            });
        });
    </script>
@endpush
