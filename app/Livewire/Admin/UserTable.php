<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public $users;
    protected $listeners = ['userAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->users = User::get(); 
    }

    public function change_password($id)
    {
        $this->dispatch('changePasswordUser', $id);
        $this->dispatch('openUserModal');
    }

    public function edit($id) 
    {
        $this->dispatch('editUser', $id);
        $this->dispatch('openUserModal');
    }

    public function delete($id)
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        
        User::findOrFail($id)->delete();

        $this->users = User::all();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'User deleted'
        ]);
    }

    public function render()
    {
        $this->users = User::get();
        return view('livewire.admin.user-table');
    }
}
