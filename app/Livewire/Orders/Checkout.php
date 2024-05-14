<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Checkout extends Component
{
    public Order $order;
    public Collection $orderItems;

    // public Collection $products;

    public function render()
    {
        return view('livewire.orders.checkout');
    }
}
