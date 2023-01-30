<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="text-center card">
            <div class="card-body">
                <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';" src="{{ $user->getMedia('avatars')->first()->getUrl('preview') }}"
                    class="w-90 bg-light h-100 rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mt-2 mb-0">{{ $user->name }}</h4>
                <p class="text-muted fs-14">{{ $user->top_role }}</p>
                <div class="button-wrapper">
                    <label for="upload" class="mb-3 btn btn-primary me-2" tabindex="0">
                        <div class="d-none d-sm-block">
                            <span wire:loading.remove>Upload Profile Picture</span>
                            <span wire:loading wire:target="avatar">Uploading...</span>
                        </div>
                        <i class="ti ti-upload d-block d-sm-none"></i>
                        <input id="upload" type="file" wire:model="avatar" class="account-file-input" hidden
                            accept="image/png, image/jpeg">
                    </label>
                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </div>

                <div class="mt-3 text-start">
                    <p class="mb-2 header-title text-info"><strong>About Me :</strong></p>
                    <p class="mb-3 text-muted">
                        {{ $user->details->bio }}
                    </p>
                    <p class="mb-2 text-muted "><strong class="text-info">Full Name :</strong>
                        <span class="ms-2">{{ $user->name }}</span>
                    </p>

                    <p class="mb-2 text-muted "><strong class="text-info">Email :</strong> <span
                            class="ms-2 ">{{ $user->email }}</span></p>

                    <p class="mb-2 text-muted "><strong class="text-info">Status :</strong> <span
                            class="ms-2 badge badge-success">{{ $user->status }}</span></p>
                </div>

                <ul class="mt-3 mb-0 social-list list-inline">
                    <li class="list-inline-item">
                        <a href="{{ $user->details->facebook_url }}" target="_blank"
                            class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook-light">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $user->details->twitter_url }}" target="_blank"
                            class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter-light">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $user->details->skype_url }}" target="_blank"
                            class="waves-effect waves-circle btn btn-social-icon btn-circle btn-google-light">
                            <i class="fa fa-skype"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ $user->details->instagram_url }}" target="_blank"
                            class="waves-effect waves-circle btn btn-social-icon btn-circle btn-instagram-light">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div> <!-- end card-body -->
        </div> <!-- end card -->

    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="mb-3 nav nav-pills bg-nav-pills nav-justified">
                    <li class="nav-item">
                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="aboutme">

                        <livewire:dashboard.profile.recent-activites />

                        <livewire:dashboard.profile.recent-devices />

                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <div class="tab-pane" id="settings">
                        <livewire:dashboard.profile.details-form />
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->
