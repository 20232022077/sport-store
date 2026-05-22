@extends('layouts.front_base')

@section('title', 'Sport Store - Home')

@section('sliders')
    @include('home.sliders')
@endsection

@section('content')

    <h2 class="section-title">Featured Products</h2>
    <div class="cards-grid">
        <div class="card">
            <div class="icon"><i class="fa-regular fa-futbol"></i></div>
            <h4>Football Pro</h4>
            <p>Official match ball, size 5</p>
            <div class="price">$29.99</div>
        </div>
        <div class="card">
            <div class="icon"><i class="fa-solid fa-basketball"></i></div>
            <h4>Basketball Elite</h4>
            <p>Indoor/outdoor performance</p>
            <div class="price">$39.99</div>
        </div>
        <div class="card">
            <div class="icon"><i class="fa-solid fa-table-tennis-paddle-ball"></i></div>
            <h4>Tennis Racket</h4>
            <p>Lightweight carbon frame</p>
            <div class="price">$89.99</div>
        </div>
        <div class="card">
            <div class="icon"><i class="fa-solid fa-dumbbell"></i></div>
            <h4>Dumbbell Set</h4>
            <p>Adjustable 5–30 kg</p>
            <div class="price">$119.99</div>
        </div>
    </div>

    <h2 class="section-title">New Arrivals</h2>
    <div class="cards-grid">
        <div class="card">
            <div class="icon"><i class="fa-solid fa-bicycle"></i></div>
            <h4>Mountain Bike</h4>
            <p>21-speed trail ready</p>
            <div class="price">$349.99</div>
        </div>
        <div class="card">
            <div class="icon"><i class="fa-solid fa-hand-fist"></i></div>
            <h4>Boxing Gloves</h4>
            <p>Genuine leather, 12oz</p>
            <div class="price">$54.99</div>
        </div>
        <div class="card">
            <div class="icon"><i class="fa-solid fa-person-swimming"></i></div>
            <h4>Swim Goggles</h4>
            <p>Anti-fog UV protection</p>
            <div class="price">$19.99</div>
        </div>
        <div class="card">
            <div class="icon"><i class="fa-solid fa-person-running"></i></div>
            <h4>Running Shoes</h4>
            <p>Breathable mesh, all sizes</p>
            <div class="price">$74.99</div>
        </div>
    </div>

@endsection
