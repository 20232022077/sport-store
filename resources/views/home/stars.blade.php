<div class="rating-stars">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= round($avg ?? 0))
            <i class="fa-solid fa-star"></i>
        @else
            <i class="fa-regular fa-star"></i>
        @endif
    @endfor
    <span class="rating-info">
        {{ number_format($avg ?? 0, 1) }} / 5
        <span class="rating-count">({{ $count ?? 0 }} {{ ($count ?? 0) == 1 ? 'Review' : 'Reviews' }})</span>
    </span>
</div>
