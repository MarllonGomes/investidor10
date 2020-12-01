<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    const ARTICLES_PER_PAGE = 30;

    public function index(Request $request)
    {
        $searchQuery = $request->query('s');
        
        $articles = Article::orderBy('created_at','desc')
                        ->when($searchQuery, function($q) use ($searchQuery) {
                            $q->where('title','like',"%{$searchQuery}%");
                        })
                        ->paginate();

        $categories = Category::orderBy('name','asc')->get();
        
        return view('pages.web.home', compact('articles','categories'));
    }

    public function show($articleSlug)
    {
        $article = Article::where('slug','=',$articleSlug)->first();

        if(!$article) {
            return redirect('/');
        }

        $categories = Category::orderBy('name','asc')->get();

        return view('pages.web.article', compact('article','categories'));
    }
}
