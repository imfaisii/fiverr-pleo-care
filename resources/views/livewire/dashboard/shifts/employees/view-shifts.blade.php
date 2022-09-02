<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @forelse ($shifts as $shift)
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-success float-end"><i class="mdi mdi-cash me-1"></i>
                        {{ $shift->hourly_rate }} £ / Hr</div>
                    <h5 class="float-start mt-0">Shift # {{ $loop->iteration }}</h5>
                    <div class="ribbon-content">
                        <h4 class="media-heading mt-15 mb-0 px-30">
                            <a href="#">
                                {{ $shift->manager->company->user->name }}
                            </a>
                        </h4>
                        <div class="media">
                            <div class="media-body">
                                <p class="text-gray-600">{{ $shift->description }}</p>
                                @if (is_null($shift->employee_id))
                                    <a class="btn btn-sm btn-bold btn-primary mt-15" href="#">Click to book</a>
                                @else
                                    <a class="btn btn-sm btn-bold btn-warning mt-15" href="#">Already assigned</a>
                                @endif
                            </div>
                        </div>
                        <p class="mt-10 mb-0 px-30 by-1 py-10 text-mute">
                            <i class="fa fa-user"></i> by <a href="#" class="text-mute">
                                {{ $shift->manager->user->name }}</a>
                            | <i class="fa fa-calendar"></i> {{ $shift->created_at->format('d/m/Y H:i:s') }}
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
