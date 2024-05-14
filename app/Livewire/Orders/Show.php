<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Show extends Component
{
    public Order $order;

    public Collection $orderItems;

    public function mount()
    {
        $this->orderItems = OrderItem::all();
    }

    public function render()
    {
        return view('livewire.orders.show');
    }
}
