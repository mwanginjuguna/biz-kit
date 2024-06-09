<?php

namespace App\Livewire\Pages;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardStats extends Component
{
    public object $orders;

    public function mount()
    {
        $this->orders = Order::query()->where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.pages.dashboard-stats');
    }
}
