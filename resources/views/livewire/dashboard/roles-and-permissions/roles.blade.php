<div>
    <div class="row">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span>Total {{ \App\Models\User::role($role)->count() }} users</span>
                            <ul class="mb-0 list-unstyled d-flex align-items-center avatar-group">
                                @php
                                    $users = \App\Models\User::role($role)
                                        ->limit(5)
                                        ->get();
                                @endphp
                                @foreach ($users as $user)
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-sm pull-up" data-bs-original-title="{{ $user->name }}">
                                        <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';" class="rounded-circle"
                                            src="{{ $user->getMedia('avatars')->first()?->getUrl('preview') }}"
                                            alt="Avatar">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-1 d-flex justify-content-between align-items-end pt-25">
                            <div class="role-heading">
                                <h4 class="fw-bolder">{{ ucwords($role->name) }}</h4>
                            </div>
                            @if ($role->name !== \App\Constants\Constant::SUPER_ADMIN)
                                <a wire:click='deleteRole({{ $role->id }})' href="javascript:void(0);"
                                    class="text-body">
                                    <small wire:ignore>
                                        <i data-feather="trash" class="text-danger" style="height:15px;width:15px;"></i>
                                    </small>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- New Role card -->
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="d-flex justify-content-center h-100">
                            <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';" src="{{ asset('images/faq-illustrations.svg') }}" class="mt-2 img-fluid" alt="Image"
                                style="height:80px;" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-center card-body text-sm-end ps-sm-0">
                            <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                class="stretched-link text-nowrap add-new-role">
                                <span class="mb-1 btn btn-primary">Add New Role</span>
                            </a>
                            <p class="mb-0">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Users Table</h5>
                </div>
                <div class="card-body">
                    <livewire:tables.users-table/>
                </div>
            </div>
        </div>
    </div>

    <!-- New Role Modal -->

    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h1>Add New Role</h1>
                        <p>Set role permissions</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="container">
                        <table class="table table-flush-spacing">
                            <tbody>
                                <tr>
                                    <td class="text-nowrap fw-bolder">
                                        Shift Management
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Allows access to shift management module">
                                            <i data-feather="info"></i>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-3 me-lg-5">
                                                <input id="shiftCreate" class="form-check-input" type="checkbox">
                                                <label for="shiftCreate" class="form-check-label">Create</label>
                                            </div>
                                            <div class="form-check me-3 me-lg-5">
                                                <input id="shiftView" class="form-check-input" type="checkbox">
                                                <label for="shiftView" class="form-check-label">View</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="shiftUpdate" class="form-check-input" type="checkbox">
                                                <label for="shiftUpdate"class="form-check-label">Update</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="shiftDelete" class="form-check-input" type="checkbox">
                                                <label for="shiftDelete" class="form-check-label">Delete</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--/ Add Role Modal -->
</div>
