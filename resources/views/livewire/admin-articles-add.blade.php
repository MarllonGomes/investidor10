<div>
    <button wire:click="toggleModal">Adicionar Artigo</button>

    @if($showModal)
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar Artigo</h1>
                    <button wire:click="toggleModal">X</button>
                </div>
                

                <label for="title">Título</label>
                <input type="text" wire:model="title" id="title">
                @error('title') <span class="error">{{ $message }}</span> @enderror

                <label for="slug">Link</label>
                <input type="text" wire:model="slug" id="slug" wire:blur="sanitizeSlug">
                @error('slug') <span class="error">{{ $message }}</span> @enderror

                <label for="excerpt">Resumo</label>
                <textarea wire:model="excerpt" cols="30" id="excerpt" rows="2"></textarea>
                @error('excerpt') <span class="error">{{ $message }}</span> @enderror

                <label for="content">Conteúdo</label>
                <textarea wire:model="content" id="content" cols="30" rows="20"></textarea>
                @error('content') <span class="error">{{ $message }}</span> @enderror

                <label for="categories">Categorias</label>
                <div class="checkbox-group">
                    @foreach($allCategories as $category)
                        <label>
                            <input type="checkbox" value="{{ $category->id }}" wire:model="categories.{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
                
                <button wire:click="saveArticle">Salvar</button>
                <button wire:click="toggleModal">Cancelar</button>
            </div>
        </div>
    @endif
</div>
