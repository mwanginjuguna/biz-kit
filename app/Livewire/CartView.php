<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartView extends Component
{
    public Cart $cart;

    public function render()
    {
        $this->js('console.log("Hi")');
        return view('livewire.cart-view');
    }
}
