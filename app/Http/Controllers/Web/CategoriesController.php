<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function show(string $categorySlug, Request $request) 
    {
        
        $searchQuery = $request->query('s');
        $category = Category::where('slug','=',$categorySlug)->first();
        
        if(!$category) {
            return redirect('/');
        }        

        $articles = $category->articles()
                            ->when($searchQuery, function($q) use ($searchQuery) {
                                $q->where('title','like',"%{$searchQuery}%");
                            })->paginate();


        return view('pages.web.category', compact('articles','category'));
    }
}
