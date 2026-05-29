<aside class="sidebar">
    <h3>Categories</h3>
    <ul class="category-menu">
        @php $mainCategories = \App\Models\Category::mainCategories(); @endphp
        @if($mainCategories->isEmpty())
            <li><a href="#"><i class="fa-solid fa-tag"></i> No categories yet</a></li>
        @else
            @include('home.category_tree', ['categories' => $mainCategories])
        @endif
    </ul>

    @if(!isset($page) || $page !== 'home')
        <h3 style="margin-top:25px;">Navigation</h3>
        <ul>
            <li><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a></li>
        </ul>
    @endif
</aside>
