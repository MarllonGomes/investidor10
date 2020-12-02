<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class AdminArticlesList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    private $articles;

    protected $listeners = [
        'articledAdded' => 'updateArticles'
    ];

    public function updateArticles() 
    {
        //apenas para atualizar a lista
    }

    public function deleteArticle($id)
    {
        Article::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin-articles-list',['articles' => Article::orderBy('created_at','desc')->paginate()]);
    }
}
