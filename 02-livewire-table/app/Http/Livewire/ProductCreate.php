<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public mixed $categories;
    public Product $product;
    protected $rules = [
        'product.name' => 'required|min:3|max:255',
        'product.price' => 'required|min:3',
        'product.category_id' => 'required',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->product = new Product();
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.product-create');
    }

    public function createProduct()
    {
        $this->validate();
        $this->product->save();
        return redirect()->route('products.index');
    }
}
