<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminUserNewform extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $admin;

    public function closeAddModel()
    {
        $this->dispatch('userSubmitted');
    }

    public function submit()
    {   
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'admin' => 'required',
        ]);

        User::create($validatedData);
        
        $this->dispatch('userSubmitted');
        $this->dispatch('userAdded');
    }


    public function render()
    {
        return view('livewire.admin-user-newform');
    }
}
