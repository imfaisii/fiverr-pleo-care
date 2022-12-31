<div>
    <h5 class="mt-4 mb-3 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
        Login Activities</h5>
    <div class="table-responsive">
        <table class="table mb-0 text-fade table-borderless table-nowrap">
            <thead class="table-light">
                <tr>
                    <th class="text-truncate">Browser</th>
                    <th class="text-truncate">Device</th>
                    <th class="text-truncate">Location</th>
                    <th class="text-truncate">Recent Activities</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentDevices as $recentDevice)
                    <tr>
                        <td class="text-truncate">
                            <i
                                class="ti ti-brand-{{ $recentDevice['is_mobile'] ? 'mobile' : 'windows' }} text-info me-2 ti-sm"></i>
                            <strong>{{ "{$recentDevice['browser']} on {$recentDevice['platform']}" }}</strong>
                        </td>
                        <td class="text-truncate">{{ $recentDevice['device'] }}</td>
                        <td class="text-truncate">{{ $recentDevice['country'] }}</td>
                        <td class="text-truncate">{{ $recentDevice['login_at'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No records available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
