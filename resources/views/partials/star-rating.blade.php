<div class="star-rating" title="{{ $rating }} out of 5 stars">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= floor($rating))
            <span class="star full"></span>
        @elseif($i - 0.5 <= $rating)
            <span class="star half"></span>
        @else
            <span class="star"></span>
        @endif
    @endfor
    <span class="rating-value">({{ number_format($rating, 2) }})</span>
</div>