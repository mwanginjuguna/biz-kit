<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductCreateForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public mixed $price = 1.99;

    #[Validate('required')]
    public string $description = '';

    public string $brand = '';
    public string $returnPolicy = '';
    public int $stockQuantity = 2;
    public string $category = '';
    public string $shippedFrom = '';

    public string $image = '';

    public function store()
    {
        $this->validate();

        $product = Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'category' => $this->category,
            'price' => $this->price,
            'brand' => $this->brand,
            'description' => $this->description,
            'stock_quantity' => $this->stockQuantity,
            'return_policy' => $this->returnPolicy,
            'shipped_from' => $this->shippedFrom,
            'image' => $this->image
        ]);
    }
}
