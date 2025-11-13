<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactRequest;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactRequestTable extends Component
{
    public $contactrequests;
    public $treated = false;
    protected $listeners = ['toggleTreated'];
    public $selectedId = null;
    public $selectedContact = null;
    public $replyMessage;

    public function selectContact($id)
    {
        $this->selectedId = $id;
        $this->selectedContact = ContactRequest::find($id);
        $this->dispatch('show-modal');
    }

    public function markAsTreated() {
        $cr = ContactRequest::find($this->selectedId);
        $cr->treated = !$cr->treated;
        $cr->save();
        $this->refreshTable();
        $this->dispatch('close-modal');
    }
    public function toggleTreated()
    {
        $this->refreshTable();
    }

    public function sendReply()
    {
        if ($this->selectedContact && $this->replyMessage) {
            $this->selectedContact->treated = true;
            $this->selectedContact->save();


            try {
                Mail::to($this->selectedContact->email)->send(
                                    new ContactReplyMail($this->selectedContact->message, $this->replyMessage)
                                );
            } catch (\Exception $e) {
                Log::error('Fail to send email contact-request : '. $e->getMessage());
            }

            $this->replyMessage = '';
            $this->refreshTable();
            $this->dispatch('close-modal');
        }
    }

    public function refreshTable() {
        $this->contactrequests = ContactRequest::query()
                    ->when(!$this->treated, fn($q) => $q->where('treated', false))
                    ->get();
    }


    public function render()
    {
        $this->refreshTable();
        $contactrequests = $this->contactrequests;
        return view('livewire.admin.contact-request-table', compact('contactrequests'));
    }
}
