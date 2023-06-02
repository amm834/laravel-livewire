<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public string $searchTerm = '';
    public int|null $selectedCategoryId = null;
    public mixed $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {

        $products = Product::with('category')
            ->when($this->searchTerm !== '', fn(Builder $builder) => $builder->where('name', 'like', '%' . $this->searchTerm . '%'))
            ->when($this->selectedCategoryId !== null, fn(Builder $builder) => $builder->where('category_id', $this->selectedCategoryId))
            ->paginate(10, '*', 'productPage');

        return view('livewire.product-list', compact('products'));
    }
}
