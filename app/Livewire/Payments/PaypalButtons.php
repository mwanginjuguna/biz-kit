<?php

namespace App\Livewire\Payments;

use App\Models\Order;
use Livewire\Component;

class PaypalButtons extends Component
{
    public float $amount;

    public Order $order;

    public function render()
    {
        $this->amount = $this->order->total;

        return view('livewire.payments.paypal-buttons');
    }
}
