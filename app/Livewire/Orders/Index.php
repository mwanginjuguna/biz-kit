<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $orders = Order::query()->simplePaginate(10);

        return view('livewire.orders.index', [
            'orders' => $orders
        ]);
    }
}
