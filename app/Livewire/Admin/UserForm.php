<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class UserForm extends Component
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
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        
        if(is_null($this->userId)) {
            // New User
            $validatedData = $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'admin' => 'required',
            ]);
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'admin' => $validatedData['admin'],
            ]);
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'User added'
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
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Password changed'
            ]);
        } else {
            // Edit User
            $validatedData = $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'admin' => 'required',
            ]);
            $user = User::findOrFail($this->userId);
            $user->update( [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'admin' => $validatedData['admin'],
            ]);
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'User updated'
            ]);
        }
        
        $this->changePasswordOnly = false;
        $this->reset();
        $this->dispatch('userSubmitted');
    }

    public function mount()
    {
        $user = auth()->user();

        if (!$user || !$user->is_admin) {
            abort(403);
        }
    }

    public function render()
    {
        return view('livewire.admin.user-form');
    }
}
