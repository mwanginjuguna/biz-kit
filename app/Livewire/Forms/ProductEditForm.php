<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductEditForm extends Form
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

    public function update(object $product): object
    {
        $this->validate();

        $product->name = $this->name;
        $product->slug = Str::slug($this->name);
        $product->category = $this->category;
        $product->price = $this->price;
        $product->brand = $this->brand;
        $product->description = $this->description;
        $product->stock_quantity = $this->stockQuantity;
        $product->return_policy = $this->returnPolicy;
        $product->shipped_from = $this->shippedFrom;
        $product->image = $this->image;

        $product->save();

        return $product;
    }
}
