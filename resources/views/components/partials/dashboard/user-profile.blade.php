<!-- quick_user_toggle -->
<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content slim-scroll3">
            <div class="bg-white modal-body p-30">
                <div class="d-flex align-items-center justify-content-between pb-30">
                    <h4 class="m-0">User Profile</h4>
                    <a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
                        <span class="fa fa-close"></span>
                    </a>
                </div>
                <div>
                    <div class="flex-row d-flex">
                        <div class="">
                            <img src="{{ asset('images/avatar/avatar-13.png') }}" alt="user"
                                class="rounded bg-danger-light w-150" width="100">
                        </div>
                        <div class="ps-20">
                            <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                            <p class="my-5 text-fade">{{ ucwords(auth()->user()->roles->first()->name) }}</p>
                            <a href="mailto:{{ auth()->user()->email }}">
                                <span class="icon-Mail-notification me-5 text-success">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </span>
                                {{ auth()->user()->email }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider my-30"></div>
                <div>
                    <div class="d-flex align-items-center mb-30">
                        <div class="text-center rounded me-15 bg-primary-light h-50 w-50 l-h-60">
                            <span><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                        </div>
                        <div class="d-flex flex-column fw-500">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="mb-1 text-dark hover-primary fs-16"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                            <span class="text-fade">All done? Make sure you log out of the system.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /quick_user_toggle -->
