<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductEditForm;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImages;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Js;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ProductEditForm $form;

    public object $product;

    public mixed $productImage = null;
    public $productImages;

    public string $productFeatureTitle = '';
    public string $productFeatureDescription = '';

    public function mount(Product $product)
    {
        $this->product = Product::query()->with(['productFeatures', 'productImages', 'productReviews', 'productRatings'])->where('id', $product->id)->first();

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
        if (!is_null($this->productImages)) {
            Arr::map($this->productImages, function($image) {
                $imageUrl = Storage::disk('public')->putFileAs(
                    'products',
                    $image,
                    $image->getClientOriginalName()
                );

                ProductImages::create([
                    'image_location' => $imageUrl,
                    'product_id' => $this->product->id
                ]);
            });
        }
    }

    public function deleteProductImage($id)
    {
        $im = ProductImages::where('id',$id)->first();
        Storage::disk('public')->delete($im->image_location);
        $im->delete();

        $this->dispatch('image-deleted');
    }

    public function deleteProduct($id)
    {
        $pr = Product::findOrFail($id);
        $pr->delete();

        $this->dispatch('product-deleted');

        $this->redirectRoute('admin.products');
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}
