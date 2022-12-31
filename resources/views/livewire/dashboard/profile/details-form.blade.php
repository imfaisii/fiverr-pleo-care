<div>
    <form wire:submit.prevent='submit'>
        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info
        </h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input wire:model.lazy='user.first_name' type="text"
                        class="form-control @error('user.first_name') is-invalid @enderror" placeholder="John">
                    @error('user.first_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input wire:model.lazy='user.last_name' type="text"
                        class="form-control @error('user.last_name') is-invalid @enderror" placeholder="Doe">
                    @error('user.last_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea wire:model.lazy='user.details?.bio' class="form-control @error('user.details.bio') is-invalid @enderror"
                        rows="4" placeholder="Some facts about you..."></textarea>
                    @error('user.details.bio')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input wire:model.lazy='user.email' type="email"
                        class="form-control @error('user.email') is-invalid @enderror">
                    @error('user.email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input wire:model.lazy='user.password' type="password"
                        class="form-control @error('user.password') is-invalid @enderror" placeholder="******">
                    @error('user.passwords')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <h5 class="mt-3 mb-4 text-uppercase"><i class="mdi mdi-earth me-1"></i> Social</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                        <input wire:model.lazy='user.details.facebook_url' type="text"
                            class="form-control @error('user.details.facebook_url') is-invalid @enderror"
                            placeholder="https://facebook.com/username">
                        @error('user.details.facebook_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Twitter</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                        <input wire:model.lazy='user.details.twitter_url' type="text"
                            class="form-control @error('user.details.twitter_url') is-invalid @enderror"
                            placeholder="https://twitter.com/username">
                        @error('user.details.twitter_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                        <input wire:model.lazy='user.details.instagram_url' type="text"
                            class="form-control @error('user.details.instagram_url') is-invalid @enderror"
                            placeholder="https://instagram.com/imfaisii">
                        @error('user.details.instagram_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Skype</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                        <input wire:model.lazy='user.details.skype_url' type="text"
                            class="form-control @error('user.skype_url') is-invalid @enderror" placeholder="skype.id">
                        @error('user.details.skype_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="text-end">
            <button type="submit" class="mt-2 btn btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
        </div>
    </form>
</div>
