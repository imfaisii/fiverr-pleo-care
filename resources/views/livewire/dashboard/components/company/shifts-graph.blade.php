<div class="row">
    {{-- In work, do what you enjoy. --}}
    <div class="col-xl-6 col-12">
        <div class="box">
            <div class="box-body px-0" style="min-height: 268px;">
                <div id="donut" class="text-dark"></div>
            </div>
            <div class="box-body pt-0">
                <h5 class="text-overflow mb-3">Shifts Statistics</h5>
                @foreach ($graphData['statuses'] as $key => $status)
                    <div class="mb-10 bg-lightest p-10 rounded d-flex align-items-center justify-content-between">
                        <h5 class="my-0 text-fade">{{ $status }}
                            <span
                                class="fw-500 text-primary">({{ number_format(($graphData['totalShifts'][$key] / count($shifts)) * 100, 2) }}%)</span>
                        </h5>
                        <h5 class="my-0 fw-500 text-primary">{{ $graphData['totalShifts'][$key] }}</h5>
                    </div>
                @endforeach
                <div class="mb-10 bg-lightest p-10 rounded d-flex align-items-center justify-content-between">
                    <h5 class="my-0 text-fade">
                        TOTAL SHIFTS
                    </h5>
                    <h5 class="my-0 fw-500 text-primary">{{ count($shifts) }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Shifts by Staff Members</h4>
            </div>
            <div class="box-body">
                <div class="application-bx">
                    @forelse ($shiftsByStaff as $shift)
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15 w-60">
                                <img src="{{ asset('images/avatar/avatar-1.png') }}"
                                    class="avatar avatar-lg rounded100 bg-primary-light" alt="Member Image" />
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500 text-overflow">
                                <a href="#"
                                    class="hover-primary mb-1 fs-16">{{ $shift[0]['manager']['user']['name'] }}</a>
                                <span class="fs-12 text-overflow">
                                    <span class="text-fade">Total Shifts
                                        {{ count($shift) }}</span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="mailbox-compose.html">Disable</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">No shifts found.
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@push('extended-js')
    <script>
        var options = {
            series: @json($graphData['totalShifts']),
            labels: @json($graphData['statuses']),
            chart: {
                width: 300,
                type: 'donut',
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            colors: ['#4d7cff', '#51ce8a', '#733aeb'],
            responsive: [{
                breakpoint: 1500,
                options: {
                    chart: {
                        width: 250
                    }
                }
            }]

        };

        var chart = new ApexCharts(document.querySelector("#donut"), options);
        chart.render();
    </script>
@endpush
