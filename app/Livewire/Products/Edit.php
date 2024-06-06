<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductEditForm;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImages;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Edit extends Component
{
    public ProductEditForm $form;

    public Product $product;

    public mixed $productImage = null;
    public array $productImages = [];

    public string $productFeatureTitle = '';
    public string $productFeatureDescription = '';

    public function mount()
    {
        $this->form->name = $this->product->name;
        $this->form->brand = $this->product->brand;
        $this->form->category = $this->product->category;
        $this->form->price = $this->product->price;
        $this->form->description = $this->product->description;
        $this->form->stockQuantity = $this->product->stock_quantity;
        $this->form->shippedFrom = $this->product->shipped_from;
        $this->form->returnPolicy = $this->product->return_policy;
        $this->form->image = $this->product->image;
    }

    public function productUpdate()
    {
        if (!is_null($this->productImage)) {
            $imagePath = Storage::disk('public')
                ->putFileAs(
                    'products',
                    $this->productImage,
                    $this->productImage->getClientOriginalName()
                );

            $this->form->image = $imagePath;
        }

        $this->form->update($this->product);

        $this->dispatch('product-updated');
    }

    public function addProductFeature()
    {
        ProductFeature::create([
            'title' => $this->productFeatureTitle,
            'description' => $this->productFeatureDescription,
            'product_id' => $this->product->id,
        ]);

        $this->dispatch('feature-added');
    }

    public function uploadProductImages()
    {
        if (!empty($this->productImages)) {
            Arr::map($this->productImages, function($image) {
                $imageUrl = Storage::disk('public')->putFileAs(
                    'products',
                    $image,
                    $image->getClientOriginalName()
                );

                ProductImages::create([
                    'image' => $imageUrl,
                    'product_id' => $this->product->id
                ]);
            });
        }
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}
