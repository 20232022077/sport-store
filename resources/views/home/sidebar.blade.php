<aside class="sidebar">
    <h3>Categories</h3>
    <ul>
        @foreach($categories as $cat)
            <li>
                <a href="{{ route('category.products', $cat->id) }}">
                    <i class="fa-solid fa-tag"></i>
                    {{ \App\Models\Category::getParentsTree($cat, $cat->title) }}
                </a>
            </li>
        @endforeach
        @if($categories->isEmpty())
            <li><a href="#"><i class="fa-solid fa-tag"></i> No categories yet</a></li>
        @endif
    </ul>
</aside>
