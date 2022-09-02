<div>
    <div class="row">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Shifts Table</h5>
                    <a href="{{ route('shifts.create') }}"class="mb-2 btn btn-primary btn-sm">
                        Create Shift
                    </a>
                </div>
                <div class="card-body">
                    <livewire:tables.shifts-table />
                </div>
            </div>
        </div>
    </div>
</div>
