<div class="articles-admin-list">
    <table>
        <thead>
            <th>Nome</th>
            <th></th>
        </thead>    
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>
                        <button type="button" class="remove" wire:click="deleteArticle({{$article->id}})">Excluir</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Não existem artigos cadastrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $articles->links() }}
</div>