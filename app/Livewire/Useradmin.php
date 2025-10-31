<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Useradmin extends Component
{
    public $showAddModal = false;
    public $formData = [];
    #[Validate('required')]
    public $name = '';
    
    #[Validate('required')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    #[Validate('required')]
    public $password_confirm = '';

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
        // Console::Log("Hello!");
        session()->success('Message user add ok !');
    }

    public function render()
    {
        $users = User::get();
        return view('livewire.useradmin')
            ->with(['users' => $users]);
    }
}
