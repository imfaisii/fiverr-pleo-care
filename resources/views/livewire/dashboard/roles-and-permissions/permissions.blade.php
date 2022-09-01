<div>
    <div class="row">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Permissions Table</h5>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#addPermissionModal">
                        <span>Add Permission</span>
                    </button>
                </div>
                <div class="card-body">
                    <livewire:tables.permissions-table />
                </div>
            </div>
        </div>
    </div>

    <!-- New Role Modal -->

    <div wire:ignore.self class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h1>Add New Permission</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-1 mb-1 alert alert-warning" role="alert">
                        <h6 class="alert-heading">Warning!</h6>
                        <div class="alert-body">
                            By adding the permission name, you might break the system permissions functionality.
                            Please ensure you're absolutely certain before proceeding.
                        </div>
                    </div>
                    <hr />
                    <div class="mb-3">
                        <label class="form-label">Permission Name</label>
                        <input wire:model.lazy='permission' type="text" placeholder="Permission Name"
                            class="form-control mb-1 @error('permission') is-invalid @enderror">
                        @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-light" data-bs-dismiss="modal">Close</button>
                    <x-lv-btn functionName="store" btnText="Save Permission" />
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--/ Add Permissions Modal -->
</div>
