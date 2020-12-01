@extends('layouts.default')

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

        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </section>

@endsection