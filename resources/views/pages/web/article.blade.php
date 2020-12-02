@extends('layouts.default')

@section('title', 'Notícia: ' . $article->title)

@section('content')
    <section class="article-content">
        <h1 class="title">{{ $article->title }}</h1>
        <span class="info">
            Postado em: {{ $article->created_at->format('d/m/Y') }}
        </span>
        <p class="content">{!! nl2br($article->content) !!}</p>
    </section>
@endsection