<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public Product $product;

    public function render()
    {
        return view('livewire.products.edit');
    }
}
