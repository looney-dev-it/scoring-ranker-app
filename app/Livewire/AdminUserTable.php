<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminUserTable extends Component
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
        User::findOrFail($id)->delete();

        // Recharge les données si tu les stockes dans une propriété
        $this->users = User::all(); // ou ta logique de récupération

        session()->flash('message', 'Utilisateur supprimé avec succès.');
    }

    public function render()
    {
        $this->users = User::get();
        return view('livewire.admin-user-table');
    }
}
