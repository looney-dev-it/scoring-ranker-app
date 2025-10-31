<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class Useradmin extends Component
{
    public $showAddModal = false;
    public $formData = [];

    public function openAddModal(){
        $this->showAddModal = true;
    }

    public function closeAddModel(){
        $this->showAddModal = false;
    }
    
    public function submitAddForm() {
        // still to implement data update from Model/Controller ?
        $this->emit('dataUpdated');
        $this->closeAddModel();
    }

    public function save()
    {
        Console::info('Save from UserAdmin done');
    }

    public function render()
    {
        $users = User::get();
        return view('livewire.useradmin')
            ->with(['users' => $users]);
    }
}
