<?php

namespace App\Http\Livewire\Dashboard\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $user, $avatar;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function rules()
    {
        return [
            'avatar' => ['required', 'image', 'max:1024']
        ];
    }

    public function updatedAvatar()
    {
        $this->validateOnly('avatar');

        $this->user->clearMediaCollection('avatars');

        $this->user->addMedia($this->avatar)->toMediaCollection('avatars');

        $this->emit('toast', 'success', 'Success Notfication', 'Avatar Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.dashboard.profile.index')
            ->extends('layouts.dashboard.app')
            ->section('content');
    }
}
