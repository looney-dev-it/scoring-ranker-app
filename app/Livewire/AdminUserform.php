<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class AdminUserform extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $admin = false;
    public $changePasswordOnly = false;

    public function closeAddModel()
    {
        $this->reset();
        $this->dispatch('userSubmitted');
    }

    #[On('editUser')]
    public function loadUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->admin = (bool) $user->admin;
    }

    #[On('changePasswordUser')]
    public function changePassword($id)
    {
        $this->userId = $id;
        $this->changePasswordOnly = true;
    }

    public function submit()
    {   
        if(is_null($this->userId)) {
            // New User
            $validatedData = $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
                'admin' => 'required',
            ]);
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'admin' => $validatedData['admin'],
            ]);
        } elseif($this->changePasswordOnly) {
            // Change Password action
            $validatedData = $this->validate([
                'password' => 'required|min:8|confirmed',
            ]);
            $user = User::findOrFail($this->userId);
            $user->update( [
                'password' => Hash::make($validatedData['password'])
            ]);
        } else {
            // Edit User
            $validatedData = $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'admin' => 'required',
            ]);
            $user = User::findOrFail($this->userId);
            $user->update( [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'admin' => $validatedData['admin'],
            ]);
        }
        
        $this->changePasswordOnly = false;
        $this->reset();
        $this->dispatch('userSubmitted');
        $this->dispatch('userAdded');
    }


    public function render()
    {
        return view('livewire.admin-user-form');
    }
}
