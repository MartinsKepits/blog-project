<div class="post-avg-rating">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= floor($rating))
            <span class="fa fa-star checked"></span>
        @elseif ($i <= ceil($rating) && $rating - floor($rating) >= 0.5)
            <span class="fa fa-star-half-alt checked"></span>
        @endif
    @endfor
</div>
