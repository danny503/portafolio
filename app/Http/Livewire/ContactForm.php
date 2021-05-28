<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required:min:5'
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function save()
    {
        $this->validate();

        $details = [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ];

        $this->reset('name', 'email', 'message');
        $this->emit('alert', 'Tu correo se ha enviado con éxito');

        Mail::to('ayalalopezfranciscodaniel8@gmail.com')->send(new ContactoMailable($details));

    }
}
