<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Categories extends Component
{
    public $currentCategorySlug = '';
    public $categories;

    public function mount()
    {
        $currentCategorySlug = Route::getCurrentRoute()->parameters['slug'] ?? '';
        
        $this->currentCategorySlug = $currentCategorySlug;
        $this->categories = Category::orderBy('name','asc')->get();
    }

    public function render()
    {
        return view('livewire.categories',  [
                'currentCategorySlug'   => $this->currentCategorySlug,
                'categories'        => $this->categories
            ]);
    }
}
