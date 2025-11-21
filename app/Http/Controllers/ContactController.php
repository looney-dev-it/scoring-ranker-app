<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;
use App\Mail\AdminContactNotifMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }

    public function mail() 
    {
        
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|string|max:200|min:5',
            'email' => 'required|email|max:200|min:5',
            'subject' => 'required|string|max:200|min:5',
            'message' => 'required|min:5',
        ]);
        
        $cr = ContactRequest::create([
                'from' => $validated['from'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'treated' => false,
            ]);
        
            try {
                Mail::to(config('custom.admin_email'))->send(new AdminContactNotifMail([
                    'from' => $validated['from'],
                    'email' => $validated['email'],
                    'subject' => $validated['subject'],
                    'message' => $validated['message'],
                    'title' => 'Scoring Contact request',
                ]));
            } catch (\Exception $e) {
                Log::error('Fail to send email contact-request : '. $e->getMessage());
            }

        return redirect()->route('contact')->with('success','Thanks your message has been submitted successfully, our admins will respond asap');
    }
    
}
