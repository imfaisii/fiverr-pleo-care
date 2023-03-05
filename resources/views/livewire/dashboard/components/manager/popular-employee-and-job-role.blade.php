<div class="row">
    {{-- Be like water. --}}
    <div class="col-lg-5 col-12">
        <div class="box">
            <div class="box-body text-center">
                <div class="mb-20 mt-20">
                    <img src="{{ asset('images/avatar/avatar-12.png') }}" width="90"
                        class="rounded-circle bg-info-light" alt="user" />
                    <h4 class="mt-20 mb-5">{{ $employee['name'] }}</h4>
                    <a class="text-fade" href="mailto:{{ $employee['email'] }}">{{ $employee['email'] }}</a>
                    <div>
                        <small class="text-fade">( most requested carer )</small>
                    </div>
                </div>
                @isset($employee['phone_number'])
                    <div class="badge badge-info-light fs-16" data-bs-toggle="tooltip" data-placement="top"
                        title="Phone Number">{{ $employee['phone_number'] }}</div>
                @endisset
                <div class="badge badge-warning-light fs-16" data-bs-toggle="tooltip" data-placement="top"
                    title="Days Since Joining">{{ $employee['days_since_join'] }}</div>
                <div class="badge badge-primary-light fs-16" data-bs-toggle="tooltip" data-placement="top"
                    title="Total Completed Shifts">{{ $employee['count'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-7">
        <div class="box">
            <div class="box-body">
                <div class="flex-grow-1 pb-15">
                    <div class="d-flex align-items-center pe-2 mb-30">
                        <span class="text-fade fw-600 fs-16 flex-grow-1">
                            Most Request Job Role
                        </span>
                        <div class="bg-info-light h-50 w-50 l-h-50 rounded text-center">
                            <img src="{{ asset('images/svg-icon/color-svg/001-glass.svg') }}"
                                class="h-30 align-self-center" alt="">
                        </div>
                    </div>
                    <a href="#" class="text-dark fw-600 hover-primary fs-18">
                        {{ $jobRole['name'] }}
                    </a>
                    <p>This is the role with most number of shifts that were booked or listed by the company.</p>
                </div>
                <div class="d-flex flex-column mt-10">
                    <p>Recent Clients</p>
                    <div class="d-flex">
                        @foreach ($clients as $client)
                            <a href="#"
                                class="me-15 bg-lightest h-50 w-50 l-h-50 rounded-circle text-center overflow-hidden">
                                <img src="{{ asset("images/avatar/avatar-$loop->iteration.png") }}"
                                    class="h-50 align-self-end" alt="" data-bs-toggle="tooltip"
                                    data-placement="top" title="{{ $client[0]['client']['name'] }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
