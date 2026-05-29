@foreach($categories as $rs)
    <li>
        <a href="{{ route('category.products', ['id' => $rs->id]) }}">
            <i class="fa-solid fa-tag"></i> {{ $rs->title }}
        </a>

        @if($rs->children->count() > 0)
            <ul class="sub-menu">
                @include('home.category_tree', ['categories' => $rs->children])
            </ul>
        @endif
    </li>
@endforeach
