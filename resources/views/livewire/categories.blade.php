<aside>
    <ul class="categories-list">
        <li>
            <a href="/" @if($currentCategorySlug === '') class="active" @endif >Todas as Categorias</a>
        </li>
        @foreach($categories as $category)
            <li>
                <a href="/categoria/{{ $category->slug }}" @if($category->slug === $currentCategorySlug) class="active" @endif >{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</aside>
