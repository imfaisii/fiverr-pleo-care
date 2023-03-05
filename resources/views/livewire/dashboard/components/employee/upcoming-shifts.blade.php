<div class="col-xl-6 col-12">
    <div class="box" style="min-height: 30vh">
        <div class="box-header with-border">
            <h4 class="box-title">Upcoming Shifts</h4>
        </div>
        <div class="box-body">
            <div class="application-bx">
                @forelse ($shifts as $shift)
                    <div class="d-flex align-items-center mb-30">
                        <div class="me-15 w-60">
                            <img src="{{ asset('images/avatar/avatar-1.png') }}"
                                class="avatar avatar-lg rounded100 bg-primary-light" alt="Client Avatar" />
                        </div>
                        <div class="d-flex flex-column flex-grow-1 fw-500 text-overflow">
                            <a href="extra_profile.html" class="hover-primary mb-1 fs-16">{{ $shift->client->name }}</a>
                            <span class="fs-12 text-overflow"><span class="text-fade">Address: </span>
                                {{ $shift->client->address }}
                            </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 fw-500 text-overflow">
                            <p>Starts {{ $shift->start_time->diffForHumans() }}</p>
                        </div>
                        <div class="dropdown">
                            <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                    class="ti-more-alt"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="3">Go to shift page</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No upcoming shifts. </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
