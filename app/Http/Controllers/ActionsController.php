<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ActionsController extends Controller
{
    public function dashboard(): View|RedirectResponse
    {
        if ($this->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    }

    public function cart(): View
    {
        return view('pages.cart');
    }

    public function checkout(): View
    {
        $cartItems = session()->get('cart', new Collection);
        $cartTotal = session()->get('cart-total');

        if ($cartItems->isEmpty()) {
            $order = Order::query()
                ->where('user_id', '=', Auth::id())
                ->where('is_paid', '=', false)
                ->first();
        } else {
            // generate a random order_number value
            $orNo = rand(0001, 99999) . '_' . strtoupper(Str::random('6'));

            // create a new order
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'order_number' => $orNo,
                'subtotal' => $cartTotal,
                'total' => $cartTotal,
                'customer_name' => Auth::user()->name,
                'customer_email' => Auth::user()->email,
            ]);

            // order items
            Arr::map($cartItems->values()->toArray(), function ($item) use ($order) {
                OrderItem::updateOrCreate([
                    'order_id' => $order->id,
                    'product_id' => $item['product']['id'],
                ], [
                    'order_id' => $order->id,
                    'product_id' => $item['product']['id'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal']
                ]);
            });
        }

        $orderItems = OrderItem::query()->where('order_id', '=', $order->id)->with(['product'])->get();

        // destroy the cart
        session()->forget(['cart', 'cart-total']);

        // redirect to order checkout
        return view('pages.orders.checkout', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }
}
