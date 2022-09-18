<div>
    <div class="row">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Job Roles Table</h5>
                    <a href="{{ route('job-roles.create') }}"class="mb-2 btn btn-primary btn-sm">
                        <i data-feather="plus" class="text-white" style="height:15px;width:15px;"></i> Create Job Role
                    </a>
                </div>
                <div class="card-body">
                    <livewire:tables.job-roles-table />
                </div>
            </div>
        </div>
    </div>

    <!-- to view payment details -->
    <livewire:dashboard.job-roles.view-payments-modal />
</div>
