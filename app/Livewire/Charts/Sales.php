<?php

namespace App\Livewire\Charts;

use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Sales extends Component
{
    public int $year = 2023;
    public mixed $ordersPerYear;
    public mixed $orders;
    public mixed $products;
    public mixed $topProducts;
    public mixed $purchasedProducts;
    public int $productsCount;
    public int $ordersCount;
    public float $revenue;

    public int $maxChartBarValue = 10;

    public array $months = [];
    public array $orderCountPerMonth = [];

    public mixed $totalPerYear = 0;
    public float $yearTotal = 0;

    public function getYearOrders()
    {
        $this->ordersPerYear = Order::query()
            ->getYearOrders($this->year)
            ->oldest()
            ->get(['order_number', 'total', 'created_at'])
            ->groupBy(
                fn($order) => Carbon::parse($order->created_at)->monthName
            )->all();

        $this->updateMonths();

        $this->updateTotalAndCount();

        $this->maxChartBarValue = $this->orderCountPerMonth ? max($this->orderCountPerMonth) + 2 : 0;

    }

    public function updateChart()
    {
        $this->getYearOrders();

        $this->dispatch('update-sales-chart');
    }

    public function updateMonths()
    {
        $this->months = collect($this->ordersPerYear)->keys()->values()->toArray();
    }

    public function updateTotalAndCount()
    {
        $this->yearTotal = 0;
        foreach ($this->ordersPerYear as $monthly) {
            $this->yearTotal += $monthly->sum('total');
            $this->orderCountPerMonth[] = $monthly->count();
        }
        $this->totalPerYear = number_format($this->yearTotal, 2);
    }

    public function mount()
    {
        $this->year = now()->year;

        $this->revenue = Order::query()->sum('total');

        $this->getYearOrders();
    }

    public function render()
    {
        return view('livewire.charts.sales');
    }
}
