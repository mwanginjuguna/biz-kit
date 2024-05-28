<?php

namespace App\Livewire\Charts;

use App\Models\Order;
use Livewire\Component;

class Sales extends Component
{
    public object $thisYearOrders;

    public function mount()
    {
//        $this->thisYearOrders = Order::query()
//            ->whereYear('created_at', date('Y'))
//            ->selectRaw('month(created_at) as month')
//            ->groupBy('month')
//            ->orderBy('month')
//            ->pluck('month', 'total')
//            ->values();
//            ->dd();
    }
    public function render()
    {
        return view('livewire.charts.sales');
    }
}
