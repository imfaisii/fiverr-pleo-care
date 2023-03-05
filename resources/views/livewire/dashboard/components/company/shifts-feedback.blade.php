<div>
    {{-- The Master doesn't talk, he acts. --}}
    @if ($shiftsWithFeedbacks->count() > 0)
        <div class="col-xl-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Shifts Remarks
                        <small class="subtitle">Details of shifts are as under.</small>
                    </h4>
                </div>
                <div class="box-body p-0">
                    <div class="table-responsive">
                        <table class="table no-border table-vertical-center">
                            <thead>
                                <tr>
                                    <th class="p-0" style="width: 50px"></th>
                                    <th class="p-0" style="min-width: 150px"></th>
                                    <th class="p-0" style="min-width: 200px"></th>
                                    <th class="p-0" style="min-width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shiftsWithFeedbacks as $shift)
                                    <tr>
                                        <td>
                                            <div class="bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                                <img src="{{ asset('images/avatar/avatar-4.png') }}" class="h-30"
                                                    alt="Glass SVG">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-600 hover-primary fs-16">
                                                {{ $shift->client->name }}
                                            </a>
                                            <span class="text-fade d-block">{{ $shift->client->address }}</span>
                                        </td>
                                        <td>
                                            <span class="text-fade">
                                                {{ $shift?->feedback?->comment ?? 'No comments' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade d-block">
                                                Rating
                                            </span>
                                            <ul class="list-inline mb-0">
                                                @if ($shift->feedback)
                                                    @for ($i = 0; $i < $shift->feedback->rating; $i++)
                                                        <li><i class="text-warning fa fa-star"></i></li>
                                                    @endfor
                                                @else
                                                    <p class="text-fade">No rating</p>
                                                @endif
                                            </ul>
                                        </td>
                                        <td>
                                            {!! $shift->status->getLabelHtml() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
