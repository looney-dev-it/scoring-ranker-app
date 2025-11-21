<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\Profile;

class MyProfile extends Component
{
    use WithFileUploads;

    public $profileId;
    public $user;
    public $profile;
    public $bio;
    public $birth_date;
    public $photo;
    public $existingPhoto;
    public $showModal = false;

    public function mount()
    {
        
        $this->user = auth()->user();
        $this->profile = $this->user->profile ?? new \App\Models\Profile();
        $this->bio = $this->profile->bio;
        $this->birth_date = optional($this->profile->birth_date)->format('Y-m-d');
        $this->profileId = $this->profile->id;
        $this->existingPhoto = $this->profile->photo; 
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function save()
    {
        abort_unless(auth()->check(), 403);
        $data = $this->validate([
            'bio' => 'string|max:1000',
            'birth_date' => 'date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($this->photo instanceof UploadedFile) {
            $path = $this->photo->store('profiles', 'public');
        } else {
            $path = $this->existingPhoto ?? null;
        }

        Profile::updateOrCreate(
            ['id' => $this->profileId],
            [
                'bio' => $this->bio,
                'birth_date' => $this->birth_date,
                'photo' => $path,
                'user_id' => auth()->id(),
            ]);
        
        $this->showModal = false;
        $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Profile updated!'
            ]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.profile.my-profile');
    }
}
