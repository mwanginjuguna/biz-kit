<?php

namespace App\Livewire\Orders;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $orders;

    public function render()
    {
        return view('livewire.orders.index');
    }
}
