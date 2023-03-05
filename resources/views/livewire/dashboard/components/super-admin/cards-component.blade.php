<div>
    {{-- Stop trying to control. --}}
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="box overflow-hidden">
                        <div class="box-header no-border">
                            <h4 class="box-title text-overflow">
                                Subscribers/Companies ( {{ date('Y') }} ) <small class="subtitle">Most Recent</small>
                            </h4>
                        </div>
                        <div class="box-body p-0">
                            <h1 class="mt-0 ps-20 pt-0 fw-500 text-success">{{ count($companies) }}</h1>
                            <div id="companies-spark" class="apex-charts-spark"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box overflow-hidden">
                        <div class="box-header no-border">
                            <h4 class="box-title text-overflow">
                                Income <small class="subtitle">Most Recent</small>
                            </h4>
                        </div>
                        <div class="box-body p-0">
                            <h1 class="mt-0 ps-20 pt-0 fw-500 text-primary">815</h1>
                            <div id="growth-spark" class="apex-charts-spark"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (count($companies) > 0)
            <div class="col-xl-12 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Subscribers with Total shifts</h4>
                    </div>
                    <div class="box-body">
                        <div class="application-bx">
                            @foreach ($companies as $company)
                                <div class="d-flex align-items-center mb-30">
                                    <div class="me-15 w-60">
                                        <img src="{{ asset('images/briefcase.png') }}"
                                            class="avatar avatar-lg rounded100 bg-primary-light" alt="Company Image" />
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 fw-500 text-overflow">
                                        <a href="#" class="hover-primary mb-1 fs-16">
                                            {{ $company->user->name }}
                                            {!! $company->user->status->getLabelHtml() !!}
                                        </a>
                                        <span class="fs-12 text-overflow"><span class="text-fade">Total active shifts:
                                            </span>{{ $company->shifts_count }}</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                                class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Disable Account</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


@push('extended-js')
    <script>
        var options = {
            series: [{
                name: 'New Companies',
                data: @json($graphData['companies'])
            }],
            labels: @json($graphData['months']),
            chart: {
                type: 'area',
                height: 100,
                sparkline: {
                    enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            fill: {
                opacity: 1,
            },
            yaxis: {
                min: 0
            },
            colors: ['#51ce8a'],
        };

        var chart = new ApexCharts(document.querySelector("#companies-spark"), options);
        chart.render();


        var options = {
            series: [{
                data: [51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 47, 45, 54, 38, 56, 24, 65, 31, 37,
                    39, 62
                ]
            }],
            chart: {
                type: 'area',
                height: 100,
                sparkline: {
                    enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            fill: {
                opacity: 1,
            },
            yaxis: {
                min: 0
            },
            colors: ['#4d7cff'],
        };

        var chart = new ApexCharts(document.querySelector("#growth-spark"), options);
        chart.render();
    </script>
@endpush
