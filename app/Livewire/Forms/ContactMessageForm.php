<?php

namespace App\Livewire\Forms;

use App\Models\ContactMessage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactMessageForm extends Form
{
    #[Validate('required')]
    public string $firstName = '';

    public string $lastName = '';

    #[Validate('required')]
    public string $email = '';

    public string $phoneNumber = '';

    public string $address = '';

    #[Validate('required')]
    public string $message = '';

    public function store()
    {
        $sender = ContactMessage::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'user_id' => auth()->id() ?? null,
            'phone_number' => $this->phoneNumber,
            'address' => $this->address,
            'message' => $this->message
        ]);

        return $sender;
    }
}
