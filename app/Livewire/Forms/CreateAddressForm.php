<?php

namespace App\Livewire\Forms;

use App\Models\ShippingAddress;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAddressForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $streetAddress = '';

    public string $apartmentSuite = '';

    #[Validate('required')]
    public string $city = '';

    public string $state = '';

    #[Validate('required')]
    public string $zipCode = '';

    #[Validate('required')]
    public string $country = '';

    #[Validate('required')]
    public string $phoneNumber = '';

    #[Validate('required')]
    public string $email = '';

    public function store()
    {
        $this->validate();

        ShippingAddress::create([
            'name' => $this->name,
            'street_address' => $this->streetAddress,
            'city' => $this->city,
            'country' => $this->country,
            'state' => $this->state,
            'zip_code' => $this->zipCode,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
            'apartment_suite' => $this->apartmentSuite
        ]);
    }
}
