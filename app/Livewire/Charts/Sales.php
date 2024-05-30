<?php

namespace App\Livewire\Charts;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Sales extends Component
{
    public int $year = 2024;
    public mixed $ordersPerYear;

    public function mount()
    {
        $this->ordersPerYear = Order::query()
            ->whereYear('created_at', $this->year)
            ->oldest()
            ->get(['order_number', 'total', 'created_at'])
            ->groupBy(
                fn($order) => Carbon::parse($order->created_at)->monthName
            )
            ->toArray();

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
