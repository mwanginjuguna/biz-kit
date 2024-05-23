<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\ContactMessageForm;
use Livewire\Component;

class Contact extends Component
{
    public ContactMessageForm $form;

    public bool $saved = false;

    public object $sender;

    public function save()
    {
        $this->sender = $this->form->store();

        $this->form->reset();

        $this->saved = true;
    }

    public function render()
    {
        return view('livewire.pages.contact');
    }
}
