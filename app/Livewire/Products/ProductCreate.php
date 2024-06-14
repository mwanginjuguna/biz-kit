<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductCreateForm;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public ProductCreateForm $form;

    public $productImage;

    public string $imagePath = '';

    public function productSave()
    {
        if (isset($this->productImage)) {
            $this->imagePath = Storage::disk('public')
                ->putFileAs(
                    'products',
                    $this->productImage,
                    $this->productImage->getClientOriginalName()
                );

            $this->form->image = $this->imagePath;
        }

        $this->form->store();

        $this->form->reset();

        $this->redirectRoute('admin.products');
    }

    public function render()
    {
        return view('livewire.products.product-create');
    }
}
