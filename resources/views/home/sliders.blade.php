@php use Illuminate\Support\Facades\Storage; @endphp

@foreach($productslider as $rs)
<div class="slider">
    <h2>{{ $rs->title }}</h2>
    <p>${{ number_format($rs->price, 2) }}</p>
    <a href="{{ route('category.products', $rs->category_id ?: 0) }}" class="btn">Shop Now</a>
</div>
@endforeach

@if($productslider->isEmpty())
<div class="slider">
    <h2>Welcome to Sport Store</h2>
    <p>Best sports equipment for every athlete</p>
    <a href="#" class="btn">Shop Now</a>
</div>
@endif
