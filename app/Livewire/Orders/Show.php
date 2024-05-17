<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class Show extends Component
{
    public Order $order;

    public function render()
    {
        return view('livewire.orders.show');
    }
}
