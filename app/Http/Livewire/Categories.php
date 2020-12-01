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
        $currentRouteObject = Route::getCurrentRoute();
        $uri = $currentRouteObject->uri;
        $slug = $currentRouteObject->parameters['slug'] ?? '';

        if(strpos($uri,'categoria/') === false) {
            $slug = '';
        }
        
        $this->currentCategorySlug = $slug;
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
