<div>
    <button wire:click="toggleModal" class="btn-add-article">Adicionar Artigo</button>

    @if($showModal)
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Adicionar Artigo</h1>
                    <button wire:click="toggleModal" class="close-modal">X</button>
                </div>
                

                <div class="modal-body">
                    <div class="field-group">
                        <label for="title">Título</label>
                        <input type="text" wire:model="title" id="title">
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group">
                        <label for="slug">Link</label>
                        <input type="text" wire:model="slug" id="slug" wire:blur="sanitizeSlug">
                        @error('slug') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group">
                        <label for="excerpt">Resumo</label>
                        <input type="text" wire:model="excerpt" id="excerpt" />
                        @error('excerpt') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group">
                        <label for="content">Conteúdo</label>
                        <textarea wire:model="content" id="content" cols="30" rows="7"></textarea>
                        @error('content') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group">
                        <label for="categories">Categorias</label>
                        <div class="checkbox-group">
                            @foreach($allCategories as $category)
                                <label>
                                    <input type="checkbox" value="{{ $category->id }}" wire:model="categories.{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="actions">
                        <button wire:click="saveArticle" class="btn-save-article">Salvar</button>
                        <button wire:click="toggleModal" class="btn-cancel">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
