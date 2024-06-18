<?php

namespace App\Livewire\Payments;

use App\Models\Currency;
use App\Models\Order;
use Livewire\Component;

class PaypalButtons extends Component
{
    public float $amount;

    public string $currencyName = 'USD';

    public string $currencySymbol = '$';

    public float $currencyAmount = 0.01;

    public Order $order;

    public function mount()
    {
        $this->setPaypalCurrency();
    }

    public function setPaypalCurrency() {
        $currency = Currency::firstWhere('name', $this->currencyName);

        if (isset($currency)) {
            $this->currencyAmount = $this->amount / $currency->rate;
        }

        $this->setCurrencyName();
    }

    private function setCurrencyName() {
        session()->put('currencyName', $this->currencyName);
    }

    public function render()
    {
        return view('livewire.payments.paypal-buttons');
    }
}
