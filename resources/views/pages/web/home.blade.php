@extends('layouts.default')

@section('title', 'Notícias')

@section('sidebar')
    @livewire('categories')
@endsection

@section('content')
    <section class="articles-grid">
        @forelse ($articles as $article)
            <article>
                <h1>{{ $article->title }}</h1>
                <p>{{ $article->excerpt }}</p>
                <a href="{{ route('web.article',$article->slug) }}">Acessar</a>
            </article>
        @empty
            <p class="not-found">Não encontramos artigos para a sua busca.</p>
        @endforelse        
    </section>
    <div class="pagination-wrapper">
        {{ $articles->links() }}
    </div>

@endsection