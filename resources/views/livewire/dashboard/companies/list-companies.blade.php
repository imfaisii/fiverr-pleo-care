<div>
    <div class="row">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Companies Table</h5>
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">
                        Add Company
                    </a>
                </div>
                <div class="card-body">
                    <livewire:tables.companies-table />
                </div>
            </div>
        </div>
    </div>
</div>
