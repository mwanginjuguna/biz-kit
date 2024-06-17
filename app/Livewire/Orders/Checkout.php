<?php

namespace App\Livewire\Orders;

use App\Livewire\Forms\CreateAddressForm;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mpesa\StkPush;
use Livewire\Component;

class Checkout extends Component
{
    public CreateAddressForm $form;

    public Order $order;

    public string $mpesaNumber = '';

    public string $discountCode = '';
    private object $discount;
    public bool $discountValid = false;

    public mixed $results = null;

    public function applyDiscount()
    {
        $this->discount = Discount::query()->where('code', '=', $this->discountCode)->first();
        if ($this->discount->exists()) {
            $this->order->total *= 1 - $this->discount->rate;
            $this->order->save();
            $this->discountValid = true;
        } else {
            $this->discountValid = false;
        }
    }

    public function removeItem(OrderItem $item)
    {
        if ($item->quantity > 1) {
            $item->quantity -= 1;
            $item->subtotal = $item->quantity * $item->product->price;
            $item->save();
        } else {
            $item->delete();
        }

        $this->updateOrder();
    }

    public function addItem(OrderItem $item)
    {
        $item->quantity += 1;
        $item->subtotal = $item->quantity * $item->product->price;
        $item->save();

        // redirect to update order details
        $this->updateOrder();
    }

    public function updateOrder()
    {
        $this->order->subtotal = $this->order->orderItems()->get()->map(fn($item) => $item->subtotal)->sum();
        $this->order->total = $this->order->subtotal;

        if ($this->order->discount_id > 0) {
            $discount = Discount::query()->firstWhere('id', '=', $this->order->discount_id);

            $this->order->total = $this->order->subtotal * (1-$discount->rate);
        }
        $this->order->save();

        // redirect to update order details
        $this->redirectRoute('orders.checkout', [$this->order->id]);
    }

    public function lipaNaMpesa()
    {
        $this->results = (new StkPush())->init(
            phoneNumber: $this->mpesaNumber,
            orderId: $this->order->id,
            amount: $this->order->total,
            accNumber: config('mpesa.paybill_account')
        );
    }

    public function render()
    {
        return view('livewire.orders.checkout');
    }
}
