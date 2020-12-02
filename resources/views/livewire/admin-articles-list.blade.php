<div class="articles-admin-list">
    <table>
        <thead>
            <th>Nome do Artigo</th>
            <th></th>
        </thead>    
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>
                        <button type="button" class="btn-remove-article" wire:click="deleteArticle({{$article->id}})">Excluir</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Não existem artigos cadastrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrapper">{{ $articles->links() }}</div>
</div>