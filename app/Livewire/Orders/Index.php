<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();
        $query = $user->role == 'A' ? Order::query()->latest() : Order::query()->where('user_id', $user->id);

        $orders = $query->simplePaginate(10);

        return view('livewire.orders.index', [
            'orders' => $orders
        ]);
    }
}
