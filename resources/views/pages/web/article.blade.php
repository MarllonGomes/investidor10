@extends('layouts.default')

@section('title', 'Notícia: ' . $article->title)

@section('sidebar')
    @livewire('categories')
@endsection

@section('content')
    <section class="article-content">
        <h1 class="title">{{ $article->title }}</h1>
        <span class="info">
            Postado em: {{ $article->created_at->format('d/m/Y') }} | 
            Categoria(s): 
                @forelse($article->categories as $cat)
                    {{ $cat->name }}, 
                @empty
                    Geral
                @endforelse
        </span>
        <p class="content">{!! nl2br($article->content) !!}</p>
    </section>
@endsection