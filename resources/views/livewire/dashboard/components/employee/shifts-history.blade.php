<div class="col-xl-6">
    <div class="box" style="min-height: 30vh">
        <div class="box-header">
            <h4 class="box-title">Shift Checks
                <small class="subtitle">History of your shift check in/out</small>
            </h4>
        </div>
        <div class="box-body p-0">
            <div class="table-responsive">
                <table class="table no-border table-vertical-center">
                    <thead>
                        <tr>
                            <th class="p-0" style="width: 50px"></th>
                            <th class="p-0" style="min-width: 200px"></th>
                            <th class="p-0" style="min-width: 100px"></th>
                            <th class="p-0" style="min-width: 100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shifts as $shift)
                            <tr>
                                <td>
                                    <div class="bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                        <img src="{{ asset('images/avatar/avatar-1.png') }}" class="h-30"
                                            alt="">
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-dark fw-600 hover-primary fs-16">
                                        {{ $shift->client->name }}
                                    </a>
                                    <span class="text-fade d-block">{{ $shift->client->address }}</span>
                                </td>
                                <td class="text-fade">
                                    {{ $shift?->checkIns ? $shift->checkIns->first()->created_at : 'No check in' }}
                                    <div class="text-success">IN</div>
                                </td>
                                <td class="text-fade">
                                    {{ !$shift?->checkIns
                                        ? 'No check out'
                                        : ($shift->checkIns->count() > 1
                                            ? $shift->checkIns->last()->created_at
                                            : 'No check OUT') }}
                                    <div class="text-danger">OUT</div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center">No history found.</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
