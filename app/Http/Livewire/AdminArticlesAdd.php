<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class AdminArticlesAdd extends Component
{
    public $showModal = false;
    public $title;
    public $slug;
    public $excerpt;
    public $content;
    public $categories;

    protected $rules = [
        'title' => 'required|min:5',
        'excerpt' => 'required|min:10',
        'slug' => 'required|unique:articles,slug',
        'content' => 'required|min:10'
    ];

    protected $messages = [
        'slug.unique' => 'Este link já está sendo utilizado',
        'content.required' => 'O campo conteúdo é obrigatório'
    ];

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function sanitizeSlug() 
    {
        if($this->slug != '') {
            $this->slug = strtolower(preg_replace("/[^A-Z,a-z,0-9]/",'-',$this->slug));
        }
    }

    public function saveArticle()
    {
        $this->validate();

        $article = Article::create([
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'slug' => $this->slug,
        ]);

        if(!empty($this->categories)) {
            $article->categories()->sync($this->categories);
        }

        $this->emit('articledAdded');
        $this->reset('title','showModal','slug','excerpt','content','categories');
    }

    public function render()
    {
        return view('livewire.admin-articles-add',[
            'showModal' => $this->showModal,
            'allCategories' => Category::orderBy('name','asc')->get()
        ]);
    }
}
