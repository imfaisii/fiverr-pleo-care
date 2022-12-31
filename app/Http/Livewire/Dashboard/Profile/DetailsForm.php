<?php

namespace App\Http\Livewire\Dashboard\Profile;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DetailsForm extends Component
{
    public $userModel, $user;

    public function mount()
    {
        $this->userModel = auth()->user();

        $this->user = $this->userModel->toArray();
    }

    public function rules()
    {
        return [
            'user.first_name' => ['required', 'string', 'alpha_dash'],
            'user.last_name' => ['required', 'string', 'alpha_dash'],
            'user.email' => ['required', 'string', "unique:users,email,{$this->userModel->id}"],
            'user.details.bio' => ['nullable', 'string'],
            'user.details.facebook_url' => ['nullable', 'url', 'regex:(facebook.com)'],
            'user.details.twitter_url' => ['nullable', 'url', 'regex:(twitter.com)'],
            'user.details.instagram_url' => ['nullable', 'url', 'regex:(instagram.com)'],
            'user.details.skype_url' => ['nullable', 'url', 'regex:(skype.com)'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $this->user['name'] = $this->user['first_name'] . ' ' . $this->user['last_name'];

        if (Arr::has($this->user, 'password')) $this->user['password'] = Hash::make($this->user['password']);

        $this->userModel->update($this->user);

        $this->userModel->details->update($this->user['details']);

        $this->emit('toast', 'success', 'Success Notfication', 'User updated successfully.');
    }

    public function render()
    {
        return view('livewire.dashboard.profile.details-form');
    }
}
