<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;

class MyProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $profile;
    public $bio;
    public $birth_date;
    public $photo;

    public $showModal = false;

    public function mount()
    {
        $this->user = auth()->user();
        $this->profile = $this->user->profile ?? new \App\Models\Profile();
        $this->bio = $this->profile->bio;
        $this->birth_date = optional($this->profile->birth_date)->format('Y-m-d');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function save()
    {
        $data = $this->validate([
            'bio' => 'string|max:1000',
            'birth_date' => 'date',
            'photo' => 'image|max:2048',
        ]);

        if ($this->photo) {
            $data['photo'] = $this->photo->store('profiles', 'public');
        }

        $this->profile->fill([
            'bio' => $data['bio'],
            'birth_date' => $data['birth_date'],
            'photo' => $data['photo'] ?? $this->profile->photo,
        ]);

        $this->profile->user_id = $this->user->id;
        $this->profile->save();

        $this->showModal = false;
        $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Profile updated!'
            ]);
    }

    public function render()
    {
        return view('livewire.my-profile');
    }
}
